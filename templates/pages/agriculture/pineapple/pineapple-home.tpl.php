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


$today = (new DateTimeImmutable('now'))->format('Y-m-d');

$date = $selectedDate === ''
        ? (new DateTimeImmutable('now'))->format('Y-m-d')
        : $selectedDate;


?>


<style>
    :root{
        --modal-ink: var(--on-surface);
        --modal-ink-soft: var(--text-secondary);
        --modal-line: var(--border-color);
        --modal-line-soft: var(--surface-container-low);
        --modal-surface: var(--surface);

        --modal-green: var(--secondary);
        --modal-green-bg: var(--secondary-container);
        --modal-green-edge: var(--secondary);

        --modal-gold: var(--warning-700);
        --modal-gold-bg: color-mix(in srgb, var(--pineapple-accent) 22%, white);
        --modal-gold-edge: var(--pineapple-accent);

        --modal-action: var(--primary);
        --modal-action-hover: var(--on-primary-fixed-variant);
        --focus-ring: var(--pineapple-accent);

        --shadow-lg: 0 24px 60px -12px rgba(25,28,30,0.24), 0 2px 8px rgba(25,28,30,0.06);
    }

    #btn-export-dataset{
        font-family: var(--font-body);
        font-weight:600;
        font-size:14.5px;
        letter-spacing:-0.01em;
        color: var(--on-primary);
        background: var(--modal-action);
        border:none;
        padding:13px 22px;
        border-radius: var(--radius-lg);
        display:inline-flex;
        align-items:center;
        gap:9px;
        cursor:pointer;
        box-shadow: 0 8px 20px -6px rgba(31,46,26,0.45);
        transition: transform .15s ease, background .15s ease, box-shadow .15s ease;
    }
    #btn-export-dataset:hover{ background:var(--modal-action-hover); transform: translateY(-1px); box-shadow: 0 12px 26px -8px rgba(31,46,26,0.5);}
    #btn-export-dataset:active{ transform: translateY(0); }

    /* =========================================================
       MODAL
    ========================================================= */
    #dialog-download-successful{
        border: 0;
        padding: 0;
        border-radius: var(--radius-2xl);
        max-width: 480px;
        width: calc(100% - 30px);
        box-shadow: var(--shadow-lg);
        background: var(--surface);
        color: var(--modal-ink);
        overflow: hidden;
        animation: modal-in .28s cubic-bezier(.2,.8,.2,1);
    }

    #dialog-download-successful::backdrop{
        background: rgba(17,20,15,0.55);
        backdrop-filter: blur(3px);
        animation: backdrop-in .28s ease;
    }

    @keyframes modal-in{
        from{ opacity:0; transform: translateY(10px) scale(.98); }
        to{ opacity:1; transform: translateY(0) scale(1); }
    }
    @keyframes backdrop-in{
        from{ opacity:0; }
        to{ opacity:1; }
    }

    .modal-dialog{ margin:0; }
    .modal-content{ display:flex; flex-direction:column; }

    /* ---- Header: close button only ---- */
    .modal-header{
        display:flex;
        justify-content:flex-end;
        align-items:center;
        padding: 16px 16px 0;
        border:0;
        background: transparent;
        position: relative;
        z-index: 2;
    }

    .close-button{
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display:flex;
        align-items:center;
        justify-content:center;
        color: var(--modal-ink-soft);
        background: var(--modal-line-soft);
        cursor:pointer;
        transition: background .15s ease, color .15s ease, transform .15s ease;
        flex-shrink:0;
    }
    .close-button:hover{ background:var(--surface-container); color:var(--modal-ink); }
    .close-button:active{ transform: scale(.92); }
    .close-button:focus-visible{ outline: 2px solid var(--focus-ring); outline-offset: 2px; }

    .icon-close{ position:relative; width:14px; height:14px; display:inline-block; }
    .icon-close::before,
    .icon-close::after{
        content:"";
        position:absolute;
        top:50%; left:50%;
        width: 15px; height: 2px;
        background: currentColor;
        border-radius: 2px;
    }
    .icon-close::before{ transform: translate(-50%,-50%) rotate(45deg); }
    .icon-close::after{ transform: translate(-50%,-50%) rotate(-45deg); }

    /* ---- Body ---- */
    .modal-body{
        padding: 6px 32px 32px;
    }

    .modal-eyebrow{
        font-family: var(--font-mono);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--modal-gold);
        margin: 0 0 10px;
        display:flex;
        align-items:center;
        gap:8px;
    }
    .modal-eyebrow::before{
        content:"";
        width:6px; height:6px;
        border-radius:50%;
        background: var(--modal-gold-edge);
    }

    .modal-title{
        font-family: var(--font-headline);
        font-weight: 600;
        font-size: 27px;
        line-height: 1.15;
        letter-spacing: -0.01em;
        margin: 0 0 8px;
        color: var(--modal-ink);
    }

    .text-muted{
        color: var(--modal-ink-soft);
        font-size: 14.5px;
        line-height: 1.55;
        margin: 0 0 26px;
        max-width: 38ch;
    }

    /* ---- Price type ticket cards ---- */
    .price-type-options{
        display:flex;
        flex-direction:column;
        gap:10px;
        margin-bottom: 26px;
    }

    .price-type-option{
        display:block;
        cursor:pointer;
        margin:0;
    }
    .price-type-option > input{
        position:absolute;
        opacity:0;
        pointer-events:none;
    }

    .price-type-card{
        position: relative;
        display:flex;
        align-items:center;
        gap:14px;
        padding: 14px 16px 14px 20px;
        border: 1px solid var(--modal-line);
        border-radius: var(--radius-xl);
        background: var(--surface);
        transition: border-color .18s ease, background .18s ease, box-shadow .18s ease, transform .12s ease;
        overflow:hidden;
    }

    /* ripeness-edge tab — the signature element */
    .price-type-card::before{
        content:"";
        position:absolute;
        left:0; top:0; bottom:0;
        width: 5px;
        background: var(--modal-line);
        transition: background .18s ease, width .18s ease;
    }

    .price-type-option:hover .price-type-card{
        border-color: var(--outline-variant);
        transform: translateY(-1px);
    }

    .price-type-option > input:checked + .price-type-card{
        border-color: transparent;
        box-shadow: 0 0 0 1.5px var(--focus-ring), 0 6px 16px -8px rgba(25,28,30,0.18);
        background: var(--surface-container-lowest);
    }

    input[value="green"]:checked + .price-type-card::before{ background: var(--modal-green-edge); }
    input[value="ripe"]:checked + .price-type-card::before{ background: var(--modal-gold-edge); }
    input[value="both"]:checked + .price-type-card::before{
        background: linear-gradient(180deg, var(--modal-green-edge) 0%, var(--modal-green-edge) 48%, var(--modal-gold-edge) 52%, var(--modal-gold-edge) 100%);
    }

    .price-type-icon{
        width: 40px;
        height: 40px;
        min-width: 40px;
        border-radius: var(--radius-lg);
        display:flex;
        align-items:center;
        justify-content:center;
        font-size: 17px;
        position: relative;
    }
    .price-type-icon.green{ background: var(--modal-green-bg); color: var(--modal-green); }
    .price-type-icon.ripe{ background: var(--modal-gold-bg); color: var(--modal-gold); }
    .price-type-icon.both{
        background: linear-gradient(135deg, var(--modal-green-bg) 0%, var(--modal-green-bg) 50%, var(--modal-gold-bg) 50%, var(--modal-gold-bg) 100%);
        color: var(--modal-ink);
    }

    .icon-leaf, .icon-layers{
        width:16px; height:16px;
        display:inline-block;
        position:relative;
    }
    .icon-leaf::before{
        content:"";
        position:absolute; inset:0;
        background: currentColor;
        -webkit-mask: radial-gradient(circle at 0 100%, transparent 8px, black 8.5px) 0 0/100% 100%;
        mask: radial-gradient(circle at 0 100%, transparent 8px, black 8.5px) 0 0/100% 100%;
        border-radius: 0 60% 0 0;
        transform: rotate(45deg);
    }
    .icon-layers{ }
    .icon-layers::before, .icon-layers::after{
        content:"";
        position:absolute;
        left:50%; top:50%;
        width:14px; height:6px;
        border: 2px solid currentColor;
        border-radius:2px;
        transform: translate(-50%,-50%) rotate(0deg);
        background: transparent;
    }
    .icon-layers::before{ transform: translate(-50%,-70%); }
    .icon-layers::after{ transform: translate(-50%,-30%); }

    .price-type-content{ flex:1; min-width:0; }
    .price-type-content h6{
        margin: 0 0 2px;
        font-weight: 600;
        font-size: 15px;
        font-family: var(--font-body);
        color: var(--modal-ink);
    }
    .price-type-content small{
        color: var(--modal-ink-soft);
        font-size: 13px;
    }

    .price-type-check{
        width: 20px;
        height: 20px;
        min-width:20px;
        border: 1.5px solid var(--outline-variant);
        border-radius: 50%;
        display:flex;
        align-items:center;
        justify-content:center;
        color: transparent;
        font-size: 10px;
        transition: all .15s ease;
    }
    .icon-check{
        width:9px; height:6px;
        display:inline-block;
        position:relative;
    }
    .icon-check::before{
        content:"";
        position:absolute;
        left:1px; top:0px;
        width:9px; height:5px;
        border-left:2px solid currentColor;
        border-bottom:2px solid currentColor;
        transform: rotate(-45deg);
    }

    .price-type-option > input:checked + .price-type-card .price-type-check{
        border-color: var(--modal-action);
        background: var(--modal-action);
        color: var(--on-primary);
    }

    /* ---- Meta row: quiet data-product detail ---- */
    .modal-meta{
        display:flex;
        align-items:center;
        gap:14px;
        font-family: var(--font-mono);
        font-size: 11.5px;
        color: var(--modal-ink-soft);
        padding-top: 4px;
        margin-bottom: 20px;
        border-top: 1px solid var(--modal-line-soft);
        padding-top: 16px;
    }
    .modal-meta span{ display:flex; align-items:center; gap:6px; }
    .modal-meta span::before{
        content:"";
        width:4px; height:4px;
        border-radius:50%;
        background: var(--modal-ink-soft);
        opacity:.6;
    }
    .modal-meta span:first-child::before{ display:none; }

    /* ---- Primary action ---- */
    #btn-download-csv{
        width:100%;
        display:flex;
        align-items:center;
        justify-content:center;
        gap:10px;
        background: var(--modal-action);
        color: var(--on-primary);
        border:none;
        font-family: var(--font-body);
        font-weight:600;
        font-size: 15px;
        letter-spacing:-0.01em;
        padding: 15px 20px;
        border-radius: var(--radius-lg);
        cursor:pointer;
        transition: background .15s ease, transform .12s ease, box-shadow .15s ease;
        box-shadow: 0 10px 24px -8px rgba(31,46,26,0.45);
    }
    #btn-download-csv:hover{ background: var(--modal-action-hover); }
    #btn-download-csv:active{ transform: scale(.99); }
    #btn-download-csv:focus-visible{ outline: 2px solid var(--focus-ring); outline-offset: 2px; }

    .icon-download{
        width:15px; height:15px;
        position:relative;
        display:inline-block;
    }
    .icon-download::before{
        content:"";
        position:absolute;
        left:50%; top:0;
        width:2px; height:9px;
        background:currentColor;
        transform: translateX(-50%);
        border-radius:2px;
    }
    .icon-download::after{
        content:"";
        position:absolute;
        left:50%; bottom:0;
        width:12px; height:2px;
        background:currentColor;
        transform: translateX(-50%);
        border-radius:2px;
        box-shadow: 0 -4px 0 -1.3px transparent;
    }

    @media (prefers-reduced-motion: reduce){
        #dialog-download-successful, #dialog-download-successful::backdrop{ animation:none; }
        .price-type-card, .close-button, #btn-download-csv{ transition:none; }
    }

    /* =========================================================
       MOBILE

       IMPORTANT: a <dialog> is hidden by the browser's built-in
       `dialog:not([open]) { display:none }` rule until .showModal()
       is called. Author CSS always wins over that built-in rule, so
       any bare `#dialog-download-successful { display:flex }` here
       — with no [open] condition — makes the modal visible on every
       mobile page load, whether or not it was opened. Every rule
       below is scoped to #dialog-download-successful[open] so it only
       takes effect once the dialog is actually showing.
    ========================================================= */
    @media (max-width: 480px){
        #dialog-download-successful:not([open]){
            display: none;
        }

        #dialog-download-successful[open]{
            height: 100%;
            left: 0;
            padding: 0;
            position: fixed;
            top: 0;
            width: 100%;
            max-width: 100%;
            border-radius: 0;
            display:flex;
            flex-direction:column;
            animation: modal-in-mobile .26s ease;
        }

        @keyframes modal-in-mobile{
            from{ opacity:0; transform: translateY(18px); }
            to{ opacity:1; transform: translateY(0); }
        }

        #dialog-download-successful .modal-dialog{
            height: 100%;
            margin: 0;
            display:flex;
            flex-direction:column;
        }

        .modal-content{
            height:100%;
        }

        .modal-header{
            padding: 14px 14px 0;
            flex-shrink:0;
        }

        .modal-body{
            padding: 8px 22px 22px;
            overflow-y:auto;
            flex:1;
            display:flex;
            flex-direction:column;
        }

        .modal-title{ font-size:24px; }

        .price-type-options{ margin-bottom:20px; }

        /* push primary action to the bottom, thumb-reachable */
        .modal-body::after{ content:""; flex:1 1 auto; min-height:8px; }

        #btn-download-csv{
            padding: 16px 20px;
        }
    }
    </style>


<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">
            <section class="pine-page-header">
                <div class="pine-eyebrow">
                    <span class="material-symbols-outlined">
                        nutrition
                    </span>
                    AGRICULTURE / PINEAPPLE
                </div>
                <div class="pine-header-row">
                    <div class="pine-header-copy">
                        <h1>
                            Pineapple Price
                            <span>Intelligence</span>
                        </h1>
                        <p>
                            Daily market prices, historical movement and monthly
                            performance for green and ripe pineapple.
                        </p>
                    </div>

                    <div class="pine-header-status">
                        <div class="pine-live-indicator">
                            <span></span>
                            Latest available
                        </div>
                        <strong><?=$greenPriceToday->createdAt->format('d M y') ?></strong>
                        <small>Update 10:00 am everyday</small>
                    </div>
                </div>
            </section>

            <section class="pine-filter-card">
                <div class="pine-filter-info">
                    <div class="pine-filter-icon">
                        <span class="material-symbols-outlined">calendar_month</span>
                    </div>

                    <div class="pine-filter-text">
                        <span class="pine-filter-label">MARKET DATE</span>
                        <strong>Select a date</strong>
                        <small>View available pineapple prices for a specific market day.</small>
                    </div>
                </div>

                <form class="pine-date-form" method="GET">
                    <input
                            id="pineapple-price-date"
                            name="date"
                            type="date"
                            min="<?= htmlspecialchars($minimumDate) ?>"
                            max="<?= htmlspecialchars($maximumDate) ?>"
                            value="<?= htmlspecialchars($date) ?>"
                            required
                    >
                    <button type="submit">
                        <span class="material-symbols-outlined">search</span>
                        View Price
                    </button>
                </form>

                <?php if ($selectedDate): ?>
                    <?php if (empty($ripePriceSelected) && empty($greenPriceSelected)): ?>
                        <div class="pine-notice">
                            <div class="pine-notice-icon">
                                <span class="material-symbols-outlined">info</span>
                            </div>

                            <div class="pine-notice-text">
                                <strong>Latest market data available: <?=$selectedDate ?></strong>
                                <p>
                                    No pineapple price has been recorded for <?=$selectedDate ?>.
                                    The latest available market prices are shown below.
                                </p>
                            </div>
                        </div>

                    <?php else: ?>
                        <div class="w-100">
                            <?= $view->render('/pages/agriculture/pineapple/price-card', [
                                    'ripePrice'  => $ripePriceSelected,
                                    'greenPrice' => $greenPriceSelected,
                            ], null) ?>
                        </div>

                    <?php endif; ?>

                <?php endif; ?>
            </section>

            <p>
                Track <strong>today's pineapple price</strong> across both green (unripe, export/industrial grade)
                and ripe (retail/consumer grade) categories, updated daily from wholesale market data. Pineapple,
                particularly the MD2 (Golden) variety, is one of the world's most widely traded tropical fruits,
                with pricing influenced by harvest cycles, export demand, shipping logistics, and seasonal weather
                across major growing regions. Use the table below to check historical rates, compare min/max price
                bands, and understand short-term market trends before buying, selling, or exporting pineapple.

            </p>


            <h2 class="fw-bold py-3">Today's Price: <?=$today?></h2>

            <?= $view->render('/pages/agriculture/pineapple/price-card', [
                    'ripePrice' => $ripePriceToday,
                    'greenPrice' => $greenPriceToday,
            ], null) ?>

            <section class="">
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <h3 class="fw-bold" style="color:var(--primary);">Green Pineapple</h3>
                            <p>
                                Harvested while still firm and unripe, green pineapples are primarily sold for
                                industrial processing and export. Because they're shipped in bulk and travel longer
                                distances, their prices tend to be more stable and less volatile than ripe fruit.
                            </p>
                        </div>
                        <div class="col-12 col-md-6">
                            <h3 class="fw-bold" style="color:var(--warning-700);">Ripe Pineapple</h3>
                            <p>
                                Sold ready-to-eat in local and retail markets, ripe pineapple prices swing more
                                sharply since the fruit has a short shelf life. Prices often spike when supply is
                                delayed by weather or logistics, since retailers can't hold ripe stock for long.
                            </p>
                        </div>
                    </div>
            </section>

            <section class="my-4">
                <div class="mb-3">
                    <h3 class="fw-bold">
                        Pineapple Price Summary
                    </h3>

                    <p>
                        Pineapple prices in <?= date('Y') ?> have shown clear seasonal variation, driven by changing harvest volumes, regional supply conditions, and market demand. As different growing areas move into and out of peak season, the availability of both green and ripe pineapples fluctuates, leading to shifts in minimum, maximum, and average prices across months. Periods of abundant supply tend to ease prices, while tighter availability or stronger retail and festive demand can push averages higher, resulting in the month-to-month price patterns reflected in this 2026 performance breakdown.
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



            <p>
                The graphical data below illustrates the monthly price trends for green and ripe pineapples across mid-<?= date('Y') ?>, highlighting how prices fluctuate with seasonal supply and demand. Each month’s minimum, maximum, and average rates capture short-term volatility and broader market movements, showing periods of price softening during peak harvests and firmer levels when availability tightens or demand rises. Together, these trends provide a clear visual snapshot of pineapple price performance and market dynamics over the displayed months in <?= date('Y') ?>.
            </p>

            <section class="my-4">
                <?= $view->render('/pages/agriculture/pineapple/graph', [
                        'lastSevenDaysPrice' => $lastSevenDaysPrice,
                ], null) ?>
            </section>

            <p class="pt-4">
                The detailed pineapple price history provides a clear overview of market prices across different trading dates. It shows the price range for green and ripe pineapple, along with the overall market trend for each day, helping users understand recent price movements, compare prices over time, and identify changes in market conditions.
            </p>


            <section class="section-card mb-4" style="overflow:hidden;">
                <div class="p-4 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3" style="border-bottom:1px solid rgba(189,202,186,0.3);">
                    <div>
                        <h2 class="fw-bold mb-0" style="font-size:20px;">Detailed Price History</h2>
                        <p class="mb-0" style="font-size:11px; color:var(--on-surface-variant);">Standardized pricing for MD2 variety</p>
                    </div>

                    <button
                            type="button"
                            id="btn-export-dataset"
                            class="d-flex align-items-center gap-2 fw-bold border-0"
                            style="font-size:11px; color:var(--primary); padding:8px 16px; background-color:rgba(0,107,44,0.05); border-radius:var(--radius-lg);"
                    >
    <span class="material-symbols-outlined" style="font-size:18px;">
        download
    </span>Download Excel</button>
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
                            <td class="fw-bold" style="color:var(--on-surface);">
                                <?=$data['market_date']?>
                                <br>
                                <?=$data['market_day']?>
                            </td>
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


                <dialog id="dialog-download-successful">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <div class="close-button close-btn" data-dismiss="modal">
                                    <i class="icon icon-close"></i>
                                </div>
                            </div>

                            <div class="modal-body">

                                <p class="modal-eyebrow">Export data</p>
                                <h5 class="modal-title">Download price data</h5>
                                <p class="text-muted">
                                    Choose which pineapple price series to include in your CSV export.
                                </p>

                                <div class="price-type-options">

                                    <!-- Green -->
                                    <label class="price-type-option">
                                        <input type="radio" name="price_type" value="green">
                                        <div class="price-type-card">
                                            <div class="price-type-icon green">
                                                <i class="icon icon-leaf"></i>
                                            </div>
                                            <div class="price-type-content">
                                                <h6>Green</h6>
                                                <small>Unripe pineapple prices</small>
                                            </div>
                                            <div class="price-type-check">
                                                <i class="icon icon-check"></i>
                                            </div>
                                        </div>
                                    </label>

                                    <!-- Ripe -->
                                    <label class="price-type-option">
                                        <input type="radio" name="price_type" value="ripe">
                                        <div class="price-type-card">
                                            <div class="price-type-icon ripe">
                                                <i class="icon icon-leaf"></i>
                                            </div>
                                            <div class="price-type-content">
                                                <h6>Ripe</h6>
                                                <small>Ripe pineapple prices</small>
                                            </div>
                                            <div class="price-type-check">
                                                <i class="icon icon-check"></i>
                                            </div>
                                        </div>
                                    </label>

                                    <!-- Both -->
                                    <label class="price-type-option">
                                        <input type="radio" name="price_type" value="both" checked>
                                        <div class="price-type-card">
                                            <div class="price-type-icon both">
                                                <i class="icon icon-layers"></i>
                                            </div>
                                            <div class="price-type-content">
                                                <h6>Both</h6>
                                                <small>Green and ripe prices combined</small>
                                            </div>
                                            <div class="price-type-check">
                                                <i class="icon icon-check"></i>
                                            </div>
                                        </div>
                                    </label>

                                </div>

                                <div class="modal-meta">
                                    <span>CSV format</span>
                                    <span>Updated today</span>
                                </div>

                                <button type="button" id="btn-download-csv">
                                    <i class="icon icon-download"></i>
                                    Download CSV
                                </button>

                            </div>
                        </div>
                    </div>
                </dialog>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {

                        const exportButton = document.getElementById('btn-export-dataset');
                        const modal = document.getElementById('dialog-download-successful');
                        const closeButton = modal?.querySelector('.close-btn');
                        const downloadButton = document.getElementById('btn-download-csv');

                        if (exportButton && modal) {
                            exportButton.addEventListener('click', function () {
                                modal.showModal();
                            });
                        }

                        if (closeButton && modal) {
                            closeButton.addEventListener('click', function () {
                                modal.close();
                            });
                        }

                        // click on backdrop closes the dialog
                        if (modal) {
                            modal.addEventListener('click', function (e) {
                                const rect = modal.getBoundingClientRect();
                                const inDialog =
                                    rect.top <= e.clientY && e.clientY <= rect.top + rect.height &&
                                    rect.left <= e.clientX && e.clientX <= rect.left + rect.width;
                                if (!inDialog) modal.close();
                            });
                        }
                        if (downloadButton) {
                            downloadButton.addEventListener('click', async function () {
                                const selectedType = document.querySelector(
                                    'input[name="price_type"]:checked'
                                )?.value;

                                if (!selectedType) {
                                    console.error('No price type selected');
                                    return;
                                }

                                try {
                                    const response = await fetch('/agriculture/pineapple/download', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            type: selectedType
                                        })
                                    });

                                    if (!response.ok) {
                                        throw new Error(`Response status: ${response.status}`);
                                    }

                                    const blob = await response.blob();

                                    const downloadUrl = window.URL.createObjectURL(blob);
                                    const link = document.createElement('a');

                                    link.href = downloadUrl;
                                    link.download = 'pineapple-price.csv';

                                    document.body.appendChild(link);
                                    link.click();
                                    link.remove();

                                    window.URL.revokeObjectURL(downloadUrl);

                                    modal.close();

                                } catch (error) {
                                    console.error(error.message);
                                }
                            });
                        }

                    });
                </script>


            </section>


        </main>
        <!-- ============ SIDEBAR ============ -->
        <aside class="sidebar d-flex flex-column gap-4" style="">
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