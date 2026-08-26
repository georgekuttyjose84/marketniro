<?php 

if (! function_exists('format_price_date')) {
    /**
     * Format a date as a relative string.
     *
     * Examples:
     * Today
     * Yesterday
     * Tomorrow
     * 2 days ago
     * 5 days ago
     *
     * @param DateTimeImmutable|string $date
     * @param string|null $timezone
     */
    function format_price_date(DateTimeImmutable|string $date, ?string $timezone = null): string
    {
        $tz = $timezone
            ? new DateTimeZone($timezone)
            : new DateTimeZone(date_default_timezone_get());

        $target = $date instanceof DateTimeImmutable
            ? $date->setTimezone($tz)
            : new DateTimeImmutable($date, $tz);

        $today = new DateTimeImmutable('today', $tz);
        $target = $target->setTime(0, 0, 0);

        $diffDays = (int) $today->diff($target)->format('%r%a');

        return match (true) {
            $diffDays === 0 => 'Today',
            $diffDays === 1 => 'Tomorrow',
            $diffDays === -1 => 'Yesterday',
            $diffDays < -1 => abs($diffDays) . ' days ago',
            default => abs($diffDays) . ' days from now',
        };
    }
}

$greenTime = new DateTimeImmutable($greenPrice->getPriceDate());
$ripeTime = new DateTimeImmutable($ripePrice->getPriceDate());
?>

<div class="row g-4 mb-4">
    <div class="col-12 col-md-6">

        <div class="price-card" id="green-pineapple-share">
      <div class="price-card-strip strip-primary"></div>

      <div class="card-head">
        <div>
          <h2 class="card-title" style="color:var(--primary);">Green Pineapple</h2>
          <p class="card-sub">Industrial &amp; Export Grade</p>
        </div>
        <div class="icon-badge icon-badge-primary">
          <span class="material-symbols-outlined">eco</span>
        </div>
      </div>

      <div class="range-block">
        <span class="range-value">₹<?= number_format($greenPrice?->getMinPrice() ?? 0, 0) ?></span>
        <span class="range-sep">–</span>
        <span class="range-value">₹<?= number_format($greenPrice?->getMaxPrice() ?? 0, 0) ?></span>
        <span class="range-unit">per kg</span>
      </div>

      <div class="avg-strip">
        <span class="avg-strip-label">
          <span class="material-symbols-outlined">show_chart</span>
          Average price
        </span>
        <span class="avg-strip-value avg-value-primary">₹<?= number_format($greenPrice?->getAvgPrice() ?? 0, 0) ?></span>
      </div>

      <div class="info-pill info-pill-primary" data-date="2026-08-13">
        <span class="material-symbols-outlined" style="font-size:16px;">schedule</span>
        <span class="date-text"><span class="date-relative"><?= format_price_date($greenTime) ?></span><span class="date-dot"> · </span><span class="date-exact"><?=$greenTime->format('d M')?></span></span>
      </div>

    <div class="d-flex justify-content-center mt-4">
        <button  type="button"  id="share-green-pineapple"  class="share-image btn btn-success">
            Share Green Pineapple
        </button>
    </div>

    </div>
    </div>
    <div class="col-12 col-md-6">

    <div class="price-card">
      <div class="price-card-strip strip-warning"></div>

      <div class="card-head">
        <div>
          <h2 class="card-title" style="color:var(--warning-700);">Ripe Pineapple</h2>
          <p class="card-sub">Retail &amp; Consumer Grade</p>
        </div>
        <div class="icon-badge icon-badge-warning">
          <span class="material-symbols-outlined">nutrition</span>
        </div>
      </div>

      <div class="range-block">
        <span class="range-value">₹<?= number_format($ripePrice?->getMinPrice() ?? 0, 0) ?></span>
        <span class="range-sep">–</span>
        <span class="range-value">₹<?= number_format($ripePrice?->getMaxPrice() ?? 0, 0) ?></span>
        <span class="range-unit">per kg</span>
      </div>

      <div class="avg-strip">
        <span class="avg-strip-label">
          <span class="material-symbols-outlined">show_chart</span>
          Average price
        </span>
        <span class="avg-strip-value avg-value-warning">₹<?= number_format($ripePrice?->getAvgPrice() ?? 0, 0) ?></span>
      </div>

      <div class="info-pill info-pill-warning" data-date="2026-08-13">
        <span class="material-symbols-outlined" style="font-size:16px;">schedule</span>
        <span class="date-text"><span class="date-relative"><?= format_price_date($ripeTime) ?></span><span class="date-dot"> · </span><span class="date-exact"><?=$ripeTime->format('d M')?></span></span>
      </div>
        <div class="d-flex justify-content-center mt-4">
            <button type="button" id="share-ripe-pineapple" class="share-image btn btn-warning">Share Ripe Pineapple</button>
        </div>
    </div>  
    </div>
</div>


<style>
    .share-card {
        width: 500px;
        height: 650px;

        box-sizing: border-box;

        padding: 42px;

        background: #ffffff;

        border: 2px solid #198754;

        font-family: Arial, sans-serif;

        color: #173b2b;

        display: flex;
        flex-direction: column;

        text-align: center;
    }


    /* =========================
       HEADER
    ========================= */

    .share-header {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .share-brand {
        font-size: 16px;
        font-weight: 700;

        letter-spacing: 2px;

        color: #198754;
    }

    .share-header .share-icon {
        font-size: 30px;
    }


    /* =========================
       DIVIDER
    ========================= */

    .share-divider {
        width: 100%;
        height: 1px;

        background: #dce8e1;

        margin: 18px 0;
    }


    /* =========================
       CONTENT
    ========================= */

    .share-content {
        flex: 1;

        display: flex;
        flex-direction: column;

        align-items: center;
        justify-content: center;
    }

    .share-label {
        font-size: 12px;

        font-weight: 700;

        letter-spacing: 2px;

        color: #6b8f73;

        margin-bottom: 12px;
    }


    /* =========================
       TITLE
    ========================= */

    .share-title {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 10px;

        font-size: 36px;

        font-weight: 700;

        color: #146c43;
    }

    .share-title .share-icon {
        font-size: 30px;
    }

    .share-title-text {
        display: inline-block;
    }


    /* =========================
       SUBTITLE
    ========================= */

    .share-subtitle {
        margin-top: 8px;

        font-size: 16px;

        color: #6b7280;
    }


    /* =========================
       PRICE
    ========================= */

    .share-price {
        margin-top: 45px;

        display: flex;
        flex-direction: column;

        align-items: center;
    }

    .share-price span {
        font-size: 52px;

        font-weight: 700;

        color: #173b2b;
    }

    .share-price small {
        margin-top: 8px;

        font-size: 15px;

        color: #6b7280;
    }


    /* =========================
       AVERAGE
    ========================= */

    .share-average {
        width: 100%;

        max-width: 360px;

        margin-top: 40px;

        padding: 18px 25px;

        box-sizing: border-box;

        background: #f1f8f4;

        border: 1px solid #d4e8dc;

        border-radius: 12px;

        display: flex;

        align-items: center;
        justify-content: space-between;
    }

    .average-label {
        font-size: 13px;

        font-weight: 600;

        color: #6b8f73;
    }

    .average-value {
        font-size: 22px;

        font-weight: 700;

        color: #146c43;
    }


    /* =========================
       DATE
    ========================= */

    .share-date {
        margin-top: 30px;

        font-size: 14px;

        font-weight: 600;

        color: #6b7280;
    }


    /* =========================
       FOOTER
    ========================= */

    .share-footer {
        margin-top: auto;
    }

    .share-footer .share-divider {
        margin: 0 0 18px;
    }

    .share-footer strong {
        display: block;

        font-size: 16px;

        color: #146c43;
    }

    .share-footer span {
        display: block;

        margin-top: 5px;

        font-size: 12px;

        color: #9ca3af;
    }

    .share-card {
        background: linear-gradient(
                135deg,
                #DDF3E6 0%,
                #F3FAF5 45%,
                #FFFFFF 100%
        );
    }

    .share-logo {
        display: flex;

        align-items: center;

        gap: 8px;

        text-decoration: none;
    }

    .share-logo img {
        width: auto;
        height: 38px;

        display: block;
    }

    .share-logo span {
        font-size: 20px;

        font-weight: 800;

        color: var(--primary, #198754);

        letter-spacing: -0.03em;
    }

    .ripe-pineapple-share {
        border-color: #d97706;
    }


    /* Ripe Pineapple logo */

    .ripe-pineapple-share .share-logo span {
        color: #d97706;
    }


    /* Ripe Pineapple title */

    .ripe-pineapple-share .share-title {
        color: #b45309;
    }


    /* Ripe Pineapple average box */

    .ripe-pineapple-share .share-average {
        background: #fff7ed;
        border-color: #fed7aa;
    }


    /* Ripe Pineapple average text */

    .ripe-pineapple-share .average-value {
        color: #b45309;
    }

    .ripe-pineapple-share .average-label {
        color: #a16207;
    }


    /* Ripe Pineapple footer */

    .ripe-pineapple-share .share-footer strong {
        color: #b45309;
    }

    .ripe-pineapple-share {
        background: linear-gradient(
                135deg,
                #FFF4D6 0%,
                #FFF9ED 45%,
                #FFFFFF 100%
        );
    }

    .share-card {
        position: absolute;
        left: -99999px;
        top: 0;
    }
</style>


<div id="green-pineapple-share-template" class="share-card">

    <!-- Header -->
    <div class="share-header">
        <div class="share-logo">
        <img src="/assets/market-niro-logo.png" height="60px" alt="MarketNiro Logo" >
        <span>MarketNiro</span>
        </div>

    </div>


    <!-- Divider -->
    <div class="share-divider"></div>


    <!-- Main Content -->
    <div class="share-content">

        <div class="share-label">
            DAILY MARKET PRICE
        </div>


        <div class="share-title">

            <span class="share-icon">🍍</span>

            <span class="share-title-text">
                Green Pineapple
            </span>

        </div>


        <div class="share-subtitle">
            Industrial &amp; Export
        </div>


        <!-- Price -->
        <div class="share-price">

            <span>
                ₹<?= number_format($greenPrice?->getMinPrice() ?? 0, 0) ?> – ₹<?= number_format($greenPrice?->getMaxPrice() ?? 0, 0) ?>
            </span>

            <small>
                per kg
            </small>

        </div>


        <!-- Average -->
        <div class="share-average">

            <span class="average-label">
                Average Price
            </span>

            <span class="average-value">
                ₹<?=number_format($greenPrice?->getAvgPrice() ?? 0, 0) ?>
            </span>

        </div>


        <!-- Date -->
        <div class="share-date">
            <?= $greenTime->format('d M Y') ?>
        </div>

    </div>


    <!-- Footer -->
    <div class="share-footer">

        <div class="share-divider"></div>

        <strong>
            www.marketniro.com
        </strong>

        <span>
            Kerala Market Prices
        </span>

    </div>

</div>


<div
        id="ripe-pineapple-share-template"
        class="share-card ripe-pineapple-share"
>

    <!-- Header -->
    <div class="share-header">

        <div class="share-logo">

            <img
                    src="/assets/market-niro-logo.png"
                    alt="MarketNiro Logo"
            >

            <span>
                MarketNiro
            </span>

        </div>

    </div>


    <!-- Divider -->
    <div class="share-divider"></div>


    <!-- Main Content -->
    <div class="share-content">

        <div class="share-label">
            DAILY MARKET PRICE
        </div>


        <div class="share-title">

            <span class="share-icon">
                🍍
            </span>

            <span class="share-title-text">
                Ripe Pineapple
            </span>

        </div>


        <div class="share-subtitle">
            Retail &amp; Consumer
        </div>


        <!-- Price -->
        <div class="share-price">

            <span>
                ₹<?= number_format($ripePrice?->getMinPrice() ?? 0, 0) ?> – ₹<?= number_format($ripePrice?->getMaxPrice() ?? 0, 0) ?>
            </span>

            <small>
                per kg
            </small>

        </div>


        <!-- Average -->
        <div class="share-average">

            <span class="average-label">
                Average Price
            </span>

            <span class="average-value">
                ₹<?=number_format($ripePrice?->getAvgPrice() ?? 0, 0) ?>
            </span>

        </div>


        <!-- Date -->
        <div class="share-date">
            <?= $ripeTime->format('d M Y') ?>
        </div>

    </div>


    <!-- Footer -->
    <div class="share-footer">

        <div class="share-divider"></div>

        <strong>
            www.marketniro.com
        </strong>

        <span>
            Kerala Market Prices
        </span>

    </div>

</div>


<script type="module">

    import { DomMediaShare } from '/assets/js/DomMediaShare.js';


    // ============================
    // Green Pineapple
    // ============================

    const greenShareCard =
        document.getElementById(
            'green-pineapple-share-template'
        );

    const greenMediaShare =
        new DomMediaShare(
            greenShareCard,
            'https://marketniro.com/agriculture/pineapple',
            'Green Pineapple price: ₹40 – ₹42 per kg. Average price ₹41.',
            'green-pineapple-price.png'
        );


    const greenShareButton =
        document.getElementById(
            'share-green-pineapple'
        );


    greenShareButton.addEventListener(
        'click',
        () => {
            greenMediaShare.share();
        }
    );



    // ============================
    // Ripe Pineapple
    // ============================

    const ripeShareCard =
        document.getElementById(
            'ripe-pineapple-share-template'
        );

    const ripeMediaShare =
        new DomMediaShare(
            ripeShareCard,
            'https://marketniro.com/agriculture/pineapple',
            'Ripe Pineapple price: ₹50 – ₹52 per kg. Average price ₹51.',
            'ripe-pineapple-price.png'
        );


    const ripeShareButton =
        document.getElementById(
            'share-ripe-pineapple'
        );


    ripeShareButton.addEventListener(
        'click',
        () => {
            ripeMediaShare.share();
        }
    );

</script>