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
    <link rel="stylesheet" href="/assets/css/base/style.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/layout/footer.css">
    <link rel="stylesheet" href="/assets/css/layout/header.css">

    <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($style) ?>">
    <?php endforeach; ?>

    <link rel="icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">




    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hanken+Grotesk:wght@600;700;800&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Site CSS (shared vars first, then header/footer, then any page-specific CSS) -->

</head>
<body>

<?= $view->partial('partials/header') ?>
    <?= $content ?>
<?= $view->partial('partials/footer') ?>

<!--<script src="/assets/js/agriculture/pineapple.js"></script>-->
<script src="/assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php foreach ($scripts as $script): ?>
    <script src="<?= htmlspecialchars($script) ?>"></script>
<?php endforeach; ?>

</body>
</html>
