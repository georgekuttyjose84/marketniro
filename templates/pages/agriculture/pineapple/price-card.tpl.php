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

    <div class="price-card">
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
        <span class="avg-strip-value avg-value-warning">₹<?= number_format($greenPrice?->getAvgPrice() ?? 0, 0) ?></span>
      </div>

      <div class="info-pill info-pill-warning" data-date="2026-08-13">
        <span class="material-symbols-outlined" style="font-size:16px;">schedule</span>
        <span class="date-text"><span class="date-relative"><?= format_price_date($ripeTime) ?></span><span class="date-dot"> · </span><span class="date-exact"><?=$ripeTime->format('d M')?></span></span>
      </div>
    </div>  
    </div>
</div>