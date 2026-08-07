<?php
/** @var \App\Domain\Entity\GraphData $graph */
?>
<?php
/** @var \App\Domain\Entity\GraphData $graph */
?>

<section class="filter-card mb-4">

    <div class="chart-card-header">
        <h3>USD to INR Historical Exchange Rates</h3>
        <div class="chart-range-toggle">
            <button class="range-btn active" data-period="24H" aria-pressed="true">
                24 Hours
            </button>

            <button class="range-btn" data-period="7D" aria-pressed="false">
                7 Days
            </button>

            <button class="range-btn" data-period="1M" aria-pressed="false">
                1 Month
            </button>

            <button class="range-btn" data-period="6M" aria-pressed="false">
                6 Months
            </button>
        </div>
    </div>


    <div class="chart-stats">
        <div class="stat-box">
            <p>Current Rate</p>
            <p id="current-rate" class="summary-value">
                <?= number_format($graph->current, 4) ?>
                <?= htmlspecialchars($graph->target) ?>
            </p>
        </div>
        <div class="stat-box high">
            <p>High</p>
            <p id="high-rate" class="summary-value">
                <?= number_format($graph->high, 4) ?>
            </p>
        </div>
        <div class="stat-box low">
            <p>Low</p>
            <p id="low-rate" class="summary-value">
                <?= number_format($graph->low, 4) ?>
            </p>
        </div>
    </div>

    <figure id="history-chart-figure">
        <div id="history-chart"></div>

        <div id="graph-loading" class="exrate-loading">
            <div class="exrate-spinner"></div>
            <p>Loading graph...</p>
        </div>
    </figure>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        if (typeof ApexCharts === "undefined") {
            console.error("ApexCharts library is missing.");
            return;
        }

        let graph = <?= json_encode(
                $graph,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
        ) ?>;

        let chart = null;
        const loading = document.getElementById("graph-loading");
        function getXAxisConfig(points, containerWidth) {
            const count = points.length;

            // More generous spacing: 80px per label minimum
            const minLabelSpacing = 80;
            const maxLabels = Math.max(4, Math.floor(containerWidth / minLabelSpacing));

            // Only set tickAmount when we have more points than can fit.
            // For small datasets we let ApexCharts show all labels.
            const needsReduction = count > maxLabels;
            const tickAmount = needsReduction ? maxLabels : undefined;

            // Rotate labels on narrow screens OR when we have many points (>12)
            // This ensures readability even on large screens for dense data.
            const rotate = (containerWidth < 600 && count > 6) || count > 12 ? -45 : 0;

            // Increased maxHeight for rotated labels to avoid clipping
            const maxHeight = rotate !== 0 ? 80 : 40;

            // Font size by breakpoint
            const fontSize = containerWidth < 360 ? '9px' : (containerWidth < 480 ? '10px' : '12px');

            const config = {
                categories: points.map(p => p.label),
                labels: {
                    rotate: rotate,
                    rotateAlways: rotate !== 0,
                    maxHeight: maxHeight,
                    trim: false,
                    hideOverlappingLabels: true,
                    style: {
                        fontSize: fontSize,
                        colors: '#64748b',
                        fontFamily: 'Inter, sans-serif'
                    }
                },
                axisBorder: { show: false },
                axisTicks: { show: true, color: '#e5e7eb' },
                crosshairs: { show: true },
                tooltip: { enabled: false }
            };

            // Only attach tickAmount when we actually need to reduce
            if (tickAmount !== undefined) {
                config.tickAmount = tickAmount;
            }

            return config;
        }

        function getYAxisConfig(containerWidth) {
            // 4 ticks is readable on any screen; only go to 5 on desktop
            const tickAmount = containerWidth < 480 ? 4 : 5;
            const fontSize = containerWidth < 360 ? '9px' : (containerWidth < 480 ? '10px' : '12px');

            return {
                decimalsInFloat: 4,
                tickAmount: tickAmount,
                labels: {
                    style: {
                        fontSize: fontSize,
                        colors: '#64748b',
                        fontFamily: 'Inter, sans-serif'
                    },
                    formatter: function(val) {
                        // Always show 4 decimal places for exchange rates
                        return typeof val === 'number' ? val.toFixed(4) : val;
                    },
                    // Give Y labels enough left room on tiny screens
                    offsetX: containerWidth < 360 ? 0 : 4
                }
            };
        }

        function getChartHeight(containerWidth) {
            if (containerWidth < 320) return 200;
            if (containerWidth < 480) return 260;
            return 420;
        }

        function renderChart(data) {
            if (chart) {
                chart.destroy();
                chart = null;
            }

            const container = document.querySelector("#history-chart");
            const containerWidth = container.offsetWidth || window.innerWidth;

            const options = {
                chart: {
                    type: "area",
                    height: getChartHeight(containerWidth),
                    toolbar: { show: false },
                    zoom: { enabled: false },
                    parentHeightOffset: 0,
                    redrawOnWindowResize: true,
                    offsetX: 0,
                    offsetY: 0
                },
                series: [
                    {
                        name: data.target,
                        data: data.points.map(point => point.rate)
                    }
                ],
                xaxis: getXAxisConfig(data.points, containerWidth),
                yaxis: getYAxisConfig(containerWidth),
                stroke: {
                    curve: "smooth",
                    width: 3
                },
                dataLabels: { enabled: false },
                grid: {
                    borderColor: "#e5e7eb",
                    padding: {
                        top: 0,
                        right: containerWidth < 360 ? 4 : 14,
                        bottom: 0,
                        left: containerWidth < 360 ? 0 : 6
                    }
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 0.4,
                        opacityFrom: 0.45,
                        opacityTo: 0.05
                    }
                },
                colors: ['#9333ea'],
                tooltip: {
                    enabled: true,
                    theme: 'dark',
                    x: { show: true },
                    y: {
                        formatter: function(val) {
                            return typeof val === 'number' ? val.toFixed(4) : val;
                        }
                    }
                }
            };

            chart = new ApexCharts(container, options);
            chart.render();
        }

        // Re-render on window resize so axis configs update
        let resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                if (graph) renderChart(graph);
            }, 250);
        });

        renderChart(graph);

        async function loadGraph(period) {
            loading.classList.add("visible");

            try {
                const response = await fetch(
                    "/finance/currency/history"
                    + "?from=" + encodeURIComponent(graph.base)
                    + "&to=" + encodeURIComponent(graph.target)
                    + "&period=" + encodeURIComponent(period)
                );

                const json = await response.json();
                graph = json;

                renderChart(graph);
                loading.classList.remove("visible");

                // Update aria-pressed on buttons
                document.querySelectorAll(".range-btn").forEach(btn => {
                    btn.classList.remove("active");
                    btn.setAttribute("aria-pressed", "false");
                });
                const activeBtn = document.querySelector('[data-period="' + period + '"]');
                if (activeBtn) {
                    activeBtn.classList.add("active");
                    activeBtn.setAttribute("aria-pressed", "true");
                }

                const summaryValues = document.querySelectorAll(".summary-value");
                summaryValues[0].textContent = Number(graph.current).toFixed(4) + "\u00a0" + graph.target;
                summaryValues[1].textContent = Number(graph.high).toFixed(4);
                summaryValues[2].textContent = Number(graph.low).toFixed(4);

            } catch (error) {
                console.error(error);
            } finally {
                loading.classList.remove("visible");
            }
        }

        document.querySelectorAll(".range-btn").forEach(button => {
            button.addEventListener("click", function () {
                loadGraph(this.dataset.period);
            });
        });
    });
</script>