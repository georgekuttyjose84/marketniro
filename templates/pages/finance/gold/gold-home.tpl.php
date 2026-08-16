<?php

$page = $page ?? [];
$h1 = $page['h1'] ?? '';
$description = $page['description'] ?? '';


$currencies = [
    'AED' => ['🇦🇪', 'UAE Dirham'],
    'AFN' => ['🇦🇫', 'Afghan Afghani'],
    'ALL' => ['🇦🇱', 'Albanian Lek'],
    'AMD' => ['🇦🇲', 'Armenian Dram'],
    'ANG' => ['🇨🇼', 'Netherlands Antillean Guilder'],
    'AOA' => ['🇦🇴', 'Angolan Kwanza'],
    'ARS' => ['🇦🇷', 'Argentine Peso'],
    'AUD' => ['🇦🇺', 'Australian Dollar'],
    'AWG' => ['🇦🇼', 'Aruban Florin'],
    'AZN' => ['🇦🇿', 'Azerbaijani Manat'],
    'BAM' => ['🇧🇦', 'Bosnia and Herzegovina Mark'],
    'BBD' => ['🇧🇧', 'Barbadian Dollar'],
    'BDT' => ['🇧🇩', 'Bangladeshi Taka'],
    'BGN' => ['🇧🇬', 'Bulgarian Lev'],
    'BHD' => ['🇧🇭', 'Bahraini Dinar'],
    'BIF' => ['🇧🇮', 'Burundian Franc'],
    'BMD' => ['🇧🇲', 'Bermudian Dollar'],
    'BND' => ['🇧🇳', 'Brunei Dollar'],
    'BOB' => ['🇧🇴', 'Bolivian Boliviano'],
    'BRL' => ['🇧🇷', 'Brazilian Real'],
    'BSD' => ['🇧🇸', 'Bahamian Dollar'],
    'BTN' => ['🇧🇹', 'Bhutanese Ngultrum'],
    'BWP' => ['🇧🇼', 'Botswana Pula'],
    'BYN' => ['🇧🇾', 'Belarusian Ruble'],
    'BZD' => ['🇧🇿', 'Belize Dollar'],
    'CAD' => ['🇨🇦', 'Canadian Dollar'],
    'CDF' => ['🇨🇩', 'Congolese Franc'],
    'CHF' => ['🇨🇭', 'Swiss Franc'],
    'CLP' => ['🇨🇱', 'Chilean Peso'],
    'CNY' => ['🇨🇳', 'Chinese Yuan'],
    'COP' => ['🇨🇴', 'Colombian Peso'],
    'CRC' => ['🇨🇷', 'Costa Rican Colón'],
    'CUC' => ['🇨🇺', 'Cuban Convertible Peso'],
    'CUP' => ['🇨🇺', 'Cuban Peso'],
    'CVE' => ['🇨🇻', 'Cape Verde Escudo'],
    'CZK' => ['🇨🇿', 'Czech Koruna'],
    'DJF' => ['🇩🇯', 'Djiboutian Franc'],
    'DKK' => ['🇩🇰', 'Danish Krone'],
    'DOP' => ['🇩🇴', 'Dominican Peso'],
    'DZD' => ['🇩🇿', 'Algerian Dinar'],
    'EGP' => ['🇪🇬', 'Egyptian Pound'],
    'ERN' => ['🇪🇷', 'Eritrean Nakfa'],
    'ETB' => ['🇪🇹', 'Ethiopian Birr'],
    'EUR' => ['🇪🇺', 'Euro'],
    'FJD' => ['🇫🇯', 'Fijian Dollar'],
    'FKP' => ['🇫🇰', 'Falkland Islands Pound'],
    'GBP' => ['🇬🇧', 'British Pound Sterling'],
    'GEL' => ['🇬🇪', 'Georgian Lari'],
    'GGP' => ['🇬🇬', 'Guernsey Pound'],
    'GHS' => ['🇬🇭', 'Ghanaian Cedi'],
    'GIP' => ['🇬🇮', 'Gibraltar Pound'],
    'GMD' => ['🇬🇲', 'Gambian Dalasi'],
    'GNF' => ['🇬🇳', 'Guinean Franc'],
    'GTQ' => ['🇬🇹', 'Guatemalan Quetzal'],
    'GYD' => ['🇬🇾', 'Guyanese Dollar'],
    'HKD' => ['🇭🇰', 'Hong Kong Dollar'],
    'HNL' => ['🇭🇳', 'Honduran Lempira'],
    'HRK' => ['🇭🇷', 'Croatian Kuna'],
    'HTG' => ['🇭🇹', 'Haitian Gourde'],
    'HUF' => ['🇭🇺', 'Hungarian Forint'],
    'IDR' => ['🇮🇩', 'Indonesian Rupiah'],
    'ILS' => ['🇮🇱', 'Israeli New Shekel'],
    'IMP' => ['🇮🇲', 'Isle of Man Pound'],
    'INR' => ['🇮🇳', 'Indian Rupee'],
    'IQD' => ['🇮🇶', 'Iraqi Dinar'],
    'IRR' => ['🇮🇷', 'Iranian Rial'],
    'ISK' => ['🇮🇸', 'Icelandic Króna'],
    'JEP' => ['🇯🇪', 'Jersey Pound'],
    'JMD' => ['🇯🇲', 'Jamaican Dollar'],
    'JOD' => ['🇯🇴', 'Jordanian Dinar'],
    'JPY' => ['🇯🇵', 'Japanese Yen'],
    'KES' => ['🇰🇪', 'Kenyan Shilling'],
    'KGS' => ['🇰🇬', 'Kyrgyzstani Som'],
    'KHR' => ['🇰🇭', 'Cambodian Riel'],
    'KMF' => ['🇰🇲', 'Comorian Franc'],
    'KPW' => ['🇰🇵', 'North Korean Won'],
    'KRW' => ['🇰🇷', 'South Korean Won'],
    'KWD' => ['🇰🇼', 'Kuwaiti Dinar'],
    'KYD' => ['🇰🇾', 'Cayman Islands Dollar'],
    'KZT' => ['🇰🇿', 'Kazakhstani Tenge'],
    'LAK' => ['🇱🇦', 'Lao Kip'],
    'LBP' => ['🇱🇧', 'Lebanese Pound'],
    'LKR' => ['🇱🇰', 'Sri Lankan Rupee'],
    'LRD' => ['🇱🇷', 'Liberian Dollar'],
    'LSL' => ['🇱🇸', 'Lesotho Loti'],
    'LYD' => ['🇱🇾', 'Libyan Dinar'],
    'MAD' => ['🇲🇦', 'Moroccan Dirham'],
    'MXN' => ['🇲🇽', 'Mexican Peso'],
    'MYR' => ['🇲🇾', 'Malaysian Ringgit'],
    'NGN' => ['🇳🇬', 'Nigerian Naira'],
    'NOK' => ['🇳🇴', 'Norwegian Krone'],
    'NPR' => ['🇳🇵', 'Nepalese Rupee'],
    'NZD' => ['🇳🇿', 'New Zealand Dollar'],
    'OMR' => ['🇴🇲', 'Omani Rial'],
    'PHP' => ['🇵🇭', 'Philippine Peso'],
    'PKR' => ['🇵🇰', 'Pakistani Rupee'],
    'PLN' => ['🇵🇱', 'Polish Złoty'],
    'QAR' => ['🇶🇦', 'Qatari Riyal'],
    'RON' => ['🇷🇴', 'Romanian Leu'],
    'RUB' => ['🇷🇺', 'Russian Ruble'],
    'SAR' => ['🇸🇦', 'Saudi Riyal'],
    'SEK' => ['🇸🇪', 'Swedish Krona'],
    'SGD' => ['🇸🇬', 'Singapore Dollar'],
    'THB' => ['🇹🇭', 'Thai Baht'],
    'TRY' => ['🇹🇷', 'Turkish Lira'],
    'UAH' => ['🇺🇦', 'Ukrainian Hryvnia'],
    'UGX' => ['🇺🇬', 'Ugandan Shilling'],
    'USD' => ['🇺🇸', 'US Dollar'],
    'UYU' => ['🇺🇾', 'Uruguayan Peso'],
    'UZS' => ['🇺🇿', 'Uzbekistani Som'],
    'VND' => ['🇻🇳', 'Vietnamese Đồng'],
    'YER' => ['🇾🇪', 'Yemeni Rial'],
    'ZAR' => ['🇿🇦', 'South African Rand'],
    'ZMW' => ['🇿🇲', 'Zambian Kwacha'],
    'ZWL' => ['🇿🇼', 'Zimbabwean Dollar'],
];


?>

<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">
            <section class="mb-4">
                <form action="/finance/gold" method="get" role="search" aria-label="Convert gold">
                    <div class="gold-converter-card">
                        <div class="mb-4">
                            <h2 class="fw-bold d-flex align-items-center gap-2 m-0"
                                style="font-size:24px; color:var(--on-surface);"><span class="material-symbols-outlined"
                                                                                       style="color:var(--primary);">currency_exchange</span>Gold
                                converter</h2>
                            <p class="mt-1 mb-0" style="font-size:14px; color:var(--text-secondary);">Live exchange
                                rates for major world Gold Rate</p>
                        </div>

                        <div class="alert-info-custom d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                            <div>
                                <span class="form-label-custom mb-1 text-muted" style="text-transform:none;">Today's Gold Price in <strong><?= htmlspecialchars($currencies[$currency][1]) ?></strong></span>
                                <div class="d-flex align-items-baseline gap-2">
                                    <span class="fw-bold"
                                          style="font-size:32px; color:var(--primary);">
                                        <?= number_format($goldPricePerGram, 2) ?>
                                    </span>
                                    <span style="font-size:16px; color:var(--on-surface);"><?= htmlspecialchars($currency) ?>/ 1 Gram<sup>*</sup>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2" style="font-size:14px; color:var(--text-secondary);">
                                <?php if ($icon): ?>
                                    <span class="material-symbols-outlined"
                                          style="color:<?= $trendColor ?>; font-size:18px;">
                                        <?= $icon ?>
                                    </span>
                                <?php endif; ?>
                                <span style="color:<?= $trendColor ?>;"><?= $percentage > 0 ? '+' : '' ?><?= $percentage ?>%
                                </span>

                                <span>(01h)</span>
                            </div>
                        </div>

                        <!-- Converter -->
                        <div class="row g-3 align-items-end mb-4">

                            <!-- From -->
                            <div class="col-md-4">
                                <label for="metal" class="form-label-custom">
                                    Metal
                                </label>
                                <select id="metal" class="form-select-custom" aria-label="Choose metal">
                                    <option value="gold">Gold</option>
                                    <option value="silver">Silver</option>
                                </select>
                            </div>

                            <!-- Swap -->
                            <div class="col-md-1 d-flex justify-content-center pb-1">
                                <button
                                        type="button"
                                        id="swap"
                                        class="swap-btn"
                                        aria-label="Swap currencies"
                                >
                        <span class="material-symbols-outlined"
                              style="color:var(--primary);">
                            swap_horiz
                        </span>
                                </button>
                            </div>

                            <!-- Currency -->
                            <div class="col-md-4">
                                <label for="from-sel" class="form-label-custom">
                                    Currency
                                </label>

                                <select
                                        id="from-sel"
                                        name="currency"
                                        class="form-select-custom"
                                        aria-label="Choose country"
                                >
                                    <?php foreach ($currencies as $code => [$flag, $name]): ?>
                                        <option
                                                value="<?= htmlspecialchars($code) ?>"
                                                <?= $code === $currency ? 'selected' : '' ?>
                                        >
                                            <?= htmlspecialchars($flag) ?>
                                            <?= htmlspecialchars($code) ?>
                                            — <?= htmlspecialchars($name) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Amount -->
                            <div class="col-md-3">
                                <label for="amount" class="form-label-custom">
                                    Amount (gm)
                                </label>

                                <input
                                        id="amount"
                                        name="amount"
                                        class="form-control-custom font-data-mono"
                                        type="number"
                                        value="<?= htmlspecialchars($amount) ?>"
                                        min="0"
                                        step="0.01"
                                        inputmode="decimal"
                                        aria-label="Amount to convert in <?= htmlspecialchars($currency) ?>"
                                >
                            </div>

                        </div>

                        <!-- Submit -->
                        <div class="d-flex justify-content-end mb-4">
                            <button
                                    id="convert-btn"
                                    type="submit"
                                    class="btn-primary-custom d-flex align-items-center gap-2 py-2 px-4"
                                    style="font-size:14px;"
                            >
                                Calculate

                                <span class="material-symbols-outlined"
                                      style="font-size:18px;">
                        calculate
                    </span>
                            </button>
                        </div>

                        <!-- Results -->
                        <?php if ($goldPrices !== null): ?>
                            <div class="row g-3 border-top pt-4"
                                 style="border-color:rgba(189,202,186,0.3)!important;">

                                <!-- 22K -->
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between align-items-center p-3 border rounded-3"
                                         style="background:var(--surface); border-color:rgba(189,202,186,0.3)!important;">

                                        <div>
                                <span class="d-block fw-bold"
                                      style="font-size:14px; color:var(--on-surface);">
                                    22K Gold Value
                                </span>

                                            <span
                                                    id="perGram22k"
                                                    style="font-size:12px; color:var(--text-secondary);"
                                            >
                                    @ <?= number_format($goldPrices['22K']['perGram'], 2) ?>
                                    per gram
                                </span>
                                        </div>

                                        <span
                                                id="rate22k"
                                                class="font-data-mono fw-bold"
                                                style="font-size:18px; color:var(--on-surface);"
                                        >
                                <?= number_format($goldPrices['22K']['total'], 2) ?>
                                <?= htmlspecialchars($currency) ?>
                            </span>

                                    </div>
                                </div>

                                <!-- 24K -->
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between align-items-center p-3 border rounded-3"
                                         style="background:var(--surface); border-color:rgba(189,202,186,0.3)!important;">

                                        <div>
                                <span class="d-block fw-bold"
                                      style="font-size:14px; color:var(--on-surface);">
                                    24K Gold Value
                                </span>

                                            <span
                                                    id="perGram24k"
                                                    style="font-size:12px; color:var(--text-secondary);"
                                            >
                                    @ <?= number_format($goldPrices['24K']['perGram'], 2) ?>
                                    per gram
                                </span>
                                        </div>

                                        <span
                                                id="rate24k"
                                                class="font-data-mono fw-bold"
                                                style="font-size:18px; color:var(--primary);"
                                        >
                                <?= number_format($goldPrices['24K']['total'], 2) ?>
                                <?= htmlspecialchars($currency) ?>
                            </span>

                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>

                    </div>
                </form>
            </section>

            <?= $view->render('/pages/finance/currency/standard-metal-table', [
                     'table' => $goldTable,
                     'metalType' => 'gold',
                     'currency' => $currency
            ], null) ?>

            <?= $view->render('/pages/finance/currency/graph', [
                    'base' => 'XAU',
                    'target' => $currency,
                    'period' => '24H',
                    'graph' => $graph,
            ], null) ?>

            <?= $view->render('/pages/finance/currency/hourly-comparison', [
                    'rows' => $rows,
                    'base' => $base,
                    'target' => $target,
            ], null) ?>
        </main>

        <aside class="sidebar d-flex flex-column gap-4" style="">
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




