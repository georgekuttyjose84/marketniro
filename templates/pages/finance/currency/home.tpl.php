<?php

$page = $page ?? [];

$h1 = $page['h1'] ?? '';

$description = $page['description'] ?? '';

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


<?= $view->render(
        'pages/finance/common/trending-currency',
        [
                'main_currency_list' => $main_currency_list
        ],
        null
) ?>


<section class="converter-section">

    <h2>Currency Converter</h2>

</section>


<section class="history-section">

    <h2>Historical Exchange Rates</h2>

</section>


<section class="faq-section">

    <h2>Frequently Asked Questions</h2>

</section>