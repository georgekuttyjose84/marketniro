<?php

$groupedPrices = ['green' => [], 'ripe' => [],];

foreach ($monthlyPriceSummary as $price) {
    $type = strtolower($price['type']);

    if (isset($groupedPrices[$type])) {
        $groupedPrices[$type][] = $price;
    }
}



$greenPriceToday = null;
$ripePriceToday  = null;

$greenPriceSelected = null;
$ripePriceSelected  = null;

foreach ($latestPrice as $pineApple) {
    if ($pineApple->getType()->value === 'green') {
        $greenPriceToday = $pineApple;
    }

    if ($pineApple->getType()->value === 'ripe') {
        $ripePriceToday = $pineApple;
    }
}

if($selectedPrice) {
    foreach ($selectedPrice as $pineApple) {
        if ($pineApple->getType()->value === 'green') {
            $greenPriceSelected = $pineApple;
        }

        if ($pineApple->getType()->value === 'ripe') {
            $ripePriceSelected = $pineApple;
        }
    }
}


?>

<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">
            <section class="mb-4">
                <div class="filter-card">
                    <form class="d-flex flex-column flex-sm-row align-items-sm-end gap-3" method="GET">
                        <div class="flex-grow-1 w-100">
                            <label class="form-label-custom" for="pineapple-price-date">Select price date</label>
                            <input class="form-control-custom" id="pineapple-price-date" min="<?= $minimumDate ?>" max="<?= $maximumDate ?>" name="date" required type="date" value="<?= htmlspecialchars($selectedDate) ?>">
                        </div>
                        <button class="btn-view-price" type="submit">View Price</button>
                    </form>
                </div>
            </section>


            <?php if($selectedPrice): ?>
            <section>
                <?= $view->render('/pages/agriculture/pineapple/price-card', [
                        'ripePrice' => $ripePriceSelected,
                        'greenPrice' => $greenPriceSelected,
                ], null) ?>
            </section>

            <?php endif; ?>

            <section class="mb-4">
                <div class="hero">
                    <div class="hero-bg">
                        <img alt="Pineapple plantation" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCtxsxuSDubnO_ftxS-qkO76VDQsHSuXjU4gqvvmRdUMRVHEMJwSL3966umznHJL9docdbfZUlr6SrpRrenj_ldUv-bNQQV7ZwaMTQXdFISGMarzF1ZhzZfywqN08vcFMgl8sO55wQQMNV2PQDsbx2ZEoWG_Xlw9sICNwe6H1QfotpUhkdRNYZugEivygixJ3Dp96V_SromZu9sg_4CD7PvbY_FhV_smVaQCq6_LNt3PswCjJyhR6OdbA">
                        <div class="hero-overlay"></div>
                    </div>
                    <div class="hero-content d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3">
                        <div>
                            <nav class="hero-breadcrumb">
                                <span>Commodities</span>
                                <span class="material-symbols-outlined" style="font-size:14px;">chevron_right</span>
                                <span>Agriculture</span>
                                <span class="material-symbols-outlined" style="font-size:14px;">chevron_right</span>
                                <span class="current">Pineapple</span>
                            </nav>
                            <h1 class="hero-title">Today's Pineapple Price</h1>
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge-bullish">Bullish Trend</span>
                                <p class="mb-0" style="color:rgba(255,255,255,0.9); font-size:18px;">+2.4% since yesterday</p>
                            </div>
                        </div>
                        <div class="hero-index-card">
                            <p class="mb-1" style="font-size:11px; letter-spacing:0.05em; text-transform:uppercase; opacity:.7;">Global Average Index</p>
                            <div class="d-flex align-items-baseline gap-2">
                                <span style="font-size:2.25rem; font-weight:700;">₹<?=$ripePriceToday?->getMinPrice()?></span>
                                <span style="color:rgba(255,255,255,0.7); font-size:12px;">/kg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mb-4">
                <p style="font-size:15px; line-height:1.7; color:var(--on-surface-variant); margin-bottom:0;">
                        Track <strong>today's pineapple price</strong> across both green (unripe, export/industrial grade)
                        and ripe (retail/consumer grade) categories, updated daily from wholesale market data. Pineapple,
                        particularly the MD2 (Golden) variety, is one of the world's most widely traded tropical fruits,
                        with pricing influenced by harvest cycles, export demand, shipping logistics, and seasonal weather
                        across major growing regions. Use the table below to check historical rates, compare min/max price
                        bands, and understand short-term market trends before buying, selling, or exporting pineapple.
                </p>
            </section>


            <section>
                <?= $view->render('/pages/agriculture/pineapple/price-card', [
                        'ripePrice' => $ripePriceToday,
                        'greenPrice' => $greenPriceToday,
                ], null) ?>
            </section>

            <section class="mb-4">
                    <h2 class="fw-bold mb-3" style="">Green vs. Ripe Pineapple: What's the Price Difference?</h2>
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <h3 class="fw-bold" style="font-size:15px; color:var(--primary);">Green Pineapple</h3>
                            <p style="font-size:14px; color:var(--on-surface-variant); line-height:1.6;">
                                Harvested while still firm and unripe, green pineapples are primarily sold for
                                industrial processing and export. Because they're shipped in bulk and travel longer
                                distances, their prices tend to be more stable and less volatile than ripe fruit.
                            </p>
                        </div>
                        <div class="col-12 col-md-6">
                            <h3 class="fw-bold" style="font-size:15px; color:var(--warning-700);">Ripe Pineapple</h3>
                            <p style="font-size:14px; color:var(--on-surface-variant); line-height:1.6;">
                                Sold ready-to-eat in local and retail markets, ripe pineapple prices swing more
                                sharply since the fruit has a short shelf life. Prices often spike when supply is
                                delayed by weather or logistics, since retailers can't hold ripe stock for long.
                            </p>
                        </div>
                    </div>
            </section>


            <section>
                <?= $view->render('/pages/agriculture/pineapple/graph', [
                        'lastSevenDaysPrice' => $lastSevenDaysPrice,
                ], null) ?>
            </section>


            <!-- Price History Table -->
            <section class="section-card mb-4" style="overflow:hidden;">
                <div class="p-4 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3" style="border-bottom:1px solid rgba(189,202,186,0.3);">
                    <div>
                        <h2 class="fw-bold mb-0" style="font-size:20px;">Detailed Price History</h2>
                        <p class="mb-0" style="font-size:11px; color:var(--on-surface-variant);">Standardized pricing for MD2 variety</p>
                    </div>
                    <button class="d-flex align-items-center gap-2 fw-bold border-0" style="font-size:11px; color:var(--primary); padding:8px 16px; background-color:rgba(0,107,44,0.05); border-radius:var(--radius-lg);">
                        <span class="material-symbols-outlined" style="font-size:18px;">download</span>
                        Export Dataset
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table-custom" style="min-width:600px;">
                        <thead>
                        <tr>
                            <th>Market Date</th>
                            <th>Green ($/kg)</th>
                            <th>Ripe ($/kg)</th>
                            <th class="text-center">Trend</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($monthlyData as $data) :
                            $design = ['trending_flat'=> 'trend', 'trending_up' => 'trend-flat', 'trending_down' => 'trend-down'];
                        ?>
                        <tr>
                            <td class="fw-bold" style="color:var(--on-surface);"><?=$data['market_date']?></td>
                            <td><?=$data['green_price']?></td>
                            <td><?=$data['ripe_price']?></td>
                            <td class="text-center"><span class="trend-icon <?= $design[$data['trend']]?>"><span class="material-symbols-outlined" style="font-size:20px;"><?=$data['trend']?></span></span></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer">
                    <span style="font-size:11px; font-weight:700; letter-spacing:0.05em; text-transform:uppercase; color:rgba(62,74,61,0.7);"> <?= $monthlyData[count($monthlyData)-1]['market_date'] ?> - <?= $monthlyData[0]['market_date'] ?> • <?=count($monthlyData)?> Market Days</span>
                    <div class="d-flex gap-1">
<!--                        <button class="page-btn"><span class="material-symbols-outlined" style="font-size:20px;">chevron_left</span></button>-->
<!--                        <button class="page-btn"><span class="material-symbols-outlined" style="font-size:20px;">chevron_right</span></button>-->
                    </div>
                </div>
            </section>


            <section class="mb-4">
                    <h2 class="fw-bold mb-3" style="">What Drives Pineapple Prices?</h2>
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <div class="d-flex gap-3">
                                <span class="material-symbols-outlined" style="color:var(--primary); font-size:22px;">wb_sunny</span>
                                <div>
                                    <h4 class="fw-bold mb-1" style="font-size:14px;">Seasonal Weather</h4>
                                    <p style="font-size:13px; color:var(--on-surface-variant); line-height:1.6; margin-bottom:0;">
                                        Heavy rain or drought in growing regions like Mindanao directly affects fruit
                                        size, sweetness, and available volume.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex gap-3">
                                <span class="material-symbols-outlined" style="color:var(--primary); font-size:22px;">local_shipping</span>
                                <div>
                                    <h4 class="fw-bold mb-1" style="font-size:14px;">Logistics &amp; Port Delays</h4>
                                    <p style="font-size:13px; color:var(--on-surface-variant); line-height:1.6; margin-bottom:0;">
                                        Container shortages and port congestion can delay shipments, tightening supply
                                        and pushing short-term prices up.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex gap-3">
                                <span class="material-symbols-outlined" style="color:var(--primary); font-size:22px;">public</span>
                                <div>
                                    <h4 class="fw-bold mb-1" style="font-size:14px;">Export Demand</h4>
                                    <p style="font-size:13px; color:var(--on-surface-variant); line-height:1.6; margin-bottom:0;">
                                        Rising demand from major importers increases competition for export-grade
                                        (green) fruit, lifting industrial prices.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex gap-3">
                                <span class="material-symbols-outlined" style="color:var(--primary); font-size:22px;">currency_exchange</span>
                                <div>
                                    <h4 class="fw-bold mb-1" style="font-size:14px;">Currency Fluctuation</h4>
                                    <p style="font-size:13px; color:var(--on-surface-variant); line-height:1.6; margin-bottom:0;">
                                        Since pineapple is a globally traded commodity, exchange rate shifts against
                                        major currencies affect landed cost and local pricing.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>


            <section class="mt-4">
                <div class="mb-3">
                    <h2 class="fw-bold mb-0" style="font-size:20px;">
                        Pineapple Price Summary
                    </h2>

                    <p class="mb-0" style="font-size:11px; color:var(--on-surface-variant);">
                        Monthly performance breakdown for <?= date('Y') ?>
                    </p>
                </div>

                <div class="row g-4">

                    <!-- Green summary -->
                    <div class="col-12 col-md-6">
                        <div class="section-card h-100" style="overflow:hidden;">

                            <div class="summary-card-header green">
                    <span class="material-symbols-outlined" style="color:var(--primary);">
                        eco
                    </span>

                                <h3 class="fw-bold mb-0"
                                    style="color:var(--primary); font-size:16px;">
                                    Green Pineapple
                                </h3>
                            </div>

                            <div class="table-responsive">
                                <table class="table-custom" style="font-size:14px;">

                                    <thead>
                                    <tr style="border-bottom:1px solid rgba(189,202,186,0.2);">
                                        <th style="font-size:10px;">Month</th>
                                        <th style="font-size:10px;">Min</th>
                                        <th style="font-size:10px;">Max</th>
                                        <th style="font-size:10px;">Avg</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php foreach ($groupedPrices['green'] as $price): ?>

                                        <tr>
                                            <td class="fw-medium">
                                                <?= htmlspecialchars($price['month_name']) ?>
                                            </td>

                                            <td>
                                                ₹<?= number_format((float)$price['min_price'], 2) ?>
                                            </td>

                                            <td>
                                                ₹<?= number_format((float)$price['max_price'], 2) ?>
                                            </td>

                                            <td class="fw-bold" style="color:var(--primary);">
                                                ₹<?= number_format((float)$price['avg_price'], 2) ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Ripe summary -->
                    <div class="col-12 col-md-6">
                        <div class="section-card h-100" style="overflow:hidden;">

                            <div class="summary-card-header warn">
                    <span class="material-symbols-outlined" style="color:var(--warning);">
                        nutrition
                    </span>

                                <h3 class="fw-bold mb-0"
                                    style="color:var(--warning-700); font-size:16px;">
                                    Ripe Pineapple
                                </h3>
                            </div>

                            <div class="table-responsive">
                                <table class="table-custom" style="font-size:14px;">

                                    <thead>
                                    <tr style="border-bottom:1px solid rgba(189,202,186,0.2);">
                                        <th style="font-size:10px;">Month</th>
                                        <th style="font-size:10px;">Min</th>
                                        <th style="font-size:10px;">Max</th>
                                        <th style="font-size:10px;">Avg</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php foreach ($groupedPrices['ripe'] as $price): ?>

                                        <tr>
                                            <td class="fw-medium">
                                                <?= htmlspecialchars($price['month_name']) ?>
                                            </td>

                                            <td>
                                                ₹<?= number_format((float)$price['min_price'], 2) ?>
                                            </td>

                                            <td>
                                                ₹<?= number_format((float)$price['max_price'], 2) ?>
                                            </td>

                                            <td class="fw-bold" style="color:var(--warning);">
                                                ₹<?= number_format((float)$price['avg_price'], 2) ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </section>


            <section class="mb-4 mt-4">
                    <h2 class="fw-bold mb-3" style="font-size:20px;">Frequently Asked Questions</h2>
                    <div class="mb-3">
                        <h3 class="fw-bold" style="font-size:14px; margin-bottom:4px;">What is today's pineapple price?</h3>
                        <p style="font-size:13px; color:var(--on-surface-variant); line-height:1.6; margin-bottom:0;">
                            Today's average green pineapple price is around ₹29/kg, while ripe pineapple averages
                            around ₹38/kg. Prices are updated daily and shown in the table above.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h3 class="fw-bold" style="font-size:14px; margin-bottom:4px;">Why is ripe pineapple more expensive than green pineapple?</h3>
                        <p style="font-size:13px; color:var(--on-surface-variant); line-height:1.6; margin-bottom:0;">
                            Ripe pineapple is sold retail-ready with a short shelf life, so supply constraints hit
                            its price faster. Green pineapple is bought in bulk for processing, which keeps its
                            pricing steadier.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h3 class="fw-bold" style="font-size:14px; margin-bottom:4px;">How often are pineapple prices updated?</h3>
                        <p style="font-size:13px; color:var(--on-surface-variant); line-height:1.6; margin-bottom:0;">
                            Prices are updated daily based on market activity, with historical data available for
                            7D, 1M, 3M, and 1Y timeframes above.
                        </p>
                    </div>

                    <div>
                        <h3 class="fw-bold" style="font-size:14px; margin-bottom:4px;">What variety of pineapple does this data track?</h3>
                        <p style="font-size:13px; color:var(--on-surface-variant); line-height:1.6; margin-bottom:0;">
                            This page tracks standardized pricing for the MD2 (Golden) variety, the most widely
                            traded pineapple cultivar globally.
                        </p>
                    </div>

            </section>


        </main>
        <script src="/css/home.js"></script>

        <!-- ============ SIDEBAR ============ -->
        <aside class="sidebar d-flex flex-column gap-4" style="">



<!--                --><?php //= $view->render('/pages/agriculture/pineapple/side-content', [], null) ?>



            <!-- Monthly Summary Widget -->
            <div class="monthly-summary-card">
                <div class="monthly-summary-bg-icon">
                    <span class="material-symbols-outlined">analytics</span>
                </div>
                <div class="p-4 position-relative" style="z-index:1;">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div style="width:32px; height:32px; border-radius:var(--radius-lg); background-color:rgba(98,223,125,0.2); display:flex; align-items:center; justify-content:center;">
                            <span class="material-symbols-outlined" style="color:var(--primary-fixed-dim); font-size:20px;">equalizer</span>
                        </div>
                        <h3 class="mb-0" style="font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:0.2em; color:rgba(255,255,255,0.7);">Monthly Summary</h3>
                    </div>

                    <div class="d-flex flex-column gap-4">
                        <div>
                            <div class="d-flex justify-content-between align-items-end mb-2">
                                <p class="mb-0" style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:rgba(255,255,255,0.5);">Avg Price Growth</p>
                                <p class="mb-0" style="font-size:24px; font-weight:700; color:var(--primary-fixed-dim);">+12.4%</p>
                            </div>
                            <div class="progress-custom">
                                <div class="progress-custom-bar" style="width:72%"></div>
                            </div>
                        </div>

                        <div class="stat-box-dark">
                            <div>
                                <p class="mb-1" style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:rgba(255,255,255,0.5);">Volume Traded</p>
                                <p class="mb-0" style="font-size:20px; font-weight:700; color:#fff;">42.5K <span style="font-size:14px; font-weight:500; color:rgba(255,255,255,0.4);">Tons</span></p>
                            </div>
                            <span class="material-symbols-outlined" style="color:var(--primary-fixed-dim); opacity:.5;">shopping_basket</span>
                        </div>

                        <button class="btn-download-report">Download Analysis Report</button>
                    </div>
                </div>
            </div>

            <!-- Market Pulse Widget -->
            <div class="market-pulse-card">
                <div class="pulse-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="fw-bold mb-0" style="color:var(--on-surface); font-size:16px;">Market Pulse</h3>
                        <span class="live-dot">
                            <span class="live-dot-ping"></span>
                            <span class="live-dot-core"></span>
                        </span>
                    </div>
                    <p class="mb-0 mt-1" style="font-size:11px; color:var(--on-surface-variant); font-weight:500;">Real-time alerts &amp; indicators</p>
                </div>

                <div class="pulse-item">
                    <div class="d-flex gap-3">
                        <div class="pulse-icon pulse-icon-error">
                            <span class="material-symbols-outlined" style="font-size:20px;">local_shipping</span>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0" style="font-size:14px; color:var(--on-surface);">Logistics Alert</h4>
                            <p class="mb-0 mt-1" style="font-size:14px; color:var(--on-surface-variant); line-height:1.5;">Port congestion delaying MD2 shipments by 4-6 days.</p>
                            <div class="d-flex align-items-center gap-1 mt-2" style="font-size:10px; font-weight:700; color:var(--outline); text-transform:uppercase; letter-spacing:0.05em;">
                                <span class="material-symbols-outlined" style="font-size:12px;">schedule</span>
                                2 HOURS AGO
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pulse-item">
                    <div class="d-flex gap-3">
                        <div class="pulse-icon pulse-icon-info">
                            <span class="material-symbols-outlined" style="font-size:20px;">wb_sunny</span>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0" style="font-size:14px; color:var(--on-surface);">Weather Factor</h4>
                            <p class="mb-0 mt-1" style="font-size:14px; color:var(--on-surface-variant); line-height:1.5;">Seasonal rain in Mindanao may impact fruit quality.</p>
                            <div class="d-flex align-items-center gap-1 mt-2" style="font-size:10px; font-weight:700; color:var(--outline); text-transform:uppercase; letter-spacing:0.05em;">
                                <span class="material-symbols-outlined" style="font-size:12px;">schedule</span>
                                5 HOURS AGO
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pulse-footer">
                    <a href="#" class="fw-bold d-inline-flex align-items-center justify-content-center gap-1" style="font-size:12px; color:var(--primary); text-decoration:none;">
                        View All Alerts
                        <span class="material-symbols-outlined" style="font-size:14px;">arrow_forward</span>
                    </a>
                </div>
            </div>

            <!-- Terminal Promo -->
            <div class="terminal-promo">
                <div class="terminal-promo-bg" style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuAm4xZkBvhH0DeUyyF6jYYMyFkG6sa2Z58GHgeay1JiJPPrISKhcVudbOfTvhRUwlT1nuWkC2URe8QVGXXIzb9v3YlygrHuHi-RIS9QlLmrzJEs0Sm3ZCOn7TcV8DHFAIidsnHJrLsBbHJTnO21k3cEx6ou0ml-6iQK-0sLXvwC3Ae3NeFiyxB-sKgzVaQId-I4itIY9E2zmnnRBWlsv4JmFyKWR3fxlQDv3wHvbwhV4bPb5hbq8qb1mQ');"></div>
                <div class="terminal-promo-overlay"></div>
                <div class="terminal-promo-content">
                    <h4 class="fw-bold mb-1" style="font-size:20px;">MarketNiro Terminal</h4>
                    <p class="mb-3" style="font-size:12px; opacity:.8; line-height:1.5;">Real-time futures &amp; millisecond-latency commodities data.</p>
                    <a href="#" class="btn-upgrade">Upgrade Now <span class="material-symbols-outlined" style="font-size:14px;">arrow_forward</span>
                    </a>
                </div>
            </div>
        </aside>
    </div>
</div>