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
    .swap-btn i { transition: transform 0.3s; }
    .swap-btn.spin i { transform: rotate(180deg); }
    .amount-prefix {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        font-weight: 600;
        color: #64748b;
        pointer-events: none;
        z-index: 5;
    }
    #amount { padding-left: 56px; font-size: 1.25rem; font-weight: 500; height: 52px; }
    .result-box { background: #f8fafc; border: 1px solid #e2e8f0; }
    .result-value { font-size: 1.4rem; font-weight: 700; color: #16a34a; }
    .flag-select option { font-size: 1rem; }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<section class="cc-wrap">
    <form action="/finance/currency" method="get">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0 rounded-4 p-4">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="fs-4 text-primary">💱</span>
                            <h1 class="h5 fw-semibold mb-0">Currency converter</h1>
                        </div>
                        <p class="text-secondary small mb-4">Live exchange rates for major world currencies</p>
                        <div class="mb-3">
                            <label for="amount" class="form-label fw-semibold small text-secondary">Amount</label>
                            <div class="position-relative">
                                <span class="amount-prefix" id="prefix"><?= $base ?></span>
                                <input type="number" name="amount" value="<?=$amount?>" id="amount" class="form-control form-control-lg" min="0" step="0.01" inputmode="decimal" aria-label="Amount to convert">
                            </div>
                        </div>
                        <div class="row align-items-end g-2 mb-3">
                            <div class="col">
                                <label for="from-sel" class="form-label fw-semibold small text-secondary">From</label>
                                <select id="from-sel" name="from" class="form-select">
                                    <?php foreach ($currencies as $code => [$flag, $name]): ?>
                                        <option value="<?= $code ?>"<?= $code === $base ? 'selected' : '' ?>><?= $flag ?> <?= $code ?> — <?= $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-auto pb-1">
                                <button class="btn btn-light border rounded-circle swap-btn p-0 d-flex align-items-center justify-content-center"
                                        id="swap" type="button" aria-label="Swap currencies"
                                        style="width:40px;height:40px;">
                                    <i style="font-size:1.1rem;">⇄</i>
                                </button>
                            </div>

                            <div class="col">
                                <label for="to-sel" class="form-label fw-semibold small text-secondary">To</label>
                                <select id="to-sel" name="to" class="form-select">
                                    <?php foreach ($currencies as $code => [$flag, $name]): ?>
                                        <option value="<?= $code ?>"<?= $code === $target ? 'selected' : '' ?>>
                                            <?= $flag ?> <?= $code ?> — <?= $name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100 py-3 fw-semibold mb-3" id="convert-btn">
                        ↻ Calculate
                        </button>

                        <hr class="text-secondary opacity-25 mb-3">

                        <div class="result-box rounded-3 p-3 d-flex justify-content-between align-items-center"
                             id="result-box" role="region" aria-live="polite" aria-label="Conversion result">
                            <div>
                                <div class="small text-secondary mb-1" id="result-from"><?= $amount ?> <?= $base ?> =</div>
                                <div class="result-value" id="result-value"><?=$rate * $amount ?> <?=$target?></div>
                            </div>
                            <div class="text-end small text-secondary lh-lg" id="result-rate">
                                1 <?= $base ?> = <?= $rate ?> <?=$target?><br>1 <?=$target?> = <?= 1/$rate ?> <?= $base ?>
                            </div>
                        </div>
                        <p class="text-secondary mt-3 mb-0" style="font-size:0.75rem;">
                            ℹ️ Indicative rates only. For accurate rates, check your bank or broker.
                        </p>
                    </div>
                </div>
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

<?= $view->render(
        'pages/finance/common/trending-currency',
        [
                'main_currency_list' => $main_currency_list
        ],
        null
) ?>


