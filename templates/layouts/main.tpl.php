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
            <li class="nav-item"><a class="nav-link <?= $current === '/agriculture/rice' ? 'active-link' : '' ?>" href="/agriculture/rice">Rice</a></li>
        </ul>
    </div>
</header>

<main class="page-shell container mt-4">
    <?= $content ?>
</main>

<script src="/assets/js/app.js"></script>

<?php foreach ($scripts as $script): ?>
    <script src="<?= htmlspecialchars($script) ?>"></script>
<?php endforeach; ?>

</body>
</html>
