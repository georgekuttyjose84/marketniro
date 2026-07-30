/* ==========================================================================
   home.js — PineApple home page behavior
   Load this AFTER Bootstrap JS, on the home page only.
   (Mobile bottom-nav active-state JS lives in footer.tpl.php since it's shared
   across every page, not just this one.)
   ========================================================================== */

document.addEventListener('DOMContentLoaded', function () {

    // Row hover polish for all tables (price history + monthly summaries)
    document.querySelectorAll('.table-custom tbody tr').forEach(function (row) {
        row.addEventListener('mouseenter', function () {
            row.style.transform = 'scale(1.002)';
        });
        row.addEventListener('mouseleave', function () {
            row.style.transform = 'scale(1)';
        });
    });

    // Timeframe toggle buttons (7D / 1M / 3M / 1Y) on the price chart
    document.querySelectorAll('.timeframe-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.timeframe-btn').forEach(function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');

            // Hook point: fetch/re-render chart data for btn.dataset.range here
            // e.g. loadPriceChart(btn.dataset.range);
        });
    });

});