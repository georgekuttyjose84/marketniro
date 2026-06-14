<?php

$page = $page ?? [];

$h1 = $page['h1'] ?? '';

$description = $page['description'] ?? '';

$breadcrumb = $page['breadcrumb'] ?? $h1;

?>

<section class="finance-page-header">

    <nav class="finance-breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <a href="/finance">Finance</a>
        <span>/</span>
        <span><?= htmlspecialchars($breadcrumb) ?></span>

    </nav>

    <div class="finance-header">
        <div class="finance-header-content">
            <h1>
                <?= htmlspecialchars($h1) ?>
            </h1>
            <p>
                <?= htmlspecialchars($description) ?>
            </p>
        </div>
        <div class="finance-share">
            <span class="share-title">
                Share
            </span>
            <a
                href="#"
                class="share-icon facebook"
                aria-label="Share on Facebook"
            >f
            </a>

            <a
                href="#"
                class="share-icon twitter"
                aria-label="Share on X"
            >
                X
            </a>

            <a
                href="#"
                class="share-icon linkedin"
                aria-label="Share on LinkedIn"
            >
                in
            </a>

            <a
                href="#"
                class="share-icon whatsapp"
                aria-label="Share on WhatsApp"
            >
                W
            </a>

            <button
                type="button"
                class="share-icon copy-link"
                aria-label="Copy Link"
            >
                🔗
            </button>

        </div>

    </div>

</section>