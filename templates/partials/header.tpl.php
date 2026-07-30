<?php
/**
 * header.tpl.php
 * Reusable site header. Include this at the TOP of every page:
 *   <?php
 *   $page_title = "My Page Title"; // optional, set before including
 *   include __DIR__ . '/includes/header.tpl.php';
 *   ?>
 */

// Fallback title if the including page didn't set one
if (!isset($page_title)) {
    $page_title = 'MarketNiro | Pineapple Agricultural Insights';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($page_title); ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hanken+Grotesk:wght@600;700;800&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Site CSS (shared vars first, then header/footer, then any page-specific CSS) -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <?php if (isset($extra_css)) { echo $extra_css; } // hook for page-specific <link>/<style> tags ?>
</head>
<body>

<!-- ============ TOP NAV BAR ============ -->
<header class="site-header">
    <div class="container-max mx-auto px-3 px-md-4 d-flex align-items-center justify-content-between py-3 top-row" style="margin:0 auto;">
        <div class="d-flex align-items-center gap-2 gap-md-4" style="min-width:0;">
            <a class="d-flex align-items-center gap-2 text-decoration-none" href="/" style="min-width:0;">
                <img alt="MarketNiro Logo" class="brand-logo" src="https://marketniro.com/assets/market-niro-logo.png" style="width: auto;">
                <span class="brand-name" style="font-weight: 800; color: var(--primary); letter-spacing: -0.03em;">MarketNiro</span>
            </a>
        </div>
        <div class="d-flex align-items-center gap-2 gap-md-3" style="flex-shrink:0;">
            <div class="search-pill d-none d-md-flex">
                <span class="material-symbols-outlined">search</span>
                <input placeholder="Search market symbols..." type="text">
            </div>
            <button class="btn-primary-custom">Contact</button>
        </div>
    </div>
    <div class="header-bottom" style="background-color: rgba(255,255,255,0.5);">
        <div class="container-max mx-auto px-3 px-md-4 d-flex align-items-center justify-content-center" style="margin:0 auto;">
            <nav class="d-flex align-items-center py-2">
                <?php
                $nav_items = [
                    'Home'      => '/',
                    'Currency'  => '/finance/currency',
                    'Gold'      => '/finance/gold',
                    'Silver'    => '/finance/silver',
                    'Pineapple' => '/agriculture/pineapple',
                    'Rubber'    => '/agriculture/rubber',
                    'News'      => '/news',
                    'About'     => '/about-us',
                ];

                $current = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                ?>

                <?php foreach ($nav_items as $label => $url): ?>
                    <a
                            href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8') ?>"
                            class="<?= $current === $url ? 'nav-link-active' : 'nav-link-custom' ?>"
                    >
                        <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        </div>
    </div>
</header>
