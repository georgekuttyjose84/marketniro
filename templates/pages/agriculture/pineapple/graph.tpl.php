<?php
/**
 * Pineapple Price History Graph
 *
 * Required variable:
 *
 * @var array $lastSevenDaysPrice
 */
?>

<style>
    :root {
        --pineapple-card-bg: #ffffff;
        --pineapple-card-border: #e5e7eb;
        --pineapple-grid: #e5e7eb;
        --pineapple-text: #0f172a;
        --pineapple-muted: #64748b;

        --pineapple-green: #198754;
        --pineapple-green-dark: #157347;

        --pineapple-ripe: #e09f00;

        --pineapple-shadow:
                0 5px 20px rgba(15, 23, 42, 0.06);

        --pineapple-radius: 14px;
    }

    .pineapple-graph-card {
        width: 100%;
        padding: 28px;
        background: var(--pineapple-card-bg);
        border: 1px solid var(--pineapple-card-border);
        border-radius: var(--pineapple-radius);
        box-shadow: var(--pineapple-shadow);
        box-sizing: border-box;
    }

    .pineapple-graph-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 18px;
        margin-bottom: 24px;
    }

    .pineapple-graph-heading h2 {
        margin: 0 0 7px;
        color: var(--pineapple-text);
        font-size: clamp(20px, 4vw, 30px);
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .pineapple-graph-subtitle {
        max-width: 650px;
        margin: 0;
        color: var(--pineapple-muted);
        font-size: 15px;
        line-height: 1.6;
    }

    .pineapple-range-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
        width: 100%;
    }

    .pineapple-range-btn {
        padding: 8px 15px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 999px;
        color: var(--pineapple-text);
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition:
                background 0.2s,
                border-color 0.2s,
                color 0.2s,
                transform 0.2s,
                box-shadow 0.2s;
    }

    .pineapple-range-btn:hover {
        color: var(--pineapple-green);
        border-color: var(--pineapple-green);
        transform: translateY(-2px);
    }

    .pineapple-range-btn.active {
        background: var(--pineapple-green);
        border-color: var(--pineapple-green);
        color: #ffffff;
        box-shadow:
                0 4px 10px rgba(25, 135, 84, 0.25);
    }

    .pineapple-range-btn.active:hover {
        color: #ffffff;
        transform: none;
    }

    .pineapple-range-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .pineapple-chart-legend {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 18px;
    }

    .pineapple-legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--pineapple-text);
        font-size: 14px;
        font-weight: 600;
    }

    .pineapple-legend-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }

    .pineapple-legend-dot.green {
        background: var(--pineapple-green);
    }

    .pineapple-legend-dot.ripe {
        background: var(--pineapple-ripe);
    }

    .pineapple-chart-figure {
        position: relative;
        margin: 0;
    }

    #pineapple-history-chart {
        width: 100%;
        min-height: 280px;
    }

    .pineapple-graph-loading {
        position: absolute;
        inset: 0;
        z-index: 10;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 12px;

        background: rgba(255, 255, 255, 0.88);
        border-radius: 10px;

        opacity: 0;
        pointer-events: none;

        transition: opacity 0.2s;
    }

    .pineapple-graph-loading.visible {
        opacity: 1;
        pointer-events: all;
    }

    .pineapple-spinner {
        width: 36px;
        height: 36px;

        border: 3px solid #e5e7eb;
        border-top-color: var(--pineapple-green);
        border-radius: 50%;

        animation: pineapple-spin 0.8s linear infinite;
    }

    .pineapple-graph-loading p {
        margin: 0;
        color: var(--pineapple-muted);
        font-size: 14px;
        font-weight: 500;
    }

    .pineapple-graph-error {
        display: none;
        margin-top: 15px;
        padding: 12px 15px;
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 8px;
        color: #b91c1c;
        font-size: 14px;
    }

    .pineapple-graph-error.visible {
        display: block;
    }

    @keyframes pineapple-spin {
        to {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 576px) {
        .pineapple-graph-card {
            padding: 18px 14px;
        }

        .pineapple-graph-top {
            gap: 14px;
            margin-bottom: 18px;
        }

        .pineapple-graph-heading h2 {
            font-size: 22px;
        }

        .pineapple-graph-subtitle {
            font-size: 13px;
        }

        .pineapple-range-buttons {
            gap: 5px;
        }

        .pineapple-range-btn {
            padding: 7px 11px;
            font-size: 12px;
        }

        .pineapple-chart-legend {
            gap: 15px;
        }

        #pineapple-history-chart {
            min-height: 250px;
        }
    }

    @media (max-width: 360px) {
        .pineapple-graph-card {
            padding: 14px 10px;
        }

        .pineapple-range-btn {
            padding: 6px 9px;
            font-size: 11px;
        }

        .pineapple-chart-legend {
            gap: 12px;
        }

        .pineapple-legend-item {
            font-size: 12px;
        }

        #pineapple-history-chart {
            min-height: 220px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .pineapple-range-btn,
        .pineapple-graph-loading,
        .pineapple-spinner {
            animation: none !important;
            transition: none !important;
        }
    }
</style>


<section
    class="pineapple-graph-card"
    aria-labelledby="pineapple-history-heading"
>

    <div class="pineapple-graph-top">

        <div class="pineapple-graph-heading">

            <h2 id="pineapple-history-heading">
                Pineapple Price History
            </h2>

            <p class="pineapple-graph-subtitle">
                Compare historical green and ripe pineapple prices
                based on daily average prices.
            </p>

        </div>


        <nav
            class="pineapple-range-buttons"
            aria-label="Select pineapple price history range"
        >

            <button
                type="button"
                class="pineapple-range-btn active"
                data-period="7D"
                aria-pressed="true"
            >
                7 Days
            </button>

            <button
                type="button"
                class="pineapple-range-btn"
                data-period="1M"
                aria-pressed="false"
            >
                1 Month
            </button>

            <button
                type="button"
                class="pineapple-range-btn"
                data-period="3M"
                aria-pressed="false"
            >
                3 Months
            </button>

            <button
                type="button"
                class="pineapple-range-btn"
                data-period="6M"
                aria-pressed="false"
            >
                6 Months
            </button>

            <button
                type="button"
                class="pineapple-range-btn"
                data-period="1Y"
                aria-pressed="false"
            >
                1 Year
            </button>

        </nav>

    </div>


    <div class="pineapple-chart-legend">

        <div class="pineapple-legend-item">
            <span class="pineapple-legend-dot green"></span>
            <span>Green</span>
        </div>

        <div class="pineapple-legend-item">
            <span class="pineapple-legend-dot ripe"></span>
            <span>Ripe</span>
        </div>

    </div>


    <figure
        class="pineapple-chart-figure"
        aria-label="Green and ripe pineapple historical price chart"
    >

        <div
            id="pineapple-history-chart"
            role="img"
            aria-label="Pineapple price history line chart"
        ></div>


        <div
            id="pineapple-graph-loading"
            class="pineapple-graph-loading"
            aria-live="polite"
        >

            <div class="pineapple-spinner"></div>

            <p>Loading price history...</p>

        </div>

    </figure>


    <div
        id="pineapple-graph-error"
        class="pineapple-graph-error"
        role="alert"
    ></div>

</section>


<script>
    document.addEventListener("DOMContentLoaded", function () {

        /*
         * 7-day data comes directly from the controller.
         *
         * No fetch request is made on initial page load.
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

        const chartContainer = document.getElementById(
            "pineapple-history-chart"
        );

        const loading = document.getElementById(
            "pineapple-graph-loading"
        );

        const errorBox = document.getElementById(
            "pineapple-graph-error"
        );

        const rangeButtons = document.querySelectorAll(
            ".pineapple-range-btn"
        );


        function getChartHeight(containerWidth) {

            if (containerWidth <= 320) {
                return 220;
            }

            if (containerWidth < 576) {
                return 280;
            }

            return 420;
        }


        function getXAxisConfig(data, containerWidth) {

            const count = data.length;

            const minLabelSpacing = 85;

            const maxLabels = Math.max(
                4,
                Math.floor(containerWidth / minLabelSpacing)
            );

            const config = {

                categories: data.map(function (item) {
                    return item.label;
                }),

                labels: {

                    rotate:
                        containerWidth < 600 && count > 6
                            ? -45
                            : 0,

                    rotateAlways:
                        containerWidth < 600 && count > 6,

                    trim: false,

                    hideOverlappingLabels: true,

                    style: {
                        fontSize:
                            containerWidth < 480
                                ? "10px"
                                : "12px",

                        colors: "#64748b"
                    }
                },

                axisBorder: {
                    show: false
                },

                axisTicks: {
                    show: true,
                    color: "#e5e7eb"
                },

                tooltip: {
                    enabled: false
                }
            };


            if (count > maxLabels) {
                config.tickAmount = maxLabels;
            }


            return config;
        }


        function normalizeData(data) {

            return data.map(function (item) {

                return {

                    label:
                        item.label
                        ?? item.price_date
                        ?? item.date,

                    green:
                        item.green !== null
                        && item.green !== undefined
                            ? Number(item.green)
                            : null,

                    ripe:
                        item.ripe !== null
                        && item.ripe !== undefined
                            ? Number(item.ripe)
                            : null
                };

            });
        }


        function renderChart(rawData) {

            const data = normalizeData(rawData);

            currentData = rawData;


            if (chart) {

                chart.destroy();

                chart = null;
            }


            const containerWidth =
                chartContainer.offsetWidth
                || window.innerWidth;


            const options = {

                chart: {

                    type: "line",

                    height: getChartHeight(containerWidth),

                    toolbar: {
                        show: false
                    },

                    zoom: {
                        enabled: false
                    },

                    parentHeightOffset: 0,

                    redrawOnWindowResize: true
                },


                series: [

                    {
                        name: "Green",
                        data: data.map(function (item) {
                            return item.green;
                        })
                    },

                    {
                        name: "Ripe",
                        data: data.map(function (item) {
                            return item.ripe;
                        })
                    }

                ],


                colors: [
                    "#198754",
                    "#e09f00"
                ],


                xaxis: getXAxisConfig(
                    data,
                    containerWidth
                ),


                yaxis: {

                    tickAmount:
                        containerWidth < 480
                            ? 4
                            : 5,

                    labels: {

                        style: {
                            fontSize:
                                containerWidth < 480
                                    ? "10px"
                                    : "12px",

                            colors: "#64748b"
                        },

                        formatter: function (value) {

                            if (
                                value === null
                                || value === undefined
                            ) {
                                return "";
                            }

                            return "₹" + Number(value).toFixed(2);
                        }
                    }
                },


                stroke: {

                    curve: "smooth",

                    width: 3
                },


                markers: {

                    size:
                        data.length <= 31
                            ? 4
                            : 0,

                    hover: {
                        size: 6
                    }
                },


                dataLabels: {
                    enabled: false
                },


                grid: {

                    borderColor: "#e5e7eb",

                    padding: {

                        top: 5,

                        right:
                            containerWidth < 360
                                ? 5
                                : 15,

                        bottom: 0,

                        left:
                            containerWidth < 360
                                ? 0
                                : 5
                    }
                },


                legend: {
                    show: false
                },


                tooltip: {

                    shared: true,

                    intersect: false,

                    theme: "dark",

                    y: {

                        formatter: function (value) {

                            if (
                                value === null
                                || value === undefined
                            ) {
                                return "No data";
                            }

                            return "₹" + Number(value).toFixed(2);
                        }
                    }
                },


                noData: {

                    text: "No pineapple price data available",

                    align: "center",

                    verticalAlign: "middle",

                    style: {

                        color: "#64748b",

                        fontSize: "14px"
                    }
                }
            };


            chart = new ApexCharts(
                chartContainer,
                options
            );


            chart.render();
        }


        function setActiveButton(period) {

            rangeButtons.forEach(function (button) {

                const isActive =
                    button.dataset.period === period;


                button.classList.toggle(
                    "active",
                    isActive
                );


                button.setAttribute(
                    "aria-pressed",
                    isActive ? "true" : "false"
                );

            });
        }


        function setButtonsDisabled(disabled) {

            rangeButtons.forEach(function (button) {

                button.disabled = disabled;

            });
        }


        async function loadGraph(period) {

            errorBox.classList.remove("visible");

            errorBox.textContent = "";


            /*
             * 7 Days already exists in the page.
             *
             * Do not send a fetch request.
             */
            if (period === "7D") {

                renderChart(sevenDaysData);

                setActiveButton("7D");

                return;
            }


            loading.classList.add("visible");

            setButtonsDisabled(true);


            try {

                const response = await fetch(

                    "/agriculture/pineapple/history"
                    + "?period="
                    + encodeURIComponent(period),

                    {
                        headers: {
                            "Accept": "application/json"
                        }
                    }

                );


                if (!response.ok) {

                    throw new Error(
                        "Unable to load pineapple price history."
                    );
                }


                const data = await response.json();


                if (!Array.isArray(data)) {

                    throw new Error(
                        "Invalid pineapple graph response."
                    );
                }


                renderChart(data);

                setActiveButton(period);


            } catch (error) {

                console.error(error);


                errorBox.textContent =
                    "Unable to load pineapple price history. Please try again.";


                errorBox.classList.add("visible");


            } finally {

                loading.classList.remove("visible");

                setButtonsDisabled(false);
            }
        }


        rangeButtons.forEach(function (button) {

            button.addEventListener(
                "click",
                function () {

                    loadGraph(
                        this.dataset.period
                    );

                }
            );

        });


        /*
         * Initial graph:
         *
         * Uses controller-passed 7-day array.
         */
        renderChart(sevenDaysData);


        /*
         * Re-render only after resizing has stopped.
         */
        let resizeTimer;


        window.addEventListener(
            "resize",
            function () {

                clearTimeout(resizeTimer);


                resizeTimer = setTimeout(
                    function () {

                        renderChart(currentData);

                    },
                    250
                );

            }
        );

    });
</script>