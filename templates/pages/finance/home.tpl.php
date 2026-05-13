<?php
$page = $page ?? [];
$title = $page['title'] ?? 'MarketNiro';
$h1 = $page['h1'] ?? 'Live Currency Rates';
$period = $period ?? '1d';
$pairs = $pairs ?? [];
$chartData = $chartData ?? ['labels' => [], 'series' => []];
$indicators = $indicators ?? [];
?>

<h1 class="section-title"><?= htmlspecialchars($h1) ?></h1>
<p class="section-subtitle">Choose a time range to view the trend and indicator.</p>

<div class="period-switcher mb-4">
    <a href="/finance/currency?period=1h" class="<?= $period === '1h' ? 'active' : '' ?>">1 Hour</a>
    <a href="/finance/currency?period=6h" class="<?= $period === '6h' ? 'active' : '' ?>">6 Hours</a>
    <a href="/finance/currency?period=12h" class="<?= $period === '12h' ? 'active' : '' ?>">12 Hours</a>
    <a href="/finance/currency?period=1d" class="<?= $period === '1d' ? 'active' : '' ?>">1 Day</a>
    <a href="/finance/currency?period=7d" class="<?= $period === '7d' ? 'active' : '' ?>">7 Days</a>
    <a href="/finance/currency?period=1m" class="<?= $period === '1m' ? 'active' : '' ?>">1 Month</a>
</div>

<div class="row g-3 mb-4">
    <?php foreach ($pairs as $pair): ?>
        <?php
        $key = $pair['from'] . '_' . $pair['to'];
        $item = $indicators[$key] ?? [];
        $direction = $item['direction'] ?? 'flat';
        $changePercent = $item['change_percent'] ?? null;
        ?>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="indicator-card">
                <div class="indicator-title">
                    <?= htmlspecialchars($pair['from']) ?> → <?= htmlspecialchars($pair['to']) ?>
                </div>
                <div class="indicator-value">
                    <?= isset($item['latest']) ? number_format((float) $item['latest'], 6) : 'N/A' ?>
                </div>
                <div class="indicator-change <?= htmlspecialchars($direction) ?>">
                    <?php if ($changePercent !== null): ?>
                        <?= $direction === 'up' ? '▲' : ($direction === 'down' ? '▼' : '•') ?>
                        <?= htmlspecialchars((string) $changePercent) ?>%
                    <?php else: ?>
                        No previous data
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="chart-card">
    <div class="chart-head">
        <h2>Trend Chart</h2>
        <span><?= htmlspecialchars($period) ?></span>
    </div>
    <canvas id="currencyChart" height="110"></canvas>
</div>

<script>
    window.MN_CURRENCY_CHART = <?= json_encode($chartData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
    window.MN_CURRENCY_PAIRS = <?= json_encode($pairs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
</script>