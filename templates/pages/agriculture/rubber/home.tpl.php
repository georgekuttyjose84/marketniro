<?php

use App\Domain\Enum\RubberPlace;


/*
|--------------------------------------------------------------------------
| Domestic price date
|--------------------------------------------------------------------------
*/

$domesticDate = null;

foreach ($domesticPrice as $prices) {
    if (!empty($prices)) {
        $domesticDate = $prices[0]->priceDate;
        break;
    }
}


/*
|--------------------------------------------------------------------------
| International price date
|--------------------------------------------------------------------------
*/

$internationalDate = null;

foreach ($internationalPrice as $prices) {
    if (!empty($prices)) {
        $internationalDate = $prices[0]->priceDate;
        break;
    }
}

?>


<style>

    /*
    |--------------------------------------------------------------------------
    | Market section
    |--------------------------------------------------------------------------
    */

    .rubber-market-section {
        margin-bottom: 32px;
        border: 1px solid #dfe5e1;
        border-radius: 10px;
        background: #ffffff;
        overflow: hidden;
    }


    /*
    |--------------------------------------------------------------------------
    | Market header
    |--------------------------------------------------------------------------
    */

    .rubber-market-header {
        padding: 20px 24px;
        background: #f7faf8;
        border-bottom: 1px solid #dfe5e1;
    }

    .rubber-market-header h2 {
        margin: 0 0 6px;
        font-size: 24px;
        font-weight: 700;
        line-height: 1.3;
    }

    .rubber-price-date {
        margin: 0;
        color: #6c757d;
        font-size: 14px;
    }

    .rubber-price-date strong {
        color: #212529;
    }


    /*
    |--------------------------------------------------------------------------
    | Tabs
    |--------------------------------------------------------------------------
    */

    .rubber-tab-container {
        padding: 18px 24px 0;
        border-bottom: 1px solid #dee2e6;
        background: #ffffff;
    }

    .rubber-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin: 0;
        padding: 0;
        border-bottom: 0;
        list-style: none;
    }

    .rubber-tabs li {
        margin: 0;
    }

    .rubber-tabs li a {
        display: block;
        padding: 10px 18px;
        border: 1px solid #dee2e6;
        border-bottom: 0;
        border-radius: 6px 6px 0 0;
        background: #f8f9fa;
        color: #495057;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
        cursor: pointer;

        transition:
                background 0.2s ease,
                color 0.2s ease,
                border-color 0.2s ease;
    }

    .rubber-tabs li a:hover {
        background: #eef5f0;
        color: #198754;
        text-decoration: none;
    }

    .rubber-tabs li a.active {
        border-color: #198754;
        background: #198754;
        color: #ffffff;
    }


    /*
    |--------------------------------------------------------------------------
    | Tab content
    |--------------------------------------------------------------------------
    */

    .rubber-tab-content {
        padding: 24px;
    }

    .rubber-tab-content > .tab-pane {
        display: none;
    }

    .rubber-tab-content > .tab-pane.active {
        display: block;
    }


    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    */

    .rubber-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .rubber-table thead th {
        padding: 13px 15px;
        border-color: #dfe5e1;
        background: #f4f7f5;
        color: #343a40;
        font-size: 14px;
        font-weight: 700;
        vertical-align: middle;
    }

    .rubber-table tbody td {
        padding: 14px 15px;
        border-color: #e5e9e6;
        font-size: 15px;
        vertical-align: middle;
    }

    .rubber-table tbody tr:hover {
        background: #f8fbf9;
    }

    .rubber-grade {
        color: #198754;
        font-weight: 700;
    }

    .rubber-price-value {
        text-align: right;
        white-space: nowrap;
        font-variant-numeric: tabular-nums;
    }


    /*
    |--------------------------------------------------------------------------
    | Note
    |--------------------------------------------------------------------------
    */

    .rubber-market-note {
        margin: 0;
        padding: 0 24px 22px;
        color: #6c757d;
        font-size: 14px;
        line-height: 1.7;
    }

    .rubber-empty {
        margin: 0;
        padding: 24px;
        color: #6c757d;
        font-size: 15px;
    }


    /*
    |--------------------------------------------------------------------------
    | Mobile
    |--------------------------------------------------------------------------
    */

    @media (max-width: 767px) {

        .rubber-market-section {
            margin-bottom: 24px;
            border-radius: 8px;
        }

        .rubber-market-header {
            padding: 16px;
        }

        .rubber-market-header h2 {
            font-size: 20px;
        }

        .rubber-tab-container {
            padding: 14px 14px 0;
            overflow-x: auto;
        }

        .rubber-tabs {
            flex-wrap: nowrap;
            width: max-content;
            min-width: 100%;
        }

        .rubber-tabs li a {
            padding: 9px 14px;
            font-size: 14px;
        }

        .rubber-tab-content {
            padding: 14px;
        }

        .rubber-table {
            min-width: 520px;
        }

        .rubber-table thead th,
        .rubber-table tbody td {
            padding: 11px 12px;
            font-size: 14px;
        }

        .rubber-market-note {
            padding: 0 16px 18px;
            font-size: 13px;
        }

        .rubber-empty {
            padding: 18px 16px;
        }
    }

</style>


<section class="container">


    <!--
    ========================================================================
    DOMESTIC MARKET
    ========================================================================
    -->

    <section class="rubber-market-section">


        <div class="rubber-market-header">

            <h2>
                Domestic Rubber Market
            </h2>


            <?php if ($domesticDate !== null): ?>

                <p class="rubber-price-date">

                    Price Date:

                    <strong>
                        <?= htmlspecialchars(
                            date(
                                'd M Y',
                                strtotime($domesticDate)
                            )
                        ) ?>
                    </strong>

                </p>

            <?php endif; ?>

        </div>


        <?php if (!empty($domesticPrice)): ?>


            <!-- Domestic tabs -->

            <div class="rubber-tab-container">

                <ul
                    id="domestic-rubber-tab"
                    class="nav nav-tabs rubber-tabs"
                    role="tablist"
                >

                    <?php $isFirst = true; ?>


                    <?php foreach ($domesticPrice as $place => $prices): ?>

                        <?php

                        $placeEnum = RubberPlace::from(
                            $place
                        );

                        $tabId = 'domestic-' . $place;

                        ?>


                        <li role="presentation">

                            <a
                                class="tab-control <?= $isFirst ? 'active' : '' ?>"

                                data-toggle="tab"

                                href="#<?= htmlspecialchars($tabId) ?>"

                                role="tab"

                                aria-controls="<?= htmlspecialchars($tabId) ?>"

                                aria-selected="<?= $isFirst ? 'true' : 'false' ?>"
                            >

                                <?= htmlspecialchars(
                                    $placeEnum->label()
                                ) ?>

                            </a>

                        </li>


                        <?php $isFirst = false; ?>

                    <?php endforeach; ?>

                </ul>

            </div>


            <!-- Domestic tab content -->

            <div class="tab-content rubber-tab-content">

                <?php $isFirst = true; ?>


                <?php foreach ($domesticPrice as $place => $prices): ?>

                    <?php

                    $tabId = 'domestic-' . $place;

                    ?>


                    <div
                        id="<?= htmlspecialchars($tabId) ?>"

                        class="tab-pane fade <?= $isFirst ? 'show active' : '' ?>"

                        role="tabpanel"
                    >


                        <div class="table-responsive">

                            <table
                                class="table table-bordered table-hover rubber-table"
                            >

                                <thead>

                                <tr>

                                    <th>
                                        Grade
                                    </th>

                                    <th class="rubber-price-value">
                                        INR ₹ / 100 Kg
                                    </th>

                                    <th class="rubber-price-value">
                                        USD $ / 100 Kg
                                    </th>

                                </tr>

                                </thead>


                                <tbody>

                                <?php foreach ($prices as $price): ?>

                                    <tr>

                                        <td>

                                            <span class="rubber-grade">

                                                <?= htmlspecialchars(
                                                    $price->grade->label()
                                                ) ?>

                                            </span>

                                        </td>


                                        <td class="rubber-price-value">

                                            ₹<?= number_format(
                                                $price->amountInRupee,
                                                2
                                            ) ?>

                                        </td>


                                        <td class="rubber-price-value">

                                            $<?= number_format(
                                                $price->amountInDollar,
                                                2
                                            ) ?>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                                </tbody>

                            </table>

                        </div>

                    </div>


                    <?php $isFirst = false; ?>

                <?php endforeach; ?>

            </div>


            <p class="rubber-market-note">

                Domestic rubber prices are shown per 100 kg.
                Prices may vary based on taxes, transportation,
                warehousing and other market expenses.

            </p>


        <?php else: ?>

            <p class="rubber-empty">
                No domestic rubber price data is currently available.
            </p>

        <?php endif; ?>


    </section>


    <!--
    ========================================================================
    INTERNATIONAL MARKET
    ========================================================================
    -->

    <section class="rubber-market-section">


        <div class="rubber-market-header">

            <h2>
                International Rubber Market
            </h2>


            <?php if ($internationalDate !== null): ?>

                <p class="rubber-price-date">

                    Price Date:

                    <strong>

                        <?= htmlspecialchars(
                            date(
                                'd M Y',
                                strtotime($internationalDate)
                            )
                        ) ?>

                    </strong>

                </p>

            <?php endif; ?>

        </div>


        <?php if (!empty($internationalPrice)): ?>


            <!-- International tabs -->

            <div class="rubber-tab-container">

                <ul
                    id="international-rubber-tab"
                    class="nav nav-tabs rubber-tabs"
                    role="tablist"
                >

                    <?php $isFirst = true; ?>


                    <?php foreach ($internationalPrice as $place => $prices): ?>

                        <?php

                        $placeEnum = RubberPlace::from(
                            $place
                        );

                        $tabId = 'international-' . $place;

                        ?>


                        <li role="presentation">

                            <a
                                class="tab-control <?= $isFirst ? 'active' : '' ?>"

                                data-toggle="tab"

                                href="#<?= htmlspecialchars($tabId) ?>"

                                role="tab"

                                aria-controls="<?= htmlspecialchars($tabId) ?>"

                                aria-selected="<?= $isFirst ? 'true' : 'false' ?>"
                            >

                                <?= htmlspecialchars(
                                    $placeEnum->label()
                                ) ?>

                            </a>

                        </li>


                        <?php $isFirst = false; ?>

                    <?php endforeach; ?>

                </ul>

            </div>


            <!-- International tab content -->

            <div class="tab-content rubber-tab-content">

                <?php $isFirst = true; ?>


                <?php foreach ($internationalPrice as $place => $prices): ?>

                    <?php

                    $tabId = 'international-' . $place;

                    ?>


                    <div
                        id="<?= htmlspecialchars($tabId) ?>"

                        class="tab-pane fade <?= $isFirst ? 'show active' : '' ?>"

                        role="tabpanel"
                    >


                        <div class="table-responsive">

                            <table
                                class="table table-bordered table-hover rubber-table"
                            >

                                <thead>

                                <tr>

                                    <th>
                                        Grade
                                    </th>

                                    <th class="rubber-price-value">
                                        INR ₹ / 100 Kg
                                    </th>

                                    <th class="rubber-price-value">
                                        USD $ / 100 Kg
                                    </th>

                                </tr>

                                </thead>


                                <tbody>

                                <?php foreach ($prices as $price): ?>

                                    <tr>

                                        <td>

                                            <span class="rubber-grade">

                                                <?= htmlspecialchars(
                                                    $price->grade->label()
                                                ) ?>

                                            </span>

                                        </td>


                                        <td class="rubber-price-value">

                                            ₹<?= number_format(
                                                $price->amountInRupee,
                                                2
                                            ) ?>

                                        </td>


                                        <td class="rubber-price-value">

                                            $<?= number_format(
                                                $price->amountInDollar,
                                                2
                                            ) ?>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                                </tbody>

                            </table>

                        </div>

                    </div>


                    <?php $isFirst = false; ?>

                <?php endforeach; ?>

            </div>


            <p class="rubber-market-note">

                International rubber prices are shown per 100 kg
                for comparison across major global rubber markets.

            </p>


        <?php else: ?>

            <p class="rubber-empty">
                No international rubber price data is currently available.
            </p>

        <?php endif; ?>


    </section>


</section>