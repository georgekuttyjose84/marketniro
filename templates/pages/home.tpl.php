<?php

?>

<div class="">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">
            <section class="hero-carousel">
                <div id="marketHeroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6500" data-bs-pause="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="6500">
                            <div class="hero-slide-media">
                                <img src="https://images.unsplash.com/photo-1610375461246-83df859d849d?auto=format&fit=crop&w=1600&q=80" alt="Market intelligence dashboard overview">
                            </div>
                            <div class="hero-content">
                                <div class="container-max w-100 mx-auto px-3 px-md-4">
                                    <div class="hero-box">
                                        <span class="hero-tag">
                                            <span class="hero-tag-dot"></span>
                                            Market Intelligence Platform
                                        </span>
                                        <h1 class="hero-title">Five Markets,<br>One Page,<br>
                                            <span class="hero-title-accent">Updated Every Morning.</span>
                                        </h1>
                                        <p class="hero-description">
                                            Monitor Gold, Silver, Currency, Rubber and Pineapple markets from one premium dashboard with reliable pricing, historical insights and daily market intelligence.
                                        </p>
                                        <div class="hero-buttons">
                                            <a href="/finance/gold" class="btn-hero-primary text-decoration-none">
                                                View Gold Details
                                                <span class="material-symbols-outlined">arrow_forward</span>
                                            </a>
                                            <a href="/finance/gold" class="btn-hero-secondary text-decoration-none">Latest News</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" data-bs-interval="6500">
                            <div class="hero-slide-media">
                                <img src="/assets/images/home/pipeapple-car.jpg" alt="Agricultural plantation landscape">
                            </div>
                            <div class="hero-content">
                                <div class="container-max w-100 mx-auto px-3 px-md-4">
                                    <div class="hero-box">
                                        <span class="hero-tag">
                                            <span class="material-symbols-outlined">nutrition</span>
                                            Agriculture Intelligence
                                        </span>
                                        <h2 class="hero-title"> Track Commodity<br> Prices Across<br>
                                            <span class="hero-title-accent">India</span>
                                        </h2>
                                        <p class="hero-description">
                                            Daily pricing for Rubber and Pineapple markets with trusted agricultural insights and historical trends.
                                        </p>
                                        <div class="hero-buttons">
                                            <a href="/agriculture/pineapple" class="btn-hero-primary text-decoration-none">View Pineapple Data<span class="material-symbols-outlined">arrow_forward</span></a>
                                            <a href="/agriculture/news/" class="btn-hero-secondary text-decoration-none">Latest News</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" data-bs-interval="6500">
                            <div class="hero-slide-media">
                                <img src="/assets/images/home/rubber-car.jpg" alt="Financial markets skyline">
                            </div>
                            <div class="hero-content">
                                <div class="container-max w-100 mx-auto px-3 px-md-4">
                                    <div class="hero-box">
                                        <span class="hero-tag">
                                            <span class="material-symbols-outlined">monitoring</span>
                                            Financial Intelligence
                                        </span>
                                        <h2 class="hero-title">Reliable Data.<br>
                                            <span class="hero-title-accent">Better Decisions.</span>
                                        </h2>
                                        <p class="hero-description">
                                            Financial markets and agricultural commodities presented together in one modern, real-time platform.
                                        </p>
                                        <div class="hero-buttons">
                                            <a href="/agriculture/rubber" class="btn-hero-primary text-decoration-none">
                                                View Rubber Price
                                                <span class="material-symbols-outlined">arrow_forward</span>
                                            </a>
                                            <a href="/agriculture/rubber" class="btn-hero-secondary text-decoration-none">Get Latest News</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="hero-arrow hero-arrow-prev" type="button" data-bs-target="#marketHeroCarousel" data-bs-slide="prev">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button class="hero-arrow hero-arrow-next" type="button" data-bs-target="#marketHeroCarousel" data-bs-slide="next">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>

                    <div class="hero-indicators">
                        <button class="hero-indicator active" type="button" data-bs-target="#marketHeroCarousel" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1">
                            <span class="hero-indicator-progress"></span>
                        </button>
                        <button class="hero-indicator" type="button" data-bs-target="#marketHeroCarousel" data-bs-slide-to="1" aria-label="Slide 2">
                            <span class="hero-indicator-progress"></span>
                        </button>
                        <button class="hero-indicator" type="button" data-bs-target="#marketHeroCarousel" data-bs-slide-to="2" aria-label="Slide 3">
                            <span class="hero-indicator-progress"></span>
                        </button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>


<section class="market-section">
    <div class="container-max mx-auto px-3 px-md-4">
        <div class="market-section-heading">
            <span class="section-tag">MARKET OVERVIEW</span>
            <h2>Five Markets.<span>One Platform.</span></h2>
            <p>Track agricultural commodities and financial markets from one intelligent dashboard updated every morning.</p>
        </div>


        <div class="row g-4">
            <?php foreach ([$cardList[0] , $cardList[1] , $cardList[2]] as $card): ?>
                <div class="col-12 col-sm-6 col-xl-4">
                    <a class="text-decoration-none" href="<?= $card['url'] ?>">
                        <article class="market-card <?= $card['type'] ?> ">
                            <div class="market-card-top">
                                <span class="market-badge"><?=$card['heading']?></span>
                                <span class="material-symbols-outlined">arrow_outward</span>
                            </div>
                            <div class="market-image">
                                <img src="<?=$card['image']?>" alt="<?=$card['heading']?>">
                            </div>
                            <div class="market-content">
                                <h3><?= $card['heading']?> </h3>
                                <div class="market-price"><?=  $card['price'] ?><span>/<?= $card['quantity'] ?></span></div>
                                <div class="market-change <?= $card['impressions'] ?>"><?= $card['icon'] ?> <?=$card['percentage']?>%
                                    <small>Today</small>
                                </div>
                                <div class="market-update">Updated
                                    <strong><?= $card['date'] ?></strong>
                                </div>
                            </div>

                            <a href="<?= $card['url'] ?>" class="market-link">View Market
                                <span class="material-symbols-outlined">east</span>
                            </a>
                        </article>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>






<section class="snapshot-section">
    <div class="container-max mx-auto px-3 px-md-4">
        <div class="section-header">
            <span class="section-tag">TODAY'S MARKET</span>
            <h2>Market <span>Snapshot</span></h2>
            <p>Monitor today's movements across agricultural commodities and financial markets from one place.</p>
        </div>

        <div class="snapshot-card">
            <?php foreach ($cardList as $card): ?>

            <a href="<?= $card['url'] ?>" class="snapshot-row <?= $card['type'] ?> ">
                <div class="snapshot-market">
                    <div class="snapshot-icon">
                        <img src="<?= $card['image'] ?>" alt="<?= $card['heading'] ?>">
                    </div>
                    <div>
                        <h4><?=$card['heading']?></h4>
                        <small>Updated Today</small>
                    </div>
                </div>
                <div class="snapshot-price"><?= $card['price'] ?><span>/<?= $card['quantity'] ?></span></div>

                <div class="snapshot-change <?= $card['impressions'] ?>"><?= $card['icon'] ?><?=$card['percentage']?>%</div>
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>