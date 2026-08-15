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


<div class="section-card p-4 mb-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            
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
        const sevenDaysData = <?= json_encode(
                $lastSevenDaysPrice,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES |
                JSON_HEX_TAG |
                JSON_HEX_AMP
        ) ?>;
</script>