<?php

?>


<style>
    /* ==========================================================
    MARKETNIRO HERO
    ========================================================== */

    .hero-section{
        position:relative;
        width:100%;
        overflow:hidden;
        margin-bottom:5rem;
        background:var(--surface);
    }

    /* ==========================================================
       CAROUSEL
       ========================================================== */

    .hero-section .carousel,
    .hero-section .carousel-inner,
    .hero-section .carousel-item{

        height:620px;
        position:relative;

    }

    .hero-image{

        width:100%;
        height:100%;
        object-fit:cover;
        object-position:center;
        display:block;

    }

    .hero-overlay{

        position:absolute;
        inset:0;

        display:flex;
        align-items:center;

        background:
                linear-gradient(
                        90deg,
                        rgba(5,10,8,.78) 0%,
                        rgba(5,10,8,.55) 35%,
                        rgba(5,10,8,.18) 100%
                );

    }

    .hero-overlay .container-max{

        width:100%;
        margin:auto;
        padding-inline:2rem;

    }

    /* ==========================================================
       GRID
       ========================================================== */

    .hero-grid{

        display:grid;

        grid-template-columns:

        minmax(0,650px)
        380px;

        justify-content:space-between;

        align-items:center;

        gap:3rem;

    }

    /* ==========================================================
       LEFT
       ========================================================== */

    .hero-left{

        color:#fff;

    }

    .hero-tag{

        display:inline-flex;

        align-items:center;

        padding:10px 18px;

        border-radius:999px;

        background:rgba(255,255,255,.14);

        border:1px solid rgba(255,255,255,.22);

        backdrop-filter:blur(20px);

        font-size:12px;

        font-weight:700;

        letter-spacing:.18em;

        text-transform:uppercase;

        margin-bottom:1.5rem;

    }

    .hero-left h1{

        font-family:var(--font-headline);

        font-size:4.6rem;

        font-weight:800;

        line-height:1;

        letter-spacing:-.05em;

        color:#fff;

        margin:0;

    }

    .hero-left p{

        margin-top:2rem;

        font-size:1.18rem;

        line-height:1.9;

        color:rgba(255,255,255,.92);

        max-width:560px;

    }

    /* ==========================================================
       BUTTONS
       ========================================================== */

    .hero-buttons{

        display:flex;

        gap:1rem;

        margin-top:2.4rem;

        flex-wrap:wrap;

    }

    .hero-btn{

        display:inline-flex;

        align-items:center;

        justify-content:center;

        gap:.75rem;

        min-height:56px;

        padding:0 32px;

        border-radius:16px;

        text-decoration:none;

        font-weight:700;

        transition:.30s;

    }

    .hero-btn-primary{

        background:var(--primary);

        color:#fff;

        box-shadow:
                0 18px 40px rgba(0,107,44,.28);

    }

    .hero-btn-primary:hover{

        color:#fff;

        background:#0c7c38;

        transform:translateY(-3px);

        box-shadow:
                0 24px 50px rgba(0,107,44,.35);

    }

    .hero-btn-secondary{

        background:rgba(255,255,255,.10);

        backdrop-filter:blur(16px);

        color:#fff;

        border:1px solid rgba(255,255,255,.25);

    }

    .hero-btn-secondary:hover{

        background:#fff;

        color:var(--primary);

    }

    /* ==========================================================
       METRICS
       ========================================================== */

    .hero-metrics{

        display:flex;

        gap:3rem;

        margin-top:3rem;

    }

    .hero-metrics div{

        display:flex;

        flex-direction:column;

    }

    .hero-metrics strong{

        font-size:1.6rem;

        font-family:var(--font-headline);

        color:#fff;

    }

    .hero-metrics span{

        margin-top:6px;

        color:rgba(255,255,255,.72);

        text-transform:uppercase;

        font-size:12px;

        letter-spacing:.16em;

    }

    /* ==========================================================
       RIGHT
       ========================================================== */

    .hero-right{

        display:flex;

        justify-content:flex-end;

    }

    .hero-glass-card{

        width:360px;

        border-radius:28px;

        padding:1.75rem;

        background:rgba(255,255,255,.12);

        backdrop-filter:blur(22px);

        border:1px solid rgba(255,255,255,.18);

        box-shadow:

                0 20px 60px rgba(0,0,0,.18);

    }

    .glass-header{

        display:flex;

        align-items:center;

        gap:.8rem;

        color:#fff;

        font-weight:700;

        margin-bottom:1.6rem;

    }

    .glass-body{

        display:flex;

        flex-direction:column;

        gap:1rem;

    }

    .market-row{

        display:flex;

        justify-content:space-between;

        align-items:center;

        padding-bottom:1rem;

        border-bottom:1px solid rgba(255,255,255,.12);

    }

    .market-row:last-child{

        border-bottom:none;

        padding-bottom:0;

    }

    .market-row span{

        color:rgba(255,255,255,.78);

    }

    .market-row strong{

        color:#fff;

        font-weight:700;

    }

    /* ==========================================================
   CAROUSEL CONTROLS
========================================================== */

    .carousel-control-prev,
    .carousel-control-next{
        width:80px;
        opacity:1;
    }

    .hero-arrow{
        width:56px;
        height:56px;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        background:rgba(255,255,255,.12);
        backdrop-filter:blur(20px);
        border:1px solid rgba(255,255,255,.18);
        transition:.30s ease;
    }

    .hero-arrow .material-symbols-outlined{
        color:#fff;
        font-size:32px;
        transition:.30s;
    }

    .carousel-control-prev:hover .hero-arrow,
    .carousel-control-next:hover .hero-arrow{
        background:#fff;
        transform:scale(1.08);
    }

    .carousel-control-prev:hover .material-symbols-outlined,
    .carousel-control-next:hover .material-symbols-outlined{
        color:var(--primary);
    }

    /* ==========================================================
       INDICATORS
    ========================================================== */

    .carousel-indicators{
        bottom:28px;
        margin-bottom:0;
    }

    .carousel-indicators [data-bs-target]{

        width:12px;
        height:12px;

        border-radius:999px;

        border:none;

        margin:0 6px;

        opacity:1;

        background:rgba(255,255,255,.35);

        transition:.30s;

    }

    .carousel-indicators .active{

        width:36px;

        background:#fff;

    }

    /* ==========================================================
       IMAGE ANIMATION
    ========================================================== */

    .carousel-item.active .hero-image{

        animation:heroZoom 8s linear forwards;

    }

    @keyframes heroZoom{

        from{

            transform:scale(1);

        }

        to{

            transform:scale(1.08);

        }

    }

    .hero-left{

        animation:heroContent .8s ease;

    }

    @keyframes heroContent{

        from{

            opacity:0;

            transform:translateY(35px);

        }

        to{

            opacity:1;

            transform:translateY(0);

        }

    }

    /* ==========================================================
       DESKTOP
    ========================================================== */

    @media (max-width:1400px){

        .hero-section .carousel,
        .hero-section .carousel-inner,
        .hero-section .carousel-item{

            height:560px;

        }

        .hero-grid{

            grid-template-columns:

            minmax(0,580px)
            340px;

        }

        .hero-left h1{

            font-size:4rem;

        }

    }

    /* ==========================================================
       LARGE TABLET
    ========================================================== */

    @media (max-width:1200px){

        .hero-section .carousel,
        .hero-section .carousel-inner,
        .hero-section .carousel-item{

            height:520px;

        }

        .hero-grid{

            grid-template-columns:

            minmax(0,1fr)
            320px;

            gap:2rem;

        }

        .hero-left h1{

            font-size:3.4rem;

        }

        .hero-left p{

            font-size:1.05rem;

        }

        .hero-glass-card{

            width:320px;

        }

    }

    /* ==========================================================
       TABLET
    ========================================================== */

    @media (max-width:992px){

        .hero-section .carousel,
        .hero-section .carousel-inner,
        .hero-section .carousel-item{

            height:600px;

        }

        .hero-grid{

            grid-template-columns:1fr;

            text-align:center;

        }

        .hero-left{

            max-width:720px;

            margin:auto;

        }

        .hero-left p{

            margin-left:auto;
            margin-right:auto;

        }

        .hero-buttons{

            justify-content:center;

        }

        .hero-metrics{

            justify-content:center;

        }

        .hero-right{

            justify-content:center;

            margin-top:2rem;

        }

    }

    /* ==========================================================
       MOBILE
    ========================================================== */

    @media (max-width:768px){

        .hero-section{

            margin-bottom:3rem;

        }

        .hero-section .carousel,
        .hero-section .carousel-inner,
        .hero-section .carousel-item{

            height:520px;

        }

        .hero-overlay{

            background:

                    linear-gradient(

                            rgba(0,0,0,.60),

                            rgba(0,0,0,.55)

                    );

        }

        .hero-overlay .container-max{

            padding-left:1.5rem;
            padding-right:1.5rem;

        }

        .hero-left h1{

            font-size:2.7rem;

        }

        .hero-left p{

            font-size:1rem;

            margin-top:1.3rem;

        }

        .hero-btn{

            min-height:52px;

        }

    }

    /* ==========================================================
       SMALL MOBILE
    ========================================================== */

    @media (max-width:576px){

        .hero-section .carousel,
        .hero-section .carousel-inner,
        .hero-section .carousel-item{

            height:470px;

        }

        .hero-left h1{

            font-size:2.15rem;

            line-height:1.08;

        }

        .hero-left p{

            display:none;

        }

        .hero-buttons{

            flex-direction:column;

            width:100%;

        }

        .hero-btn{

            width:100%;

        }

        .hero-metrics{

            display:none;

        }

        .hero-glass-card{

            width:100%;

        }

        .carousel-control-prev,
        .carousel-control-next{

            display:none;

        }

    }

    /* ==========================================================
       EXTRA SMALL
    ========================================================== */

    @media (max-width:425px){

        .hero-section .carousel,
        .hero-section .carousel-inner,
        .hero-section .carousel-item{

            height:430px;

        }

        .hero-left h1{

            font-size:1.8rem;

        }

        .hero-tag{

            font-size:11px;

            padding:8px 14px;

        }

        .hero-glass-card{

            padding:1.25rem;

            border-radius:20px;

        }

    }

    /* ==========================================================
       320 DEVICES
    ========================================================== */

    @media (max-width:320px){

        .hero-section .carousel,
        .hero-section .carousel-inner,
        .hero-section .carousel-item{

            height:400px;

        }

        .hero-overlay .container-max{

            padding-left:1rem;
            padding-right:1rem;

        }

        .hero-left h1{

            font-size:1.55rem;

        }

        .hero-btn{

            min-height:46px;

            font-size:.85rem;

            padding:0 16px;

        }

        .hero-tag{

            font-size:10px;

            letter-spacing:.12em;

        }

    }

    /* ==========================================================
       ACCESSIBILITY
    ========================================================== */

    .hero-btn:focus-visible,
    .carousel-control-prev:focus-visible,
    .carousel-control-next:focus-visible{

        outline:3px solid rgba(255,255,255,.8);

        outline-offset:3px;

    }

    .hero-btn:active{

        transform:scale(.98);

    }

    /* ==========================================================
       TEXT RENDERING
    ========================================================== */

    .hero-left h1,
    .hero-left p,
    .hero-tag{

        text-rendering:optimizeLegibility;
        -webkit-font-smoothing:antialiased;

    }
</style>


<div class=" mx-auto " style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">
            <!-- ======================================================
 HERO CAROUSEL
=======================================================-->

            <!-- =========================================================
  HERO SECTION
 ========================================================== -->
            <!-- ==========================================================
  HERO
 =========================================================== -->

            <section class="hero-section">

                <div id="marketHero"
                     class="carousel slide carousel-fade"
                     data-bs-ride="carousel"
                     data-bs-interval="6000">

                    <!-- Indicators -->
                    <div class="carousel-indicators">

                        <button type="button"
                                data-bs-target="#marketHero"
                                data-bs-slide-to="0"
                                class="active"></button>

                        <button type="button"
                                data-bs-target="#marketHero"
                                data-bs-slide-to="1"></button>

                        <button type="button"
                                data-bs-target="#marketHero"
                                data-bs-slide-to="2"></button>

                    </div>

                    <div class="carousel-inner">

                        <!-- ====================================== -->
                        <!-- Slide 1 -->
                        <!-- ====================================== -->

                        <div class="carousel-item active">

                            <img
                                src="https://images.pexels.com/photos/4386366/pexels-photo-4386366.jpeg?auto=compress&cs=tinysrgb&w=1920"
                                class="hero-image"
                                alt="MarketNiro">

                            <div class="hero-overlay">

                                <div class="container-max">

                                    <div class="hero-grid">

                                        <!-- LEFT -->

                                        <div class="hero-left">

                                <span class="hero-tag">

                                    MARKET INTELLIGENCE

                                </span>

                                            <h1>

                                                Five Markets.<br>

                                                One Platform.

                                            </h1>

                                            <p>

                                                Track Gold, Silver, Currency,
                                                Rubber and Pineapple prices
                                                from one premium dashboard.

                                            </p>

                                            <div class="hero-buttons">

                                                <a href="#markets"
                                                   class="hero-btn hero-btn-primary">

                                                    Explore Markets

                                                    <span class="material-symbols-outlined">

                                            arrow_forward

                                        </span>

                                                </a>

                                                <a href="#news"
                                                   class="hero-btn hero-btn-secondary">

                                                    Latest News

                                                </a>

                                            </div>

                                            <div class="hero-metrics">

                                                <div>

                                                    <strong>5</strong>

                                                    <span>Markets</span>

                                                </div>

                                                <div>

                                                    <strong>Daily</strong>

                                                    <span>Updates</span>

                                                </div>

                                                <div>

                                                    <strong>Reliable</strong>

                                                    <span>Insights</span>

                                                </div>

                                            </div>

                                        </div>

                                        <!-- RIGHT -->

                                        <div class="hero-right">

                                            <div class="hero-glass-card">

                                                <div class="glass-header">

                                        <span class="material-symbols-outlined">

                                            monitoring

                                        </span>

                                                    Today's Highlights

                                                </div>

                                                <div class="glass-body">

                                                    <div class="market-row">

                                                        <span>Gold</span>

                                                        <strong>₹9,850/g</strong>

                                                    </div>

                                                    <div class="market-row">

                                                        <span>Silver</span>

                                                        <strong>₹118/kg</strong>

                                                    </div>

                                                    <div class="market-row">

                                                        <span>Rubber</span>

                                                        <strong>₹242/kg</strong>

                                                    </div>

                                                    <div class="market-row">

                                                        <span>Pineapple</span>

                                                        <strong>₹50/kg</strong>

                                                    </div>

                                                    <div class="market-row">

                                                        <span>USD/INR</span>

                                                        <strong>₹87.42</strong>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- ====================================== -->
                        <!-- Slide 2 -->
                        <!-- ====================================== -->

                        <div class="carousel-item">

                            <img
                                src="https://images.pexels.com/photos/844124/pexels-photo-844124.jpeg?auto=compress&cs=tinysrgb&w=1920"
                                class="hero-image"
                                alt="Gold">

                            <div class="hero-overlay">

                                <div class="container-max">

                                    <div class="hero-grid">

                                        <div class="hero-left">

                                <span class="hero-tag">

                                    PRECIOUS METALS

                                </span>

                                            <h1>

                                                Gold & Silver<br>

                                                Market Intelligence

                                            </h1>

                                            <p>

                                                Daily price movements,
                                                historical charts,
                                                expert market analysis.

                                            </p>

                                            <div class="hero-buttons">

                                                <a href="#gold"
                                                   class="hero-btn hero-btn-primary">

                                                    View Gold

                                                </a>

                                            </div>

                                        </div>

                                        <div class="hero-right"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- ====================================== -->
                        <!-- Slide 3 -->
                        <!-- ====================================== -->

                        <div class="carousel-item">

                            <img
                                src="https://images.pexels.com/photos/2286895/pexels-photo-2286895.jpeg?auto=compress&cs=tinysrgb&w=1920"
                                class="hero-image"
                                alt="Currency">

                            <div class="hero-overlay">

                                <div class="container-max">

                                    <div class="hero-grid">

                                        <div class="hero-left">

                                <span class="hero-tag">

                                    UPDATED EVERY MORNING

                                </span>

                                            <h1>

                                                Start Your Day<br>

                                                With Better Data

                                            </h1>

                                            <p>

                                                Agricultural commodities
                                                and financial markets
                                                on one platform.

                                            </p>

                                            <div class="hero-buttons">

                                                <a href="#markets"
                                                   class="hero-btn hero-btn-primary">

                                                    View Dashboard

                                                </a>

                                            </div>

                                        </div>

                                        <div class="hero-right"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Controls -->

                    <button class="carousel-control-prev"
                            data-bs-target="#marketHero"
                            data-bs-slide="prev"
                            type="button">

                        <div class="hero-arrow">

                <span class="material-symbols-outlined">

                    chevron_left

                </span>

                        </div>

                    </button>

                    <button class="carousel-control-next"
                            data-bs-target="#marketHero"
                            data-bs-slide="next"
                            type="button">

                        <div class="hero-arrow">

                <span class="material-symbols-outlined">

                    chevron_right

                </span>

                        </div>

                    </button>

                </div>

            </section>
        </main>

        <script>

            const carousel = document.querySelector('#carouselExampleControls');

            new bootstrap.Carousel(carousel,{
                interval:5000,
                pause:'hover',
                ride:'carousel',
                wrap:true
            });

        </script>
    </div>
</div>
