<?php

?>


<style>
    /* ==========================================================
MARKETNIRO HOMEPAGE
HERO SECTION - PART 1A.1
----------------------------------------------------------
Hero Container
Carousel
Overlay
Images
Layout
Premium Effects
Bootstrap 5 Compatible
========================================================== */

    /* ---------- Global Helpers ---------- */

    .hero-carousel *,
    .hero-carousel *::before,
    .hero-carousel *::after{
        box-sizing:border-box;
    }

    .hero-carousel img{
        display:block;
        width:100%;
        max-width:100%;
        height:auto;
    }

    .hero-carousel button{
        font-family:inherit;
    }

    /* ---------- Hero Wrapper ---------- */

    .hero-carousel{

        position:relative;

        overflow:hidden;

        margin-bottom:4rem;

        border-radius:var(--radius-2xl);

        background:var(--surface);

        box-shadow:
                0 12px 30px rgba(0,0,0,.05),
                0 24px 80px rgba(0,0,0,.08);

        isolation:isolate;

    }

    /* ---------- Bootstrap Carousel ---------- */

    .hero-carousel .carousel{

        position:relative;

    }

    .hero-carousel .carousel-inner{

        border-radius:inherit;

    }

    .hero-carousel .carousel-item{

        position:relative;

        overflow:hidden;

        height:clamp(360px,55vw,620px);

        transition:
                transform .8s ease,
                opacity .8s ease;

    }

    /* ---------- Image ---------- */

    .hero-carousel .carousel-item img{

        width:100%;

        height:100%;

        object-fit:cover;

        object-position:center center;

        transform:scale(1);

        transition:
                transform 7s ease;

        will-change:transform;

    }

    .hero-carousel .carousel-item.active img{

        transform:scale(1.06);

    }

    /* ---------- Dark Overlay ---------- */

    .hero-carousel .carousel-item::before{

        content:"";

        position:absolute;

        inset:0;

        z-index:1;

        background:
                linear-gradient(
                        90deg,
                        rgba(9,18,15,.82) 0%,
                        rgba(9,18,15,.58) 34%,
                        rgba(9,18,15,.26) 66%,
                        rgba(9,18,15,.08) 100%
                );

    }

    /* ---------- Bottom Fade ---------- */

    .hero-carousel .carousel-item::after{

        content:"";

        position:absolute;

        inset:auto 0 0 0;

        height:140px;

        z-index:1;

        background:
                linear-gradient(
                        to top,
                        rgba(0,0,0,.30),
                        transparent
                );

    }

    /* ---------- Hero Content Layer ---------- */

    .hero-content{

        position:absolute;

        inset:0;

        z-index:5;

        display:flex;

        align-items:center;

    }

    /* ---------- Bootstrap Container ---------- */

    .hero-content>.container{

        width:100%;

    }

    /* ---------- Hero Content Box ---------- */

    .hero-box{

        position:relative;

        max-width:680px;

        color:#ffffff;

        z-index:10;

    }

    /* ---------- Glass Badge ---------- */

    .hero-tag{

        display:inline-flex;

        align-items:center;

        gap:.6rem;

        padding:.65rem 1.15rem;

        margin-bottom:1.75rem;

        border-radius:999px;

        color:#ffffff;

        font-size:.92rem;

        font-weight:600;

        letter-spacing:.02em;

        border:1px solid rgba(255,255,255,.18);

        background:
                linear-gradient(
                        135deg,
                        rgba(255,255,255,.18),
                        rgba(255,255,255,.08)
                );

        backdrop-filter:blur(16px);

        -webkit-backdrop-filter:blur(16px);

        box-shadow:
                0 6px 20px rgba(0,0,0,.18);

    }

    /* ---------- Material Icon ---------- */

    .hero-tag .material-symbols-outlined{

        font-size:20px;

        line-height:1;

    }

    /* ---------- GPU Optimisation ---------- */

    .hero-carousel,
    .hero-carousel .carousel-item,
    .hero-content,
    .hero-box{

        transform:translateZ(0);

        backface-visibility:hidden;

    }

    /* ---------- Smooth Transitions ---------- */

    .hero-carousel *{

        transition:
                color .25s ease,
                background-color .25s ease,
                border-color .25s ease;

    }

    /* ---------- Accessibility ---------- */

    .hero-carousel button:focus-visible{

        outline:3px solid rgba(255,255,255,.55);

        outline-offset:4px;

    }

    /* ---------- Reduced Motion ---------- */

    @media (prefers-reduced-motion:reduce){

        .hero-carousel *{

            animation:none !important;

            transition:none !important;

        }

    }

    /* ==========================================================
   MARKETNIRO HOMEPAGE
   HERO SECTION - PART 1A.2
   ----------------------------------------------------------
   Typography
   CTA Buttons
   Indicators
   Controls
   Premium Micro Interactions
==========================================================*/

    /* ==========================================
       HERO TYPOGRAPHY
    ========================================== */

    .hero-title{

        margin:0 0 1.25rem;

        color:#ffffff;

        font-family:var(--font-headline);

        font-size:clamp(2.3rem,5vw,4.75rem);

        font-weight:800;

        line-height:1.05;

        letter-spacing:-0.04em;

        text-wrap:balance;

        text-shadow:
                0 8px 25px rgba(0,0,0,.35);

    }

    .hero-description{

        max-width:620px;

        margin:0;

        color:rgba(255,255,255,.92);

        font-size:clamp(1rem,1.4vw,1.18rem);

        font-weight:400;

        line-height:1.8;

        text-shadow:
                0 2px 10px rgba(0,0,0,.25);

    }

    /* ==========================================
       BUTTON GROUP
    ========================================== */

    .hero-buttons{

        display:flex;

        align-items:center;

        gap:1rem;

        flex-wrap:wrap;

        margin-top:2.25rem;

    }

    /* ==========================================
       BUTTON BASE
    ========================================== */

    .btn-hero-primary,
    .btn-hero-secondary{

        position:relative;

        display:inline-flex;

        align-items:center;

        justify-content:center;

        gap:.65rem;

        min-height:54px;

        padding:.95rem 1.8rem;

        border-radius:14px;

        font-size:.95rem;

        font-weight:700;

        text-decoration:none;

        overflow:hidden;

        cursor:pointer;

        transition:
                transform .25s ease,
                box-shadow .25s ease,
                background-color .25s ease,
                color .25s ease;

    }

    /* ==========================================
       PRIMARY BUTTON
    ========================================== */

    .btn-hero-primary{

        color:#ffffff;

        background:linear-gradient(
                135deg,
                var(--primary),
                var(--primary-container)
        );

        border:none;

        box-shadow:
                0 10px 28px rgba(0,107,44,.28);

    }

    .btn-hero-primary:hover{

        transform:translateY(-3px);

        box-shadow:
                0 18px 42px rgba(0,107,44,.35);

    }

    .btn-hero-primary:active{

        transform:translateY(0);

    }

    /* ==========================================
       SECONDARY BUTTON
    ========================================== */

    .btn-hero-secondary{

        color:#ffffff;

        border:1px solid rgba(255,255,255,.20);

        background:rgba(255,255,255,.10);

        backdrop-filter:blur(18px);

        -webkit-backdrop-filter:blur(18px);

    }

    .btn-hero-secondary:hover{

        background:rgba(255,255,255,.18);

        transform:translateY(-3px);

    }

    /* ==========================================
       BUTTON FOCUS
    ========================================== */

    .btn-hero-primary:focus-visible,
    .btn-hero-secondary:focus-visible{

        outline:3px solid rgba(255,255,255,.45);

        outline-offset:4px;

    }

    /* ==========================================
       CAROUSEL CONTROLS
    ========================================== */

    .hero-carousel .carousel-control-prev,
    .hero-carousel .carousel-control-next{

        width:72px;

        opacity:1;

    }

    .hero-carousel .carousel-control-prev-icon,
    .hero-carousel .carousel-control-next-icon{

        width:52px;

        height:52px;

        border-radius:50%;

        background-color:rgba(255,255,255,.12);

        backdrop-filter:blur(18px);

        -webkit-backdrop-filter:blur(18px);

        background-size:18px;

        border:1px solid rgba(255,255,255,.18);

        transition:
                transform .25s ease,
                background-color .25s ease;

    }

    .hero-carousel .carousel-control-prev:hover .carousel-control-prev-icon,
    .hero-carousel .carousel-control-next:hover .carousel-control-next-icon{

        transform:scale(1.08);

        background-color:rgba(255,255,255,.22);

    }

    /* ==========================================
       INDICATORS
    ========================================== */

    .hero-carousel .carousel-indicators{

        margin-bottom:1.5rem;

        gap:.65rem;

    }

    .hero-carousel .carousel-indicators button{

        width:12px;

        height:12px;

        margin:0;

        border:none;

        border-radius:999px;

        opacity:.45;

        background:#ffffff;

        transition:
                width .3s ease,
                opacity .3s ease;

    }

    .hero-carousel .carousel-indicators .active{

        width:42px;

        opacity:1;

    }

    /* ==========================================
       CONTENT FADE
    ========================================== */

    .hero-box{

        animation:heroFade .8s ease;

    }

    @keyframes heroFade{

        from{

            opacity:0;

            transform:translateY(18px);

        }

        to{

            opacity:1;

            transform:translateY(0);

        }

    }

    /* ==========================================
       SELECTION
    ========================================== */

    .hero-carousel ::selection{

        background:rgba(127,252,151,.35);

        color:#ffffff;

    }

    /* ==========================================
       HIGH DPI IMAGE RENDERING
    ========================================== */

    .hero-carousel img{

        image-rendering:auto;

    }

    /* ==========================================
       DARK MODE SAFE
    ========================================== */

    @media (prefers-color-scheme:dark){

        .hero-title,
        .hero-description{

            color:#ffffff;

        }

    }
</style>


<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">



            <section class="hero-carousel">

                <div id="carouselExampleControls"
                     class="carousel slide carousel-fade"
                     data-bs-ride="carousel">

                    <div class="carousel-indicators">

                        <button type="button"
                                data-bs-target="#carouselExampleControls"
                                data-bs-slide-to="0"
                                class="active"></button>

                        <button type="button"
                                data-bs-target="#carouselExampleControls"
                                data-bs-slide-to="1"></button>

                        <button type="button"
                                data-bs-target="#carouselExampleControls"
                                data-bs-slide-to="2"></button>

                    </div>

                    <div class="carousel-inner">

                        <div class="carousel-item active">

                            <img src="https://images.unsplash.com/photo-1610375461246-83df859d849d?auto=format&fit=crop&w=1600&q=80">

                            <div class="hero-content">

                                <div class="container">

                                    <div class="hero-box">

                                        <div class="hero-tag">
                                            <span class="material-symbols-outlined">monitoring</span>
                                            Market Intelligence Platform
                                        </div>

                                        <h1 class="hero-title">
                                            Five Markets,<br>
                                            One Page,<br>
                                            Updated Every Morning.
                                        </h1>

                                        <p class="hero-description">
                                            Monitor Gold, Silver, Currency, Rubber and Pineapple markets from one premium dashboard with reliable pricing, historical insights and daily market intelligence.
                                        </p>

                                        <div class="hero-buttons">

                                            <button class="btn-hero-primary">
                                                Explore Markets
                                            </button>

                                            <button class="btn-hero-secondary">
                                                Latest News
                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="carousel-item">

                            <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=1600&q=80">

                            <div class="hero-content">

                                <div class="container">

                                    <div class="hero-box">

                                        <div class="hero-tag">
                                            Agriculture Intelligence
                                        </div>

                                        <h2 class="hero-title">
                                            Track Commodity<br>
                                            Prices Across<br>
                                            India
                                        </h2>

                                        <p class="hero-description">
                                            Daily pricing for Rubber and Pineapple markets with trusted agricultural insights and historical trends.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="carousel-item">

                            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=1600&q=80">

                            <div class="hero-content">

                                <div class="container">

                                    <div class="hero-box">

                                        <div class="hero-tag">
                                            Financial Intelligence
                                        </div>

                                        <h2 class="hero-title">
                                            Reliable Data.<br>
                                            Better Decisions.
                                        </h2>

                                        <p class="hero-description">
                                            Financial markets and agricultural commodities presented together in one modern platform.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <button class="carousel-control-prev"
                            type="button"
                            data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">

                        <span class="carousel-control-prev-icon"></span>

                    </button>

                    <button class="carousel-control-next"
                            type="button"
                            data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">

                        <span class="carousel-control-next-icon"></span>

                    </button>

                </div>

            </section>


            <section class="market-overview py-5">

                <div class="container">

                    <div class="section-heading text-center">

            <span class="section-badge">
                MARKET OVERVIEW
            </span>

                        <h2>
                            Five Markets,
                            <span>One Page.</span>
                        </h2>

                        <p>
                            Stay informed with daily updates across Gold, Silver, Rubber,
                            Pineapple and Currency markets. MarketNiro brings financial
                            and agricultural intelligence together in one platform.
                        </p>

                    </div>


                    <div class="row g-4 mt-4">

                        <!-- Gold -->

                        <div class="col-lg-4 col-md-6">

                            <div class="market-card">

                                <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png">

                                <div class="market-name">
                                    Gold
                                </div>

                                <div class="market-price">
                                    ₹9,825
                                    <small>/gram</small>
                                </div>

                                <div class="market-change positive">

                                    ▲ +1.42%

                                </div>

                                <div class="market-date">

                                    Updated
                                    05 Aug 2026

                                </div>

                            </div>

                        </div>


                        <!-- Silver -->

                        <div class="col-lg-4 col-md-6">

                            <div class="market-card">

                                <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png">

                                <div class="market-name">
                                    Silver
                                </div>

                                <div class="market-price">
                                    ₹118.60
                                    <small>/gram</small>
                                </div>

                                <div class="market-change negative">

                                    ▼ -0.35%

                                </div>

                                <div class="market-date">

                                    Updated
                                    05 Aug 2026

                                </div>

                            </div>

                        </div>


                        <!-- Rubber -->

                        <div class="col-lg-4 col-md-6">

                            <div class="market-card">

                                <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png">

                                <div class="market-name">
                                    Rubber RSS4
                                </div>

                                <div class="market-price">
                                    ₹242
                                    <small>/kg</small>
                                </div>

                                <div class="market-change positive">

                                    ▲ +2.18%

                                </div>

                                <div class="market-date">

                                    Updated
                                    05 Aug 2026

                                </div>

                            </div>

                        </div>


                        <!-- Green -->

                        <div class="col-lg-6 col-md-6">

                            <div class="market-card">

                                <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png">

                                <div class="market-name">
                                    Pineapple Green
                                </div>

                                <div class="market-price">
                                    ₹29
                                    <small>/kg</small>
                                </div>

                                <div class="market-change positive">

                                    ▲ +0.92%

                                </div>

                                <div class="market-date">

                                    Updated
                                    05 Aug 2026

                                </div>

                            </div>

                        </div>


                        <!-- Ripe -->

                        <div class="col-lg-6 col-md-6">

                            <div class="market-card">

                                <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png">

                                <div class="market-name">
                                    Pineapple Ripe
                                </div>

                                <div class="market-price">
                                    ₹41
                                    <small>/kg</small>
                                </div>

                                <div class="market-change negative">

                                    ▼ -0.84%

                                </div>

                                <div class="market-date">

                                    Updated
                                    05 Aug 2026

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

            <section class="market-intelligence">

                <div class="container">

                    <div class="row g-4 align-items-stretch">

                        <!-- ================= LEFT ================= -->

                        <div class="col-lg-8">

                            <div class="market-panel">

                                <div class="panel-header">

                                    <div>

                            <span class="section-mini-title">
                                TODAY'S MARKETS
                            </span>

                                        <h2>
                                            Market Intelligence
                                        </h2>

                                    </div>

                                    <span class="market-live">

                            <span class="live-dot"></span>

                            Live

                        </span>

                                </div>

                                <div class="table-responsive">

                                    <table class="table market-table">

                                        <thead>

                                        <tr>

                                            <th>Market</th>

                                            <th>Price</th>

                                            <th>Trend</th>

                                            <th>Daily</th>

                                            <th>Status</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        <tr>

                                            <td>Gold</td>

                                            <td>₹9,825/g</td>

                                            <td>▲</td>

                                            <td class="positive">+1.42%</td>

                                            <td>
                                    <span class="status bullish">
                                        Bullish
                                    </span>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>Silver</td>

                                            <td>₹118.60/g</td>

                                            <td>▼</td>

                                            <td class="negative">-0.35%</td>

                                            <td>

                                    <span class="status bearish">

                                        Weak

                                    </span>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>Rubber</td>

                                            <td>₹242/kg</td>

                                            <td>▲</td>

                                            <td class="positive">

                                                +2.18%

                                            </td>

                                            <td>

                                    <span class="status bullish">

                                        Strong

                                    </span>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>Pineapple Green</td>

                                            <td>₹29/kg</td>

                                            <td>▲</td>

                                            <td class="positive">

                                                +0.92%

                                            </td>

                                            <td>

                                    <span class="status stable">

                                        Stable

                                    </span>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>Pineapple Ripe</td>

                                            <td>₹41/kg</td>

                                            <td>▼</td>

                                            <td class="negative">

                                                -0.84%

                                            </td>

                                            <td>

                                    <span class="status bearish">

                                        Soft

                                    </span>

                                            </td>

                                        </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                        <!-- ================= RIGHT ================= -->

                        <div class="col-lg-4">

                            <div class="snapshot-card">

                    <span class="section-mini-title">

                        TODAY'S SNAPSHOT

                    </span>

                                <h3>

                                    Key Highlights

                                </h3>

                                <ul>

                                    <li>Gold records its highest weekly closing price.</li>

                                    <li>Rubber demand remains strong in domestic markets.</li>

                                    <li>Silver slips slightly amid global uncertainty.</li>

                                    <li>Pineapple arrivals increase across Kerala.</li>

                                    <li>Currency market remains stable against major pairs.</li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

            <script>

                const carousel = document.querySelector('#carouselExampleControls');

                new bootstrap.Carousel(carousel,{
                    interval:5000,
                    pause:'hover',
                    ride:'carousel',
                    wrap:true
                });

            </script>

        </main>
    </div>
</div>
