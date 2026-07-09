<?php
/** @var string $content */
/** @var string|null $title */
/** @var array $pageStyles */
/** @var array $pageScripts */

$current = $_SERVER['REQUEST_URI'] ?? '/';
$title = $title ?? 'MarketNiro';
$pageStyles = $pageStyles ?? [];
$pageScripts = $pageScripts ?? [];
$page = $page ?? [];

$title = $page['title'] ?? 'MarketNiro';
$description = $page['description'] ?? '';
$keywords = $page['keywords'] ?? '';
$canonical = $page['canonical'] ?? '';

$styles = $page['styles'] ?? [];
$scripts = $page['scripts'] ?? [];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($description) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($keywords) ?>">
    <?php if ($canonical): ?>
        <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">
    <?php endif; ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/app.css">

    <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($style) ?>">
    <?php endforeach; ?>

    <link rel="icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg px-4 navbar-custom">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="/">
            <img src="/assets/market-niro-logo-transparent.png" class="logo-img me-3" alt="MarketNiro logo">
            <span class="brand-market">Market</span><span class="brand-niro">Niro</span>
        </a>

        <div class="navbar-actions ms-auto">
            <button type="button" id="themeToggle" class="btn btn-sm btn-outline-dark" title="Toggle dark mode">🌗</button>
            <a href="#" class="btn btn-sm btn-green">Login</a>
        </div>
    </nav>

    <div class="nav-secondary px-4 py-2">
        <ul class="nav gap-4 d-flex justify-content-center align-items-center nav-scroll mb-0">
            <li class="nav-item"><a class="nav-link <?= $current === '/finance/currency' ? 'active-link' : '' ?>" href="/finance/currency">Currency</a></li>
            <li class="nav-item"><a class="nav-link <?= $current === '/finance/gold' ? 'active-link' : '' ?>" href="/finance/gold">Gold</a></li>
            <li class="nav-item"><a class="nav-link <?= $current === '/finance/silver' ? 'active-link' : '' ?>" href="/finance/silver">Silver</a></li>
            <li class="nav-item"><a class="nav-link <?= $current === '/agriculture/rubber' ? 'active-link' : '' ?>" href="/agriculture/rubber">Rubber</a></li>
            <li class="nav-item"><a class="nav-link <?= $current === '/agriculture/pineapple' ? 'active-link' : '' ?>" href="/agriculture/pineapple">Pineapple</a></li>
        </ul>
    </div>
</header>

<main class="page-shell container mt-4">
    <?= $content ?>
</main>

<script src="/assets/js/app.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>-->

<?php foreach ($scripts as $script): ?>
    <script src="<?= htmlspecialchars($script) ?>"></script>
<?php endforeach; ?>

</body>

<style>
    .site-footer {
        margin-top: 60px;
        background: #17221c;
        color: #d5ddd8;
    }

    .footer-main {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 45px;
        padding: 55px 0 40px;
    }

    .footer-logo {
        display: inline-block;
        margin-bottom: 16px;
        color: #ffffff;
        font-size: 27px;
        font-weight: 700;
        line-height: 1;
        text-decoration: none;
    }

    .footer-logo:hover {
        color: #ffffff;
        text-decoration: none;
    }

    .footer-about p {
        max-width: 430px;
        margin: 0;
        color: #aebbb3;
        font-size: 14px;
        line-height: 1.8;
    }

    .footer-column h3 {
        margin: 0 0 18px;
        color: #ffffff;
        font-size: 16px;
        font-weight: 700;
    }

    .footer-column ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .footer-column li {
        margin-bottom: 10px;
    }

    .footer-column li:last-child {
        margin-bottom: 0;
    }

    .footer-column a {
        color: #aebbb3;
        font-size: 14px;
        text-decoration: none;
        transition:
                color 0.2s ease;
    }

    .footer-column a:hover {
        color: #ffffff;
        text-decoration: none;
    }

    .footer-disclaimer {
        padding: 22px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .footer-disclaimer p {
        max-width: 1000px;
        margin: 0;
        color: #91a097;
        font-size: 12px;
        line-height: 1.7;
    }

    .footer-disclaimer strong {
        color: #b8c4bc;
    }

    .footer-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 20px 0;
    }

    .footer-bottom p {
        margin: 0;
        color: #849188;
        font-size: 13px;
    }


    /*
    |--------------------------------------------------------------------------
    | Tablet
    |--------------------------------------------------------------------------
    */

    @media (max-width: 991px) {

        .footer-main {
            grid-template-columns: 2fr 1fr 1fr;
            gap: 35px;
        }

        .footer-about {
            grid-column: 1 / -1;
        }

        .footer-about p {
            max-width: 650px;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Mobile
    |--------------------------------------------------------------------------
    */

    @media (max-width: 767px) {

        .site-footer {
            margin-top: 40px;
        }

        .footer-main {
            grid-template-columns: 1fr 1fr;
            gap: 35px 25px;
            padding: 40px 0 30px;
        }

        .footer-about {
            grid-column: 1 / -1;
        }

        .footer-logo {
            font-size: 24px;
        }

        .footer-bottom {
            display: block;
            padding: 18px 0;
        }

        .footer-bottom p {
            margin-bottom: 6px;
        }

        .footer-bottom p:last-child {
            margin-bottom: 0;
        }
    }


    @media (max-width: 480px) {

        .footer-main {
            grid-template-columns: 1fr;
        }

        .footer-about {
            grid-column: auto;
        }
    }
</style>

<footer class="site-footer">

    <div class="container">

        <div class="footer-main">

            <!-- MarketNiro -->

            <div class="footer-column footer-about">

                <a href="/" class="footer-logo">
                    MarketNiro
                </a>

                <p>
                    MarketNiro provides market price information,
                    financial rates and commodity data in one place.
                    Track currency exchange rates, precious metals
                    and agricultural market prices with historical
                    trends and useful comparisons.
                </p>

            </div>


            <!-- Finance -->

            <div class="footer-column">

                <h3>
                    Finance
                </h3>

                <ul>

                    <li>
                        <a href="/finance/currency">
                            Currency Rates
                        </a>
                    </li>

                    <li>
                        <a href="/finance/gold">
                            Gold Price
                        </a>
                    </li>

                    <li>
                        <a href="/finance/silver">
                            Silver Price
                        </a>
                    </li>

                </ul>

            </div>


            <!-- Agriculture -->

            <div class="footer-column">

                <h3>
                    Agriculture
                </h3>

                <ul>

                    <li>
                        <a href="/agriculture/pineapple">
                            Pineapple Price
                        </a>
                    </li>

                    <li>
                        <a href="/agriculture/rubber">
                            Rubber Price
                        </a>
                    </li>

                </ul>

            </div>


            <!-- Information -->

            <div class="footer-column">

                <h3>
                    Information
                </h3>

                <ul>

                    <li>
                        <a href="/about">
                            About MarketNiro
                        </a>
                    </li>

                    <li>
                        <a href="/contact">
                            Contact
                        </a>
                    </li>

                    <li>
                        <a href="/privacy-policy">
                            Privacy Policy
                        </a>
                    </li>

                    <li>
                        <a href="/terms">
                            Terms of Use
                        </a>
                    </li>

                    <li>
                        <a href="/disclaimer">
                            Disclaimer
                        </a>
                    </li>

                </ul>

            </div>

        </div>


        <!-- Data disclaimer -->

        <div class="footer-disclaimer">

            <p>
                <strong>Market data disclaimer:</strong>
                Prices and exchange rates displayed on MarketNiro
                are provided for informational and reference purposes
                only. Market values may change and can differ between
                exchanges, markets, locations and data providers.
                Always verify important financial or trading decisions
                with an appropriate official source.
            </p>

        </div>


        <!-- Bottom -->

        <div class="footer-bottom">

            <p>
                &copy; <?= date('Y') ?> MarketNiro.
                All rights reserved.
            </p>

            <p>
                Market prices, rates and trends in one place.
            </p>

        </div>

    </div>

</footer>
</html>
