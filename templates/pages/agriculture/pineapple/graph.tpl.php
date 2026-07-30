<?php
/**
 * Pineapple Historical Price Index — graph partial
 *
 * Drop-in replacement for the old pineapple graph partial.
 * Markup/classes follow the new static design (section-card, timeframe-toggle,
 * chart-wrap, chart-xaxis, --on-surface-variant, etc.) which are assumed to
 * already exist in the project's global stylesheet. Only chart-specific
 * styles (legend, loading state, error box, chart series colors) are added
 * here, scoped with a "phi-" (Price History Index) prefix so nothing clashes
 * with the global design system.
 *
 * Called exactly the same way as before, e.g.:
 *
 *   <section>
 *       <?= $view->render('/pages/agriculture/pineapple/graph', [
 *           'lastSevenDaysPrice' => $lastSevenDaysPrice,
 *       ], null) ?>
 *   </section>
 *
 * Required variable:
 * @var array $lastSevenDaysPrice
 */
?>

<style>
    :root {
        --phi-green: #198754;
        --phi-yellow: #eab308;
    }

    .phi-legend {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 14px;
    }

    .phi-legend-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        font-weight: 600;
        color: var(--on-surface, #0f172a);
    }

    .phi-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        display: inline-block;
    }

    .phi-dot-green {
        background: var(--phi-green);
    }

    .phi-dot-yellow {
        background: var(--phi-yellow);
    }

    /*
     * The old static design used a fixed-height, overflow-hidden chart-wrap
     * to clip the fake bars at exactly 100%. That clips a real line chart's
     * peaks, so it's overridden here for this line-graph version.
     */
    .chart-wrap {
        position: relative !important;
        height: auto !important;
        max-height: none !important;
        overflow: visible !important;
        padding-top: 12px;
    }

    #pineapple-history-chart {
        width: 100%;
        min-height: 280px;
        overflow: visible;
    }

    #pineapple-history-chart .apexcharts-svg {
        overflow: visible !important;
    }

    .phi-loading {
        position: absolute;
        inset: 0;
        z-index: 10;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;

        background: rgba(255, 255, 255, 0.88);
        border-radius: 10px;

        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s;
    }

    .phi-loading.visible {
        opacity: 1;
        pointer-events: all;
    }

    .phi-spinner {
        width: 32px;
        height: 32px;
        border: 3px solid var(--outline, #e5e7eb);
        border-top-color: var(--phi-green);
        border-radius: 50%;
        animation: phi-spin 0.8s linear infinite;
    }

    .phi-loading p {
        margin: 0;
        font-size: 13px;
        font-weight: 500;
        color: var(--on-surface-variant, #64748b);
    }

    .phi-error {
        display: none;
        margin-top: 14px;
        padding: 12px 15px;
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 8px;
        color: #b91c1c;
        font-size: 13px;
    }

    .phi-error.visible {
        display: block;
    }

    .timeframe-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    @keyframes phi-spin {
        to {
            transform: rotate(360deg);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .phi-loading,
        .phi-spinner {
            animation: none !important;
            transition: none !important;
        }
    }
</style>

<div class="section-card p-4 mb-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-0" style="font-size:20px;">Historical Price Index</h2>
            <p class="mb-0" style="font-size:11px; color:var(--on-surface-variant);">Market movement over selected timeframe</p>
        </div>

        <div class="timeframe-toggle" role="group" aria-label="Select pineapple price history range">
            <button type="button" class="timeframe-btn active" data-range="7D" aria-pressed="true">7D</button>
            <button type="button" class="timeframe-btn" data-range="1M" aria-pressed="false">1M</button>
            <button type="button" class="timeframe-btn" data-range="3M" aria-pressed="false">3M</button>
            <button type="button" class="timeframe-btn" data-range="1Y" aria-pressed="false">1Y</button>
        </div>
    </div>

    <div class="phi-legend">
        <span class="phi-legend-item"><span class="phi-dot phi-dot-green"></span>Green</span>
        <span class="phi-legend-item"><span class="phi-dot phi-dot-yellow"></span>Yellow</span>
    </div>

    <div class="chart-wrap">
        <div
                id="pineapple-history-chart"
                role="img"
                aria-label="Green and yellow pineapple historical price chart"
        ></div>

        <div id="phi-loading" class="phi-loading" aria-live="polite">
            <div class="phi-spinner"></div>
            <p>Loading price history...</p>
        </div>
    </div>

    <div id="phi-error" class="phi-error" role="alert"></div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        /*
         * 7-day data comes directly from the controller — this is the
         * default active range, so no fetch is needed on initial load.
         */
        const sevenDaysData = <?= json_encode(
                $lastSevenDaysPrice,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES |
                JSON_HEX_TAG |
                JSON_HEX_AMP
        ) ?>;

        let currentData = sevenDaysData;
        let chart = null;

        const chartContainer = document.getElementById("pineapple-history-chart");
        const loading = document.getElementById("phi-loading");
        const errorBox = document.getElementById("phi-error");
        const rangeButtons = document.querySelectorAll(".timeframe-btn");

        function getChartHeight(containerWidth) {
            if (containerWidth <= 320) return 240;
            if (containerWidth < 576) return 300;
            return 400;
        }

        function getXAxisConfig(data, containerWidth) {
            const count = data.length;
            const minLabelSpacing = 85;
            const maxLabels = Math.max(4, Math.floor(containerWidth / minLabelSpacing));

            const config = {
                categories: data.map(function (item) {
                    return item.label;
                }),
                labels: {
                    rotate: containerWidth < 600 && count > 6 ? -45 : 0,
                    rotateAlways: containerWidth < 600 && count > 6,
                    trim: false,
                    hideOverlappingLabels: true,
                    style: {
                        fontSize: containerWidth < 480 ? "10px" : "12px",
                        colors: "#64748b"
                    }
                },
                axisBorder: { show: false },
                axisTicks: { show: true, color: "#e5e7eb" },
                tooltip: { enabled: false }
            };

            if (count > maxLabels) {
                config.tickAmount = maxLabels;
            }

            return config;
        }

        function normalizeData(data) {
            return data.map(function (item) {
                return {
                    label: item.label ?? item.price_date ?? item.date,
                    green: item.green !== null && item.green !== undefined ? Number(item.green) : null,
                    yellow: (
                        item.yellow !== null && item.yellow !== undefined
                            ? Number(item.yellow)
                            : (item.ripe !== null && item.ripe !== undefined ? Number(item.ripe) : null)
                    )
                };
            });
        }

        function getYAxisBounds(data) {
            const values = [];

            data.forEach(function (item) {
                if (item.green !== null && item.green !== undefined) values.push(item.green);
                if (item.yellow !== null && item.yellow !== undefined) values.push(item.yellow);
            });

            if (!values.length) {
                return { min: undefined, max: undefined };
            }

            const min = Math.min.apply(null, values);
            const max = Math.max.apply(null, values);
            const range = max - min;

            // Flat line (range === 0) still needs headroom, so fall back
            // to a percentage of the value itself in that case.
            const buffer = range > 0 ? range * 0.15 : Math.max(max * 0.1, 1);

            return {
                min: Math.max(0, min - buffer),
                max: max + buffer
            };
        }

        function renderChart(rawData) {
            const data = normalizeData(rawData);
            currentData = rawData;

            if (chart) {
                chart.destroy();
                chart = null;
            }

            const containerWidth = chartContainer.offsetWidth || window.innerWidth;
            const yBounds = getYAxisBounds(data);

            const options = {
                chart: {
                    type: "line",
                    height: getChartHeight(containerWidth),
                    toolbar: { show: false },
                    zoom: { enabled: false },
                    parentHeightOffset: 0,
                    redrawOnWindowResize: true
                },

                series: [
                    { name: "Green", data: data.map(function (item) { return item.green; }) },
                    { name: "Yellow", data: data.map(function (item) { return item.yellow; }) }
                ],

                colors: ["#198754", "#eab308"],

                xaxis: getXAxisConfig(data, containerWidth),

                yaxis: {
                    min: yBounds.min,
                    max: yBounds.max,
                    forceNiceScale: true,
                    tickAmount: containerWidth < 480 ? 4 : 5,
                    labels: {
                        style: {
                            fontSize: containerWidth < 480 ? "10px" : "12px",
                            colors: "#64748b"
                        },
                        formatter: function (value) {
                            if (value === null || value === undefined) return "";
                            return "₹" + Number(value).toFixed(2);
                        }
                    }
                },

                stroke: { curve: "smooth", width: 3 },

                markers: {
                    size: data.length <= 31 ? 4 : 0,
                    hover: { size: 6 }
                },

                dataLabels: { enabled: false },

                grid: {
                    borderColor: "#e5e7eb",
                    padding: {
                        top: 25,
                        right: containerWidth < 360 ? 5 : 15,
                        bottom: 0,
                        left: containerWidth < 360 ? 0 : 5
                    }
                },

                legend: { show: false },

                tooltip: {
                    shared: true,
                    intersect: false,
                    theme: "dark",
                    y: {
                        formatter: function (value) {
                            if (value === null || value === undefined) return "No data";
                            return "₹" + Number(value).toFixed(2);
                        }
                    }
                },

                noData: {
                    text: "No pineapple price data available",
                    align: "center",
                    verticalAlign: "middle",
                    style: { color: "#64748b", fontSize: "14px" }
                }
            };

            chart = new ApexCharts(chartContainer, options);
            chart.render();
        }

        function setActiveButton(range) {
            rangeButtons.forEach(function (button) {
                const isActive = button.dataset.range === range;
                button.classList.toggle("active", isActive);
                button.setAttribute("aria-pressed", isActive ? "true" : "false");
            });
        }

        function setButtonsDisabled(disabled) {
            rangeButtons.forEach(function (button) {
                button.disabled = disabled;
            });
        }

        async function loadGraph(range) {
            errorBox.classList.remove("visible");
            errorBox.textContent = "";

            /*
             * 7D already exists in the page — skip the network request.
             */
            if (range === "7D") {
                renderChart(sevenDaysData);
                setActiveButton("7D");
                return;
            }

            loading.classList.add("visible");
            setButtonsDisabled(true);

            try {
                const response = await fetch(
                    "/agriculture/pineapple/history?period=" + encodeURIComponent(range),
                    { headers: { "Accept": "application/json" } }
                );

                if (!response.ok) {
                    throw new Error("Unable to load pineapple price history.");
                }

                const data = await response.json();

                if (!Array.isArray(data)) {
                    throw new Error("Invalid pineapple graph response.");
                }

                renderChart(data);
                setActiveButton(range);

            } catch (error) {
                console.error(error);
                errorBox.textContent = "Unable to load pineapple price history. Please try again.";
                errorBox.classList.add("visible");

            } finally {
                loading.classList.remove("visible");
                setButtonsDisabled(false);
            }
        }

        rangeButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                loadGraph(this.dataset.range);
            });
        });

        /*
         * Initial graph: 7D, using controller-passed data (matches the
         * "active" button set in the markup above).
         */
        renderChart(sevenDaysData);

        /*
         * Re-render only after resizing has stopped.
         */
        let resizeTimer;
        window.addEventListener("resize", function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                renderChart(currentData);
            }, 250);
        });

    });
</script>