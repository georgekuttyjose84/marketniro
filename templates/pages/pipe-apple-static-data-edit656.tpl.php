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
   PINEAPPLE PAGE
   Premium Market Intelligence Design
   Requires:
   style.css
   header.css
   footer.css
   ============================================================ */


    /* ============================================================
       BASE
       ============================================================ */

    .pine-page-header,
    .pine-filter-card,
    .pine-notice,
    .pine-market-section,
    .pine-context,
    .pine-chart-card,
    .pine-history-card,
    .pine-monthly-section,
    .pine-drivers-section,
    .pine-faq-section {
        width: 100%;
    }


    /* ============================================================
       SECTION TYPOGRAPHY
       ============================================================ */

    .pine-section-kicker {
        display: inline-block;
        margin-bottom: 7px;

        color: var(--primary);
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .16em;
        text-transform: uppercase;
    }

    .pine-section-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 24px;
        margin-bottom: 24px;
    }

    .pine-section-heading h2,
    .pine-chart-header h2,
    .pine-history-header h2 {
        margin: 0;
        color: var(--on-surface);

        font-family: var(--font-headline);
        font-size: clamp(20px, 2.2vw, 27px);
        font-weight: 800;
        letter-spacing: -.025em;
    }

    .pine-section-heading p,
    .pine-chart-header p,
    .pine-history-header p {
        margin: 7px 0 0;

        color: var(--text-secondary);
        font-size: 13px;
        line-height: 1.55;
    }


    /* ============================================================
       PAGE HEADER
       ============================================================ */

    .pine-page-header {
        position: relative;

        margin-bottom: 18px;
        padding: clamp(24px, 4vw, 42px);

        overflow: hidden;

        border: 1px solid var(--border-color);
        border-radius: var(--radius-2xl);

        background:
                radial-gradient(
                        circle at 90% 10%,
                        rgba(228,208,10,.13),
                        transparent 32%
                ),
                linear-gradient(
                        135deg,
                        #ffffff 0%,
                        #f7f9fb 100%
                );
    }

    .pine-page-header::after {
        content: "";

        position: absolute;
        right: -80px;
        bottom: -100px;

        width: 260px;
        height: 260px;

        border-radius: 50%;

        background: rgba(0,107,44,.035);

        pointer-events: none;
    }

    .pine-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        margin-bottom: 22px;

        color: var(--primary);

        font-size: 10px;
        font-weight: 800;
        letter-spacing: .15em;
    }

    .pine-eyebrow .material-symbols-outlined {
        font-size: 17px;
    }

    .pine-header-row {
        position: relative;
        z-index: 1;

        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 32px;
    }

    .pine-header-copy {
        max-width: 720px;
    }

    .pine-header-copy h1 {
        margin: 0;

        color: var(--on-surface);

        font-family: var(--font-headline);
        font-size: clamp(32px, 5vw, 58px);
        font-weight: 800;
        line-height: .98;
        letter-spacing: -.045em;
    }

    .pine-header-copy h1 span {
        display: block;
        color: var(--primary);
    }

    .pine-header-copy p {
        max-width: 610px;

        margin: 18px 0 0;

        color: var(--text-secondary);
        font-size: 14px;
        line-height: 1.7;
    }

    .pine-header-status {
        flex: 0 0 auto;

        min-width: 180px;

        padding: 18px;

        border: 1px solid rgba(189,202,186,.55);
        border-radius: var(--radius-xl);

        background: rgba(255,255,255,.72);

        backdrop-filter: blur(8px);
    }

    .pine-live-indicator {
        display: flex;
        align-items: center;
        gap: 7px;

        margin-bottom: 10px;

        color: var(--primary);

        font-size: 9px;
        font-weight: 800;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    .pine-live-indicator span {
        width: 7px;
        height: 7px;

        border-radius: 50%;
        background: var(--success);

        box-shadow: 0 0 0 4px rgba(22,163,74,.12);
    }

    .pine-header-status strong {
        display: block;

        color: var(--on-surface);

        font-family: var(--font-headline);
        font-size: 18px;
    }

    .pine-header-status small {
        display: block;

        margin-top: 4px;

        color: var(--text-secondary);
        font-size: 10px;
    }


    /* ============================================================
       DATE FILTER
       ============================================================ */

    .pine-filter-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;

        margin-bottom: 12px;
        padding: 14px 16px;

        border: 1px solid var(--border-color);
        border-radius: var(--radius-xl);

        background: var(--surface);
    }

    .pine-filter-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .pine-filter-icon {
        flex: 0 0 auto;

        display: flex;
        align-items: center;
        justify-content: center;

        width: 40px;
        height: 40px;

        border-radius: var(--radius-lg);

        background: rgba(0,107,44,.07);
        color: var(--primary);
    }

    .pine-filter-label {
        display: block;

        color: var(--text-secondary);

        font-size: 8px;
        font-weight: 800;
        letter-spacing: .13em;
    }

    .pine-filter-info strong {
        display: block;

        margin-top: 2px;

        font-size: 13px;
    }

    .pine-filter-info small {
        display: block;

        margin-top: 2px;

        color: var(--text-secondary);
        font-size: 10px;
    }

    .pine-date-form {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .pine-date-form input {
        min-width: 150px;

        height: 42px;

        padding: 0 12px;

        border: 1px solid var(--border-color);
        border-radius: var(--radius-lg);

        background: var(--surface-container-low);

        color: var(--on-surface);

        font-family: var(--font-body);
        font-size: 12px;

        outline: none;
    }

    .pine-date-form input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(0,107,44,.08);
    }

    .pine-date-form button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;

        height: 42px;

        padding: 0 17px;

        border: 0;
        border-radius: var(--radius-lg);

        background: var(--primary);
        color: #fff;

        font-size: 11px;
        font-weight: 700;

        transition: .18s ease;
    }

    .pine-date-form button:hover {
        background: var(--primary-container);
        transform: translateY(-1px);
    }

    .pine-date-form button .material-symbols-outlined {
        font-size: 16px;
    }


    /* ============================================================
       NOTICE
       ============================================================ */

    .pine-notice {
        display: flex;
        align-items: flex-start;
        gap: 12px;

        margin-bottom: 30px;
        padding: 13px 15px;

        border: 1px solid rgba(245,158,11,.22);
        border-radius: var(--radius-xl);

        background: rgba(245,158,11,.055);
    }

    .pine-notice-icon {
        flex: 0 0 auto;

        display: flex;
        align-items: center;
        justify-content: center;

        width: 32px;
        height: 32px;

        border-radius: 50%;

        background: rgba(245,158,11,.12);
        color: var(--warning-700);
    }

    .pine-notice-icon .material-symbols-outlined {
        font-size: 17px;
    }

    .pine-notice strong {
        display: block;

        color: var(--on-surface);

        font-size: 12px;
    }

    .pine-notice p {
        margin: 3px 0 0;

        color: var(--text-secondary);

        font-size: 11px;
        line-height: 1.5;
    }


    /* ============================================================
       CURRENT MARKET
       ============================================================ */

    .pine-market-section {
        margin-bottom: 52px;
    }

    .pine-market-date {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        flex: 0 0 auto;

        padding: 8px 11px;

        border-radius: var(--radius-full);

        background: var(--surface-container-low);

        color: var(--text-secondary);

        font-size: 9px;
        font-weight: 800;
        letter-spacing: .08em;
    }

    .pine-market-date .material-symbols-outlined {
        font-size: 14px;
    }

    .pine-price-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0,1fr));
        gap: 16px;
    }

    .pine-price-card {
        position: relative;

        padding: 23px;

        overflow: hidden;

        border: 1px solid var(--border-color);
        border-radius: var(--radius-2xl);

        background: var(--surface);

        transition:
                transform .2s ease,
                box-shadow .2s ease;
    }

    .pine-price-card:hover {
        transform: translateY(-2px);

        box-shadow:
                0 14px 35px rgba(25,28,30,.07);
    }

    .pine-price-card::before {
        content: "";

        position: absolute;
        top: 0;
        left: 0;
        right: 0;

        height: 4px;
    }

    .pine-green-card::before {
        background: var(--primary);
    }

    .pine-ripe-card::before {
        background: var(--pineapple-accent);
    }

    .pine-card-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 15px;
    }

    .pine-product-label {
        display: flex;
        align-items: center;
        gap: 6px;

        margin-bottom: 7px;

        color: var(--text-secondary);

        font-size: 9px;
        font-weight: 800;
        letter-spacing: .14em;
    }

    .pine-product-dot {
        width: 7px;
        height: 7px;

        border-radius: 50%;
    }

    .pine-green-card .pine-product-dot {
        background: var(--primary);
    }

    .pine-ripe-card .pine-product-dot {
        background: var(--pineapple-accent);
    }

    .pine-card-top h3 {
        margin: 0;

        font-family: var(--font-headline);
        font-size: 20px;
        font-weight: 800;
        letter-spacing: -.02em;
    }

    .pine-card-top p {
        margin: 4px 0 0;

        color: var(--text-secondary);
        font-size: 11px;
    }

    .pine-product-icon {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 42px;
        height: 42px;

        border-radius: var(--radius-xl);
    }

    .pine-green-card .pine-product-icon {
        color: var(--primary);
        background: rgba(0,107,44,.07);
    }

    .pine-ripe-card .pine-product-icon {
        color: var(--warning-700);
        background: rgba(228,208,10,.15);
    }

    .pine-main-price {
        display: flex;
        align-items: baseline;

        margin-top: 30px;

        color: var(--on-surface);
    }

    .pine-main-price .currency-symbol {
        margin-right: 3px;

        font-size: 20px;
        font-weight: 600;
    }

    .pine-main-price strong {
        font-family: var(--font-headline);
        font-size: clamp(42px,5vw,56px);
        font-weight: 800;
        line-height: 1;
        letter-spacing: -.055em;
    }

    .pine-main-price .price-unit {
        margin-left: 7px;

        color: var(--text-secondary);

        font-size: 12px;
        font-weight: 600;
    }

    .pine-price-range {
        display: grid;
        grid-template-columns: repeat(3,1fr);

        margin-top: 25px;

        border-top: 1px solid var(--border-color);
        border-bottom: 1px solid var(--border-color);
    }

    .pine-price-range > div {
        padding: 12px 8px;
    }

    .pine-price-range > div + div {
        border-left: 1px solid var(--border-color);
    }

    .pine-price-range span {
        display: block;

        margin-bottom: 3px;

        color: var(--text-secondary);

        font-size: 8px;
        font-weight: 800;
        letter-spacing: .1em;
    }

    .pine-price-range strong {
        font-family: var(--font-mono);
        font-size: 13px;
    }

    .pine-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;

        margin-top: 15px;

        color: var(--text-secondary);

        font-size: 9px;
        font-weight: 700;
    }

    .pine-card-footer span:first-child {
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .pine-card-footer .material-symbols-outlined {
        color: var(--success);
        font-size: 14px;
    }


    /* ============================================================
       PRICE SPREAD
       ============================================================ */

    .pine-spread-card {
        display: flex;
        align-items: center;
        gap: 16px;

        margin-top: 12px;
        padding: 15px 18px;

        border: 1px solid rgba(228,208,10,.25);
        border-radius: var(--radius-xl);

        background:
                linear-gradient(
                        90deg,
                        rgba(228,208,10,.07),
                        rgba(255,255,255,.9)
                );
    }

    .pine-spread-icon {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 42px;
        height: 42px;

        flex: 0 0 auto;

        border-radius: var(--radius-lg);

        background: rgba(228,208,10,.15);
        color: #756c00;
    }

    .pine-spread-content {
        flex: 1;
    }

    .pine-spread-content > span {
        display: block;

        color: #756c00;

        font-size: 8px;
        font-weight: 800;
        letter-spacing: .14em;
    }

    .pine-spread-content strong {
        display: block;

        margin-top: 2px;

        font-family: var(--font-headline);
        font-size: 21px;
    }

    .pine-spread-content p {
        margin: 2px 0 0;

        color: var(--text-secondary);

        font-size: 10px;
    }

    .pine-spread-math {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .pine-spread-math div {
        text-align: right;
    }

    .pine-spread-math div span {
        display: block;

        color: var(--text-secondary);

        font-size: 8px;
        font-weight: 800;
    }

    .pine-spread-math div strong {
        font-family: var(--font-mono);
        font-size: 13px;
    }

    .pine-spread-math > span {
        color: var(--outline);
    }


    /* ============================================================
       CONTEXT
       ============================================================ */

    .pine-context {
        display: grid;
        grid-template-columns: .85fr 1.15fr;
        gap: 35px;

        margin-bottom: 52px;
        padding: 30px 0;

        border-top: 1px solid var(--border-color);
        border-bottom: 1px solid var(--border-color);
    }

    .pine-context-copy h2 {
        margin: 0;

        font-family: var(--font-headline);
        font-size: clamp(22px,3vw,32px);
        font-weight: 800;
        line-height: 1.05;
        letter-spacing: -.035em;
    }

    .pine-context-copy p {
        margin: 14px 0 0;

        color: var(--text-secondary);

        font-size: 13px;
        line-height: 1.7;
    }

    .pine-context-grid {
        display: grid;
        grid-template-columns: repeat(2,1fr);
        gap: 15px;
    }

    .pine-context-item {
        display: flex;
        gap: 14px;

        padding: 18px;

        border: 1px solid var(--border-color);
        border-radius: var(--radius-xl);

        background: var(--surface);
    }

    .pine-context-number {
        color: var(--primary);

        font-family: var(--font-mono);
        font-size: 11px;
        font-weight: 600;
    }

    .pine-context-item h3 {
        margin: 0;

        font-size: 14px;
        font-weight: 800;
    }

    .pine-context-item p {
        margin: 6px 0 0;

        color: var(--text-secondary);

        font-size: 11px;
        line-height: 1.6;
    }


    /* ============================================================
       CHART
       ============================================================ */

    .pine-chart-card {
        margin-bottom: 52px;
        padding: clamp(18px,3vw,28px);

        border: 1px solid var(--border-color);
        border-radius: var(--radius-2xl);

        background: var(--surface);
    }

    .pine-chart-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
    }

    .pine-timeframe {
        display: flex;
        gap: 3px;

        padding: 3px;

        border-radius: var(--radius-lg);

        background: var(--surface-container-low);
    }

    .pine-timeframe button {
        min-width: 39px;

        padding: 7px 8px;

        border: 0;
        border-radius: 6px;

        background: transparent;

        color: var(--text-secondary);

        font-size: 9px;
        font-weight: 800;
    }

    .pine-timeframe button.active {
        background: var(--surface);
        color: var(--primary);

        box-shadow: 0 1px 5px rgba(0,0,0,.08);
    }

    .pine-chart {
        display: flex;

        height: 330px;

        margin-top: 30px;
    }

    .pine-chart-yaxis {
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        width: 45px;

        padding-bottom: 35px;

        color: var(--text-secondary);

        font-family: var(--font-mono);
        font-size: 8px;
    }

    .pine-chart-area {
        position: relative;

        flex: 1;

        min-width: 0;
    }

    .pine-grid-line {
        position: absolute;
        left: 0;
        right: 0;

        border-top: 1px dashed rgba(110,123,108,.16);
    }

    .pine-grid-line.line-1 { top: 0; }
    .pine-grid-line.line-2 { top: 25%; }
    .pine-grid-line.line-3 { top: 50%; }
    .pine-grid-line.line-4 { top: 75%; }
    .pine-grid-line.line-5 { bottom: 35px; }

    .pine-chart-svg {
        position: absolute;

        left: 0;
        right: 0;
        top: 10px;

        width: 100%;
        height: calc(100% - 45px);

        overflow: visible;
    }

    .pine-chart-dates {
        position: absolute;

        bottom: 5px;
        left: 0;
        right: 0;

        display: flex;
        justify-content: space-between;

        color: var(--text-secondary);

        font-size: 8px;
    }

    .pine-chart-legend {
        display: flex;
        align-items: center;
        gap: 20px;

        margin-top: 12px;
        padding-left: 45px;
    }

    .pine-chart-legend span {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        color: var(--text-secondary);

        font-size: 10px;
        font-weight: 700;
    }

    .pine-chart-legend i {
        width: 8px;
        height: 8px;

        border-radius: 50%;
    }

    .pine-chart-legend i.green {
        background: var(--primary);
    }

    .pine-chart-legend i.ripe {
        background: var(--pineapple-accent);
    }

    .pine-chart-legend small {
        margin-left: auto;

        color: var(--outline);

        font-family: var(--font-mono);
        font-size: 8px;
    }


    /* ============================================================
       HISTORY TABLE
       ============================================================ */

    .pine-history-card {
        margin-bottom: 52px;

        overflow: hidden;

        border: 1px solid var(--border-color);
        border-radius: var(--radius-2xl);

        background: var(--surface);
    }

    .pine-history-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;

        padding: 25px;

        border-bottom: 1px solid var(--border-color);
    }

    .pine-export-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 9px 13px;

        border: 1px solid rgba(0,107,44,.15);
        border-radius: var(--radius-lg);

        background: rgba(0,107,44,.05);

        color: var(--primary);

        font-size: 9px;
        font-weight: 800;
    }

    .pine-export-btn .material-symbols-outlined {
        font-size: 15px;
    }

    .pine-history-table-wrap {
        overflow-x: auto;
    }

    .pine-history-table {
        width: 100%;
        min-width: 620px;

        border-collapse: collapse;
    }

    .pine-history-table th {
        padding: 13px 20px;

        background: var(--surface-container-low);

        color: var(--text-secondary);

        font-size: 8px;
        font-weight: 800;
        letter-spacing: .12em;
        text-align: left;
        text-transform: uppercase;
    }

    .pine-history-table td {
        padding: 15px 20px;

        border-top: 1px solid rgba(189,202,186,.35);

        color: var(--on-surface);

        font-family: var(--font-mono);
        font-size: 11px;
    }

    .pine-history-table tbody tr {
        transition: background .15s ease;
    }

    .pine-history-table tbody tr:hover {
        background: rgba(0,107,44,.025);
    }

    .pine-history-table td:first-child {
        font-family: var(--font-body);
    }

    .pine-history-table td strong {
        display: block;

        font-size: 11px;
    }

    .pine-history-table td small {
        display: block;

        margin-top: 3px;

        color: var(--text-secondary);

        font-size: 9px;
    }

    .pine-trend {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        width: 31px;
        height: 31px;

        border-radius: 50%;
    }

    .pine-trend.flat {
        background: rgba(107,114,128,.08);
        color: var(--text-secondary);
    }

    .pine-trend.down {
        background: rgba(220,38,38,.08);
        color: var(--danger);
    }

    .pine-trend.up {
        background: rgba(22,163,74,.08);
        color: var(--success);
    }

    .pine-trend .material-symbols-outlined {
        font-size: 17px;
    }

    .pine-history-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;

        padding: 13px 20px;

        background: var(--surface-container-low);

        color: var(--text-secondary);

        font-size: 9px;
        font-weight: 700;
    }

    .pine-history-footer strong {
        color: var(--primary);
    }


    /* ============================================================
       MONTHLY SUMMARY
       ============================================================ */

    .pine-monthly-section {
        margin-bottom: 52px;
    }

    .pine-monthly-grid {
        display: grid;
        grid-template-columns: repeat(2,minmax(0,1fr));
        gap: 16px;
    }

    .pine-monthly-card {
        overflow: hidden;

        border: 1px solid var(--border-color);
        border-radius: var(--radius-2xl);

        background: var(--surface);
    }

    .pine-monthly-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 18px 20px;

        border-bottom: 1px solid var(--border-color);
    }

    .pine-monthly-title {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .pine-monthly-title > .material-symbols-outlined {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 34px;
        height: 34px;

        border-radius: var(--radius-lg);

        font-size: 18px;
    }

    .pine-monthly-card.green .pine-monthly-title > .material-symbols-outlined {
        background: rgba(0,107,44,.07);
        color: var(--primary);
    }

    .pine-monthly-card.ripe .pine-monthly-title > .material-symbols-outlined {
        background: rgba(228,208,10,.15);
        color: #756c00;
    }

    .pine-monthly-title span {
        display: block;

        color: var(--text-secondary);

        font-size: 8px;
        font-weight: 800;
        letter-spacing: .12em;
    }

    .pine-monthly-title h3 {
        margin: 2px 0 0;

        font-size: 14px;
        font-weight: 800;
    }

    .pine-monthly-unit {
        color: var(--text-secondary);

        font-family: var(--font-mono);
        font-size: 9px;
    }

    .pine-month-row {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 14px 20px;

        border-bottom: 1px solid rgba(189,202,186,.28);
    }

    .pine-month-row:last-child {
        border-bottom: 0;
    }

    .pine-month-row > span {
        font-size: 11px;
        font-weight: 600;
    }

    .pine-month-row > div {
        text-align: right;
    }

    .pine-month-row small {
        display: block;

        color: var(--text-secondary);

        font-family: var(--font-mono);
        font-size: 8px;
    }

    .pine-month-row strong {
        display: block;

        margin-top: 2px;

        font-family: var(--font-mono);
        font-size: 13px;
    }

    .pine-monthly-card.green .pine-month-row strong {
        color: var(--primary);
    }

    .pine-monthly-card.ripe .pine-month-row strong {
        color: #756c00;
    }


    /* ============================================================
       PRICE DRIVERS
       ============================================================ */

    .pine-drivers-section {
        margin-bottom: 52px;
    }

    .pine-drivers-grid {
        display: grid;
        grid-template-columns: repeat(4,minmax(0,1fr));
        gap: 12px;
    }

    .pine-driver {
        display: flex;
        flex-direction: column;
        gap: 15px;

        padding: 20px;

        border: 1px solid var(--border-color);
        border-radius: var(--radius-xl);

        background: var(--surface);
    }

    .pine-driver-icon {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 38px;
        height: 38px;

        border-radius: var(--radius-lg);

        background: rgba(0,107,44,.06);
        color: var(--primary);
    }

    .pine-driver > div:last-child > span {
        color: var(--outline);

        font-family: var(--font-mono);
        font-size: 8px;
    }

    .pine-driver h3 {
        margin: 5px 0 0;

        font-size: 14px;
        font-weight: 800;
    }

    .pine-driver p {
        margin: 7px 0 0;

        color: var(--text-secondary);

        font-size: 10px;
        line-height: 1.6;
    }


    /* ============================================================
       FAQ
       ============================================================ */

    .pine-faq-section {
        margin-bottom: 20px;
    }

    .pine-faq-list {
        border-top: 1px solid var(--border-color);
    }

    .pine-faq-list details {
        border-bottom: 1px solid var(--border-color);
    }

    .pine-faq-list summary {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;

        padding: 17px 3px;

        cursor: pointer;

        list-style: none;

        color: var(--on-surface);

        font-size: 13px;
        font-weight: 700;
    }

    .pine-faq-list summary::-webkit-details-marker {
        display: none;
    }

    .pine-faq-list summary .material-symbols-outlined {
        flex: 0 0 auto;

        color: var(--outline);

        font-size: 20px;

        transition: transform .2s ease;
    }

    .pine-faq-list details[open] summary .material-symbols-outlined {
        transform: rotate(180deg);
    }

    .pine-faq-list details p {
        max-width: 850px;

        margin: -2px 0 17px;
        padding-right: 35px;

        color: var(--text-secondary);

        font-size: 12px;
        line-height: 1.7;
    }


    /* ============================================================
       RESPONSIVE — TABLET
       ============================================================ */

    @media (max-width: 991.98px) {

        .pine-header-row {
            align-items: flex-start;
            flex-direction: column;
        }

        .pine-header-status {
            width: 100%;
            min-width: 0;
        }

        .pine-context {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .pine-drivers-grid {
            grid-template-columns: repeat(2,minmax(0,1fr));
        }

    }


    /* ============================================================
       RESPONSIVE — MOBILE
       ============================================================ */

    @media (max-width: 767.98px) {

        .pine-page-header {
            padding: 25px 20px;
            border-radius: var(--radius-xl);
        }

        .pine-header-copy h1 {
            font-size: clamp(31px,10vw,44px);
        }

        .pine-header-copy p {
            font-size: 13px;
        }

        .pine-filter-card {
            align-items: stretch;
            flex-direction: column;
        }

        .pine-date-form {
            width: 100%;
        }

        .pine-date-form input {
            flex: 1;
            min-width: 0;
        }

        .pine-date-form button {
            flex: 0 0 auto;
        }

        .pine-section-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .pine-market-date {
            align-self: flex-start;
        }

        .pine-price-grid {
            grid-template-columns: 1fr;
        }

        .pine-price-card {
            padding: 20px;
        }

        .pine-spread-card {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .pine-spread-content {
            min-width: 0;
        }

        .pine-spread-math {
            width: 100%;
            justify-content: flex-end;

            padding-top: 10px;
            border-top: 1px solid rgba(189,202,186,.3);
        }

        .pine-context-grid {
            grid-template-columns: 1fr;
        }

        .pine-chart-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .pine-timeframe {
            width: 100%;
        }

        .pine-timeframe button {
            flex: 1;
        }

        .pine-chart {
            height: 260px;
        }

        .pine-chart-dates span:nth-child(even) {
            display: none;
        }

        .pine-history-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .pine-export-btn {
            width: 100%;
            justify-content: center;
        }

        .pine-monthly-grid {
            grid-template-columns: 1fr;
        }

    }


    /* ============================================================
       RESPONSIVE — SMALL PHONES
       320px — 575px
       ============================================================ */

    @media (max-width: 575.98px) {

        .pine-page-header {
            margin-left: -1px;
            margin-right: -1px;
        }

        .pine-eyebrow {
            margin-bottom: 17px;
        }

        .pine-header-status {
            padding: 14px;
        }

        .pine-filter-card {
            padding: 13px;
        }

        .pine-filter-info small {
            display: none;
        }

        .pine-date-form {
            align-items: stretch;
            flex-direction: column;
        }

        .pine-date-form input,
        .pine-date-form button {
            width: 100%;
            height: 44px;
        }

        .pine-notice {
            padding: 12px;
        }

        .pine-price-card {
            padding: 17px;
        }

        .pine-main-price {
            margin-top: 24px;
        }

        .pine-main-price strong {
            font-size: 47px;
        }

        .pine-price-range > div {
            padding: 11px 5px;
        }

        .pine-price-range strong {
            font-size: 11px;
        }

        .pine-spread-card {
            padding: 14px;
        }

        .pine-spread-math {
            justify-content: space-between;
        }

        .pine-context {
            padding: 25px 0;
        }

        .pine-chart-card {
            padding: 16px;
        }

        .pine-chart {
            height: 225px;
        }

        .pine-chart-yaxis {
            width: 35px;
        }

        .pine-chart-legend {
            padding-left: 35px;
        }

        .pine-history-card {
            border-radius: var(--radius-xl);
        }

        .pine-history-header {
            padding: 19px 16px;
        }

        .pine-history-table th,
        .pine-history-table td {
            padding-left: 14px;
            padding-right: 14px;
        }

        .pine-history-footer {
            align-items: flex-start;
            flex-direction: column;
            gap: 5px;

            padding: 12px 14px;
        }

        .pine-drivers-grid {
            grid-template-columns: 1fr;
        }

        .pine-driver {
            flex-direction: row;
            align-items: flex-start;
        }

    }


    /* ============================================================
       EXTRA SMALL — 320px
       ============================================================ */

    @media (max-width: 359.98px) {

        .pine-page-header {
            padding: 21px 15px;
        }

        .pine-header-copy h1 {
            font-size: 30px;
        }

        .pine-price-card {
            padding: 15px;
        }

        .pine-card-top h3 {
            font-size: 18px;
        }

        .pine-product-icon {
            width: 36px;
            height: 36px;
        }

        .pine-main-price strong {
            font-size: 43px;
        }

        .pine-main-price .currency-symbol {
            font-size: 17px;
        }

        .pine-price-range span {
            font-size: 7px;
        }

        .pine-price-range strong {
            font-size: 10px;
        }

        .pine-spread-content strong {
            font-size: 19px;
        }

        .pine-chart {
            height: 205px;
        }

        .pine-chart-yaxis {
            width: 30px;
        }

        .pine-chart-yaxis span {
            font-size: 7px;
        }

    }
</style>


<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">
            <!-- =========================================================
     PINEAPPLE MARKET PAGE
     Static UI prototype using current controller data
     ========================================================= -->

            <!-- ===================== PAGE HEADER ====================== -->
            <section class="pine-page-header">

                <div class="pine-eyebrow">
                    <span class="material-symbols-outlined">nutrition</span>
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

                        <strong>11 Aug 2026</strong>

                        <small>
                            9 market days tracked
                        </small>

                    </div>

                </div>

            </section>


            <!-- ===================== DATE FILTER ====================== -->
            <section class="pine-filter-card">

                <div class="pine-filter-info">

                    <div class="pine-filter-icon">
            <span class="material-symbols-outlined">
                calendar_month
            </span>
                    </div>

                    <div>
            <span class="pine-filter-label">
                MARKET DATE
            </span>

                        <strong>
                            Select a date
                        </strong>

                        <small>
                            View available pineapple prices for a specific market day.
                        </small>
                    </div>

                </div>

                <form
                        class="pine-date-form"
                        method="GET"
                >

                    <input
                            id="pineapple-price-date"
                            name="date"
                            type="date"
                            value="2026-08-12"
                            min="2026-01-01"
                            max="2026-08-12"
                            required
                    >

                    <button type="submit">
            <span class="material-symbols-outlined">
                search
            </span>
                        View Price
                    </button>

                </form>

            </section>


            <!-- ===================== AVAILABILITY NOTICE ====================== -->
            <section class="pine-notice">

                <div class="pine-notice-icon">
        <span class="material-symbols-outlined">
            info
        </span>
                </div>

                <div>
                    <strong>Latest market data available: August 11, 2026</strong>

                    <p>
                        No pineapple price has been recorded for August 12 yet.
                        The latest available market prices are shown below.
                    </p>
                </div>

            </section>


            <!-- ===================== CURRENT MARKET ====================== -->
            <section class="pine-market-section">

                <div class="pine-section-heading">

                    <div>
            <span class="pine-section-kicker">
                MARKET SNAPSHOT
            </span>

                        <h2>
                            Today's latest available prices
                        </h2>

                        <p>
                            Wholesale market range recorded on August 11, 2026.
                        </p>
                    </div>

                    <div class="pine-market-date">
            <span class="material-symbols-outlined">
                schedule
            </span>
                        11 AUG 2026
                    </div>

                </div>


                <div class="pine-price-grid">

                    <!-- GREEN -->
                    <article class="pine-price-card pine-green-card">

                        <div class="pine-card-top">

                            <div>
                                <div class="pine-product-label">
                                    <span class="pine-product-dot"></span>
                                    GREEN
                                </div>

                                <h3>
                                    Green Pineapple
                                </h3>

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

                            <span class="price-unit">
                    /kg
                </span>

                        </div>

                        <div class="pine-price-range">

                            <div>
                                <span>MIN</span>
                                <strong>₹40</strong>
                            </div>

                            <div>
                                <span>MAX</span>
                                <strong>₹42</strong>
                            </div>

                            <div>
                                <span>AVG</span>
                                <strong>₹41</strong>
                            </div>

                        </div>

                        <div class="pine-card-footer">

                <span>
                    <span class="material-symbols-outlined">
                        verified
                    </span>
                    Market verified
                </span>

                            <span>
                    11 Aug
                </span>

                        </div>

                    </article>


                    <!-- RIPE -->
                    <article class="pine-price-card pine-ripe-card">

                        <div class="pine-card-top">

                            <div>
                                <div class="pine-product-label">
                                    <span class="pine-product-dot"></span>
                                    RIPE
                                </div>

                                <h3>
                                    Ripe Pineapple
                                </h3>

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

                            <span class="price-unit">
                    /kg
                </span>

                        </div>

                        <div class="pine-price-range">

                            <div>
                                <span>MIN</span>
                                <strong>₹50</strong>
                            </div>

                            <div>
                                <span>MAX</span>
                                <strong>₹52</strong>
                            </div>

                            <div>
                                <span>AVG</span>
                                <strong>₹51</strong>
                            </div>

                        </div>

                        <div class="pine-card-footer">

                <span>
                    <span class="material-symbols-outlined">
                        verified
                    </span>
                    Market verified
                </span>

                            <span>
                    11 Aug
                </span>

                        </div>

                    </article>

                </div>


                <!-- PRICE DIFFERENCE -->
                <div class="pine-spread-card">

                    <div class="pine-spread-icon">
            <span class="material-symbols-outlined">
                compare_arrows
            </span>
                    </div>

                    <div class="pine-spread-content">

            <span>
                RIPE PREMIUM
            </span>

                        <strong>
                            ₹10/kg
                        </strong>

                        <p>
                            Ripe pineapple is currently priced ₹10/kg higher
                            than green pineapple.
                        </p>

                    </div>

                    <div class="pine-spread-math">

                        <div>
                            <span>GREEN</span>
                            <strong>₹41</strong>
                        </div>

                        <span>→</span>

                        <div>
                            <span>RIPE</span>
                            <strong>₹51</strong>
                        </div>

                    </div>

                </div>

            </section>


            <!-- ===================== MARKET CONTEXT ====================== -->
            <section class="pine-context">

                <div class="pine-context-copy">

        <span class="pine-section-kicker">
            MARKET CONTEXT
        </span>

                    <h2>
                        Why green and ripe prices behave differently
                    </h2>

                    <p>
                        Green pineapple is primarily associated with industrial
                        processing and export markets, while ripe pineapple is
                        sold closer to the retail and consumer market.
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
                                Harvested while firm and unripe. Bulk handling,
                                processing demand and longer-distance transportation
                                generally influence its pricing.
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
                                Ready-to-eat fruit has a shorter shelf life.
                                Local retail demand and supply availability can
                                therefore have a stronger effect on its price.
                            </p>
                        </div>

                    </article>

                </div>

            </section>


            <!-- ===================== HISTORICAL CHART ====================== -->
            <section class="pine-chart-card">

                <div class="pine-chart-header">

                    <div>

            <span class="pine-section-kicker">
                PRICE HISTORY
            </span>

                        <h2>
                            Historical price movement
                        </h2>

                        <p>
                            Recent market movement based on recorded market prices.
                        </p>

                    </div>


                    <div class="pine-timeframe">

                        <button class="active">
                            7D
                        </button>

                        <button>
                            1M
                        </button>

                        <button>
                            3M
                        </button>

                        <button>
                            1Y
                        </button>

                    </div>

                </div>


                <!-- Static SVG chart -->
                <div class="pine-chart">

                    <div class="pine-chart-yaxis">

                        <span>₹55</span>
                        <span>₹50</span>
                        <span>₹45</span>
                        <span>₹40</span>
                        <span>₹35</span>

                    </div>


                    <div class="pine-chart-area">

                        <div class="pine-grid-line line-1"></div>
                        <div class="pine-grid-line line-2"></div>
                        <div class="pine-grid-line line-3"></div>
                        <div class="pine-grid-line line-4"></div>
                        <div class="pine-grid-line line-5"></div>

                        <svg
                                viewBox="0 0 900 300"
                                preserveAspectRatio="none"
                                class="pine-chart-svg"
                        >

                            <!-- Green -->
                            <polyline
                                    points="
                    0,190
                    115,190
                    230,170
                    345,180
                    460,165
                    575,150
                    690,150
                    805,165
                    900,165
                    "
                                    fill="none"
                                    stroke="var(--primary)"
                                    stroke-width="4"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                            />

                            <!-- Ripe -->
                            <polyline
                                    points="
                    0,80
                    115,80
                    230,80
                    345,80
                    460,80
                    575,80
                    690,85
                    805,100
                    900,100
                    "
                                    fill="none"
                                    stroke="var(--pineapple-accent)"
                                    stroke-width="4"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                            />

                            <!-- Green points -->
                            <circle cx="0" cy="190" r="5" fill="var(--primary)" />
                            <circle cx="115" cy="190" r="5" fill="var(--primary)" />
                            <circle cx="230" cy="170" r="5" fill="var(--primary)" />
                            <circle cx="345" cy="180" r="5" fill="var(--primary)" />
                            <circle cx="460" cy="165" r="5" fill="var(--primary)" />
                            <circle cx="575" cy="150" r="5" fill="var(--primary)" />
                            <circle cx="690" cy="150" r="5" fill="var(--primary)" />
                            <circle cx="805" cy="165" r="5" fill="var(--primary)" />
                            <circle cx="900" cy="165" r="5" fill="var(--primary)" />

                            <!-- Ripe points -->
                            <circle cx="0" cy="80" r="5" fill="var(--pineapple-accent)" />
                            <circle cx="115" cy="80" r="5" fill="var(--pineapple-accent)" />
                            <circle cx="230" cy="80" r="5" fill="var(--pineapple-accent)" />
                            <circle cx="345" cy="80" r="5" fill="var(--pineapple-accent)" />
                            <circle cx="460" cy="80" r="5" fill="var(--pineapple-accent)" />
                            <circle cx="575" cy="80" r="5" fill="var(--pineapple-accent)" />
                            <circle cx="690" cy="85" r="5" fill="var(--pineapple-accent)" />
                            <circle cx="805" cy="100" r="5" fill="var(--pineapple-accent)" />
                            <circle cx="900" cy="100" r="5" fill="var(--pineapple-accent)" />

                        </svg>

                        <div class="pine-chart-dates">

                            <span>Aug 01</span>
                            <span>Aug 03</span>
                            <span>Aug 05</span>
                            <span>Aug 07</span>
                            <span>Aug 08</span>
                            <span>Aug 10</span>
                            <span>Aug 11</span>

                        </div>

                    </div>

                </div>


                <div class="pine-chart-legend">

        <span>
            <i class="green"></i>
            Green
        </span>

                    <span>
            <i class="ripe"></i>
            Ripe
        </span>

                    <small>
                        INR / kg
                    </small>

                </div>

            </section>


            <!-- ===================== RECENT HISTORY ====================== -->
            <section class="pine-history-card">

                <div class="pine-history-header">

                    <div>

            <span class="pine-section-kicker">
                MARKET RECORD
            </span>

                        <h2>
                            Recent price history
                        </h2>

                        <p>
                            Recorded market ranges for the latest 9 market days.
                        </p>

                    </div>

                    <button class="pine-export-btn">
            <span class="material-symbols-outlined">
                download
            </span>
                        Export
                    </button>

                </div>


                <div class="pine-history-table-wrap">

                    <table class="pine-history-table">

                        <thead>
                        <tr>
                            <th>Market date</th>
                            <th>Green</th>
                            <th>Ripe</th>
                            <th>Trend</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>
                                <strong>Aug 11, 2026</strong>
                                <small>Tuesday</small>
                            </td>
                            <td>
                                <strong>₹40 — ₹42</strong>
                            </td>
                            <td>
                                <strong>₹50 — ₹52</strong>
                            </td>
                            <td>
                        <span class="pine-trend flat">
                            <span class="material-symbols-outlined">
                                trending_flat
                            </span>
                        </span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Aug 10, 2026</strong>
                                <small>Monday</small>
                            </td>
                            <td>
                                <strong>₹40 — ₹42</strong>
                            </td>
                            <td>
                                <strong>₹50 — ₹52</strong>
                            </td>
                            <td>
                        <span class="pine-trend flat">
                            <span class="material-symbols-outlined">
                                trending_flat
                            </span>
                        </span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Aug 08, 2026</strong>
                                <small>Saturday</small>
                            </td>
                            <td>
                                <strong>₹40 — ₹42</strong>
                            </td>
                            <td>
                                <strong>₹50 — ₹52</strong>
                            </td>
                            <td>
                        <span class="pine-trend down">
                            <span class="material-symbols-outlined">
                                trending_down
                            </span>
                        </span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Aug 07, 2026</strong>
                                <small>Friday</small>
                            </td>
                            <td>
                                <strong>₹42 — ₹44</strong>
                            </td>
                            <td>
                                <strong>₹50 — ₹52</strong>
                            </td>
                            <td>
                        <span class="pine-trend down">
                            <span class="material-symbols-outlined">
                                trending_down
                            </span>
                        </span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Aug 06, 2026</strong>
                                <small>Thursday</small>
                            </td>
                            <td>
                                <strong>₹43 — ₹45</strong>
                            </td>
                            <td>
                                <strong>₹50 — ₹52</strong>
                            </td>
                            <td>
                        <span class="pine-trend down">
                            <span class="material-symbols-outlined">
                                trending_down
                            </span>
                        </span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Aug 05, 2026</strong>
                                <small>Wednesday</small>
                            </td>
                            <td>
                                <strong>₹44 — ₹46</strong>
                            </td>
                            <td>
                                <strong>₹50 — ₹52</strong>
                            </td>
                            <td>
                        <span class="pine-trend up">
                            <span class="material-symbols-outlined">
                                trending_up
                            </span>
                        </span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Aug 04, 2026</strong>
                                <small>Tuesday</small>
                            </td>
                            <td>
                                <strong>₹44 — ₹46</strong>
                            </td>
                            <td>
                                <strong>₹49 — ₹51</strong>
                            </td>
                            <td>
                        <span class="pine-trend up">
                            <span class="material-symbols-outlined">
                                trending_up
                            </span>
                        </span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Aug 03, 2026</strong>
                                <small>Monday</small>
                            </td>
                            <td>
                                <strong>₹43 — ₹45</strong>
                            </td>
                            <td>
                                <strong>₹48 — ₹50</strong>
                            </td>Pineapple

                            <td>
                        <span class="pine-trend flat">
                            <span class="material-symbols-outlined">
                                trending_flat
                            </span>
                        </span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Aug 01, 2026</strong>
                                <small>Saturday</small>
                            </td>
                            <td>
                                <strong>₹43 — ₹45</strong>
                            </td>
                            <td>
                                <strong>₹48 — ₹50</strong>
                            </td>
                            <td>
                        <span class="pine-trend flat">
                            <span class="material-symbols-outlined">
                                trending_flat
                            </span>
                        </span>
                            </td>
                        </tr>

                        </tbody>

                    </table>

                </div>


                <div class="pine-history-footer">

        <span>
            Aug 01 — Aug 11, 2026
        </span>

                    <strong>
                        9 Market Days
                    </strong>

                </div>

            </section>


            <!-- ===================== MONTHLY SUMMARY ====================== -->
            <section class="pine-monthly-section">

                <div class="pine-section-heading">

                    <div>

            <span class="pine-section-kicker">
                PERFORMANCE
            </span>

                        <h2>
                            Monthly price summary
                        </h2>

                        <p>
                            Monthly minimum, maximum and average prices for 2026.
                        </p>

                    </div>

                </div>


                <div class="pine-monthly-grid">

                    <!-- GREEN -->
                    <article class="pine-monthly-card green">

                        <div class="pine-monthly-card-header">

                            <div class="pine-monthly-title">

                    <span class="material-symbols-outlined">
                        eco
                    </span>

                                <div>
                                    <span>GREEN</span>
                                    <h3>Green Pineapple</h3>
                                </div>

                            </div>

                            <span class="pine-monthly-unit">
                    ₹ / kg
                </span>

                        </div>


                        <div class="pine-month-row">

                            <span>August 2026</span>

                            <div>
                                <small>₹41 — ₹45</small>
                                <strong>₹43.11</strong>
                            </div>

                        </div>


                        <div class="pine-month-row">

                            <span>July 2026</span>

                            <div>
                                <small>₹28 — ₹44</small>
                                <strong>₹34.11</strong>
                            </div>

                        </div>


                        <div class="pine-month-row">

                            <span>June 2026</span>

                            <div>
                                <small>₹31 — ₹64</small>
                                <strong>₹53.35</strong>
                            </div>

                        </div>

                    </article>


                    <!-- RIPE -->
                    <article class="pine-monthly-card ripe">

                        <div class="pine-monthly-card-header">

                            <div class="pine-monthly-title">

                    <span class="material-symbols-outlined">
                        nutrition
                    </span>

                                <div>
                                    <span>RIPE</span>
                                    <h3>Ripe Pineapple</h3>
                                </div>

                            </div>

                            <span class="pine-monthly-unit">
                    ₹ / kg
                </span>

                        </div>


                        <div class="pine-month-row">

                            <span>August 2026</span>

                            <div>
                                <small>₹49 — ₹51</small>
                                <strong>₹50.44</strong>
                            </div>

                        </div>


                        <div class="pine-month-row">

                            <span>July 2026</span>

                            <div>
                                <small>₹31 — ₹51</small>
                                <strong>₹39.89</strong>
                            </div>

                        </div>


                        <div class="pine-month-row">

                            <span>June 2026</span>

                            <div>
                                <small>₹41 — ₹61</small>
                                <strong>₹54.62</strong>
                            </div>

                        </div>

                    </article>

                </div>

            </section>


            <!-- ===================== PRICE DRIVERS ====================== -->
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
                            Four major factors can influence short-term pineapple pricing.
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
                                Heavy rain or drought can affect fruit quality,
                                size and available market supply.
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
                            <h3>Logistics</h3>

                            <p>
                                Shipping delays, container shortages and port
                                congestion can tighten short-term supply.
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
                                for export-grade green fruit.
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
                            <h3>Currency</h3>

                            <p>
                                Exchange-rate movements can influence landed costs
                                and global commodity pricing.
                            </p>
                        </div>

                    </article>

                </div>

            </section>


            <!-- ===================== FAQ ====================== -->
            <section class="pine-faq-section">

                <div class="pine-section-heading">

                    <div>

            <span class="pine-section-kicker">
                KNOWLEDGE
            </span>

                        <h2>
                            Frequently asked questions
                        </h2>

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
                            shows an average green pineapple price of ₹41/kg and
                            an average ripe pineapple price of ₹51/kg.
                        </p>

                    </details>


                    <details>

                        <summary>
                <span>
                    Why is ripe pineapple more expensive?
                </span>

                            <span class="material-symbols-outlined">
                    expand_more
                </span>
                        </summary>

                        <p>
                            Ripe pineapple is retail-ready and has a shorter shelf
                            life, while green pineapple is more commonly handled
                            in bulk for processing and export.
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
                            Market prices are updated daily when market data is
                            available. Historical records can be reviewed across
                            different timeframes.
                        </p>

                    </details>


                    <details>

                        <summary>
                <span>
                    What variety does this data track?
                </span>

                            <span class="material-symbols-outlined">
                    expand_more
                </span>

                        </summary>

                        <p>
                            The supplied dataset identifies the tracked pricing
                            with standardized MD2 (Golden) variety information.
                        </p>

                    </details>

                </div>

            </section>
        </main>
        <script src="/css/home.js"></script>

        <!-- ============ SIDEBAR ============ -->
        <aside class="sidebar d-flex flex-column gap-4" style="">

        </aside>
    </div>
</div>