<?php
/** @var array $rates */
?>

<h1><?= htmlspecialchars($page['h1'] ?? '') ?></h1>

<div class="rates-card">
    <div class="rates-header">
        <h1 class="rates-title">Live Currency Rates</h1>
        <div class="rates-subtitle">Real-time exchange rates from MarketNiro</div>
    </div>

    <div class="table-responsive">
        <table class="rates-table">
            <thead>
                <tr>
                    <th>Currency Pair</th>
                    <th>Exchange Rate</th>
                    <th>Status</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rates as $rate): ?>
                <tr>
                    <td class="pair">
                        1 <?= htmlspecialchars($rate->baseCurrency) ?> →
                        <?= htmlspecialchars($rate->targetCurrency) ?>
                    </td>
                    <td class="rate">
                        <?= htmlspecialchars(number_format((float) $rate->rate, 6, '.', '')) ?>
                    </td>
                    <td><span class="status-badge status-live">Live</span></td>
                    <td class="time">
                        <?= htmlspecialchars(
                            $rate->createdAt->setTimezone(new DateTimeZone('Asia/Kolkata'))->format('d M Y, h:i A')
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
