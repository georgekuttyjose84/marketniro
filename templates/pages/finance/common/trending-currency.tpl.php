<?php
$flagMap=['USD'=>'us','EUR'=>'eu','INR'=>'in','AED'=>'ae','JPY'=>'jp','CNY'=>'cn','CAD'=>'ca','RUB'=>'ru','IRR'=>'ir'];
?>
<section class="rates-card">
    <div class="card-header-custom">
        <div class="title-section">
            <h2 class="component-title">📈 Trending Currency Rates</h2>
            <p>Live foreign exchange market snapshot</p>
        </div>
        <div class="live-badge-combo">
            <div class="live-indicator"><span class="live-dot"></span>LIVE</div>
            <span class="timestamp-pill">Realtime</span>
        </div>
    </div>

    <div class="table-responsive-modern">
        <table class="currency-table">
            <thead><tr><th>Currency Pair</th><th>Exchange Rate</th><th>Trend</th></tr></thead>
            <tbody>
            <?php foreach($main_currency_list as $currency): ?>
                <tr>
                    <td>
                        <div class="pair-flags-wrapper">
                            <div class="flag-group">
                                <img class="flag-icon" src="/assets/images/flags/<?= $flagMap[$currency->baseCurrency]??'un'?>.svg" alt="">
                                <img class="flag-icon overlap" src="/assets/images/flags/<?= $flagMap[$currency->targetCurrency]??'un'?>.svg" alt="">
                            </div>
                            <div>
                                <div class="pair-code-short"><?=htmlspecialchars($currency->baseCurrency)?> / <?=htmlspecialchars($currency->targetCurrency)?></div>
                                <div class="pair-full">Live Exchange Rate</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="rate-number"><?=number_format($currency->currentRate,6)?></span></td>
                    <td>
                        <?php if($currency->status>0):?><span class="trend-modern trend-up">▲ Up</span>
                        <?php elseif($currency->status<0):?><span class="trend-modern trend-down">▼ Down</span>
                        <?php else:?><span class="trend-modern trend-same">● Stable</span><?php endif;?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody></table></div>
    <div class="footer-note">Exchange rates are indicative and update throughout market hours.</div>
</section>