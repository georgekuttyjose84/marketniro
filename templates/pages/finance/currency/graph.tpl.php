<?php
/** @var \App\Domain\Entity\GraphData $graph */
?>
<style>
    :root{
        --card-bg:#ffffff;
        --card-border:#ececec;
        --grid:#e5e7eb;
        --axis:#64748b;
        --purple-line:#d946ef;
        --btn-active:#9333ea;
        --text:#0f172a;
        --muted:#64748b;
        --summary-bg:#f8fafc;
        --shadow:0 4px 18px rgba(15,23,42,0.06);
        --shadow-sm:0 4px 10px rgba(147,51,234,0.28);
        --radius:14px;
        --font:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif;
        --tooltip-bg:#2b2740;
        --tooltip-date:#fbbf24;
    }

    /* ── Base card ─────────────────────────────────────────── */
    .exrate-card{
        background:var(--card-bg);
        border:1px solid var(--card-border);
        border-radius:var(--radius);
        box-shadow:var(--shadow);
        padding:28px;
        color:var(--text);
        width:100%;
        box-sizing:border-box;
        font-family:var(--font);
    }

    /* ── Section header ────────────────────────────────────── */
    .exrate-section-top{
        display:flex;justify-content:space-between;align-items:flex-start;
        gap:16px;flex-wrap:wrap;margin-bottom:22px;
    }
    .exrate-section-heading h2{
        font-size:clamp(18px,5vw,32px);
        font-weight:700;letter-spacing:-0.02em;margin:0 0 6px;
    }
    .exrate-section-subtitle{
        font-size:clamp(12px,3.5vw,15px);
        font-weight:500;color:var(--muted);max-width:580px;margin:0;
    }

    /* ── Time-range buttons ────────────────────────────────── */
    .exrate-time-range{
        display:flex;gap:6px;flex-wrap:wrap;justify-content:flex-start;
        width:100%;
    }
    .range-btn{
        padding:7px 14px;border-radius:999px;
        font-size:clamp(11px,3.2vw,14px);font-weight:600;
        font-family:var(--font);cursor:pointer;
        background:#fff;border:1px solid #e2e8f0;color:var(--text);
        transition:border-color .2s,color .2s,transform .2s,box-shadow .2s,background .2s;
        white-space:nowrap;
    }
    .range-btn:hover{border-color:var(--btn-active);color:var(--btn-active);transform:translateY(-2px);}
    .range-btn.active{background:var(--btn-active);color:#fff;border-color:var(--btn-active);box-shadow:var(--shadow-sm);}
    .range-btn.active:hover{transform:none;color:#fff;}
    .range-btn:focus-visible{outline:2px solid var(--btn-active);outline-offset:2px;}

    /* ── Summary cards ─────────────────────────────────────── */
    .exrate-summary-cards{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:12px;margin-bottom:24px;
    }
    .exrate-summary-card{
        background:var(--summary-bg);border-radius:12px;
        padding:14px 16px;display:flex;flex-direction:column;gap:6px;
    }
    .summary-label{
        font-size:clamp(10px,2.8vw,13px);
        color:var(--muted);font-weight:500;text-transform:uppercase;letter-spacing:.05em;
    }
    .summary-value{
        font-size:clamp(14px,4.5vw,24px);
        font-weight:700;color:var(--text);word-break:break-all;
    }

    /* ── Chart wrapper ─────────────────────────────────────── */
    #history-chart{
        width:100%;
        min-height:260px;
    }

    /* ── Chart figure ──────────────────────────────────────── */
    #history-chart-figure{
        position:relative;
    }

    /* Loading overlay */
    .exrate-loading{
        position:absolute;
        inset:0;
        background:rgba(255,255,255,.85);
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        gap:12px;
        border-radius:10px;
        opacity:0;
        pointer-events:none;
        transition:opacity .25s;
        z-index:10;
    }
    .exrate-loading.visible{opacity:1;pointer-events:all;}
    .exrate-spinner{
        width:36px;height:36px;border:3px solid var(--grid);
        border-top-color:var(--btn-active);border-radius:50%;
        animation:exrate-spin .8s linear infinite;
    }
    .exrate-loading p{font-size:14px;color:var(--muted);font-weight:500;margin:0;}
    @keyframes exrate-spin{to{transform:rotate(360deg);}}

    /* ── Responsive tweaks ─────────────────────────────────── */
    @media(max-width:480px){
        .exrate-card{padding:16px 14px;}
        .exrate-section-top{gap:10px;margin-bottom:16px;}
        .exrate-summary-cards{
            grid-template-columns:1fr 1fr;
            gap:8px;margin-bottom:16px;
        }
        .exrate-summary-card:first-child{grid-column:1/-1;}
        .exrate-time-range{gap:5px;}
    }

    @media(max-width:360px){
        .exrate-card{padding:12px 10px;}
        .exrate-summary-cards{grid-template-columns:1fr;}
        .exrate-summary-card:first-child{grid-column:auto;}
        .range-btn{padding:6px 10px;}
    }

    /* ── 320px support ─────────────────────────────────────── */
    @media(max-width:320px){
        .exrate-card{padding:10px 8px;}
        .exrate-section-heading h2{font-size:16px;}
        .exrate-section-subtitle{font-size:11px;}
        .exrate-summary-cards{grid-template-columns:1fr;gap:6px;margin-bottom:12px;}
        .exrate-summary-card:first-child{grid-column:auto;}
        .exrate-summary-card{padding:10px 12px;}
        .summary-value{font-size:14px;}
        .range-btn{padding:5px 8px;font-size:11px;}
        .exrate-time-range{gap:4px;}
        #history-chart{min-height:200px;}
    }

    @media(prefers-reduced-motion:reduce){
        *{animation:none !important;transition:none !important;}
    }
</style>

<section class="exrate-card" aria-labelledby="historical-rates-heading" itemscope itemtype="https://schema.org/Dataset">

    <meta itemprop="url" content="<?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? '') ?>">
    <meta itemprop="license" content="https://creativecommons.org/licenses/by/4.0/">

    <div class="exrate-section-top">
        <div class="exrate-section-heading">
            <h2 id="historical-rates-heading" itemprop="name">
                <?= htmlspecialchars($graph->base ?? '') ?> to <?= htmlspecialchars($graph->target) ?> Historical Exchange Rates
            </h2>
            <p class="exrate-section-subtitle" itemprop="description">
                Explore historical exchange rates and exchange rate trends for
                <?= htmlspecialchars($graph->base ?? '') ?> to <?= htmlspecialchars($graph->target) ?>.
                View 24-hour, 7-day, 1-month, and 6-month rate history.
            </p>
        </div>

        <nav class="exrate-time-range" aria-label="Select time range for exchange rate chart">
            <button class="range-btn active" data-period="24H" aria-pressed="true">24 Hours</button>
            <button class="range-btn" data-period="7D" aria-pressed="false">7 Days</button>
            <button class="range-btn" data-period="1M" aria-pressed="false">1 Month</button>
            <button class="range-btn" data-period="6M" aria-pressed="false">6 Months</button>
        </nav>
    </div>

    <div class="exrate-summary-cards" role="list" aria-label="Exchange rate summary statistics">
        <div class="exrate-summary-card" role="listitem" itemprop="variableMeasured" itemscope itemtype="https://schema.org/PropertyValue">
            <span class="summary-label" itemprop="name">Current Rate</span>
            <span class="summary-value" itemprop="value">
                <?= number_format($graph->current, 4) ?>&nbsp;<?= htmlspecialchars($graph->target) ?>
            </span>
        </div>
        <div class="exrate-summary-card" role="listitem" itemprop="variableMeasured" itemscope itemtype="https://schema.org/PropertyValue">
            <span class="summary-label" itemprop="name">High</span>
            <span class="summary-value" itemprop="value"><?= number_format($graph->high, 4) ?></span>
        </div>
        <div class="exrate-summary-card" role="listitem" itemprop="variableMeasured" itemscope itemtype="https://schema.org/PropertyValue">
            <span class="summary-label" itemprop="name">Low</span>
            <span class="summary-value" itemprop="value"><?= number_format($graph->low, 4) ?></span>
        </div>
    </div>

    <!-- Hidden data island – used by JS only, never rendered -->
    <div id="graph-data"
         data-graph='<?= json_encode($graph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) ?>'
         hidden
         aria-hidden="true">
    </div>

    <figure id="history-chart-figure" style="margin:0;" aria-label="Historical exchange rate chart for <?= htmlspecialchars($graph->base ?? '') ?> to <?= htmlspecialchars($graph->target) ?>">
        <div id="history-chart" role="img" aria-label="Exchange rate area chart"></div>
        <div id="graph-loading" class="exrate-loading" aria-live="polite" aria-label="Loading chart data">
            <div class="exrate-spinner"></div>
            <p>Loading graph...</p>
        </div>
    </figure>

</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let graph = <?= json_encode(
                $graph,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
        ) ?>;

        let chart = null;
        const loading = document.getElementById("graph-loading");

        /**
         * Returns responsive ApexCharts xaxis config.
         *
         * Key insight:
         *  - For FEW points (≤14, e.g. 7D = 7 pts, 1M = ~30 but daily so few):
         *    NEVER set tickAmount — let ApexCharts show every label naturally.
         *    Setting tickAmount on small datasets causes ApexCharts to silently
         *    drop all labels when it can't divide evenly.
         *  - For MANY points (24H hourly = 24+, 6M daily = 180+):
         *    Constrain tickAmount to prevent congestion based on container width.
         */
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