<section class="row g-4 mb-4">
    <div class="col-12 col-md-6">
        <div class="price-card h-100">
            <div class="price-card-strip strip-primary"></div>
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h2 class="fw-bold" style="font-size:20px; color:var(--primary);">
                        Green Pineapple
                    </h2>
                    <p class="mb-0" style="font-size:12px; color:var(--on-surface-variant);">
                        Industrial &amp; Export Grade
                    </p>
                </div>
                <div class="icon-badge icon-badge-primary">
                    <span class="material-symbols-outlined">eco</span>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-4 stat-block">
                    <p class="stat-label mb-1">Min</p>
                    <p class="stat-value mb-0">
                        ₹<?= number_format($greenPrice?->getMinPrice() ?? 0, 0) ?>
                    </p>
                </div>

                <div class="col-4 stat-block stat-divider">
                    <p class="stat-label mb-1">Max</p>
                    <p class="stat-value mb-0">
                        ₹<?= number_format($greenPrice?->getMaxPrice() ?? 0, 0) ?>
                    </p>
                </div>

                <div class="col-4 stat-block">
                    <p class="stat-label mb-1">Avg</p>
                    <p class="stat-value mb-0" style="color:var(--primary);">
                        ₹<?= number_format($greenPrice?->getAvgPrice() ?? 0, 0) ?>
                    </p>
                </div>
            </div>

            <div class="info-pill info-pill-primary">
                <span class="material-symbols-outlined" style="font-size:16px;">check_circle</span>
                <span><?= $greenPrice ? htmlspecialchars($greenPrice->getPriceDate()) : 'No data available' ?></span>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="price-card h-100">
            <div class="price-card-strip strip-warning"></div>

            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h2 class="fw-bold" style="font-size:20px; color:var(--warning-700);">
                        Ripe Pineapple
                    </h2>
                    <p class="mb-0" style="font-size:12px; color:var(--on-surface-variant);">
                        Retail &amp; Consumer Grade
                    </p>
                </div>

                <div class="icon-badge icon-badge-warning">
                    <span class="material-symbols-outlined">nutrition</span>
                </div>
            </div>

            <div class="row g-0">
                <div class="col-4 stat-block">
                    <p class="stat-label mb-1">Min</p>
                    <p class="stat-value mb-0">
                        ₹<?= number_format($ripePrice?->getMinPrice() ?? 0, 0) ?>
                    </p>
                </div>

                <div class="col-4 stat-block stat-divider">
                    <p class="stat-label mb-1">Max</p>
                    <p class="stat-value mb-0">
                        ₹<?= number_format($ripePrice?->getMaxPrice() ?? 0, 0) ?>
                    </p>
                </div>

                <div class="col-4 stat-block">
                    <p class="stat-label mb-1">Avg</p>
                    <p class="stat-value mb-0" style="color:var(--warning);">
                        ₹<?= number_format($ripePrice?->getAvgPrice() ?? 0, 0) ?>
                    </p>
                </div>
            </div>

            <div class="info-pill info-pill-warning">
                <span class="material-symbols-outlined" style="font-size:16px;">bolt</span>
                <span>
                    <?= $ripePrice ? htmlspecialchars($ripePrice->getPriceDate()) : 'No data available' ?>
                </span>
            </div>
        </div>
    </div>
</section>