

<!-- TRENDING -->
<h5 class="mb-3">🔥 Trending Commodities</h5>

<div class="row g-3 mb-4">

    <div class="col-6 col-md-3">
        <div class="card p-3">
            <h6>Coconut 🌴</h6>
            <strong>₹32/kg</strong><br>
            <span class="text-success">+2.3%</span>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card p-3">
            <h6>Rubber</h6>
            <strong>₹180/kg</strong><br>
            <span class="text-danger">-1.2%</span>
        </div>
    </div>

</div>


<?= $view->render(
        'pages/trending-currency',
        [
                'main_currency_list' => $main_currency_list
        ],
        null
) ?>

<!-- CTA -->
<div class="text-center mt-4">
    <a href="/finance/currency" class="btn btn-outline-dark">
        Check Currency Rates →
    </a>
</div>