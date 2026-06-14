<!-- PRICE TABLE -->
<h5 class="mb-3">📊 Latest Prices</h5>

<?php
$flagMap=['USD'=>'us','EUR'=>'eu','INR'=>'in','AED'=>'ae','JPY'=>'jp','CNY'=>'cn','CAD'=>'ca','RUB'=>'ru','IRR'=>'ir'];
?>
<section class="currency-section">
    <div class="currency-grid">
        <?php foreach($main_currency_list as $currency): ?>
            <a href="/finance/currency?from=<?=$currency->baseCurrency?>&to=<?=$currency->targetCurrency?>" class="text-decoration-none text-reset">
                <div class="currency-card">

                    <div class="flag-stack">
                        <img class="flag" src="/assets/images/flags/<?= $flagMap[$currency->baseCurrency] ?>.svg" alt="<?= $currency->baseCurrency ?>">
                        <img class="flag overlap" src="/assets/images/flags/<?= $flagMap[$currency->targetCurrency] ?>.svg" alt="<?= $currency->targetCurrency ?>">
                    </div>

                    <div class="pair">
                        <?= htmlspecialchars($currency->baseCurrency) ?> / <?= htmlspecialchars($currency->targetCurrency) ?>
                    </div>

                    <div class="pair-desc">
                        Live Exchange Rate
                    </div>

                    <div class="rate">
                        <?= number_format($currency->currentRate,6) ?>
                    </div>

                    <?php if($currency->status>0): ?>
                        <div class="trend up">▲ Rising</div>
                    <?php elseif($currency->status<0): ?>
                        <div class="trend down">▼ Falling</div>
                    <?php else: ?>
                        <div class="trend same">● Stable</div>
                    <?php endif; ?>

                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="footer-note">
        Exchange rates update throughout market hours and are indicative only.
    </div>
</section>