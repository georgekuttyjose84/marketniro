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
        --font:'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
        --tooltip-bg:#2b2740;
        --tooltip-date:#fbbf24;
    }



    .card{
        background:var(--card-bg);
        border:1px solid var(--card-border);
        border-radius:var(--radius);
        box-shadow:var(--shadow);
        padding:30px;
        color:var(--text);
        width:100%;
    }

    /* Section header */
    .section-top{
        display:flex;justify-content:space-between;align-items:flex-start;
        gap:24px;flex-wrap:wrap;margin-bottom:26px;
    }
    .section-heading h2{
        font-size:32px;font-weight:700;letter-spacing:-0.02em;margin-bottom:8px;
    }
    .section-subtitle{font-size:15px;font-weight:500;color:var(--muted);max-width:580px;}

    /* Time range buttons */
    .time-range-selector{display:flex;gap:8px;flex-wrap:wrap;justify-content:flex-end;}
    .range-btn{
        padding:8px 18px;border-radius:999px;font-size:14px;font-weight:600;
        font-family:var(--font);cursor:pointer;background:#fff;border:1px solid #e2e8f0;
        color:var(--text);
        transition:border-color .2s ease, color .2s ease, transform .2s ease, box-shadow .2s ease, background .2s ease;
    }
    .range-btn:hover{border-color:var(--btn-active);color:var(--btn-active);transform:translateY(-2px);}
    .range-btn.active{background:var(--btn-active);color:#fff;border-color:var(--btn-active);box-shadow:var(--shadow-sm);}
    .range-btn.active:hover{transform:none;color:#fff;}
    .range-btn:focus-visible{outline:2px solid var(--btn-active);outline-offset:2px;}

    /* Summary cards */
    .summary-cards{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:28px;}
    .summary-card{background:var(--summary-bg);border-radius:12px;padding:18px 20px;display:flex;flex-direction:column;gap:8px;}
    .summary-label{font-size:13px;color:var(--muted);font-weight:500;text-transform:uppercase;letter-spacing:.05em;}
    .summary-value{font-size:24px;font-weight:700;color:var(--text);}

    /* Chart */
    .chart-container{max-width:900px;}
    .chart-wrapper{position:relative;overflow-x:auto;border-radius:10px;}
    .chart-wrapper svg{display:block;width:100%;min-width:640px;aspect-ratio:900/350;cursor:crosshair;}

    .grid-line{stroke:var(--grid);stroke-width:1;}
    .grid-line-v{stroke:var(--grid);stroke-width:1;stroke-dasharray:4 4;}
    .axis-line{stroke:var(--axis);stroke-width:1.25;}
    .y-label,.x-label{font-size:14px;fill:var(--axis);font-family:var(--font);}
    .trend-line{fill:none;stroke:var(--purple-line);stroke-width:3;stroke-linecap:round;stroke-linejoin:round;}

    /* Hover crosshair + point */
    .hover-line{stroke:var(--axis);stroke-width:1;stroke-dasharray:4 4;opacity:0;transition:opacity .1s ease;}
    .hover-dot{fill:var(--purple-line);stroke:#ffffff;stroke-width:2;opacity:0;transition:opacity .1s ease;}

    /* Tooltip */
    .chart-tooltip{
        position:absolute;
        top:0;left:0;
        background:var(--tooltip-bg);
        color:#fff;
        border-radius:10px;
        padding:10px 16px;
        font-family:var(--font);
        line-height:1.6;
        pointer-events:none;
        box-shadow:0 10px 28px rgba(15,23,42,0.28);
        opacity:0;
        transform:translate(-9999px,-9999px);
        transition:opacity .1s ease;
        white-space:nowrap;
        z-index:5;
    }
    .chart-tooltip.visible{opacity:1;}
    .chart-tooltip .tooltip-date{
        display:block;
        color:var(--tooltip-date);
        font-weight:700;
        font-size:13px;
        margin-bottom:2px;
    }
    .chart-tooltip .tooltip-value{
        display:block;
        color:#ffffff;
        font-weight:700;
        font-size:16px;
    }

    /* Loading overlay */
    .loading-overlay{
        position:absolute;inset:0;background:rgba(255,255,255,.85);
        display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;
        border-radius:10px;opacity:0;pointer-events:none;transition:opacity .25s ease;
    }
    .loading-overlay.visible{opacity:1;pointer-events:all;}
    .spinner{width:36px;height:36px;border:3px solid var(--grid);border-top-color:var(--btn-active);border-radius:50%;animation:spin .8s linear infinite;}
    .loading-overlay p{font-size:14px;color:var(--muted);font-weight:500;}
    @keyframes spin{to{transform:rotate(360deg);}}

    /* Chart footer */
    .chart-footer{display:flex;justify-content:space-between;flex-wrap:wrap;gap:8px;margin-top:18px;font-size:13px;color:var(--muted);}

    /* Responsive */
    @media (max-width:1024px){
        .chart-container{max-width:100%;}
    }
    @media (max-width:768px){
        .card{padding:22px;}
        .section-heading h2{font-size:24px;}
        .time-range-selector{justify-content:flex-start;width:100%;}
        .summary-cards{grid-template-columns:1fr;}
    }
    @media (prefers-reduced-motion:reduce){
        *{animation:none !important;transition:none !important;}
    }
</style>



<section class="card" aria-labelledby="historical-rates-heading">

    <div class="section-top">
        <div class="section-heading">
            <h2 id="historical-rates-heading">Historical Exchange Rates</h2>
            <p class="section-subtitle">
                Explore historical exchange rates and exchange rate trends.
            </p>
        </div>

        <div class="time-range-selector">
            <button class="range-btn active">Current Range</button>
        </div>
    </div>

    <div class="summary-cards">
        <div class="summary-card">
            <span class="summary-label">Current Rate</span>
            <span class="summary-value"><?= number_format($graph->current,4) ?> <?= htmlspecialchars($graph->target) ?></span>
        </div>

        <div class="summary-card">
            <span class="summary-label">High</span>
            <span class="summary-value"><?= number_format($graph->high,4) ?></span>
        </div>

        <div class="summary-card">
            <span class="summary-label">Low</span>
            <span class="summary-value"><?= number_format($graph->low,4) ?></span>
        </div>
    </div>

    <div id="graph-data"
         data-graph='<?= json_encode($graph, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) ?>'>
    </div>


    <div id="history-chart"></div>

</section>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const graphData = <?= json_encode($graph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
        const categories = graphData.points.map(point => point.label);
        const values = graphData.points.map(point => point.rate);
        const options = {
            chart: {
                type: 'area',
                height: 420,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },
            series: [
                {
                    name: graphData.target,
                    data: values
                }
            ],
            xaxis: {
                categories: categories
            },
            yaxis: {
                decimalsInFloat: 4
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            dataLabels: {
                enabled: false
            },
            grid: {
                borderColor: '#e5e7eb'
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 0.4,
                    opacityFrom: 0.4,
                    opacityTo: 0.05
                }
            },
            tooltip: {
                enabled: true
            }
        };
        const chart = new ApexCharts(document.querySelector("#history-chart"), options);
        chart.render();
    });

</script>