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


$date = $selectedDate === ''
    ? (new DateTimeImmutable('now'))->format('Y-m-d')
    : $selectedDate;

?>



<style>

    /* ============================================================
   PINEAPPLE — READABILITY OVERRIDE
   ============================================================ */

    .pine-page-header p,
    .pine-filter-info small,
    .pine-notice p,
    .pine-section-heading p,
    .pine-chart-header p,
    .pine-history-header p {
        font-size: 14px;
        line-height: 1.7;
    }

    .pine-section-heading h2,
    .pine-chart-header h2,
    .pine-history-header h2 {
        font-size: clamp(23px, 3vw, 30px);
        line-height: 1.2;
    }

    .pine-header-copy p {
        font-size: 16px;
        line-height: 1.75;
    }

    .pine-context-copy p,
    .pine-context-item p,
    .pine-driver p,
    .pine-faq-list details p {
        font-size: 14px;
        line-height: 1.75;
    }

    .pine-card-top h3 {
        font-size: 21px;
    }

    .pine-card-top p {
        font-size: 13px;
        line-height: 1.5;
    }

    .pine-product-label {
        font-size: 10px;
    }

    .pine-main-price strong {
        font-size: clamp(48px, 6vw, 64px);
    }

    .pine-price-range span {
        font-size: 9px;
    }

    .pine-price-range strong {
        font-size: 14px;
    }

    .pine-card-footer {
        font-size: 11px;
    }

    .pine-history-table th {
        font-size: 10px;
    }

    .pine-history-table td {
        font-size: 13px;
    }

    .pine-history-table td strong {
        font-size: 13px;
    }

    .pine-history-table td small {
        font-size: 11px;
    }

    .pine-month-row > span {
        font-size: 13px;
    }

    .pine-month-row small {
        font-size: 10px;
    }

    .pine-month-row strong {
        font-size: 14px;
    }

    .pine-driver h3 {
        font-size: 16px;
    }

    .pine-driver p {
        font-size: 13px;
    }

    .pine-faq-list summary {
        font-size: 15px;
    }

    .pine-faq-list details p {
        font-size: 14px;
    }

    .pine-price-description {
        margin: 20px 0 0;

        color: var(--on-surface-variant);

        font-size: 14px;
        line-height: 1.7;
    }

    .pine-context-copy h2 {
        max-width: 480px;

        font-size: clamp(25px, 3vw, 34px);
        line-height: 1.15;
    }

    .pine-context-copy p {
        max-width: 540px;

        font-size: 15px;
        line-height: 1.8;
    }

    .pine-context-item {
        padding: 22px;
    }

    .pine-context-item h3 {
        font-size: 17px;
    }

    .pine-context-item p {
        font-size: 14px;
        line-height: 1.75;
    }

    .pine-drivers-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .pine-driver {
        display: grid;
        grid-template-columns: 48px 1fr;
        gap: 18px;

        padding: 24px;

        min-height: 190px;
    }

    .pine-driver-icon {
        width: 42px;
        height: 42px;
    }

    .pine-driver h3 {
        margin-top: 6px;

        font-size: 18px;
    }

    .pine-driver p {
        margin-top: 10px;

        font-size: 14px;
        line-height: 1.75;
    }

    .pine-monthly-card-header {
        padding: 21px 23px;
    }

    .pine-month-row {
        padding: 18px 23px;
    }

    .pine-month-row > span {
        font-size: 14px;
    }

    .pine-month-row small {
        font-size: 11px;
    }

    .pine-month-row strong {
        font-size: 16px;
    }
</style>


<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">

            <section class="pine-page-header">

                <div class="pine-eyebrow">
                    <span class="material-symbols-outlined">nutrition</span>
                    AGRICULTURE / PINEAPPLE MARKET
                </div>

                <div class="pine-header-row">

                    <div class="pine-header-copy">

                        <h1>
                            Pineapple Price
                            <span>Intelligence</span>
                        </h1>

                        <p>
                            Track daily pineapple prices across green and ripe
                            categories, compare historical market movement, and
                            understand the factors influencing wholesale prices.
                            MarketNiro presents pineapple pricing information in a
                            simple format for farmers, traders, retailers, exporters,
                            and market researchers.
                        </p>

                    </div>

                    <div class="pine-header-status">

                        <div class="pine-live-indicator">
                            <span></span>
                            Latest available market data
                        </div>

                        <strong>11 August 2026</strong>

                        <small>
                            9 market days recorded
                        </small>

                    </div>

                </div>

            </section>

            <article class="pine-price-card pine-green-card">

                <div class="pine-card-top">

                    <div>

                        <div class="pine-product-label">
                            <span class="pine-product-dot"></span>
                            GREEN PINEAPPLE
                        </div>

                        <h3>Green Pineapple</h3>

                        <p>
                            Industrial &amp; Export Grade
                        </p>

                    </div>

                    <div class="pine-product-icon">
            <span class="material-symbols-outlined">
                eco
            </span>
                    </div>

                </div>

                <div class="pine-main-price">
                    <span class="currency-symbol">₹</span>
                    <strong>41</strong>
                    <span class="price-unit">/kg</span>
                </div>

                <p class="pine-price-description">
                    Green pineapple is harvested while firm and unripe.
                    It is commonly associated with bulk processing and export
                    markets, where transportation distance and industrial demand
                    influence pricing.
                </p>

                <div class="pine-price-range">

                    <div>
                        <span>MINIMUM</span>
                        <strong>₹40</strong>
                    </div>

                    <div>
                        <span>MAXIMUM</span>
                        <strong>₹42</strong>
                    </div>

                    <div>
                        <span>AVERAGE</span>
                        <strong>₹41</strong>
                    </div>

                </div>

                <div class="pine-card-footer">

        <span>
            <span class="material-symbols-outlined">
                verified
            </span>
            Latest verified price
        </span>

                    <span>
            11 Aug 2026
        </span>

                </div>

            </article>

            <article class="pine-price-card pine-ripe-card">

                <div class="pine-card-top">

                    <div>

                        <div class="pine-product-label">
                            <span class="pine-product-dot"></span>
                            RIPE PINEAPPLE
                        </div>

                        <h3>Ripe Pineapple</h3>

                        <p>
                            Retail &amp; Consumer Grade
                        </p>

                    </div>

                    <div class="pine-product-icon">
            <span class="material-symbols-outlined">
                nutrition
            </span>
                    </div>

                </div>

                <div class="pine-main-price">
                    <span class="currency-symbol">₹</span>
                    <strong>51</strong>
                    <span class="price-unit">/kg</span>
                </div>

                <p class="pine-price-description">
                    Ripe pineapple is sold ready-to-eat in local and retail
                    markets. Because ripe fruit has a shorter shelf life,
                    changes in supply, weather, and local demand can affect
                    prices more quickly.
                </p>

                <div class="pine-price-range">

                    <div>
                        <span>MINIMUM</span>
                        <strong>₹50</strong>
                    </div>

                    <div>
                        <span>MAXIMUM</span>
                        <strong>₹52</strong>
                    </div>

                    <div>
                        <span>AVERAGE</span>
                        <strong>₹51</strong>
                    </div>

                </div>

                <div class="pine-card-footer">

        <span>
            <span class="material-symbols-outlined">
                verified
            </span>
            Latest verified price
        </span>

                    <span>
            11 Aug 2026
        </span>

                </div>

            </article>

            <section class="pine-context">

                <div class="pine-context-copy">

        <span class="pine-section-kicker">
            MARKET CONTEXT
        </span>

                    <h2>
                        Green vs. Ripe Pineapple:
                        What's the Price Difference?
                    </h2>

                    <p>
                        Green and ripe pineapple serve different parts of the
                        supply chain, so their prices can behave differently.
                        Green fruit is generally associated with processing and
                        export markets, while ripe fruit is closer to the retail
                        and consumer market.
                    </p>

                </div>


                <div class="pine-context-grid">

                    <article class="pine-context-item">

                        <div class="pine-context-number">
                            01
                        </div>

                        <div>

                            <h3>Green Pineapple</h3>

                            <p>
                                Harvested while still firm and unripe, green
                                pineapples are primarily sold for industrial
                                processing and export. Because they are shipped
                                in bulk and can travel longer distances, prices
                                tend to be more stable than ripe fruit.
                            </p>

                        </div>

                    </article>


                    <article class="pine-context-item">

                        <div class="pine-context-number">
                            02
                        </div>

                        <div>

                            <h3>Ripe Pineapple</h3>

                            <p>
                                Sold ready-to-eat in local and retail markets,
                                ripe pineapple prices can move more sharply
                                because the fruit has a short shelf life.
                                Supply delays caused by weather or logistics
                                can therefore have a faster impact on prices.
                            </p>

                        </div>

                    </article>

                </div>

            </section>

            <section class="pine-drivers-section">

                <div class="pine-section-heading">

                    <div>

            <span class="pine-section-kicker">
                MARKET FUNDAMENTALS
            </span>

                        <h2>
                            What drives pineapple prices?
                        </h2>

                        <p>
                            Pineapple prices are influenced by supply, demand,
                            transportation and international market conditions.
                        </p>

                    </div>

                </div>


                <div class="pine-drivers-grid">

                    <article class="pine-driver">

                        <div class="pine-driver-icon">
                <span class="material-symbols-outlined">
                    wb_sunny
                </span>
                        </div>

                        <div>
                            <span>01</span>

                            <h3>Seasonal Weather</h3>

                            <p>
                                Heavy rain or drought in growing regions can
                                affect fruit size, sweetness and available
                                market volume. Weather disruptions can reduce
                                supply and create short-term price pressure.
                            </p>
                        </div>

                    </article>


                    <article class="pine-driver">

                        <div class="pine-driver-icon">
                <span class="material-symbols-outlined">
                    local_shipping
                </span>
                        </div>

                        <div>
                            <span>02</span>

                            <h3>Logistics &amp; Port Delays</h3>

                            <p>
                                Container shortages, transport interruptions
                                and port congestion can delay shipments.
                                Reduced availability may increase prices in
                                markets that depend on incoming supply.
                            </p>
                        </div>

                    </article>


                    <article class="pine-driver">

                        <div class="pine-driver-icon">
                <span class="material-symbols-outlined">
                    public
                </span>
                        </div>

                        <div>
                            <span>03</span>

                            <h3>Export Demand</h3>

                            <p>
                                Strong international demand increases competition
                                for export-grade fruit. Higher demand from major
                                importers can support prices for green pineapple
                                intended for export.
                            </p>
                        </div>

                    </article>


                    <article class="pine-driver">

                        <div class="pine-driver-icon">
                <span class="material-symbols-outlined">
                    currency_exchange
                </span>
                        </div>

                        <div>
                            <span>04</span>

                            <h3>Currency Fluctuation</h3>

                            <p>
                                Pineapple is traded across international markets,
                                so exchange-rate movements can influence export
                                competitiveness, landed costs and local market
                                pricing.
                            </p>
                        </div>

                    </article>

                </div>

            </section>

            <section class="pine-faq-section">

                <div class="pine-section-heading">

                    <div>

            <span class="pine-section-kicker">
                KNOWLEDGE
            </span>

                        <h2>
                            Frequently asked questions
                        </h2>

                        <p>
                            Common questions about pineapple prices,
                            categories and market data.
                        </p>

                    </div>

                </div>


                <div class="pine-faq-list">

                    <details open>

                        <summary>
                <span>
                    What is today's pineapple price?
                </span>

                            <span class="material-symbols-outlined">
                    expand_more
                </span>
                        </summary>

                        <p>
                            The latest available market data for August 11, 2026
                            shows an average green pineapple price of ₹41/kg,
                            with a recorded range of ₹40–₹42/kg. Ripe pineapple
                            averages ₹51/kg, with a recorded range of ₹50–₹52/kg.
                            Prices are updated when market data becomes available.
                        </p>

                    </details>


                    <details>

                        <summary>
                <span>
                    Why is ripe pineapple more expensive than green pineapple?
                </span>

                            <span class="material-symbols-outlined">
                    expand_more
                </span>
                        </summary>

                        <p>
                            Ripe pineapple is sold ready-to-eat and has a shorter
                            shelf life. This makes the category more sensitive to
                            immediate retail demand and supply disruptions.
                            Green pineapple is commonly purchased in bulk for
                            processing and export, which can make its pricing
                            comparatively more stable.
                        </p>

                    </details>


                    <details>

                        <summary>
                <span>
                    How often are pineapple prices updated?
                </span>

                            <span class="material-symbols-outlined">
                    expand_more
                </span>
                        </summary>

                        <p>
                            Pineapple prices are updated daily when market data
                            is available. Historical pricing can be reviewed
                            across different timeframes to understand short-term
                            and longer-term market movement.
                        </p>

                    </details>


                    <details>

                        <summary>
                <span>
                    What variety of pineapple does this data track?
                </span>

                            <span class="material-symbols-outlined">
                    expand_more
                </span>
                        </summary>

                        <p>
                            The supplied page content identifies the tracked
                            pricing with the MD2 (Golden) variety. MD2 is described
                            in the source content as a widely traded pineapple
                            cultivar used for standardized pricing information.
                        </p>

                    </details>

                </div>

            </section>


        </main>
        <script src="/css/home.js"></script>

        <!-- ============ SIDEBAR ============ -->
        <aside class="sidebar d-flex flex-column gap-4" style="">
            // leave it
        </aside>
    </div>
</div>