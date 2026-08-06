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


<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@500;600&display=swap"
      rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
      rel="stylesheet">


<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">
            <section class="rubber-market-section">
                <div class="rubber-market-header">

                    <h2>
                        <span class="material-symbols-outlined rubber-header-icon">local_shipping</span>
                        Domestic Rubber Market
                    </h2>


                    <?php if ($domesticDate !== null): ?>
                        <p class="rubber-price-date">
                            Price Date:<strong><?= htmlspecialchars(date('d M Y', strtotime($domesticDate))) ?></strong>
                        </p>

                    <?php endif; ?>

                </div>


                <?php if (!empty($domesticPrice)): ?>


                    <!-- Domestic tabs -->

                    <div class="rubber-tab-container">

                        <ul
                                id="domestic-rubber-tab"
                                class="nav rubber-tabs"
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
                        <span class="material-symbols-outlined rubber-header-icon">public</span>
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
                                class="nav  rubber-tabs"
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