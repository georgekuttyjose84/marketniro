<?php



$groupedPrices = [
    'green' => [],
    'ripe' => [],
];

foreach ($monthlyPriceSummary as $price) {
    $type = strtolower($price['type']);

    if (isset($groupedPrices[$type])) {
        $groupedPrices[$type][] = $price;
    }
}

?>


<section>

    <?php

    $minimumDate = '2026-01-01';
    $maximumDate = date('Y-m-d');

    $displayDate = $selectedDate !== ''
        ? $selectedDate
        : $latestPrice[0]->getPriceDate();

    $displayPrice = $selectedDate !== ''
        ? $selectedPrice
        : $latestPrice;

    ?>

    <style>
        .price-content {
            width: 100%;
            max-width: 650px;
            margin: 40px auto;
            padding: 0 15px;
        }

        .price-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .price-card-header {
            padding: 18px 24px;
            background: #198754;
        }

        .price-card-header h4 {
            margin: 0;
            color: #ffffff;
            font-size: 18px;
            font-weight: 600;
            line-height: 1.4;
        }

        .price-search-form {
            display: flex;
            align-items: flex-end;
            gap: 12px;
            padding: 20px 24px;
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;
        }

        .price-date-field {
            flex: 1;
        }

        .price-date-field label {
            display: block;
            margin-bottom: 7px;
            color: #374151;
            font-size: 13px;
            font-weight: 600;
        }

        .price-date-input {
            width: 100%;
            height: 44px;
            padding: 0 13px;
            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            color: #111827;
            font-size: 15px;
            font-family: inherit;
            outline: none;
            transition:
                    border-color 0.2s,
                    box-shadow 0.2s;
        }

        .price-date-input:focus {
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.12);
        }

        .price-search-button {
            height: 44px;
            padding: 0 22px;
            background: #198754;
            border: 1px solid #198754;
            border-radius: 8px;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            white-space: nowrap;
            transition:
                    background 0.2s,
                    border-color 0.2s,
                    transform 0.2s;
        }

        .price-search-button:hover {
            background: #157347;
            border-color: #157347;
            transform: translateY(-1px);
        }

        .price-table-wrapper {
            padding: 8px 24px;
        }

        .pricetable {
            width: 100%;
            border-collapse: collapse;
        }

        .pricetable tr:not(:last-child) {
            border-bottom: 1px solid #e5e7eb;
        }

        .pricetable td {
            padding: 18px 0;
            font-size: 17px;
            vertical-align: middle;
        }

        .pricetable td:first-child {
            color: #374151;
            font-weight: 500;
        }

        .pricetable td:last-child {
            color: #111827;
            font-size: 18px;
            font-weight: 700;
            text-align: right;
            white-space: nowrap;
        }

        .no-price-data {
            padding: 30px 20px;
            color: #6b7280;
            font-size: 15px;
            text-align: center;
        }

        @media (max-width: 576px) {
            .price-content {
                margin: 20px auto;
                padding: 0 12px;
            }

            .price-card-header {
                padding: 16px 18px;
            }

            .price-card-header h4 {
                font-size: 16px;
            }

            .price-search-form {
                flex-direction: column;
                align-items: stretch;
                padding: 18px;
            }

            .price-search-button {
                width: 100%;
            }

            .price-table-wrapper {
                padding: 4px 18px;
            }

            .pricetable td {
                padding: 16px 0;
                font-size: 16px;
            }

            .pricetable td:last-child {
                font-size: 17px;
            }
        }
    </style>


    <div class="price-content">

        <div class="price-card">

            <div class="price-card-header">

                <h4>
                    Daily Price -
                    <?= (new DateTimeImmutable($selectedDate))
                        ->format('dS M, Y') ?>
                </h4>

            </div>


            <form
                method="GET"
                class="price-search-form"
            >

                <div class="price-date-field">

                    <label for="pineapple-price-date">
                        Select price date
                    </label>

                    <input
                        type="date"
                        id="pineapple-price-date"
                        name="date"
                        class="price-date-input"
                        min="<?= $minimumDate ?>"
                        max="<?= $maximumDate ?>"
                        value="<?= htmlspecialchars($selectedDate) ?>"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="price-search-button"
                >
                    View Price
                </button>

            </form>


            <?php if ($selectedDate === ''): ?>

                <div class="price-table-wrapper">

                    <table class="pricetable">

                        <tbody>

                        <?php foreach ($latestPrice as $pineApple): ?>

                            <tr>

                                <td>
                                    <?= ucfirst(
                                        htmlspecialchars(
                                            $pineApple->getType()->value
                                        )
                                    ) ?>
                                </td>

                                <td>
                                    ₹<?= number_format(
                                        $pineApple->getMinPrice(),
                                        0
                                    ) ?>

                                    -

                                    ₹<?= number_format(
                                        $pineApple->getMaxPrice(),
                                        0
                                    ) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <div class="price-table-wrapper">

                    <table class="pricetable">

                        <tbody>

                        <?php foreach ($selectedPrice as $pineApple): ?>

                            <tr>

                                <td>
                                    <?= ucfirst(
                                        htmlspecialchars(
                                            $pineApple->getType()->value
                                        )
                                    ) ?>
                                </td>

                                <td>
                                    ₹<?= number_format(
                                        $pineApple->getMinPrice(),
                                        0
                                    ) ?>

                                    -

                                    ₹<?= number_format(
                                        $pineApple->getMaxPrice(),
                                        0
                                    ) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>

<section>
    <style>
        .price-summary-section {
            width: 100%;
            margin: 40px 0;
        }

        .price-summary-title {
            margin: 0 0 8px;
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
        }

        .price-summary-description {
            margin: 0 0 28px;
            color: #6b7280;
            font-size: 15px;
            line-height: 1.6;
        }

        .price-summary-card {
            margin-bottom: 30px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .price-summary-card:last-child {
            margin-bottom: 0;
        }

        .price-summary-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 24px;
        }

        .price-summary-header.green {
            background: linear-gradient(135deg, #198754, #157347);
        }

        .price-summary-header.ripe {
            background: linear-gradient(135deg, #e09f00, #c98700);
        }

        .price-summary-header h3 {
            margin: 0;
            color: #ffffff;
            font-size: 20px;
            font-weight: 700;
        }

        .price-summary-header span {
            padding: 5px 10px;
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.18);
            border-radius: 20px;
        }

        .price-table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .monthly-price-table {
            width: 100%;
            border-collapse: collapse;
        }

        .monthly-price-table thead {
            background: #f8fafc;
        }

        .monthly-price-table th {
            padding: 15px 20px;
            color: #64748b;
            font-size: 12px;
            font-weight: 700;
            text-align: right;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e5e7eb;
        }

        .monthly-price-table th:first-child {
            text-align: left;
        }

        .monthly-price-table td {
            padding: 18px 20px;
            color: #1f2937;
            font-size: 16px;
            text-align: right;
            border-bottom: 1px solid #eef0f2;
        }

        .monthly-price-table td:first-child {
            text-align: left;
            font-weight: 600;
        }

        .monthly-price-table tbody tr:last-child td {
            border-bottom: none;
        }

        .monthly-price-table tbody tr:hover {
            background: #fafafa;
        }

        .price-value {
            font-weight: 600;
            white-space: nowrap;
        }

        .average-price {
            font-weight: 700;
            color: #198754;
            white-space: nowrap;
        }

        .price-summary-card.ripe-card .average-price {
            color: #b77900;
        }

        @media (max-width: 576px) {
            .price-summary-section {
                margin: 25px 0;
            }

            .price-summary-title {
                font-size: 23px;
            }

            .price-summary-header {
                padding: 16px 18px;
            }

            .price-summary-header h3 {
                font-size: 18px;
            }

            .monthly-price-table {
                min-width: 500px;
            }

            .monthly-price-table th,
            .monthly-price-table td {
                padding: 14px 16px;
            }
        }
    </style>


    <div class="price-summary-section">

        <h2 class="price-summary-title">
            Pineapple Price Summary
        </h2>

        <p class="price-summary-description">
            Monthly minimum, maximum and average pineapple prices
            calculated from daily average prices.
        </p>


        <!-- GREEN PINEAPPLE TABLE -->

        <div class="price-summary-card">

            <div class="price-summary-header green">
                <h3>Green Pineapple</h3>
                <span>Last 3 Months</span>
            </div>

            <div class="price-table-wrapper">

                <table class="monthly-price-table">

                    <thead>
                    <tr>
                        <th>Month</th>
                        <th>Minimum</th>
                        <th>Maximum</th>
                        <th>Average</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($groupedPrices['green'] as $price): ?>

                        <tr>
                            <td>
                                <?= htmlspecialchars($price['month_name']) ?>
                            </td>

                            <td>
                                <span class="price-value">
                                    ₹<?= number_format((float) $price['min_price'], 2) ?>
                                </span>
                            </td>

                            <td>
                                <span class="price-value">
                                    ₹<?= number_format((float) $price['max_price'], 2) ?>
                                </span>
                            </td>

                            <td>
                                <span class="average-price">
                                    ₹<?= number_format((float) $price['avg_price'], 2) ?>
                                </span>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>


        <!-- RIPE PINEAPPLE TABLE -->

        <div class="price-summary-card ripe-card">

            <div class="price-summary-header ripe">
                <h3>Ripe Pineapple</h3>
                <span>Last 3 Months</span>
            </div>

            <div class="price-table-wrapper">

                <table class="monthly-price-table">

                    <thead>
                    <tr>
                        <th>Month</th>
                        <th>Minimum</th>
                        <th>Maximum</th>
                        <th>Average</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($groupedPrices['ripe'] as $price): ?>

                        <tr>
                            <td>
                                <?= htmlspecialchars($price['month_name']) ?>
                            </td>

                            <td>
                                <span class="price-value">
                                    ₹<?= number_format((float) $price['min_price'], 2) ?>
                                </span>
                            </td>

                            <td>
                                <span class="price-value">
                                    ₹<?= number_format((float) $price['max_price'], 2) ?>
                                </span>
                            </td>

                            <td>
                                <span class="average-price">
                                    ₹<?= number_format((float) $price['avg_price'], 2) ?>
                                </span>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</section>

<section>
    <?= $view->render('/pages/agriculture/pineapple/graph', [
        'lastSevenDaysPrice' => $lastSevenDaysPrice,
    ], null) ?>
</section>




