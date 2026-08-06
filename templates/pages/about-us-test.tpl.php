<?php

?>


<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5" style="margin:0 auto;">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <main class="flex-grow-1" style="min-width:0;">

            <style>
                /* ===========================
                   HERO CAROUSEL
                =========================== */

                .hero-carousel {
                    border-radius: var(--radius-2xl);
                    overflow: hidden;
                    box-shadow: 0 18px 50px rgba(0,0,0,.08);
                    margin-bottom: 3rem;
                }

                .hero-carousel .carousel-item{
                    height:520px;
                    position:relative;
                }

                .hero-carousel img{
                    width:100%;
                    height:100%;
                    object-fit:cover;
                }

                .hero-carousel .carousel-item::before{
                    content:"";
                    position:absolute;
                    inset:0;
                    background:
                            linear-gradient(90deg,
                            rgba(10,20,20,.75) 0%,
                            rgba(10,20,20,.45) 45%,
                            rgba(10,20,20,.15) 100%);
                    z-index:1;
                }

                .hero-content{
                    position:absolute;
                    inset:0;
                    z-index:2;
                    display:flex;
                    align-items:center;
                }

                .hero-box{
                    max-width:650px;
                    color:#fff;
                }

                .hero-tag{
                    display:inline-flex;
                    align-items:center;
                    gap:.5rem;
                    padding:.55rem 1rem;
                    border-radius:999px;
                    background:rgba(255,255,255,.15);
                    backdrop-filter:blur(10px);
                    font-size:.9rem;
                    font-weight:600;
                    margin-bottom:1.5rem;
                }

                .hero-title{
                    font-family:var(--font-headline);
                    font-size:3.6rem;
                    font-weight:800;
                    line-height:1.05;
                    margin-bottom:1rem;
                }

                .hero-description{
                    font-size:1.1rem;
                    line-height:1.8;
                    color:rgba(255,255,255,.92);
                    max-width:580px;
                }

                .hero-buttons{
                    margin-top:2rem;
                    display:flex;
                    gap:1rem;
                    flex-wrap:wrap;
                }

                .btn-hero-primary{
                    background:var(--primary);
                    color:#fff;
                    border:none;
                    border-radius:12px;
                    padding:.9rem 1.6rem;
                    font-weight:700;
                }

                .btn-hero-secondary{
                    background:rgba(255,255,255,.15);
                    color:#fff;
                    border:1px solid rgba(255,255,255,.25);
                    border-radius:12px;
                    padding:.9rem 1.6rem;
                    font-weight:700;
                    backdrop-filter:blur(10px);
                }

                .carousel-control-next,
                .carousel-control-prev{
                    width:6%;
                }

                .carousel-indicators button{
                    width:12px;
                    height:12px;
                    border-radius:50%;
                }

                @media(max-width:768px){

                    .hero-carousel .carousel-item{
                        height:420px;
                    }

                    .hero-title{
                        font-size:2.3rem;
                    }

                    .hero-description{
                        font-size:1rem;
                    }

                }


                .market-overview{

                    padding-top:60px;
                    padding-bottom:70px;

                }

                .section-heading{

                    max-width:760px;
                    margin:auto;

                }

                .section-badge{

                    display:inline-block;
                    background:#e8f7ee;
                    color:var(--primary);
                    padding:8px 18px;
                    border-radius:50px;
                    font-size:13px;
                    font-weight:700;
                    letter-spacing:1px;
                    margin-bottom:18px;

                }

                .section-heading h2{

                    font-family:var(--font-headline);
                    font-size:46px;
                    font-weight:800;

                }

                .section-heading h2 span{

                    color:var(--primary);

                }

                .section-heading p{

                    color:var(--text-secondary);
                    font-size:17px;
                    line-height:1.8;
                    margin-top:18px;

                }

                .market-card{

                    background:white;
                    border-radius:22px;
                    padding:35px;
                    text-align:center;
                    transition:.35s;
                    border:1px solid #edf1ef;
                    box-shadow:0 15px 35px rgba(0,0,0,.05);

                }

                .market-card:hover{

                    transform:translateY(-8px);

                }

                .market-card img{

                    width:90px;
                    margin-bottom:18px;

                }

                .market-name{

                    font-size:14px;
                    font-weight:700;
                    text-transform:uppercase;
                    color:var(--primary);

                }

                .market-price{

                    margin-top:12px;
                    font-size:38px;
                    font-weight:800;
                    font-family:var(--font-headline);

                }

                .market-price small{

                    font-size:17px;
                    color:#888;

                }

                .market-change{

                    margin-top:15px;
                    font-weight:700;

                }

                .market-change.positive{

                    color:#16A34A;

                }

                .market-change.negative{

                    color:#DC2626;

                }

                .market-date{

                    margin-top:15px;
                    font-size:13px;
                    color:#999;

                }

                @media(max-width:768px){

                    .section-heading h2{

                        font-size:34px;

                    }

                    .market-price{

                        font-size:30px;

                    }

                    .market-card{

                        padding:28px;

                    }

                }

                .market-intelligence{

                    padding:70px 0;

                }

                .market-panel,
                .snapshot-card{

                    background:#fff;

                    border-radius:22px;

                    padding:35px;

                    border:1px solid #edf2ef;

                    box-shadow:0 18px 45px rgba(0,0,0,.05);

                    height:100%;

                }

                .panel-header{

                    display:flex;

                    justify-content:space-between;

                    align-items:center;

                    margin-bottom:30px;

                }

                .panel-header h2{

                    font-size:34px;

                    font-family:var(--font-headline);

                    font-weight:800;

                }

                .section-mini-title{

                    display:inline-block;

                    font-size:12px;

                    letter-spacing:2px;

                    color:var(--primary);

                    font-weight:700;

                    margin-bottom:10px;

                }

                .market-live{

                    display:flex;

                    align-items:center;

                    gap:8px;

                    color:var(--success);

                    font-weight:700;

                }

                .live-dot{

                    width:10px;

                    height:10px;

                    border-radius:50%;

                    background:#16A34A;

                    animation:pulse 1.5s infinite;

                }

                @keyframes pulse{

                    0%{

                        transform:scale(.9);

                        opacity:.6;

                    }

                    50%{

                        transform:scale(1.2);

                        opacity:1;

                    }

                    100%{

                        transform:scale(.9);

                        opacity:.6;

                    }

                }

                .market-table th{

                    font-size:13px;

                    text-transform:uppercase;

                    color:#777;

                    border:none;

                }

                .market-table td{

                    padding:18px 8px;

                    vertical-align:middle;

                    border-top:1px solid #f2f2f2;

                    font-weight:600;

                }

                .market-table tbody tr:hover{

                    background:#f9fcfa;

                }

                .positive{

                    color:#16A34A;

                }

                .negative{

                    color:#DC2626;

                }

                .status{

                    padding:6px 14px;

                    border-radius:30px;

                    font-size:12px;

                    font-weight:700;

                }

                .bullish{

                    background:#eaf8ef;

                    color:#16A34A;

                }

                .bearish{

                    background:#fdecec;

                    color:#DC2626;

                }

                .stable{

                    background:#eef3ff;

                    color:#2563EB;

                }

                .snapshot-card h3{

                    margin-top:10px;

                    margin-bottom:25px;

                    font-size:28px;

                    font-family:var(--font-headline);

                    font-weight:800;

                }

                .snapshot-card ul{

                    padding:0;

                    list-style:none;

                }

                .snapshot-card li{

                    position:relative;

                    padding-left:28px;

                    margin-bottom:20px;

                    line-height:1.7;

                    color:var(--text-secondary);

                }

                .snapshot-card li::before{

                    content:"✓";

                    position:absolute;

                    left:0;

                    color:var(--success);

                    font-weight:800;

                }

            </style>

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
