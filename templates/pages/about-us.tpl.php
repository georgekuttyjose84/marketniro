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

    /* ==========================================================
   MARKET SECTION
========================================================== */

    .market-section{

        padding:5rem 0;

        position:relative;

        background:var(--background);

    }

    .market-section-heading{

        max-width:760px;

        margin:0 auto 4rem;

        text-align:center;

    }

    .section-tag{

        display:inline-flex;

        align-items:center;

        justify-content:center;

        padding:8px 18px;

        border-radius:999px;

        background:rgba(0,107,44,.08);

        color:var(--primary);

        font-size:.72rem;

        font-weight:700;

        text-transform:uppercase;

        letter-spacing:.18em;

        margin-bottom:1.25rem;

    }

    .market-section-heading h2{

        margin:0;

        font-family:var(--font-headline);

        font-size:clamp(2.2rem,4vw,3.5rem);

        font-weight:800;

        line-height:1.1;

        letter-spacing:-.04em;

        color:var(--on-background);

    }

    .market-section-heading h2 span{

        color:var(--primary);

    }

    .market-section-heading p{

        margin:1.5rem auto 0;

        max-width:620px;

        color:var(--text-secondary);

        font-size:1.05rem;

        line-height:1.8;

    }

    /* ==========================================================
       CARD
    ========================================================== */

    .market-card{

        position:relative;

        display:flex;

        flex-direction:column;

        height:100%;

        padding:2rem;

        border-radius:24px;

        background:var(--surface);

        border:1px solid rgba(0,0,0,.05);

        overflow:hidden;

        transition:.35s ease;

        box-shadow:

                0 8px 30px rgba(15,23,42,.05);

    }

    /* subtle top glow */

    .market-card::before{

        content:"";

        position:absolute;

        top:0;

        left:0;

        right:0;

        height:5px;

        background:var(--accent);

    }

    /* soft background circle */

    .market-card::after{

        content:"";

        position:absolute;

        width:180px;

        height:180px;

        right:-60px;

        top:-60px;

        border-radius:50%;

        background:rgba(0,107,44,.04);

    }

    /* ==========================================================
       TOP
    ========================================================== */

    .market-card-top{

        display:flex;

        align-items:center;

        justify-content:space-between;

        margin-bottom:2rem;

        position:relative;

        z-index:2;

    }

    .market-badge{

        font-size:.72rem;

        font-weight:700;

        letter-spacing:.12em;

        text-transform:uppercase;

        color:var(--accent);

    }

    .market-card-top .material-symbols-outlined{

        font-size:20px;

        color:var(--accent);

        transition:.30s;

    }

    /* ==========================================================
       IMAGE
    ========================================================== */

    .market-image{

        position:relative;

        z-index:2;

        width:110px;

        height:110px;

        margin:0 auto 2rem;

        border-radius:50%;

        display:flex;

        align-items:center;

        justify-content:center;

        background:rgba(255,255,255,.95);

        border:1px solid rgba(0,0,0,.05);

        box-shadow:

                0 10px 25px rgba(0,0,0,.08);

    }

    .market-image img{

        width:82px;

        height:auto;

        transition:.35s;

    }

    /* ==========================================================
       CONTENT
    ========================================================== */

    .market-content{

        position:relative;

        z-index:2;

        text-align:center;

    }

    .market-content h3{

        margin:0;

        font-family:var(--font-headline);

        font-size:1.45rem;

        font-weight:700;

        color:var(--on-background);

    }

    .market-price{

        margin-top:1.2rem;

        font-family:var(--font-headline);

        font-size:2.5rem;

        font-weight:800;

        line-height:1;

        color:var(--on-background);

    }

    .market-price span{

        display:block;

        margin-top:.45rem;

        font-size:.95rem;

        font-weight:600;

        color:var(--text-secondary);

    }

    .market-change{

        margin-top:1.25rem;

        font-size:.95rem;

        font-weight:700;

    }

    .market-change.positive{

        color:#16A34A;

    }

    .market-change small{

        display:block;

        margin-top:4px;

        color:var(--text-secondary);

        font-size:.78rem;

        font-weight:500;

    }

    .market-update{

        margin-top:1.6rem;

        color:var(--text-secondary);

        font-size:.82rem;

    }

    .market-update strong{

        display:block;

        margin-top:5px;

        color:var(--on-background);

        font-weight:700;

    }

    /* ==========================================================
       LINK
    ========================================================== */

    .market-link{

        position:relative;

        z-index:2;

        margin-top:auto;

        padding-top:2rem;

        display:flex;

        align-items:center;

        justify-content:center;

        gap:.45rem;

        text-decoration:none;

        color:var(--accent);

        font-weight:700;

        transition:.30s;

    }

    .market-link .material-symbols-outlined{

        transition:.30s;

    }

    /* ==========================================================
   MARKET CARD COLORS
========================================================== */

    .market-card.gold{
        --accent:#F59E0B;
    }

    .market-card.silver{
        --accent:#94A3B8;
    }

    .market-card.rubber{
        --accent:#16A34A;
    }

    .market-card.currency{
        --accent:#2563EB;
    }

    .market-card.pineapple-green{
        --accent:#22C55E;
    }

    .market-card.pineapple-ripe{
        --accent:#D97706;
    }

    /* ==========================================================
       HOVER EFFECT
    ========================================================== */

    .market-card:hover{

        transform:translateY(-12px);

        border-color:rgba(0,107,44,.12);

        box-shadow:
                0 30px 70px rgba(15,23,42,.12);

    }

    .market-card:hover::after{

        transform:scale(1.2);

        transition:.45s;

    }

    .market-card:hover .market-image{

        transform:translateY(-4px);

    }

    .market-card:hover .market-image img{

        transform:rotate(-8deg) scale(1.08);

    }

    .market-card:hover .market-card-top .material-symbols-outlined{

        transform:translate(5px,-5px);

    }

    .market-card:hover .market-link{

        gap:.9rem;

    }

    .market-card:hover .market-link .material-symbols-outlined{

        transform:translateX(6px);

    }

    .market-card:hover .market-price{

        color:var(--accent);

    }

    /* ==========================================================
       IMAGE BACKGROUND
    ========================================================== */

    .market-card.gold .market-image{

        background:
                linear-gradient(135deg,#FFF7E0,#FFE7A6);

    }

    .market-card.silver .market-image{

        background:
                linear-gradient(135deg,#F8FAFC,#E2E8F0);

    }

    .market-card.rubber .market-image{

        background:
                linear-gradient(135deg,#ECFDF3,#D1FAE5);

    }

    .market-card.currency .market-image{

        background:
                linear-gradient(135deg,#EFF6FF,#DBEAFE);

    }

    .market-card.pineapple-green .market-image{

        background:
                linear-gradient(135deg,#F0FDF4,#DCFCE7);

    }

    .market-card.pineapple-ripe .market-image{

        background:
                linear-gradient(135deg,#FFF7ED,#FED7AA);

    }

    /* ==========================================================
       RESPONSIVE
    ========================================================== */

    @media (max-width:1200px){

        .market-card{

            padding:1.75rem;

        }

    }

    @media (max-width:992px){

        .market-section{

            padding:4rem 0;

        }

    }

    @media (max-width:768px){

        .market-section-heading{

            margin-bottom:3rem;

        }

        .market-card{

            padding:1.5rem;

        }

        .market-image{

            width:95px;
            height:95px;

            margin-bottom:1.5rem;

        }

        .market-image img{

            width:70px;

        }

        .market-content h3{

            font-size:1.3rem;

        }

        .market-price{

            font-size:2.1rem;

        }

    }

    @media (max-width:576px){

        .market-section{

            padding:3rem 0;

        }

        .market-section-heading h2{

            font-size:2rem;

        }

        .market-section-heading p{

            font-size:.95rem;

        }

        .market-card{

            border-radius:20px;

        }

    }

    @media (max-width:425px){

        .market-card{

            padding:1.35rem;

        }

        .market-image{

            width:85px;
            height:85px;

        }

        .market-image img{

            width:62px;

        }

        .market-price{

            font-size:1.8rem;

        }

        .market-content h3{

            font-size:1.2rem;

        }

    }

    @media (max-width:320px){

        .market-card{

            padding:1.1rem;

        }

        .market-section-heading h2{

            font-size:1.75rem;

        }

        .market-link{

            font-size:.9rem;

        }

    }

    /* ==========================================================
       SMOOTH ANIMATION
    ========================================================== */

    .market-card,
    .market-image,
    .market-image img,
    .market-link,
    .market-price,
    .market-card-top .material-symbols-outlined,
    .market-card::after{

        transition:all .35s ease;

    }

    /* ==========================================================
       ACCESSIBILITY
    ========================================================== */

    .market-link:focus-visible{

        outline:3px solid var(--accent);

        outline-offset:4px;

    }

    /* ==========================================================
   MARKET SNAPSHOT
========================================================== */

    .snapshot-section{
        padding:6rem 0;
        background:var(--surface-container-low);
        position:relative;
        overflow:hidden;
    }

    /* Decorative background */
    .snapshot-section::before{
        content:"";
        position:absolute;
        width:420px;
        height:420px;
        border-radius:50%;
        background:rgba(22,163,74,.04);
        top:-180px;
        right:-120px;
        z-index:0;
    }

    .snapshot-section .container-max{
        position:relative;
        z-index:2;
    }

    /* ==========================================================
       SNAPSHOT CARD
    ========================================================== */

    .snapshot-card{

        background:var(--surface);

        border-radius:28px;

        overflow:hidden;

        border:1px solid rgba(15,23,42,.06);

        box-shadow:
                0 12px 40px rgba(15,23,42,.06);

    }

    /* ==========================================================
       ROW
    ========================================================== */

    .snapshot-row{

        display:grid;

        grid-template-columns:
        minmax(240px,2fr)
        1fr
        130px
        40px;

        align-items:center;

        gap:2rem;

        padding:1.35rem 2rem;

        text-decoration:none;

        color:inherit;

        transition:.30s ease;

        border-bottom:1px solid rgba(15,23,42,.06);

        position:relative;

    }

    .snapshot-row:last-child{

        border-bottom:none;

    }

    .snapshot-row::before{

        content:"";

        position:absolute;

        left:0;

        top:0;

        width:4px;

        height:100%;

        background:transparent;

        transition:.30s;

    }

    /* ==========================================================
       MARKET
    ========================================================== */

    .snapshot-market{

        display:flex;

        align-items:center;

        gap:1rem;

    }

    .snapshot-icon{

        width:60px;

        height:60px;

        border-radius:18px;

        display:flex;

        align-items:center;

        justify-content:center;

        background:#fff;

        box-shadow:
                0 8px 20px rgba(15,23,42,.08);

    }

    .snapshot-icon img{

        width:42px;

        height:auto;

        transition:.30s;

    }

    .snapshot-market h4{

        margin:0;

        font-size:1.05rem;

        font-weight:700;

        color:var(--on-background);

    }

    .snapshot-market small{

        display:block;

        margin-top:.35rem;

        color:var(--text-secondary);

        font-size:.82rem;

    }

    /* ==========================================================
       PRICE
    ========================================================== */

    .snapshot-price{

        font-size:1.55rem;

        font-weight:800;

        color:var(--on-background);

        font-family:var(--font-headline);

    }

    .snapshot-price span{

        font-size:.90rem;

        color:var(--text-secondary);

        margin-left:.35rem;

    }

    /* ==========================================================
       CHANGE
    ========================================================== */

    .snapshot-change{

        font-weight:700;

        text-align:right;

        font-size:.95rem;

    }

    .snapshot-change.positive{

        color:#16A34A;

    }

    .snapshot-change.negative{

        color:#DC2626;

    }

    /* ==========================================================
       ARROW
    ========================================================== */

    .snapshot-row .material-symbols-outlined{

        color:var(--text-secondary);

        transition:.30s;

    }

    /* ==========================================================
       MARKET COLORS
    ========================================================== */

    .snapshot-row.gold{
        --accent:#F59E0B;
    }

    .snapshot-row.silver{
        --accent:#94A3B8;
    }

    .snapshot-row.currency{
        --accent:#2563EB;
    }

    .snapshot-row.rubber{
        --accent:#16A34A;
    }

    .snapshot-row.pineapple-green{
        --accent:#22C55E;
    }

    .snapshot-row.pineapple-ripe{
        --accent:#D97706;
    }

    /* ==========================================================
       HOVER
    ========================================================== */

    .snapshot-row:hover{

        background:rgba(22,163,74,.03);

    }

    .snapshot-row:hover::before{

        background:var(--accent);

    }

    .snapshot-row:hover .snapshot-price{

        color:var(--accent);

    }

    .snapshot-row:hover .snapshot-icon{

        transform:translateY(-2px);

    }

    .snapshot-row:hover img{

        transform:scale(1.08);

    }

    .snapshot-row:hover .material-symbols-outlined{

        color:var(--accent);

        transform:translateX(6px);

    }

    /* ==========================================================
       RESPONSIVE
    ========================================================== */

    @media (max-width:992px){

        .snapshot-row{

            grid-template-columns:
            1fr
            auto;

            gap:1rem;

        }

        .snapshot-price{

            grid-column:1;

            margin-left:76px;

        }

        .snapshot-change{

            text-align:left;

            margin-left:76px;

        }

    }

    @media (max-width:768px){

        .snapshot-section{

            padding:4rem 0;

        }

        .snapshot-card{

            border-radius:22px;

        }

        .snapshot-row{

            padding:1.25rem;

            grid-template-columns:1fr;

            gap:.85rem;

        }

        .snapshot-market{

            width:100%;

        }

        .snapshot-price{

            margin-left:76px;

        }

        .snapshot-change{

            margin-left:76px;

        }

        .snapshot-row .material-symbols-outlined{

            position:absolute;

            right:1.25rem;

            top:50%;

            transform:translateY(-50%);

        }

    }

    @media (max-width:576px){

        .snapshot-section{

            padding:3rem 0;

        }

        .snapshot-icon{

            width:52px;
            height:52px;

        }

        .snapshot-icon img{

            width:36px;

        }

        .snapshot-price{

            font-size:1.35rem;

            margin-left:64px;

        }

        .snapshot-change{

            margin-left:64px;

        }

    }

    @media (max-width:425px){

        .snapshot-market h4{

            font-size:1rem;

        }

        .snapshot-market small{

            font-size:.75rem;

        }

        .snapshot-price{

            font-size:1.2rem;

        }

    }

    @media (max-width:320px){

        .snapshot-row{

            padding:1rem;

        }

        .snapshot-icon{

            width:46px;
            height:46px;

        }

        .snapshot-icon img{

            width:30px;

        }

        .snapshot-price{

            margin-left:56px;

            font-size:1.1rem;

        }

        .snapshot-change{

            margin-left:56px;

            font-size:.85rem;

        }

    }

    /* ==========================================================
       ACCESSIBILITY
    ========================================================== */

    .snapshot-row:focus-visible{

        outline:3px solid var(--primary);

        outline-offset:-3px;

    }

    /* ==========================================================
   FEATURED MARKETS
========================================================== */

    .featured-markets{
        padding:6rem 0;
        background:var(--surface);
        position:relative;
        overflow:hidden;
    }

    .featured-markets .section-header{
        max-width:760px;
        margin:0 auto 5rem;
        text-align:center;
    }

    /* ==========================================================
       FEATURED CARD
    ========================================================== */

    .featured-market{

        position:relative;

        padding:3rem;

        margin-bottom:4rem;

        border-radius:28px;

        background:var(--surface);

        border:1px solid rgba(15,23,42,.06);

        box-shadow:
                0 12px 40px rgba(15,23,42,.06);

        overflow:hidden;

    }

    .featured-market:last-child{

        margin-bottom:0;

    }

    .featured-market::before{

        content:"";

        position:absolute;

        inset:0;

        background:
                radial-gradient(
                        circle at top right,
                        rgba(22,163,74,.05),
                        transparent 60%
                );

        pointer-events:none;

    }

    /* ==========================================================
       IMAGE
    ========================================================== */

    .featured-image{

        display:flex;

        align-items:center;

        justify-content:center;

    }

    .featured-image img{

        width:320px;

        max-width:100%;

        height:auto;

        border-radius:24px;

        padding:2rem;

        background:#fff;

        box-shadow:
                0 20px 50px rgba(15,23,42,.10);

        transition:.35s ease;

    }

    /* ==========================================================
       CONTENT
    ========================================================== */

    .featured-content{

        position:relative;

        z-index:2;

    }

    .market-category{

        display:inline-flex;

        align-items:center;

        justify-content:center;

        padding:.55rem 1rem;

        border-radius:999px;

        background:rgba(22,163,74,.08);

        color:var(--primary);

        font-size:.75rem;

        font-weight:700;

        letter-spacing:.12em;

        text-transform:uppercase;

    }

    .featured-content h3{

        margin:1.25rem 0;

        font-family:var(--font-headline);

        font-size:2.3rem;

        font-weight:800;

        color:var(--on-background);

    }

    .featured-content p{

        color:var(--text-secondary);

        line-height:1.9;

        font-size:1rem;

        max-width:620px;

    }

    /* ==========================================================
       FEATURES
    ========================================================== */

    .feature-item{

        display:flex;

        align-items:flex-start;

        gap:1rem;

        padding:1rem;

        border-radius:18px;

        background:rgba(22,163,74,.03);

        border:1px solid rgba(22,163,74,.06);

        transition:.3s;

        height:100%;

    }

    .feature-item .material-symbols-outlined{

        font-size:30px;

        color:var(--primary);

    }

    .feature-item h5{

        margin:0;

        font-size:1rem;

        font-weight:700;

        color:var(--on-background);

    }

    .feature-item p{

        margin:.4rem 0 0;

        font-size:.88rem;

        color:var(--text-secondary);

        line-height:1.6;

    }

    /* ==========================================================
       BUTTON
    ========================================================== */

    .featured-btn{

        display:inline-flex;

        align-items:center;

        gap:.6rem;

        margin-top:2.5rem;

        padding:14px 28px;

        border-radius:14px;

        background:var(--primary);

        color:#fff;

        text-decoration:none;

        font-weight:700;

        transition:.3s;

        box-shadow:
                0 16px 35px rgba(22,163,74,.25);

    }

    .featured-btn:hover{

        color:#fff;

        background:#0d8b40;

    }

    /* ==========================================================
   FEATURED MARKET COLORS
========================================================== */

    .featured-market.pineapple{
        --accent:#22C55E;
    }

    .featured-market.rubber{
        --accent:#16A34A;
    }

    .featured-market.gold{
        --accent:#F59E0B;
    }

    .featured-market.silver{
        --accent:#94A3B8;
    }

    .featured-market.currency{
        --accent:#2563EB;
    }

    /* ==========================================================
       LEFT BORDER
    ========================================================== */

    .featured-market{

        border-left:6px solid var(--accent);

    }

    /* ==========================================================
       IMAGE CONTAINER
    ========================================================== */

    .featured-image{

        position:relative;

    }

    .featured-image::before{

        content:"";

        position:absolute;

        width:260px;

        height:260px;

        border-radius:50%;

        background:var(--accent);

        opacity:.08;

        left:50%;

        top:50%;

        transform:translate(-50%,-50%);

    }

    /* ==========================================================
       IMAGE
    ========================================================== */

    .featured-image img{

        position:relative;

        z-index:2;

        transition:.45s ease;

    }

    /* ==========================================================
       FEATURE ITEM
    ========================================================== */

    .feature-item{

        transition:.35s ease;

    }

    .feature-item:hover{

        background:#fff;

        transform:translateY(-3px);

        box-shadow:

                0 12px 35px rgba(15,23,42,.08);

    }

    .feature-item:hover .material-symbols-outlined{

        color:var(--accent);

    }

    /* ==========================================================
       BUTTON
    ========================================================== */

    .featured-btn{

        background:var(--accent);

        box-shadow:

                0 18px 40px rgba(15,23,42,.12);

    }

    .featured-btn:hover{

        transform:translateY(-3px);

    }

    .featured-btn .material-symbols-outlined{

        transition:.3s;

    }

    .featured-btn:hover .material-symbols-outlined{

        transform:translateX(5px);

    }

    /* ==========================================================
       HOVER
    ========================================================== */

    .featured-market{

        transition:.35s ease;

    }

    .featured-market:hover{

        transform:translateY(-8px);

        box-shadow:

                0 25px 70px rgba(15,23,42,.12);

    }

    .featured-market:hover .featured-image img{

        transform:scale(1.06) rotate(-4deg);

    }

    /* ==========================================================
       RESPONSIVE
    ========================================================== */

    @media (max-width:1200px){

        .featured-market{

            padding:2.5rem;

        }

    }

    @media (max-width:992px){

        .featured-markets{

            padding:5rem 0;

        }

        .featured-market{

            text-align:center;

        }

        .featured-content{

            margin-top:2rem;

        }

        .featured-content p{

            margin-left:auto;

            margin-right:auto;

        }

        .featured-btn{

            margin-inline:auto;

        }

    }

    @media (max-width:768px){

        .featured-markets{

            padding:4rem 0;

        }

        .featured-market{

            padding:2rem;

            border-radius:24px;

            margin-bottom:3rem;

        }

        .featured-content h3{

            font-size:2rem;

        }

        .featured-image img{

            width:240px;

        }

        .feature-item{

            text-align:left;

        }

    }

    @media (max-width:576px){

        .featured-market{

            padding:1.6rem;

        }

        .featured-content h3{

            font-size:1.7rem;

        }

        .featured-image img{

            width:180px;

            padding:1.4rem;

        }

        .feature-item{

            padding:.9rem;

        }

        .featured-btn{

            width:100%;

            justify-content:center;

        }

    }

    @media (max-width:425px){

        .featured-content h3{

            font-size:1.5rem;

        }

        .featured-content p{

            font-size:.95rem;

        }

        .feature-item{

            gap:.8rem;

        }

        .feature-item .material-symbols-outlined{

            font-size:26px;

        }

    }

    @media (max-width:320px){

        .featured-market{

            padding:1.2rem;

        }

        .featured-content h3{

            font-size:1.35rem;

        }

        .featured-image img{

            width:150px;

        }

        .featured-btn{

            padding:12px 18px;

            font-size:.9rem;

        }

    }

    /* ==========================================================
       ACCESSIBILITY
    ========================================================== */

    .featured-btn:focus-visible{

        outline:3px solid var(--accent);

        outline-offset:3px;

    }

    .feature-item,
    .featured-btn,
    .featured-market,
    .featured-image img{

        transition:all .35s ease;

    }

    /* ==========================================================
   LATEST NEWS
========================================================== */

    .latest-news{
        padding:6rem 0;
        background:var(--surface-container-low);
        position:relative;
        overflow:hidden;
    }

    .latest-news::before{
        content:"";
        position:absolute;
        width:500px;
        height:500px;
        border-radius:50%;
        background:rgba(22,163,74,.04);
        top:-220px;
        left:-150px;
    }

    .latest-news .container-max{
        position:relative;
        z-index:2;
    }

    /* ==========================================================
       NEWS CARD
    ========================================================== */

    .news-card{

        display:flex;

        flex-direction:column;

        height:100%;

        overflow:hidden;

        border-radius:24px;

        background:var(--surface);

        border:1px solid rgba(15,23,42,.06);

        box-shadow:
                0 12px 40px rgba(15,23,42,.06);

        transition:all .35s ease;

    }

    /* ==========================================================
       IMAGE
    ========================================================== */

    .news-image{

        position:relative;

        overflow:hidden;

        aspect-ratio:16/10;

        background:#fff;

    }

    .news-image img{

        width:100%;

        height:100%;

        object-fit:contain;

        padding:2rem;

        transition:transform .45s ease;

    }

    /* ==========================================================
       CATEGORY
    ========================================================== */

    .news-category{

        position:absolute;

        top:18px;

        left:18px;

        display:inline-flex;

        align-items:center;

        justify-content:center;

        padding:.45rem .9rem;

        border-radius:999px;

        background:#16A34A;

        color:#fff;

        font-size:.72rem;

        font-weight:700;

        text-transform:uppercase;

        letter-spacing:.08em;

        z-index:3;

    }

    .news-category.finance{

        background:#F59E0B;

    }

    .news-category.currency{

        background:#2563EB;

    }

    /* ==========================================================
       CONTENT
    ========================================================== */

    .news-content{

        display:flex;

        flex-direction:column;

        flex:1;

        padding:2rem;

    }

    .news-meta{

        display:flex;

        align-items:center;

        gap:.45rem;

        margin-bottom:1rem;

        color:var(--text-secondary);

        font-size:.82rem;

        font-weight:600;

    }

    .news-meta .material-symbols-outlined{

        font-size:18px;

    }

    .news-content h3{

        margin:0;

        font-family:var(--font-headline);

        font-size:1.4rem;

        font-weight:700;

        line-height:1.35;

        color:var(--on-background);

    }

    .news-content p{

        margin:1rem 0 0;

        color:var(--text-secondary);

        line-height:1.8;

        flex:1;

    }

    /* ==========================================================
       LINK
    ========================================================== */

    .news-link{

        display:inline-flex;

        align-items:center;

        gap:.5rem;

        margin-top:2rem;

        text-decoration:none;

        color:var(--primary);

        font-weight:700;

        transition:.3s;

    }

    .news-link .material-symbols-outlined{

        transition:.3s;

    }

    /* ==========================================================
       HOVER
    ========================================================== */

    .news-card:hover{

        transform:translateY(-10px);

        box-shadow:
                0 28px 70px rgba(15,23,42,.12);

    }

    .news-card:hover img{

        transform:scale(1.08);

    }

    .news-card:hover .news-link{

        gap:.9rem;

    }

    .news-card:hover .news-link .material-symbols-outlined{

        transform:translateX(5px);

    }

    .news-card:hover .news-category{

        transform:translateY(-2px);

    }

    /* ==========================================================
       BUTTON
    ========================================================== */

    .latest-news .btn-primary-custom{

        padding:14px 32px;

        border-radius:14px;

    }

    /* ==========================================================
       RESPONSIVE
    ========================================================== */

    @media (max-width:1200px){

        .news-content{

            padding:1.8rem;

        }

    }

    @media (max-width:992px){

        .latest-news{

            padding:5rem 0;

        }

    }

    @media (max-width:768px){

        .latest-news{

            padding:4rem 0;

        }

        .news-content{

            padding:1.5rem;

        }

        .news-content h3{

            font-size:1.25rem;

        }

        .news-image{

            aspect-ratio:16/9;

        }

    }

    @media (max-width:576px){

        .latest-news{

            padding:3rem 0;

        }

        .news-card{

            border-radius:20px;

        }

        .news-content{

            padding:1.35rem;

        }

        .news-content h3{

            font-size:1.15rem;

        }

        .news-image img{

            padding:1.5rem;

        }

        .latest-news .btn-primary-custom{

            width:100%;

        }

    }

    @media (max-width:425px){

        .news-content h3{

            font-size:1.05rem;

        }

        .news-content p{

            font-size:.92rem;

        }

    }

    @media (max-width:320px){

        .news-content{

            padding:1.1rem;

        }

        .news-meta{

            font-size:.75rem;

        }

        .news-category{

            font-size:.65rem;

            padding:.4rem .75rem;

        }

    }

    /* ==========================================================
       ACCESSIBILITY
    ========================================================== */

    .news-link:focus-visible{

        outline:3px solid var(--primary);

        outline-offset:4px;

    }

    /* ==========================================================
   NEWSLETTER CTA
========================================================== */

    .newsletter-section{

        padding:6rem 0;

        background:var(--surface);

    }

    .newsletter-card{

        position:relative;

        overflow:hidden;

        padding:5rem 3rem;

        text-align:center;

        border-radius:32px;

        background:linear-gradient(
                135deg,
                var(--primary),
                #0f8f45
        );

        color:#fff;

        box-shadow:
                0 35px 90px rgba(0,0,0,.15);

    }

    /* Decorative circles */

    .newsletter-card::before{

        content:"";

        position:absolute;

        width:320px;

        height:320px;

        border-radius:50%;

        background:rgba(255,255,255,.08);

        top:-120px;

        left:-120px;

    }

    .newsletter-card::after{

        content:"";

        position:absolute;

        width:260px;

        height:260px;

        border-radius:50%;

        background:rgba(255,255,255,.05);

        bottom:-100px;

        right:-100px;

    }

    /* ==========================================================
       CONTENT
    ========================================================== */

    .newsletter-tag{

        position:relative;

        z-index:2;

        display:inline-flex;

        padding:10px 20px;

        border-radius:999px;

        background:rgba(255,255,255,.18);

        font-size:.75rem;

        font-weight:700;

        letter-spacing:.12em;

        text-transform:uppercase;

        backdrop-filter:blur(10px);

    }

    .newsletter-card h2{

        position:relative;

        z-index:2;

        margin:1.8rem 0 1rem;

        font-family:var(--font-headline);

        font-size:clamp(2.2rem,5vw,3.5rem);

        font-weight:800;

        line-height:1.1;

    }

    .newsletter-card h2 span{

        color:#CFFFE0;

    }

    .newsletter-card p{

        position:relative;

        z-index:2;

        max-width:650px;

        margin:0 auto 2.5rem;

        font-size:1.05rem;

        line-height:1.9;

        color:rgba(255,255,255,.92);

    }

    /* ==========================================================
       FORM
    ========================================================== */

    .newsletter-form{

        position:relative;

        z-index:2;

        display:flex;

        max-width:700px;

        margin:0 auto;

        background:#fff;

        border-radius:999px;

        overflow:hidden;

        box-shadow:
                0 15px 40px rgba(0,0,0,.12);

    }

    .newsletter-form input{

        flex:1;

        border:none;

        outline:none;

        padding:20px 26px;

        font-size:1rem;

        background:transparent;

        color:var(--on-background);

    }

    .newsletter-form input::placeholder{

        color:#94A3B8;

    }

    .newsletter-form button{

        border:none;

        padding:0 34px;

        background:var(--primary);

        color:#fff;

        font-weight:700;

        cursor:pointer;

        transition:.3s;

    }

    .newsletter-form button:hover{

        background:#0b7a37;

    }

    /* ==========================================================
       FOOTNOTE
    ========================================================== */

    .newsletter-card small{

        position:relative;

        z-index:2;

        display:block;

        margin-top:1.5rem;

        color:rgba(255,255,255,.75);

        font-size:.85rem;

    }

    /* ==========================================================
       RESPONSIVE
    ========================================================== */

    @media(max-width:768px){

        .newsletter-section{

            padding:4rem 0;

        }

        .newsletter-card{

            padding:3rem 1.5rem;

            border-radius:24px;

        }

        .newsletter-form{

            flex-direction:column;

            border-radius:18px;

            background:transparent;

            box-shadow:none;

            gap:1rem;

        }

        .newsletter-form input{

            background:#fff;

            border-radius:16px;

            padding:18px;

        }

        .newsletter-form button{

            border-radius:16px;

            padding:18px;

        }

    }

    @media(max-width:576px){

        .newsletter-card h2{

            font-size:2rem;

        }

        .newsletter-card p{

            font-size:.95rem;

        }

    }

    @media(max-width:320px){

        .newsletter-card{

            padding:2rem 1rem;

        }

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


            <!-- ==========================================================
 FIVE MARKETS
=========================================================== -->

            <section class="market-section">

                <div class="container-max mx-auto px-3 px-md-4">

                    <!-- Heading -->

                    <div class="market-section-heading">

            <span class="section-tag">
                MARKET OVERVIEW
            </span>

                        <h2>
                            Five Markets.
                            <span>One Platform.</span>
                        </h2>

                        <p>
                            Track agricultural commodities and financial markets
                            from one intelligent dashboard updated every morning.
                        </p>

                    </div>

                    <div class="row g-4">

                        <!-- ================================================= -->
                        <!-- GOLD -->
                        <!-- ================================================= -->

                        <div class="col-12 col-sm-6 col-xl-4">

                            <article class="market-card gold">

                                <div class="market-card-top">

                        <span class="market-badge">

                            Gold

                        </span>

                                    <span class="material-symbols-outlined">

                            arrow_outward

                        </span>

                                </div>

                                <div class="market-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Gold">

                                </div>

                                <div class="market-content">

                                    <h3>

                                        Gold

                                    </h3>

                                    <div class="market-price">

                                        ₹9,850

                                        <span>/10g</span>

                                    </div>

                                    <div class="market-change positive">

                                        ▲ +2.04%

                                        <small>Today</small>

                                    </div>

                                    <div class="market-update">

                                        Updated

                                        <strong>

                                            05 Aug 2026

                                        </strong>

                                    </div>

                                </div>

                                <a href="#"
                                   class="market-link">

                                    View Market

                                    <span class="material-symbols-outlined">

                            east

                        </span>

                                </a>

                            </article>

                        </div>

                        <!-- ================================================= -->
                        <!-- SILVER -->
                        <!-- ================================================= -->

                        <div class="col-12 col-sm-6 col-xl-4">

                            <article class="market-card silver">

                                <div class="market-card-top">

                        <span class="market-badge">

                            Silver

                        </span>

                                    <span class="material-symbols-outlined">

                            arrow_outward

                        </span>

                                </div>

                                <div class="market-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Silver">

                                </div>

                                <div class="market-content">

                                    <h3>

                                        Silver

                                    </h3>

                                    <div class="market-price">

                                        ₹118,000

                                        <span>/kg</span>

                                    </div>

                                    <div class="market-change positive">

                                        ▲ +1.36%

                                        <small>Today</small>

                                    </div>

                                    <div class="market-update">

                                        Updated

                                        <strong>

                                            05 Aug 2026

                                        </strong>

                                    </div>

                                </div>

                                <a href="#"
                                   class="market-link">

                                    View Market

                                    <span class="material-symbols-outlined">

                            east

                        </span>

                                </a>

                            </article>

                        </div>

                        <!-- ================================================= -->
                        <!-- RUBBER -->
                        <!-- ================================================= -->

                        <div class="col-12 col-sm-6 col-xl-4">

                            <article class="market-card rubber">

                                <div class="market-card-top">

                        <span class="market-badge">

                            Rubber

                        </span>

                                    <span class="material-symbols-outlined">

                            arrow_outward

                        </span>

                                </div>

                                <div class="market-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Rubber">

                                </div>

                                <div class="market-content">

                                    <h3>

                                        Rubber

                                    </h3>

                                    <div class="market-price">

                                        ₹242

                                        <span>/kg</span>

                                    </div>

                                    <div class="market-change positive">

                                        ▲ +0.82%

                                        <small>Today</small>

                                    </div>

                                    <div class="market-update">

                                        Updated

                                        <strong>

                                            05 Aug 2026

                                        </strong>

                                    </div>

                                </div>

                                <a href="#"
                                   class="market-link">

                                    View Market

                                    <span class="material-symbols-outlined">

                            east

                        </span>

                                </a>

                            </article>

                        </div>

                    </div>

                </div>

            </section>


            <!-- ==========================================================
 MARKET SNAPSHOT
========================================================== -->

            <section class="snapshot-section">

                <div class="container-max mx-auto px-3 px-md-4">

                    <div class="section-header">

            <span class="section-tag">

                TODAY'S MARKET

            </span>

                        <h2>

                            Market <span>Snapshot</span>

                        </h2>

                        <p>

                            Monitor today's movements across agricultural commodities
                            and financial markets from one place.

                        </p>

                    </div>

                    <div class="snapshot-card">

                        <!-- GOLD -->

                        <a href="#" class="snapshot-row gold">

                            <div class="snapshot-market">

                                <div class="snapshot-icon">

                                    <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                         alt="Gold">

                                </div>

                                <div>

                                    <h4>Gold</h4>

                                    <small>Updated Today</small>

                                </div>

                            </div>

                            <div class="snapshot-price">

                                ₹9,850

                                <span>/10g</span>

                            </div>

                            <div class="snapshot-change positive">

                                ▲ +2.04%

                            </div>

                            <span class="material-symbols-outlined">

                    arrow_forward

                </span>

                        </a>

                        <!-- SILVER -->

                        <a href="#" class="snapshot-row silver">

                            <div class="snapshot-market">

                                <div class="snapshot-icon">

                                    <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                         alt="Silver">

                                </div>

                                <div>

                                    <h4>Silver</h4>

                                    <small>Updated Today</small>

                                </div>

                            </div>

                            <div class="snapshot-price">

                                ₹118,000

                                <span>/kg</span>

                            </div>

                            <div class="snapshot-change positive">

                                ▲ +1.36%

                            </div>

                            <span class="material-symbols-outlined">

                    arrow_forward

                </span>

                        </a>

                        <!-- CURRENCY -->

                        <a href="#" class="snapshot-row currency">

                            <div class="snapshot-market">

                                <div class="snapshot-icon">

                                    <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                         alt="Currency">

                                </div>

                                <div>

                                    <h4>Currency</h4>

                                    <small>Updated Today</small>

                                </div>

                            </div>

                            <div class="snapshot-price">

                                ₹87.42

                            </div>

                            <div class="snapshot-change positive">

                                ▲ +0.28%

                            </div>

                            <span class="material-symbols-outlined">

                    arrow_forward

                </span>

                        </a>

                        <!-- RUBBER -->

                        <a href="#" class="snapshot-row rubber">

                            <div class="snapshot-market">

                                <div class="snapshot-icon">

                                    <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                         alt="Rubber">

                                </div>

                                <div>

                                    <h4>Rubber</h4>

                                    <small>Updated Today</small>

                                </div>

                            </div>

                            <div class="snapshot-price">

                                ₹242

                                <span>/kg</span>

                            </div>

                            <div class="snapshot-change positive">

                                ▲ +0.82%

                            </div>

                            <span class="material-symbols-outlined">

                    arrow_forward

                </span>

                        </a>

                        <!-- PINEAPPLE GREEN -->

                        <a href="#" class="snapshot-row pineapple-green">

                            <div class="snapshot-market">

                                <div class="snapshot-icon">

                                    <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                         alt="Pineapple Green">

                                </div>

                                <div>

                                    <h4>Pineapple Green</h4>

                                    <small>Updated Today</small>

                                </div>

                            </div>

                            <div class="snapshot-price">

                                ₹50

                                <span>/kg</span>

                            </div>

                            <div class="snapshot-change positive">

                                ▲ +2.04%

                            </div>

                            <span class="material-symbols-outlined">

                    arrow_forward

                </span>

                        </a>

                        <!-- PINEAPPLE RIPE -->

                        <a href="#" class="snapshot-row pineapple-ripe">

                            <div class="snapshot-market">

                                <div class="snapshot-icon">

                                    <img src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                         alt="Pineapple Ripe">

                                </div>

                                <div>

                                    <h4>Pineapple Ripe</h4>

                                    <small>Updated Today</small>

                                </div>

                            </div>

                            <div class="snapshot-price">

                                ₹58

                                <span>/kg</span>

                            </div>

                            <div class="snapshot-change positive">

                                ▲ +1.58%

                            </div>

                            <span class="material-symbols-outlined">

                    arrow_forward

                </span>

                        </a>

                    </div>

                </div>

            </section>



            <!-- ==========================================================
    FEATURED MARKETS
=========================================================== -->

            <section class="featured-markets">

                <div class="container-max mx-auto px-3 px-md-4">

                    <div class="section-header">

            <span class="section-tag">
                EXPLORE MARKETS
            </span>

                        <h2>
                            Featured <span>Markets</span>
                        </h2>

                        <p>
                            Explore detailed market information, historical trends,
                            price analysis and daily updates across every commodity.
                        </p>

                    </div>

                    <!-- ===================================================== -->
                    <!-- Pineapple -->
                    <!-- ===================================================== -->

                    <article class="featured-market pineapple">

                        <div class="row align-items-center g-5">

                            <!-- Image -->

                            <div class="col-lg-5">

                                <div class="featured-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Pineapple">

                                </div>

                            </div>

                            <!-- Content -->

                            <div class="col-lg-7">

                                <div class="featured-content">

                        <span class="market-category">

                            Agriculture

                        </span>

                                    <h3>

                                        Pineapple Market

                                    </h3>

                                    <p>

                                        Track Green and Ripe pineapple prices with
                                        daily updates, historical trends and market
                                        intelligence for farmers, traders and buyers.

                                    </p>

                                    <div class="row g-3 mt-4">

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                                    <span class="material-symbols-outlined">

                                        trending_up

                                    </span>

                                                <div>

                                                    <h5>

                                                        Daily Prices

                                                    </h5>

                                                    <p>

                                                        Updated every morning.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                                    <span class="material-symbols-outlined">

                                        timeline

                                    </span>

                                                <div>

                                                    <h5>

                                                        Historical Trends

                                                    </h5>

                                                    <p>

                                                        Monthly and yearly analysis.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                                    <span class="material-symbols-outlined">

                                        insights

                                    </span>

                                                <div>

                                                    <h5>

                                                        Market Analysis

                                                    </h5>

                                                    <p>

                                                        Daily insights and reports.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                                    <span class="material-symbols-outlined">

                                        monitoring

                                    </span>

                                                <div>

                                                    <h5>

                                                        Price Charts

                                                    </h5>

                                                    <p>

                                                        Interactive historical charts.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <a href="#"
                                       class="featured-btn">

                                        Explore Market

                                        <span class="material-symbols-outlined">

                                arrow_forward

                            </span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </article>

                    <!-- ===================================================== -->
                    <!-- Rubber -->
                    <!-- ===================================================== -->

                    <article class="featured-market rubber">

                        <div class="row align-items-center g-5 flex-lg-row-reverse">

                            <!-- Image -->

                            <div class="col-lg-5">

                                <div class="featured-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Rubber">

                                </div>

                            </div>

                            <!-- Content -->

                            <div class="col-lg-7">

                                <div class="featured-content">

                        <span class="market-category">

                            Commodity

                        </span>

                                    <h3>

                                        Rubber Market

                                    </h3>

                                    <p>

                                        Stay updated with domestic and international
                                        rubber prices, market trends and historical
                                        performance from one dashboard.

                                    </p>

                                    <div class="row g-3 mt-4">

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                                    <span class="material-symbols-outlined">

                                        language

                                    </span>

                                                <div>

                                                    <h5>

                                                        Global Markets

                                                    </h5>

                                                    <p>

                                                        International prices.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                                    <span class="material-symbols-outlined">

                                        public

                                    </span>

                                                <div>

                                                    <h5>

                                                        Domestic Market

                                                    </h5>

                                                    <p>

                                                        Daily regional updates.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                                    <span class="material-symbols-outlined">

                                        analytics

                                    </span>

                                                <div>

                                                    <h5>

                                                        Market Reports

                                                    </h5>

                                                    <p>

                                                        Weekly price reports.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                                    <span class="material-symbols-outlined">

                                        query_stats

                                    </span>

                                                <div>

                                                    <h5>

                                                        Historical Data

                                                    </h5>

                                                    <p>

                                                        Long-term trends.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <a href="#"
                                       class="featured-btn">

                                        Explore Market

                                        <span class="material-symbols-outlined">

                                arrow_forward

                            </span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </article>


                    <!-- ===================================================== -->
                    <!-- Gold -->
                    <!-- ===================================================== -->

                    <article class="featured-market gold">

                        <div class="row align-items-center g-5">

                            <!-- Image -->

                            <div class="col-lg-5">

                                <div class="featured-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Gold">

                                </div>

                            </div>

                            <!-- Content -->

                            <div class="col-lg-7">

                                <div class="featured-content">

                <span class="market-category">

                    Precious Metals

                </span>

                                    <h3>

                                        Gold Market

                                    </h3>

                                    <p>

                                        Follow live gold prices, historical performance,
                                        daily market movements and precious metal news
                                        from one intelligent dashboard.

                                    </p>

                                    <div class="row g-3 mt-4">

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                currency_exchange

                            </span>

                                                <div>

                                                    <h5>Live Prices</h5>

                                                    <p>Updated every day.</p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                monitoring

                            </span>

                                                <div>

                                                    <h5>Historical Charts</h5>

                                                    <p>Track price movements.</p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                newspaper

                            </span>

                                                <div>

                                                    <h5>Market News</h5>

                                                    <p>Daily updates.</p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                insights

                            </span>

                                                <div>

                                                    <h5>Analysis</h5>

                                                    <p>Expert market insights.</p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <a href="#" class="featured-btn">

                                        Explore Market

                                        <span class="material-symbols-outlined">

                        arrow_forward

                    </span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </article>

                    <!-- ===================================================== -->
                    <!-- Silver -->
                    <!-- ===================================================== -->

                    <article class="featured-market silver">

                        <div class="row align-items-center g-5 flex-lg-row-reverse">

                            <div class="col-lg-5">

                                <div class="featured-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Silver">

                                </div>

                            </div>

                            <div class="col-lg-7">

                                <div class="featured-content">

                <span class="market-category">

                    Precious Metals

                </span>

                                    <h3>

                                        Silver Market

                                    </h3>

                                    <p>

                                        Monitor silver prices, compare historical trends
                                        and stay informed with market news and analysis.

                                    </p>

                                    <div class="row g-3 mt-4">

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                paid

                            </span>

                                                <div>

                                                    <h5>Daily Prices</h5>

                                                    <p>Latest market updates.</p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                timeline

                            </span>

                                                <div>

                                                    <h5>Historical Trends</h5>

                                                    <p>Monthly and yearly data.</p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                analytics

                            </span>

                                                <div>

                                                    <h5>Market Reports</h5>

                                                    <p>Weekly summaries.</p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                query_stats

                            </span>

                                                <div>

                                                    <h5>Charts</h5>

                                                    <p>Interactive price charts.</p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <a href="#" class="featured-btn">

                                        Explore Market

                                        <span class="material-symbols-outlined">

                        arrow_forward

                    </span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </article>

                    <!-- ===================================================== -->
                    <!-- Currency -->
                    <!-- ===================================================== -->

                    <article class="featured-market currency">

                        <div class="row align-items-center g-5">

                            <div class="col-lg-5">

                                <div class="featured-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Currency">

                                </div>

                            </div>

                            <div class="col-lg-7">

                                <div class="featured-content">

                <span class="market-category">

                    Foreign Exchange

                </span>

                                    <h3>

                                        Currency Exchange

                                    </h3>

                                    <p>

                                        Access live exchange rates, currency trends,
                                        historical performance and conversion tools
                                        from one unified platform.

                                    </p>

                                    <div class="row g-3 mt-4">

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                sync_alt

                            </span>

                                                <div>

                                                    <h5>Live Rates</h5>

                                                    <p>Updated throughout the day.</p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                currency_exchange

                            </span>

                                                <div>

                                                    <h5>Currency Converter</h5>

                                                    <p>Fast and accurate conversion.</p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                monitoring

                            </span>

                                                <div>

                                                    <h5>Historical Rates</h5>

                                                    <p>View long-term performance.</p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="feature-item">

                            <span class="material-symbols-outlined">

                                public

                            </span>

                                                <div>

                                                    <h5>Global Markets</h5>

                                                    <p>Major world currencies.</p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <a href="#" class="featured-btn">

                                        Explore Market

                                        <span class="material-symbols-outlined">

                        arrow_forward

                    </span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </article>

                </div>

            </section>

            <!-- ==========================================================
    LATEST NEWS
=========================================================== -->

            <section class="latest-news">

                <div class="container-max mx-auto px-3 px-md-4">

                    <div class="section-header">

            <span class="section-tag">
                MARKET NEWS
            </span>

                        <h2>
                            Latest <span>News</span>
                        </h2>

                        <p>
                            Stay informed with the latest developments from agricultural
                            commodities and financial markets around the world.
                        </p>

                    </div>

                    <div class="row g-4">

                        <!-- ================================ -->
                        <!-- NEWS 1 -->
                        <!-- ================================ -->

                        <div class="col-lg-4 col-md-6">

                            <article class="news-card">

                                <div class="news-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Pineapple Market News">

                                    <span class="news-category">
                            Agriculture
                        </span>

                                </div>

                                <div class="news-content">

                                    <div class="news-meta">

                            <span class="material-symbols-outlined">
                                calendar_month
                            </span>

                                        05 Aug 2026

                                    </div>

                                    <h3>

                                        Pineapple prices continue to rise across Kerala markets

                                    </h3>

                                    <p>

                                        Daily market reports indicate improved demand and
                                        higher trading activity, resulting in steady price
                                        growth across major agricultural markets.

                                    </p>

                                    <a href="#" class="news-link">

                                        Read Article

                                        <span class="material-symbols-outlined">

                                arrow_forward

                            </span>

                                    </a>

                                </div>

                            </article>

                        </div>

                        <!-- ================================ -->
                        <!-- NEWS 2 -->
                        <!-- ================================ -->

                        <div class="col-lg-4 col-md-6">

                            <article class="news-card">

                                <div class="news-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Gold Market News">

                                    <span class="news-category finance">

                            Precious Metals

                        </span>

                                </div>

                                <div class="news-content">

                                    <div class="news-meta">

                            <span class="material-symbols-outlined">

                                calendar_month

                            </span>

                                        05 Aug 2026

                                    </div>

                                    <h3>

                                        Gold records another weekly gain as demand increases

                                    </h3>

                                    <p>

                                        Investors continue to monitor precious metal prices
                                        as global economic conditions strengthen demand for
                                        safe-haven assets.

                                    </p>

                                    <a href="#" class="news-link">

                                        Read Article

                                        <span class="material-symbols-outlined">

                                arrow_forward

                            </span>

                                    </a>

                                </div>

                            </article>

                        </div>

                        <!-- ================================ -->
                        <!-- NEWS 3 -->
                        <!-- ================================ -->

                        <div class="col-lg-4 col-md-6">

                            <article class="news-card">

                                <div class="news-image">

                                    <img
                                        src="https://admin.vazhakulampineapple.in/assets/img/pineapples/pineapple_icon5.png"
                                        alt="Currency Market News">

                                    <span class="news-category currency">

                            Finance

                        </span>

                                </div>

                                <div class="news-content">

                                    <div class="news-meta">

                            <span class="material-symbols-outlined">

                                calendar_month

                            </span>

                                        05 Aug 2026

                                    </div>

                                    <h3>

                                        Currency markets remain stable amid global trading

                                    </h3>

                                    <p>

                                        Exchange rates showed limited volatility today,
                                        with major currencies maintaining steady trading
                                        ranges throughout the session.

                                    </p>

                                    <a href="#" class="news-link">

                                        Read Article

                                        <span class="material-symbols-outlined">

                                arrow_forward

                            </span>

                                    </a>

                                </div>

                            </article>

                        </div>

                    </div>

                    <!-- Bottom Button -->

                    <div class="text-center mt-5">

                        <a href="#" class="btn-primary-custom">

                            View All News

                        </a>

                    </div>

                </div>

            </section>


            <!-- ==========================================================
        NEWSLETTER CTA
    =========================================================== -->

            <section class="newsletter-section">

                <div class="container-max mx-auto px-3 px-md-4">

                    <div class="newsletter-card">

            <span class="newsletter-tag">

                MARKETNIRO UPDATES

            </span>

                        <h2>

                            Stay Ahead of Every
                            <span>Market</span>

                        </h2>

                        <p>

                            Daily prices. Historical trends. Market intelligence.
                            Get the latest updates delivered directly to your inbox.

                        </p>

                        <form class="newsletter-form">

                            <input
                                type="email"
                                placeholder="Enter your email address">

                            <button type="submit">

                                Subscribe Now

                            </button>

                        </form>

                        <small>

                            No spam. Unsubscribe anytime.

                        </small>

                    </div>

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
