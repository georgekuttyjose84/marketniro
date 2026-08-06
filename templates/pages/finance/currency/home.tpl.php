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


<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">
            <section class="filter-card mb-4">
                <form action="/finance/currency" method="get">
                    <h1 class="converter-title">Exchange Rate Today</h1>
                    <div class="converter-row">
                        <div class="converter-field">
                            <label for="amount">Amount</label>
                            <div class="field-wrap">
                                    <span class="field-prefix" id="prefix">
                                        <?= htmlspecialchars($base) ?>
                                    </span>
                                <input type="number" id="amount" name="amount" value="<?= htmlspecialchars($amount) ?>" min="0" step="0.01" inputmode="decimal"/>
                            </div>
                        </div>

                        <div class="converter-field">
                            <label for="fromCurrency">From</label>
                            <div class="field-wrap">
                                <select id="fromCurrency" name="from" aria-label="Convert from currency">
                                    <?php foreach ($currencies as $code => [$flag, $name]): ?>
                                        <option value="<?= htmlspecialchars($code) ?>"<?= $code === $base ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($flag) ?>
                                            <?= htmlspecialchars($code) ?> -
                                            <?= htmlspecialchars($name) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <span class="material-symbols-outlined select-caret">expand_more</span>
                            </div>
                        </div>
                        <div class="swap-btn-wrap">
                            <button class="swap-btn" id="swap" type="button" aria-label="Swap currencies">
                                <span class="material-symbols-outlined">swap_horiz</span>
                            </button>
                        </div>

                        <div class="converter-field">
                            <label for="toCurrency">To</label>
                            <div class="field-wrap">
                                <select id="toCurrency" name="to" aria-label="Convert to currency">
                                    <?php foreach ($currencies as $code => [$flag, $name]): ?>
                                        <option value="<?= htmlspecialchars($code) ?>"<?= $code === $target ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($flag) ?>
                                            <?= htmlspecialchars($code) ?> -
                                            <?= htmlspecialchars($name) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <span class="material-symbols-outlined select-caret">expand_more</span>
                            </div>
                        </div>
                    </div>

                    <div class="converter-result">
                        <div>
                            <p class="result-label">Converted Amount</p>

                            <p class="result-sub mb-0" id="result-from"><?= number_format($amount, 2) ?> <?= htmlspecialchars($base) ?> is </p>
                            <div class="result-value">
                                <h2 id="result-value"><?= number_format($rate * $amount, 4) ?></h2>
                                <span class="currency-code"><?= htmlspecialchars($target) ?></span>
                            </div>


                        </div>

                        <div class="converter-rates">
                            <div class="rate-row">
                                <span class="rate-label">1 <?= htmlspecialchars($base) ?></span>
                                <span class="rate-value" id="forward-rate"><?= number_format($rate, 4) ?><?= htmlspecialchars($target) ?></span>
                            </div>

                            <div class="rate-divider"></div>
                            <div class="rate-row"><span class="rate-label">1 <?= htmlspecialchars($target) ?></span>
                                <span class="rate-value" id="reverse-rate"><?= number_format(1 / $rate, 4) ?><?= htmlspecialchars($base) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="converter-footer">
                        <p class="disclaimer">
                                <span class="material-symbols-outlined" style="font-size:18px;">
                                    info
                                </span>

                            Our converter applies the mid-market rate for informational purposes.
                        </p>

                        <button class="btn-convert" type="submit" id="convert-btn">Convert
                            <span class="material-symbols-outlined" style="font-size:16px;">
                                    chevron_right
                                </span>
                        </button>

                    </div>
                </form>
            </section>

            <section class="mb-4">
                <div class="hero">
                    <div class="hero-bg">
                        <img alt="Pineapple plantation" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIvKyrVyTNMjP-m-Rmhsfsf6PYN5bWpyn0dT-sfolgMluSmvktVCGQqEwnCRABI0qY_fdPbF465StpT65umAxI3RWdlM8myM_V9OcH39jE0a23D1_a6jCOLNeqKKkcSLgShGgZww4CYolUa6UxA1otZNznQWKNkbutWTEGNYhN9cjC0WUvUKdLJb5JPmOoGlhQNIAp1QQhVQ484F-tCXS-ZxrLIZl_MdnyghYIDvTzND0C5amzgU8t">
                        <div class="hero-overlay"></div>
                    </div>
                </div>
            </section>


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

