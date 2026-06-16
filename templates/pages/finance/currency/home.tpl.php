<?php

$page = $page ?? [];

$h1 = $page['h1'] ?? '';

$description = $page['description'] ?? '';



$base = $currency_value->getBaseCurrency();
$target = $currency_value->getTargetCurrency();
$rate = $currency_value->getAmount();



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

<section class="currency-page-header">
    <nav class="breadcrumb-nav">
        <a href="/">Home</a>
        <span>/</span>
        <span>Finance</span>
        <span>/</span>
        <span>Currency</span>
    </nav>

    <div class="currency-header-wrapper">
        <div class="currency-header-content">
            <h1>
                <?= htmlspecialchars($h1) ?>
            </h1>
            <p class="currency-description">
                <?= htmlspecialchars($description) ?>
            </p>
        </div>
    </div>

    <div class="currency-share">
        <span class="share-label">
            Share
        </span>
        <a href="#" class="share-icon facebook" aria-label="Share on Facebook">
            <i class="bi bi-facebook"></i>
        </a>
        <a href="#" class="share-icon twitter" aria-label="Share on X">
            <i class="bi bi-twitter-x"></i>
        </a>
        <a href="#" class="share-icon linkedin" aria-label="Share on LinkedIn">
            <i class="bi bi-linkedin"></i>
        </a>
        <a href="#" class="share-icon whatsapp" aria-label="Share on WhatsApp">
            <i class="bi bi-whatsapp"></i>
        </a>
        <button class="share-icon copy-link" type="button">
            🔗
        </button>
    </div>
</section>

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
        padding-left: 56px;
        padding-right: 12px;
        height: 52px;
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

    /* Currency row */
    .cc-currency-row {
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
        .cc-currency-row { gap: 6px; }
        .cc-swap-wrap { flex: 0 0 36px; }
        .swap-btn { width: 34px; height: 34px; font-size: 1rem; }
    }

    @media (max-width: 320px) {
        .cc-card { padding: 16px 10px; border-radius: 12px; }
        #amount { font-size: 0.95rem; height: 46px; }
        .cc-btn { font-size: 14px; padding: 12px; }
    }
</style>

<section class="cc-wrap" aria-label="Currency converter tool">
    <form action="/finance/currency" method="get" role="search" aria-label="Convert currency">
        <div style="padding: 20px 12px;">
            <div class="cc-card">

                <div class="cc-header">
                    <i class="ti ti-currency-exchange" style="font-size:22px; color:#2563eb;" aria-hidden="true"></i>
                    <h2>Currency converter</h2>
                </div>
                <p class="cc-subtitle">Live exchange rates for major world currencies</p>

                <div class="cc-amount-wrap">
                    <label for="amount" class="cc-label">Amount</label>
                    <div class="cc-amount-inner">
                        <span class="amount-prefix" id="prefix" aria-hidden="true"><?= htmlspecialchars($base) ?></span>
                        <input
                                type="number"
                                name="amount"
                                value="<?= htmlspecialchars($amount) ?>"
                                id="amount"
                                min="0"
                                step="0.01"
                                inputmode="decimal"
                                aria-label="Amount to convert in <?= htmlspecialchars($base) ?>"
                        >
                    </div>
                </div>

                <div class="cc-currency-row">
                    <div class="cc-select-group">
                        <label for="from-sel" class="cc-label">From</label>
                        <select id="from-sel" name="from" aria-label="Convert from currency">
                            <?php foreach ($currencies as $code => [$flag, $name]): ?>
                                <option value="<?= htmlspecialchars($code) ?>"<?= $code === $base ? ' selected' : '' ?>>
                                    <?= htmlspecialchars($flag) ?> <?= htmlspecialchars($code) ?> — <?= htmlspecialchars($name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="cc-swap-wrap">
                        <button
                                class="swap-btn"
                                id="swap"
                                type="button"
                                aria-label="Swap currencies"
                        >⇄</button>
                    </div>

                    <div class="cc-select-group">
                        <label for="to-sel" class="cc-label">To</label>
                        <select id="to-sel" name="to" aria-label="Convert to currency">
                            <?php foreach ($currencies as $code => [$flag, $name]): ?>
                                <option value="<?= htmlspecialchars($code) ?>"<?= $code === $target ? ' selected' : '' ?>>
                                    <?= htmlspecialchars($flag) ?> <?= htmlspecialchars($code) ?> — <?= htmlspecialchars($name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <button class="cc-btn" id="convert-btn" type="submit">
                    ↻ Calculate exchange rate
                </button>

                <hr class="cc-divider">

                <div
                        class="result-box"
                        id="result-box"
                        role="region"
                        aria-live="polite"
                        aria-label="Conversion result"
                >
                    <div class="result-left">
                        <div class="result-from" id="result-from">
                            <?= htmlspecialchars($amount) ?> <?= htmlspecialchars($base) ?> =
                        </div>
                        <div class="result-value" id="result-value">
                            <?= number_format($rate * $amount, 4) ?> <?= htmlspecialchars($target) ?>
                        </div>
                    </div>
                    <div class="result-right" id="result-rate">
                        1 <?= htmlspecialchars($base) ?> = <?= number_format($rate, 4) ?> <?= htmlspecialchars($target) ?><br>
                        1 <?= htmlspecialchars($target) ?> = <?= number_format(1 / $rate, 4) ?> <?= htmlspecialchars($base) ?>
                    </div>
                </div>

                <p class="cc-disclaimer">
                    <i class="ti ti-info-circle" style="font-size:12px; vertical-align:-1px;" aria-hidden="true"></i>
                    Indicative rates only. For accurate rates, check your bank or broker.
                </p>
            </div>
        </div>
    </form>
</section>

<script>

    document.addEventListener('DOMContentLoaded', () => {
        const fromSel  = document.getElementById('from-sel');
        const toSel    = document.getElementById('to-sel');
        const prefix   = document.getElementById('prefix');
        const swapBtn  = document.getElementById('swap');
        function updatePrefix() {
            prefix.textContent = fromSel.value;
        }
        updatePrefix();
        fromSel.addEventListener('change', updatePrefix);
        swapBtn.addEventListener('click', () => {
            const temp = fromSel.value;
            fromSel.value = toSel.value;
            toSel.value = temp;
            updatePrefix();
            swapBtn.classList.add('spin');
            setTimeout(() => {

                swapBtn.classList.remove('spin');

            }, 300);
        });
    });
</script>





<?= $view->render('/pages/finance/currency/graph', [
        'history' => $history,
        'base' => $base,
        'target' => $target,
        'period' => '24H',
        'graph' => $graph,
], null) ?>

<?= $view->render('/pages/finance/currency/hourly-comparison', [
        'rows' => $rows,
], null) ?>

<?= $view->render(
        'pages/finance/common/trending-currency',
        [
                'main_currency_list' => $main_currency_list
        ],
        null
) ?>



<style>

    .currency-seo-content{
        max-width:900px;
        margin:60px auto;
        padding:0 20px;
        line-height:1.9;
        color:#334155;
    }

    .currency-seo-content h2{
        font-size:28px;
        font-weight:700;
        color:#0f172a;
        margin-top:50px;
        margin-bottom:18px;
    }

    .currency-seo-content p{
        margin-bottom:18px;
        font-size:16px;
    }

    .currency-seo-content ul{
        margin:20px 0;
        padding-left:24px;
    }

    .currency-seo-content li{
        margin-bottom:10px;
    }

    .currency-seo-disclaimer{
        margin-top:40px;
        background:#fff8e1;
        border:1px solid #fde68a;
        border-radius:10px;
        padding:18px;
        font-size:14px;
        color:#854d0e;
    }

    @media(max-width:768px){

        .currency-seo-content{
            margin:40px auto;
        }

        .currency-seo-content h2{
            font-size:22px;
        }

    }

</style>

<section class="currency-seo-content">

    <h2>
        About the <?= htmlspecialchars($base) ?> to <?= htmlspecialchars($target) ?> Exchange Rate
    </h2>

    <p>
        The <strong><?= htmlspecialchars($base) ?> to <?= htmlspecialchars($target) ?></strong>
        exchange rate represents how many
        <strong><?= htmlspecialchars($target) ?></strong> are required to purchase
        one <strong><?= htmlspecialchars($base) ?></strong>.
        Foreign exchange rates fluctuate continuously as global financial markets
        respond to economic data, interest rate decisions, inflation reports,
        geopolitical events, and international trade activity.
    </p>

    <p>
        This currency converter provides live indicative exchange rates to help
        travelers, investors, businesses, students, freelancers, and international
        shoppers quickly estimate conversion values using the latest available
        market data.
    </p>

    <h2>
        What affects the <?= htmlspecialchars($base) ?>/<?= htmlspecialchars($target) ?> exchange rate?
    </h2>

    <p>
        Exchange rates move throughout the day based on multiple economic and
        financial factors including:
    </p>

    <ul>
        <li>Central bank interest rate decisions</li>
        <li>Inflation and employment reports</li>
        <li>Economic growth and GDP data</li>
        <li>International trade balances</li>
        <li>Global political and economic events</li>
        <li>Commodity prices and oil markets</li>
        <li>Investor confidence and market sentiment</li>
    </ul>

    <h2>
        Historical Exchange Rate Analysis
    </h2>

    <p>
        The historical exchange rate chart above allows users to monitor recent
        price movements between
        <strong><?= htmlspecialchars($base) ?></strong>
        and
        <strong><?= htmlspecialchars($target) ?></strong>.
        By comparing recent hourly and daily movements, users can better understand
        short-term volatility and market direction before making currency exchange
        decisions.
    </p>

    <h2>
        Why use this currency converter?
    </h2>

    <p>
        Our free currency converter helps users calculate real-time exchange values
        for international payments, travel planning, online shopping, investments,
        remittances, import and export transactions, and business accounting.
        The tool supports hundreds of currency pairs and provides both current
        conversion rates and historical market information.
    </p>

    <h2>
        Tips before exchanging currency
    </h2>

    <ul>
        <li>Compare rates from multiple banks and money transfer providers.</li>
        <li>Remember that banks usually add a margin over the market exchange rate.</li>
        <li>Watch historical trends before making large international transfers.</li>
        <li>Check transfer fees in addition to the quoted exchange rate.</li>
        <li>Exchange rates can change every minute during market trading hours.</li>
    </ul>

    <h2>
        Frequently Used Currency Conversions
    </h2>

    <p>
        Users also frequently search for exchange rates including USD to EUR,
        USD to GBP, EUR to INR, GBP to INR, AED to INR, CAD to INR, AUD to INR,
        SGD to INR, JPY to INR, and many other international currency pairs.
        Our converter makes switching between currencies quick and simple using
        the live market exchange rate.
    </p>

    <div class="currency-seo-disclaimer">

        <strong>Disclaimer:</strong>

        Exchange rates displayed on this page are indicative mid-market rates
        intended for informational purposes only. Financial institutions,
        banks, payment providers, and currency exchange services may apply
        additional fees or margins to the final conversion rate.

    </div>

</section>


<?php
/*
 * ─────────────────────────────────────────────────────────────────
 *  SEO CONTENT + FAQ BLOCK
 *  Drop this AFTER the last $view->render() call.
 *  No existing CSS, functions, or variables are touched.
 * ─────────────────────────────────────────────────────────────────
 */

$faq_items = [
        [
                'q' => 'How is the ' . htmlspecialchars($base) . ' to ' . htmlspecialchars($target) . ' exchange rate calculated?',
                'a' => 'Our tool fetches the mid-market rate — the midpoint between the global buy and sell price for ' . htmlspecialchars($base) . '/' . htmlspecialchars($target) . '. This is the rate you see on financial data providers like Reuters or Bloomberg. Banks and money-transfer services add a margin on top of this rate, so the rate you receive in practice will differ slightly.',
        ],
        [
                'q' => 'How often is the ' . htmlspecialchars($base) . '/' . htmlspecialchars($target) . ' rate updated?',
                'a' => 'Exchange rates are updated continuously during forex market hours (Sunday 5 pm EST to Friday 5 pm EST). The rate shown reflects the latest available mid-market price. Rates displayed outside market hours are the last known closing rate.',
        ],
        [
                'q' => 'Is the rate shown the same rate my bank or transfer service will give me?',
                'a' => 'No. Banks, brokers, and money-transfer apps apply their own margin — typically between 0.5% and 3% — on top of the mid-market rate. Always check the exact rate your provider will apply before completing a transfer.',
        ],
        [
                'q' => 'What factors affect the ' . htmlspecialchars($base) . ' to ' . htmlspecialchars($target) . ' exchange rate?',
                'a' => 'The key drivers are: interest rate decisions by central banks (e.g. the US Federal Reserve or the Reserve Bank of India), inflation data, trade balance figures, geopolitical events, and overall market sentiment toward risk assets. Large institutional trades can also cause short-term intraday movements.',
        ],
        [
                'q' => 'Can I use this converter to calculate historical exchange rates?',
                'a' => 'The main converter shows the live mid-market rate. The chart and hourly comparison table on this page show recent historical data, letting you compare how the ' . htmlspecialchars($base) . '/' . htmlspecialchars($target) . ' rate has moved over the past 24 hours and day-over-day.',
        ],
        [
                'q' => 'How do I convert ' . htmlspecialchars($target) . ' back to ' . htmlspecialchars($base) . '?',
                'a' => 'Click the ⇄ swap button between the two currency selectors. The converter will instantly reverse the pair and recalculate. The result box always shows both directions of the rate (1 ' . htmlspecialchars($base) . ' = X ' . htmlspecialchars($target) . ' and 1 ' . htmlspecialchars($target) . ' = X ' . htmlspecialchars($base) . ').',
        ],
        [
                'q' => 'Is this currency converter free to use?',
                'a' => 'Yes, completely free with no account or sign-up required. You can convert any amount between ' . count($currencies) . '+ world currencies instantly.',
        ],
];
?>

<style>
    /* ── SEO content wrapper ── */
    .seo-content-wrap {
        max-width: 860px;
        margin: 48px auto 0;
        padding: 0 16px;
        box-sizing: border-box;
    }

    /* ── Section headings ── */
    .seo-section-title {
        font-size: clamp(18px, 3vw, 22px);
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 12px;
        line-height: 1.3;
    }

    .seo-section-intro {
        font-size: 15px;
        color: #475569;
        line-height: 1.75;
        margin: 0 0 28px;
    }

    /* ── Feature grid ── */
    .seo-feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 16px;
        margin-bottom: 48px;
    }

    .seo-feature-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px 18px;
        box-sizing: border-box;
    }

    .seo-feature-card-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #eff6ff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
        font-size: 20px;
        color: #2563eb;
        flex-shrink: 0;
    }

    .seo-feature-card h3 {
        font-size: 15px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 6px;
        line-height: 1.3;
    }

    .seo-feature-card p {
        font-size: 13px;
        color: #64748b;
        line-height: 1.65;
        margin: 0;
    }

    /* ── How to use steps ── */
    .seo-steps {
        counter-reset: step-counter;
        list-style: none;
        padding: 0;
        margin: 0 0 48px;
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .seo-step {
        display: flex;
        gap: 16px;
        padding: 20px 0;
        border-bottom: 1px solid #e2e8f0;
        box-sizing: border-box;
    }

    .seo-step:last-child {
        border-bottom: none;
    }

    .seo-step-num {
        counter-increment: step-counter;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #2563eb;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .seo-step-body h3 {
        font-size: 15px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 4px;
    }

    .seo-step-body p {
        font-size: 14px;
        color: #64748b;
        line-height: 1.65;
        margin: 0;
    }

    /* ── FAQ accordion ── */
    .seo-faq-section {
        margin-bottom: 56px;
    }

    .seo-faq-list {
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
    }

    .seo-faq-item {
        border-bottom: 1px solid #e2e8f0;
    }

    .seo-faq-item:last-child {
        border-bottom: none;
    }

    .seo-faq-q {
        width: 100%;
        background: none;
        border: none;
        text-align: left;
        padding: 18px 20px;
        font-size: clamp(14px, 2.5vw, 15px);
        font-weight: 600;
        color: #0f172a;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        line-height: 1.4;
        box-sizing: border-box;
        transition: background 0.15s;
    }

    .seo-faq-q:hover {
        background: #f8fafc;
    }

    .seo-faq-q[aria-expanded="true"] {
        background: #f8fafc;
        color: #2563eb;
    }

    .seo-faq-chevron {
        font-size: 18px;
        color: #94a3b8;
        flex-shrink: 0;
        transition: transform 0.25s;
        line-height: 1;
    }

    .seo-faq-q[aria-expanded="true"] .seo-faq-chevron {
        transform: rotate(180deg);
        color: #2563eb;
    }

    .seo-faq-a {
        display: none;
        padding: 0 20px 18px 20px;
        font-size: 14px;
        color: #475569;
        line-height: 1.75;
        box-sizing: border-box;
    }

    .seo-faq-a.open {
        display: block;
    }

    /* ── Disclaimer box ── */
    .seo-disclaimer-box {
        background: #fffbeb;
        border: 1px solid #fde68a;
        border-radius: 10px;
        padding: 16px 18px;
        font-size: 13px;
        color: #92400e;
        line-height: 1.65;
        margin-bottom: 48px;
        display: flex;
        gap: 10px;
        align-items: flex-start;
        box-sizing: border-box;
    }

    .seo-disclaimer-box i {
        font-size: 18px;
        flex-shrink: 0;
        margin-top: 1px;
        color: #d97706;
    }

    /* ── Mobile ── */
    @media (max-width: 480px) {
        .seo-content-wrap {
            margin-top: 32px;
            padding: 0 12px;
        }
        .seo-faq-q {
            padding: 15px 14px;
        }
        .seo-faq-a {
            padding: 0 14px 14px;
        }
        .seo-feature-card {
            padding: 16px 14px;
        }
    }

    @media (max-width: 360px) {
        .seo-content-wrap {
            padding: 0 8px;
        }
        .seo-section-title {
            font-size: 16px;
        }
    }
</style>


<div class="seo-content-wrap">

    <!-- ① WHY USE THIS CONVERTER -->
    <section aria-labelledby="why-use-heading">
        <h2 class="seo-section-title" id="why-use-heading">
            Why use this <?= htmlspecialchars($base) ?> to <?= htmlspecialchars($target) ?> currency converter?
        </h2>
        <p class="seo-section-intro">
            Whether you're sending money abroad, tracking a forex position, or planning an international trip,
            getting an accurate exchange rate matters. Our converter uses live mid-market rates —
            the fairest benchmark — updated continuously during global forex trading hours.
        </p>

        <div class="seo-feature-grid">
            <div class="seo-feature-card">
                <div class="seo-feature-card-icon" aria-hidden="true">
                    <i class="ti ti-bolt"></i>
                </div>
                <h3>Live mid-market rates</h3>
                <p>Rates sourced from global forex markets, reflecting the real interbank exchange rate for <?= htmlspecialchars($base) ?>/<?= htmlspecialchars($target) ?>.</p>
            </div>
            <div class="seo-feature-card">
                <div class="seo-feature-card-icon" aria-hidden="true">
                    <i class="ti ti-arrows-exchange"></i>
                </div>
                <h3><?= count($currencies) ?>+ world currencies</h3>
                <p>Convert between all major and most minor world currencies in a single click. No account needed.</p>
            </div>
            <div class="seo-feature-card">
                <div class="seo-feature-card-icon" aria-hidden="true">
                    <i class="ti ti-chart-line"></i>
                </div>
                <h3>Hourly trend analysis</h3>
                <p>The hourly comparison table below shows how <?= htmlspecialchars($base) ?>/<?= htmlspecialchars($target) ?> has moved hour by hour versus yesterday.</p>
            </div>
            <div class="seo-feature-card">
                <div class="seo-feature-card-icon" aria-hidden="true">
                    <i class="ti ti-device-mobile"></i>
                </div>
                <h3>Works on any device</h3>
                <p>Fully optimised for mobile, tablet, and desktop — convert currencies on the go from any screen size.</p>
            </div>
        </div>
    </section>

    <!-- ② HOW TO USE -->
    <section aria-labelledby="how-to-heading">
        <h2 class="seo-section-title" id="how-to-heading">
            How to convert <?= htmlspecialchars($base) ?> to <?= htmlspecialchars($target) ?>
        </h2>
        <p class="seo-section-intro">
            Follow these four simple steps to get your currency conversion result instantly.
        </p>

        <ol class="seo-steps">
            <li class="seo-step">
                <div class="seo-step-num" aria-hidden="true">1</div>
                <div class="seo-step-body">
                    <h3>Enter the amount</h3>
                    <p>Type the amount you want to convert in the Amount field at the top of the converter. Any positive number is accepted, including decimals.</p>
                </div>
            </li>
            <li class="seo-step">
                <div class="seo-step-num" aria-hidden="true">2</div>
                <div class="seo-step-body">
                    <h3>Select your currencies</h3>
                    <p>Choose the source currency in the "From" dropdown and the destination currency in the "To" dropdown. Use the ⇄ swap button to instantly reverse the pair.</p>
                </div>
            </li>
            <li class="seo-step">
                <div class="seo-step-num" aria-hidden="true">3</div>
                <div class="seo-step-body">
                    <h3>Click "Calculate exchange rate"</h3>
                    <p>Press the blue Calculate button. The result box will show the converted amount along with both directions of the current exchange rate.</p>
                </div>
            </li>
            <li class="seo-step">
                <div class="seo-step-num" aria-hidden="true">4</div>
                <div class="seo-step-body">
                    <h3>Review the trend chart</h3>
                    <p>Scroll down to the hourly comparison table and 24-hour chart to understand whether the rate is currently higher or lower than recent averages.</p>
                </div>
            </li>
        </ol>
    </section>

    <!-- ③ DISCLAIMER -->
    <div class="seo-disclaimer-box" role="note" aria-label="Rate disclaimer">
        <i class="ti ti-alert-triangle" aria-hidden="true"></i>
        <span>
            <strong>Indicative rates only.</strong>
            The mid-market rate displayed here is a reference rate and is not the rate you will receive from your bank,
            broker, or money-transfer provider. Always confirm the final rate directly with your financial institution
            before completing any transaction. Exchange rates fluctuate continuously.
        </span>
    </div>

    <!-- ④ FAQ -->
    <section class="seo-faq-section" aria-labelledby="faq-heading">
        <h2 class="seo-section-title" id="faq-heading">
            Frequently asked questions about <?= htmlspecialchars($base) ?> to <?= htmlspecialchars($target) ?> conversion
        </h2>
        <p class="seo-section-intro">
            Everything you need to know about how this converter works and how exchange rates are set.
        </p>

        <div class="seo-faq-list" itemscope itemtype="https://schema.org/FAQPage">
            <?php foreach ($faq_items as $i => $faq): ?>
                <div class="seo-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button
                            class="seo-faq-q"
                            aria-expanded="false"
                            aria-controls="faq-answer-<?= $i ?>"
                            id="faq-btn-<?= $i ?>"
                            itemprop="name"
                    >
                        <?= $faq['q'] ?>
                        <span class="seo-faq-chevron" aria-hidden="true">&#8964;</span>
                    </button>
                    <div
                            class="seo-faq-a"
                            id="faq-answer-<?= $i ?>"
                            role="region"
                            aria-labelledby="faq-btn-<?= $i ?>"
                            itemscope
                            itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer"
                    >
                        <span itemprop="text"><?= $faq['a'] ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</div>


<!-- ═══════════════════════════════════════════════════
     STRUCTURED DATA / JSON-LD SCHEMA
     Three schemas: FAQPage + HowTo + WebPage
     Injected in <script> at bottom — no render blocking
════════════════════════════════════════════════════ -->
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
    <?php foreach ($faq_items as $i => $faq): ?>
    {
      "@type": "Question",
      "name": "<?= addslashes($faq['q']) ?>",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "<?= addslashes($faq['a']) ?>"
      }
    }<?= $i < count($faq_items) - 1 ? ',' : '' ?>
    <?php endforeach; ?>
    ]
  }
</script>

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "HowTo",
      "name": "How to convert <?= addslashes($base) ?> to <?= addslashes($target) ?> using the currency converter",
  "description": "Step-by-step guide to converting <?= addslashes($base) ?> to <?= addslashes($target) ?> using the live mid-market rate converter.",
  "totalTime": "PT1M",
  "step": [
    {
      "@type": "HowToStep",
      "position": 1,
      "name": "Enter the amount",
      "text": "Type the amount you want to convert in the Amount field at the top of the converter."
    },
    {
      "@type": "HowToStep",
      "position": 2,
      "name": "Select your currencies",
      "text": "Choose <?= addslashes($base) ?> in the From dropdown and <?= addslashes($target) ?> in the To dropdown, or use the swap button to reverse the pair."
    },
    {
      "@type": "HowToStep",
      "position": 3,
      "name": "Click Calculate exchange rate",
      "text": "Press the Calculate button to see the converted amount and the current mid-market rate for <?= addslashes($base) ?>/<?= addslashes($target) ?>."
    },
    {
      "@type": "HowToStep",
      "position": 4,
      "name": "Review the trend chart",
      "text": "Use the hourly comparison table and 24-hour chart to analyse recent rate movements for <?= addslashes($base) ?>/<?= addslashes($target) ?>."
    }
  ]
}
</script>

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "<?= addslashes($h1) ?>",
  "description": "<?= addslashes($description) ?>",
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Home", "item": "/" },
      { "@type": "ListItem", "position": 2, "name": "Finance", "item": "/finance" },
      { "@type": "ListItem", "position": 3, "name": "Currency", "item": "/finance/currency" }
    ]
  },
  "speakable": {
    "@type": "SpeakableSpecification",
    "cssSelector": [".currency-description", ".seo-section-intro"]
  }
}
</script>


<!-- ═══════════════ FAQ ACCORDION JS ═══════════════ -->
<script>
    (function () {
        document.querySelectorAll('.seo-faq-q').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var expanded = btn.getAttribute('aria-expanded') === 'true';
                var answerId = btn.getAttribute('aria-controls');
                var answer   = document.getElementById(answerId);

                /* collapse all others */
                document.querySelectorAll('.seo-faq-q').forEach(function (b) {
                    b.setAttribute('aria-expanded', 'false');
                    var a = document.getElementById(b.getAttribute('aria-controls'));
                    if (a) a.classList.remove('open');
                });

                /* toggle clicked */
                if (!expanded) {
                    btn.setAttribute('aria-expanded', 'true');
                    if (answer) answer.classList.add('open');
                }
            });
        });
    })();
</script>