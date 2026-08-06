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



<style>
    .cc-wrap *,
    .cc-wrap *::before,
    .cc-wrap *::after {
        box-sizing: border-box;
    }

    .cc-wrap {
        width: 100%;
        overflow-x: hidden;
    }

    /* Card */
    .cc-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 28px 24px;
        width: 100%;
        margin: 0 auto;
    }

    /* Header */
    .cc-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 4px;
    }

    .cc-header h2 {
        font-size: clamp(16px, 3.5vw, 20px);
        font-weight: 700;
        color: #0f172a;
        margin: 0;
        line-height: 1.3;
    }

    .cc-subtitle {
        font-size: 13px;
        color: #64748b;
        margin: 0 0 24px;
    }

    /* Amount field */
    .cc-amount-wrap {
        margin-bottom: 16px;
    }

    .cc-label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 6px;
    }

    .cc-amount-inner {
        position: relative;
        display: flex;
        align-items: center;
    }

    .amount-prefix {
        position: absolute;
        left: 14px;
        font-weight: 600;
        font-size: 14px;
        color: #64748b;
        pointer-events: none;
        z-index: 5;
        white-space: nowrap;
    }

    #amount {
        width: 100%;
        padding-left: 10px;
        padding-right: 12px;
        height: 44px;
        font-size: clamp(1rem, 3.5vw, 1.2rem);
        font-weight: 500;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        outline: none;
        transition: border-color 0.2s;
        appearance: none;
        -moz-appearance: textfield;
    }

    #amount:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
    }

    #amount::-webkit-inner-spin-button,
    #amount::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* silver row */
    .cc-silver-row {
        display: flex;
        align-items: flex-end;
        gap: 8px;
        margin-bottom: 16px;
        min-width: 0;
    }

    .cc-select-group {
        flex: 1 1 0;
        min-width: 0;
    }

    .cc-select-group select {
        width: 100%;
        height: 44px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        padding: 0 10px;
        font-size: clamp(13px, 2.5vw, 15px);
        color: #0f172a;
        background: #fff;
        cursor: pointer;
        outline: none;
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .cc-select-group select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
    }

    .cc-swap-wrap {
        flex: 0 0 44px;
        display: flex;
        justify-content: center;
        padding-bottom: 0;
    }

    .swap-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        transition: transform 0.3s, background 0.2s;
        flex-shrink: 0;
    }

    .swap-btn:hover { background: #e2e8f0; }
    .swap-btn.spin { transform: rotate(180deg); }

    /* Convert button */
    .cc-btn {
        width: 100%;
        padding: 14px;
        background: #2563eb;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        margin-bottom: 16px;
        transition: background 0.2s;
        letter-spacing: 0.01em;
    }

    .cc-btn:hover { background: #1d4ed8; }
    .cc-btn:active { background: #1e40af; }

    /* Divider */
    .cc-divider {
        border: none;
        border-top: 1px solid #e2e8f0;
        margin: 0 0 16px;
    }

    /* Result box — THE KEY FIX */
    .result-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 14px 16px;

        /* Changed: stack vertically on small screens, row on larger */
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    @media (min-width: 420px) {
        .result-box {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }
    }

    .result-left {
        min-width: 0;
        flex: 1 1 auto;
    }

    .result-from {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .result-value {
        font-size: clamp(1.1rem, 4vw, 1.4rem);
        font-weight: 700;
        color: #16a34a;
        word-break: break-word;
        line-height: 1.2;
    }

    .result-right {
        font-size: 12px;
        color: #64748b;
        line-height: 1.7;
        white-space: nowrap;
        flex-shrink: 0;
    }

    @media (max-width: 419px) {
        .result-right {
            white-space: normal;
            font-size: 12px;
            border-top: 1px solid #e2e8f0;
            padding-top: 8px;
        }
    }

    /* Disclaimer */
    .cc-disclaimer {
        font-size: 11px;
        color: #94a3b8;
        margin: 12px 0 0;
        line-height: 1.5;
    }

    /* Mobile tightening */
    @media (max-width: 360px) {
        .cc-card { padding: 20px 14px; }
        .cc-silver-row { gap: 6px; }
        .cc-swap-wrap { flex: 0 0 36px; }
        .swap-btn { width: 34px; height: 34px; font-size: 1rem; }
    }

    @media (max-width: 320px) {
        .cc-card { padding: 16px 10px; border-radius: 12px; }
        #amount { font-size: 0.95rem; height: 46px; }
        .cc-btn { font-size: 14px; padding: 12px; }
    }

</style>

<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">
            <section class="mb-4">
                <form action="/finance/silver" method="get" role="search" aria-label="Convert silver">
                    <div class="gold-converter-card">
                        <div class="mb-4">
                            <h2 class="fw-bold d-flex align-items-center gap-2 m-0" style="font-size:24px; color:var(--on-surface);">
                                <span class="material-symbols-outlined" style="color:var(--primary);">currency_exchange</span>Silver converter
                            </h2>
                            <p class="mt-1 mb-0" style="font-size:14px; color:var(--text-secondary);">
                                Live exchange rates for major world Silver Rate
                            </p>
                        </div>

                        <div class="alert-info-custom d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                            <div>
                                <span class="form-label-custom mb-1 text-muted" style="text-transform:none;">Today's Silver Price in <strong><?= htmlspecialchars($currencies[$currency][1]) ?></strong></span>
                                <div class="d-flex align-items-baseline gap-2">
                                    <span class="fw-bold" style="font-size:32px; color:var(--primary);">
                                        <?= number_format($silverPricePerGram, 2) ?>
                                    </span>
                                    <span style="font-size:16px; color:var(--on-surface);"><?= htmlspecialchars($currency) ?>/ 1 Gram<sup>*</sup>
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-2" style="font-size:14px; color:var(--text-secondary);">
                                <span class="material-symbols-outlined" style="color:var(--success); font-size:18px;">
                                    trending_up
                                </span>
                                <span style="color:var(--success);">
                                    +1.24%
                                </span>
                                (24h)
                            </div>
                        </div>

                        <div class="row g-3 align-items-end mb-4">
                            <div class="col-md-4">
                                <label for="metal" class="form-label-custom">
                                    Metal
                                </label>
                                <select id="metal" class="form-select-custom" aria-label="Choose metal">
                                    <option value="silver">Silver</option>
                                    <option value="gold">Gold</option>
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
                        <?php if ($silverPrices !== null): ?>
                            <div class="row g-3 border-top pt-4" style="border-color:rgba(189,202,186,0.3)!important;">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between align-items-center p-3 border rounded-3" style="background:var(--surface); border-color:rgba(189,202,186,0.3)!important;"><div>
                                            <span class="d-block fw-bold" style="font-size:14px; color:var(--on-surface);">
                                                925 Silver
                                            </span>

                                            <span id="perGram22k" style="font-size:12px; color:var(--text-secondary);">
                                                @ <?= number_format($silverPrices['925']['perGram'], 2) ?>per gram
                                            </span>
                                    </div>
                                        <span id="rate22k" class="font-data-mono fw-bold" style="font-size:18px; color:var(--on-surface);">
                                            <?= number_format($silverPrices['925']['total'], 2) ?> <?= htmlspecialchars($currency) ?>
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
                                    999 Silver
                                </span>

                                            <span
                                                    id="perGram24k"
                                                    style="font-size:12px; color:var(--text-secondary);"
                                            >
                                    @ <?= number_format($silverPrices['999']['perGram'], 2) ?>
                                    per gram
                                </span>
                                        </div>

                                        <span
                                                id="rate24k"
                                                class="font-data-mono fw-bold"
                                                style="font-size:18px; color:var(--primary);"
                                        >
                                <?= number_format($silverPrices['999']['total'], 2) ?> <?= htmlspecialchars($currency) ?>
                            </span>

                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>

                    </div>
                </form>
            </section>


            <?= $view->render('/pages/finance/currency/standard-metal-table', [
                    'table' => $silverTable,
                    'metalType' => 'silver',
                    'currency' => $currency,
                    'footer' => "Compare 925 sterling silver and 999 fine silver prices across different weights using the latest available". htmlspecialchars($currency). ' silver rate.'
            ], null) ?>


            <?= $view->render('/pages/finance/currency/graph', [
                'base' => 'XAG',
                'target' => $currency,
                'period' => '24H',
                'graph' => $graph,
            ], null) ?>

            <?= $view->render('/pages/finance/currency/hourly-comparison', [
                'rows' => $rows,
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
