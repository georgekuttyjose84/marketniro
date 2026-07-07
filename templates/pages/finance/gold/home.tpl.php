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

    /* gold row */
    .cc-gold-row {
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
        .cc-gold-row { gap: 6px; }
        .cc-swap-wrap { flex: 0 0 36px; }
        .swap-btn { width: 34px; height: 34px; font-size: 1rem; }
    }

    @media (max-width: 320px) {
        .cc-card { padding: 16px 10px; border-radius: 12px; }
        #amount { font-size: 0.95rem; height: 46px; }
        .cc-btn { font-size: 14px; padding: 12px; }
    }

</style>




<section class="cc-wrap" aria-label="gold converter tool">
    <form action="/finance/gold" method="get" role="search" aria-label="Convert gold">
        <div style="padding: 20px 12px;">
            <div class="cc-card">
                <div class="cc-header">
                    <i class="ti ti-gold-exchange" style="font-size:22px; color:#2563eb;" aria-hidden="true"></i>
                    <h2>Gold converter</h2>
                </div>
                <p class="cc-subtitle">Live exchange rates for major world Gold Rate</p>

                <div class="d-flex justify-content-center metal-today alert alert-info tc item-block">
                    <h2 class="no-margin"> Today's Gold Price in <strong><?= $currencies[$currency][1] ?></strong> = <?= number_format($goldPricePerGram, 2) ?><?= htmlspecialchars($currency) ?>/ 1 Gram<sup>*</sup></h2>
                </div>

                <div class="cc-gold-row">
                    <div class="cc-select-group">
                        <label for="from-sel" class="cc-label">Choose Country</label>
                        <select id="from-sel" name="currency" aria-label="Convert from gold">
                            <?php foreach ($currencies as $code => [$flag, $name]): ?>
                                <option value="<?= htmlspecialchars($code) ?>"<?= $code === $currency ? ' selected' : '' ?>>
                                    <?= htmlspecialchars($flag) ?> <?= htmlspecialchars($code) ?> — <?= htmlspecialchars($name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="cc-swap-wrap">
                        <button class="swap-btn" id="swap" type="button" aria-label="Swap currencies">⇄</button>
                    </div>

                    <div class="cc-select-group">
                        <label for="to-sel" class="cc-label">Enter Amount (gm)</label>
                        <input type="number" name="amount" value="<?= htmlspecialchars($amount) ?>"
                               id="amount" min="0" step="0.01" inputmode="decimal"
                               aria-label="Amount to convert in <?= htmlspecialchars($currency) ?>">
                    </div>
                </div>

                <button class="cc-btn" id="convert-btn" type="submit">
                    ↻ Calculate exchange rate
                </button>

                <hr class="cc-divider">

                <?php if ($goldPrices !== null): ?>
                    <div class="d-flex justify-content-center align-item-center">
                        <div class="alert alert-info tc item-block">
                            <div class="metal-title">22K Gold</div>
                            <span class="metal-rate" id="rate22k">
                                <?= number_format($goldPrices['22K']['total'], 2) ?>
                                <?= htmlspecialchars($currency) ?>
                            </span>
                            <div class="per-gram-rate" id="perGram22k">
                                <?= number_format($goldPrices['22K']['perGram'], 2) ?> per gram
                            </div>
                        </div>

                        <div class="alert alert-info tc item-block">
                            <div class="metal-title">
                                24K Gold
                            </div>
                            <span class="metal-rate" id="rate24k">
                                <?= number_format($goldPrices['24K']['total'], 2) ?>

                                <?= htmlspecialchars($currency) ?>
                            </span>

                            <div class="per-gram-rate" id="perGram24k">
                                <?= number_format($goldPrices['24K']['perGram'], 2) ?>
                                per gram
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <p class="cc-disclaimer">
                    <i class="ti ti-info-circle" style="font-size:12px; vertical-align:-1px;" aria-hidden="true"></i>
                    Indicative rates only. For accurate rates, check your bank or broker.
                </p>
            </div>
        </div>
    </form>
</section>


<?php if (!empty($goldTable)): ?>
    <div class="highlight highlight-blue">
        <table id="convratetab" class="table table-bordered table-hover">
            <thead>
            <tr>
                <td colspan="3">
                    <strong>
                        Gold Price in<?= htmlspecialchars($currency) ?>
                    </strong>
                </td>
            </tr>
            <tr>
                <th>Quantity</th>
                <th>22 carat</th>
                <th>24 carat</th>

            </tr>
            </thead>
            <tbody>

            <?php foreach ($goldTable as $row): ?>
                <tr>
                    <td>
                        <strong>
                            <?= htmlspecialchars($row['label']) ?>
                        </strong>
                        <?php if ($row['description'] !== null): ?>
                            <br>
                            <span class="text-muted t-xsmall"><?= htmlspecialchars($row['description']) ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= number_format($row['price22k'], 0) ?>
                        <?= htmlspecialchars($currency) ?>
                    </td>
                    <td>
                        <?= number_format($row['price24k'], 0) ?>
                        <?= htmlspecialchars($currency) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <p>
            Compare gold prices across different weights and
            purity levels using the latest available
            <?= htmlspecialchars($currency) ?>
            gold rate.

        </p>
    </div>

<?php endif; ?>

<script>

    document.addEventListener('DOMContentLoaded', () => {
        const fromSel  = document.getElementById('from-sel');
        const toSel    = document.getElementById('to-sel');
        const prefix   = document.getElementById('prefix');
        const swapBtn  = document.getElementById('swap');


        console.log(fromSel,toSel,prefix,swapBtn)
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
        'base' => 'XAU',
        'target' => $currency,
        'period' => '24H',
        'graph' => $graph,
], null) ?>

<?= $view->render('/pages/finance/currency/hourly-comparison', [
    'rows' => $rows,
], null) ?>
