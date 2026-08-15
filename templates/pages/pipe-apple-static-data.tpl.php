

<style>

    /* ============================================================
   PINEAPPLE PAGE
   SECTION 1 — MARKET HERO
   ============================================================ */

    .pine-hero {
        margin-bottom: 56px;
    }


    /* ============================================================
       BREADCRUMB
       ============================================================ */

    .pine-hero-breadcrumb {
        display: flex;
        align-items: center;
        flex-wrap: wrap;

        gap: 5px;

        margin-bottom: 26px;

        color: var(--text-secondary);

        font-size: 12px;
        line-height: 1.5;
    }

    .pine-hero-breadcrumb a {
        color: var(--text-secondary);

        text-decoration: none;

        transition: color .18s ease;
    }

    .pine-hero-breadcrumb a:hover {
        color: var(--primary);
    }

    .pine-hero-breadcrumb .material-symbols-outlined {
        color: var(--outline);

        font-size: 15px;
    }

    .pine-hero-breadcrumb .current {
        color: var(--on-surface);

        font-weight: 700;
    }


    /* ============================================================
       HERO GRID
       ============================================================ */

    .pine-hero-grid {
        display: grid;

        grid-template-columns:
        minmax(0, 1.35fr)
        minmax(310px, .65fr);

        gap: 42px;

        align-items: stretch;
    }


    /* ============================================================
       HERO CONTENT
       ============================================================ */

    .pine-hero-content {
        min-width: 0;

        padding:
                14px 0
                18px;
    }


    /* ============================================================
       EYEBROW
       ============================================================ */

    .pine-hero-eyebrow {
        display: inline-flex;

        align-items: center;

        gap: 9px;

        margin-bottom: 17px;

        color: var(--primary);

        font-size: 10px;

        font-weight: 800;

        letter-spacing: .15em;
    }

    .pine-hero-status-dot {
        width: 8px;
        height: 8px;

        border-radius: 50%;

        background: var(--pineapple-accent);

        box-shadow:
                0 0 0 5px rgba(228,208,10,.13);
    }


    /* ============================================================
       HERO TITLE
       ============================================================ */

    .pine-hero h1 {
        max-width: 800px;

        margin: 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: clamp(
                42px,
                6vw,
                70px
        );

        font-weight: 800;

        line-height: .98;

        letter-spacing: -.055em;
    }

    .pine-hero h1 span {
        display: block;

        color: var(--primary);
    }


    /* ============================================================
       HERO TEXT
       ============================================================ */

    .pine-hero-lead {
        max-width: 720px;

        margin: 23px 0 0;

        color: var(--on-surface-variant);

        font-size: 17px;

        line-height: 1.7;
    }

    .pine-hero-copy {
        max-width: 720px;

        margin: 10px 0 0;

        color: var(--text-secondary);

        font-size: 14px;

        line-height: 1.75;
    }


    /* ============================================================
       HERO DATA
       ============================================================ */

    .pine-hero-data {
        display: flex;

        align-items: center;

        flex-wrap: wrap;

        gap: 20px;

        margin-top: 30px;
    }

    .pine-hero-data-item {
        display: flex;

        align-items: center;

        gap: 10px;
    }

    .pine-hero-data-icon {
        display: flex;

        align-items: center;
        justify-content: center;

        width: 38px;
        height: 38px;

        border: 1px solid rgba(0,107,44,.12);

        border-radius: var(--radius-lg);

        background: rgba(0,107,44,.055);

        color: var(--primary);
    }

    .pine-hero-data-icon
    .material-symbols-outlined {
        font-size: 18px;
    }

    .pine-hero-data-label {
        display: block;

        margin-bottom: 2px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .12em;
    }

    .pine-hero-data-item strong {
        display: block;

        color: var(--on-surface);

        font-size: 12px;

        font-weight: 700;
    }

    .pine-hero-data-divider {
        width: 1px;
        height: 35px;

        background: var(--border-color);
    }


    /* ============================================================
       MARKET PULSE CARD
       ============================================================ */

    .pine-hero-market {
        position: relative;

        overflow: hidden;

        padding: 25px;

        border: 1px solid rgba(0,107,44,.12);

        border-radius: var(--radius-2xl);

        background:
                linear-gradient(
                        145deg,
                        #f7fbf8 0%,
                        #ffffff 70%
                );

        box-shadow:
                0 15px 45px rgba(25,28,30,.055);
    }

    .pine-hero-market::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;
        right: 0;

        height: 4px;

        background:
                linear-gradient(
                        90deg,
                        var(--primary) 0 50%,
                        var(--pineapple-accent) 50% 100%
                );
    }


    /* ============================================================
       MARKET HEADER
       ============================================================ */

    .pine-hero-market-top {
        display: flex;

        align-items: flex-start;

        justify-content: space-between;

        gap: 15px;

        padding-bottom: 20px;

        border-bottom: 1px solid var(--border-color);
    }

    .pine-market-label {
        display: block;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .14em;
    }

    .pine-hero-market h2 {
        margin: 4px 0 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 21px;

        font-weight: 800;
    }

    .pine-market-live {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 6px 9px;

        border-radius: var(--radius-full);

        background: rgba(22,163,74,.07);

        color: var(--success);

        font-size: 9px;

        font-weight: 800;

        white-space: nowrap;
    }

    .pine-market-live i {
        display: block;

        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: var(--success);
    }


    /* ============================================================
       PULSE ROW
       ============================================================ */

    .pine-pulse-row {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 19px 0;

        border-bottom: 1px solid rgba(189,202,186,.45);
    }

    .pine-pulse-name {
        display: flex;

        align-items: center;

        gap: 10px;

        min-width: 0;
    }

    .pine-pulse-dot {
        width: 9px;
        height: 9px;

        flex: 0 0 auto;

        border-radius: 50%;
    }

    .pine-pulse-dot.green {
        background: var(--primary);
    }

    .pine-pulse-dot.ripe {
        background: var(--pineapple-accent);
    }

    .pine-pulse-name strong {
        display: block;

        color: var(--on-surface);

        font-size: 13px;

        font-weight: 800;
    }

    .pine-pulse-name small {
        display: block;

        margin-top: 3px;

        color: var(--text-secondary);

        font-size: 9px;
    }

    .pine-pulse-price {
        display: flex;

        align-items: baseline;

        gap: 4px;

        flex: 0 0 auto;
    }

    .pine-pulse-price strong {
        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 28px;

        font-weight: 800;

        line-height: 1;

        letter-spacing: -.04em;
    }

    .pine-pulse-price span {
        color: var(--text-secondary);

        font-size: 9px;
    }


    /* ============================================================
       SPREAD
       ============================================================ */

    .pine-pulse-difference {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        margin-top: 17px;

        padding: 13px 14px;

        border-radius: var(--radius-lg);

        background: rgba(228,208,10,.10);
    }

    .pine-pulse-difference span:first-child {
        display: block;

        color: #756c00;

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .12em;
    }

    .pine-pulse-difference strong {
        display: block;

        margin-top: 3px;

        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 15px;
    }

    .pine-pulse-difference
    .material-symbols-outlined {
        color: #756c00;

        font-size: 21px;
    }


    /* ============================================================
       PULSE FOOTER
       ============================================================ */

    .pine-pulse-footer {
        display: flex;

        align-items: center;

        gap: 6px;

        margin-top: 17px;

        color: var(--text-secondary);

        font-size: 9px;
    }

    .pine-pulse-footer
    .material-symbols-outlined {
        color: var(--success);

        font-size: 15px;
    }




    /* ============================================================
   SECTION 1 — RESPONSIVE
   ============================================================ */

    @media (max-width: 991.98px) {

        .pine-hero-grid {
            grid-template-columns: 1fr;

            gap: 28px;
        }

        .pine-hero-market {
            max-width: 620px;
        }

    }


    @media (max-width: 575.98px) {

        .pine-hero {
            margin-bottom: 42px;
        }

        .pine-hero-breadcrumb {
            margin-bottom: 20px;

            font-size: 11px;
        }

        .pine-hero-content {
            padding-top: 4px;
        }

        .pine-hero h1 {
            font-size: clamp(
                    38px,
                    12vw,
                    54px
            );

            letter-spacing: -.05em;
        }

        .pine-hero-lead {
            margin-top: 18px;

            font-size: 15px;

            line-height: 1.65;
        }

        .pine-hero-copy {
            font-size: 13px;

            line-height: 1.7;
        }

        .pine-hero-data {
            align-items: flex-start;

            flex-direction: column;

            gap: 14px;

            margin-top: 23px;
        }

        .pine-hero-data-divider {
            display: none;
        }

        .pine-hero-market {
            padding: 20px;
        }

    }


    @media (max-width: 359.98px) {

        .pine-hero h1 {
            font-size: 36px;
        }

        .pine-hero-lead {
            font-size: 14px;
        }

        .pine-hero-copy {
            font-size: 12px;
        }

        .pine-hero-market {
            padding: 17px;
        }

        .pine-pulse-price strong {
            font-size: 25px;
        }

        .pine-pulse-name small {
            font-size: 8px;
        }

    }


    /* ============================================================
   SIDEBAR — SECTION 1
   ============================================================ */

    .pine-sidebar-snapshot {
        position: relative;

        overflow: hidden;

        padding: 22px;

        border-radius: var(--radius-2xl);

        background:
                linear-gradient(
                        145deg,
                        var(--primary),
                        var(--primary-container)
                );

        color: #fff;

        box-shadow:
                0 15px 35px rgba(0,107,44,.13);
    }

    .pine-sidebar-snapshot::after {
        content: "";

        position: absolute;

        width: 150px;
        height: 150px;

        right: -75px;
        bottom: -75px;

        border-radius: 50%;

        background: rgba(255,255,255,.06);
    }

    .pine-sidebar-kicker {
        position: relative;
        z-index: 1;

        color: rgba(255,255,255,.65);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .14em;
    }

    .pine-sidebar-snapshot h3 {
        position: relative;
        z-index: 1;

        margin: 4px 0 2px;

        color: #fff;

        font-family: var(--font-headline);

        font-size: 20px;

        font-weight: 800;
    }

    .pine-sidebar-snapshot > p {
        position: relative;
        z-index: 1;

        margin: 0 0 18px;

        color: rgba(255,255,255,.62);

        font-size: 10px;
    }


    .pine-sidebar-price {
        position: relative;
        z-index: 1;

        padding: 14px 0;

        border-top: 1px solid rgba(255,255,255,.14);
    }

    .pine-sidebar-price > div {
        display: flex;

        align-items: center;

        gap: 7px;

        color: rgba(255,255,255,.85);

        font-size: 11px;

        font-weight: 700;
    }

    .pine-sidebar-dot {
        width: 8px;
        height: 8px;

        border-radius: 50%;
    }

    .pine-sidebar-dot.green {
        background: #75d58b;
    }

    .pine-sidebar-dot.ripe {
        background: var(--pineapple-accent);
    }

    .pine-sidebar-price strong {
        display: block;

        margin-top: 6px;

        color: #fff;

        font-family: var(--font-headline);

        font-size: 28px;

        line-height: 1;
    }

    .pine-sidebar-price small {
        display: block;

        margin-top: 5px;

        color: rgba(255,255,255,.58);

        font-family: var(--font-mono);

        font-size: 9px;
    }


    .pine-sidebar-date {
        position: relative;
        z-index: 1;

        display: flex;

        align-items: center;

        gap: 9px;

        margin-top: 3px;

        padding-top: 15px;

        border-top: 1px solid rgba(255,255,255,.14);
    }

    .pine-sidebar-date
    .material-symbols-outlined {
        color: rgba(255,255,255,.75);

        font-size: 17px;
    }

    .pine-sidebar-date small {
        display: block;

        color: rgba(255,255,255,.52);

        font-size: 8px;
    }

    .pine-sidebar-date strong {
        display: block;

        margin-top: 2px;

        color: #fff;

        font-size: 10px;
    }


    /* ============================================================
       SIDEBAR NAVIGATION
       ============================================================ */

    .pine-sidebar-navigation {
        padding: 19px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-2xl);

        background: var(--surface);
    }

    .pine-sidebar-navigation > span {
        display: block;

        margin-bottom: 8px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .14em;
    }

    .pine-sidebar-navigation a {
        display: grid;

        grid-template-columns: 20px 1fr 16px;

        align-items: center;

        gap: 7px;

        padding: 11px 0;

        border-bottom: 1px solid rgba(189,202,186,.4);

        color: var(--on-surface);

        font-size: 10px;

        font-weight: 700;

        text-decoration: none;
    }

    .pine-sidebar-navigation a:last-child {
        border-bottom: 0;
    }

    .pine-sidebar-navigation a
    .material-symbols-outlined {
        color: var(--primary);

        font-size: 16px;
    }

    .pine-sidebar-navigation a
    .material-symbols-outlined:last-child {
        color: var(--outline);

        justify-self: end;

        font-size: 14px;
    }

    /* ============================================================
   SECTION 2 — TODAY'S MARKET PRICES
   ============================================================ */

    .pine-price-section {
        margin-bottom: 60px;
    }


    /* ============================================================
       SECTION HEADER
       ============================================================ */

    .pine-price-section-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;

        gap: 30px;

        margin-bottom: 22px;
    }

    .pine-price-section-header > div:first-child {
        max-width: 700px;
    }

    .pine-section-kicker {
        display: block;

        margin-bottom: 7px;

        color: var(--primary);

        font-size: 9px;

        font-weight: 800;

        letter-spacing: .15em;
    }

    .pine-price-section-header h2 {
        margin: 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: clamp(27px, 3vw, 36px);

        font-weight: 800;

        line-height: 1.1;

        letter-spacing: -.035em;
    }

    .pine-price-section-header p {
        max-width: 650px;

        margin: 9px 0 0;

        color: var(--text-secondary);

        font-size: 14px;

        line-height: 1.7;
    }


    /* ============================================================
       DATE BADGE
       ============================================================ */

    .pine-price-date {
        display: flex;

        align-items: center;

        gap: 10px;

        flex: 0 0 auto;

        padding: 10px 13px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-lg);

        background: var(--surface);
    }

    .pine-price-date > .material-symbols-outlined {
        color: var(--primary);

        font-size: 18px;
    }

    .pine-price-date span {
        display: block;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .12em;
    }

    .pine-price-date strong {
        display: block;

        margin-top: 2px;

        color: var(--on-surface);

        font-size: 11px;
    }


    /* ============================================================
       PRICE CARDS
       ============================================================ */

    .pine-price-cards {
        display: grid;

        grid-template-columns:
        repeat(2, minmax(0, 1fr));

        gap: 18px;
    }


    /* ============================================================
       CARD
       ============================================================ */

    .pine-price-card {
        position: relative;

        overflow: hidden;

        padding: 27px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-2xl);

        background: var(--surface);

        box-shadow:
                0 7px 25px rgba(25,28,30,.035);

        transition:
                transform .2s ease,
                box-shadow .2s ease;
    }

    .pine-price-card:hover {
        transform: translateY(-3px);

        box-shadow:
                0 15px 38px rgba(25,28,30,.075);
    }


    /* Top line */

    .pine-price-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;
        right: 0;

        height: 4px;
    }

    .pine-price-green::before {
        background: var(--primary);
    }

    .pine-price-ripe::before {
        background: var(--pineapple-accent);
    }


    /* ============================================================
       CARD HEADER
       ============================================================ */

    .pine-price-card-header {
        display: flex;

        align-items: flex-start;

        justify-content: space-between;

        gap: 20px;
    }

    .pine-price-category {
        display: flex;

        align-items: center;

        gap: 7px;

        margin-bottom: 7px;

        color: var(--text-secondary);

        font-size: 9px;

        font-weight: 800;

        letter-spacing: .14em;
    }

    .pine-price-category > span {
        width: 8px;
        height: 8px;

        border-radius: 50%;
    }

    .pine-price-green
    .pine-price-category > span {
        background: var(--primary);
    }

    .pine-price-ripe
    .pine-price-category > span {
        background: var(--pineapple-accent);
    }

    .pine-price-card-header h3 {
        margin: 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 22px;

        font-weight: 800;

        letter-spacing: -.025em;
    }

    .pine-price-card-header p {
        margin: 4px 0 0;

        color: var(--text-secondary);

        font-size: 12px;
    }


    /* ============================================================
       ICON
       ============================================================ */

    .pine-price-icon {
        display: flex;

        align-items: center;

        justify-content: center;

        width: 47px;
        height: 47px;

        flex: 0 0 auto;

        border-radius: var(--radius-xl);
    }

    .pine-price-green .pine-price-icon {
        background: rgba(0,107,44,.07);

        color: var(--primary);
    }

    .pine-price-ripe .pine-price-icon {
        background: rgba(228,208,10,.15);

        color: #756c00;
    }

    .pine-price-icon .material-symbols-outlined {
        font-size: 23px;
    }


    /* ============================================================
       AVERAGE PRICE
       ============================================================ */

    .pine-average-price {
        display: flex;

        align-items: baseline;

        margin-top: 30px;

        color: var(--on-surface);
    }

    .pine-average-currency {
        margin-right: 4px;

        font-size: 23px;

        font-weight: 600;
    }

    .pine-average-price strong {
        font-family: var(--font-headline);

        font-size: clamp(55px, 6vw, 72px);

        font-weight: 800;

        line-height: .9;

        letter-spacing: -.06em;
    }

    .pine-average-unit {
        margin-left: 7px;

        color: var(--text-secondary);

        font-size: 14px;

        font-weight: 600;
    }

    .pine-average-caption {
        margin-top: 7px;

        color: var(--text-secondary);

        font-size: 10px;
    }


    /* ============================================================
       RANGE
       ============================================================ */

    .pine-range {
        display: grid;

        grid-template-columns:
        repeat(3, 1fr);

        margin-top: 25px;

        border-top: 1px solid var(--border-color);

        border-bottom: 1px solid var(--border-color);
    }

    .pine-range > div {
        padding: 14px 8px;
    }

    .pine-range > div + div {
        border-left: 1px solid var(--border-color);
    }

    .pine-range span {
        display: block;

        margin-bottom: 5px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .1em;
    }

    .pine-range strong {
        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 15px;
    }


    /* ============================================================
       DESCRIPTION
       ============================================================ */

    .pine-price-description {
        padding-top: 21px;
    }

    .pine-price-description h4 {
        margin: 0 0 7px;

        color: var(--on-surface);

        font-size: 14px;

        font-weight: 800;
    }

    .pine-price-description p {
        margin: 0;

        color: var(--text-secondary);

        font-size: 13px;

        line-height: 1.75;
    }


    /* ============================================================
       CARD FOOTER
       ============================================================ */

    .pine-price-card-footer {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        margin-top: 22px;

        padding-top: 14px;

        border-top: 1px solid rgba(189,202,186,.35);

        color: var(--text-secondary);

        font-size: 9px;

        font-weight: 700;
    }

    .pine-price-card-footer > span:first-child {
        display: inline-flex;

        align-items: center;

        gap: 5px;
    }

    .pine-price-card-footer
    .material-symbols-outlined {
        color: var(--success);

        font-size: 15px;
    }


    /* ============================================================
       PRICE GAP
       ============================================================ */

    .pine-price-gap {
        display: grid;

        grid-template-columns:
        auto minmax(0, 1fr) auto;

        align-items: center;

        gap: 18px;

        margin-top: 14px;

        padding: 20px 22px;

        border: 1px solid rgba(228,208,10,.3);

        border-radius: var(--radius-xl);

        background:
                linear-gradient(
                        100deg,
                        rgba(228,208,10,.10),
                        rgba(255,255,255,.98)
                );
    }

    .pine-price-gap-icon {
        display: flex;

        align-items: center;

        justify-content: center;

        width: 44px;
        height: 44px;

        border-radius: var(--radius-lg);

        background: rgba(228,208,10,.16);

        color: #756c00;
    }

    .pine-price-gap-icon
    .material-symbols-outlined {
        font-size: 21px;
    }

    .pine-price-gap-content > span {
        display: block;

        color: #756c00;

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .14em;
    }

    .pine-price-gap-content h3 {
        margin: 3px 0 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 17px;

        font-weight: 800;
    }

    .pine-price-gap-content p {
        max-width: 620px;

        margin: 4px 0 0;

        color: var(--text-secondary);

        font-size: 12px;

        line-height: 1.6;
    }


    /* ============================================================
       GAP VALUES
       ============================================================ */

    .pine-price-gap-values {
        display: flex;

        align-items: center;

        gap: 13px;
    }

    .pine-price-gap-values > div {
        text-align: right;
    }

    .pine-price-gap-values span:not(
    .pine-price-gap-arrow
) {
        display: block;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .1em;
    }

    .pine-price-gap-values strong {
        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 17px;
    }

    .pine-price-gap-arrow {
        color: var(--outline);

        font-size: 18px;
    }


    /* ============================================================
       NOTE
       ============================================================ */

    .pine-price-note {
        display: flex;

        align-items: flex-start;

        gap: 8px;

        margin-top: 11px;

        padding: 10px 12px;

        color: var(--text-secondary);

        font-size: 10px;

        line-height: 1.6;
    }

    .pine-price-note
    .material-symbols-outlined {
        flex: 0 0 auto;

        color: var(--primary);

        font-size: 15px;
    }

    .pine-price-note p {
        margin: 0;
    }

    /* ============================================================
   SECTION 2 — RESPONSIVE
   ============================================================ */

    @media (max-width: 991.98px) {

        .pine-price-section-header {
            align-items: flex-start;

            flex-direction: column;

            gap: 15px;
        }

        .pine-price-date {
            align-self: flex-start;
        }

    }


    @media (max-width: 767.98px) {

        .pine-price-cards {
            grid-template-columns: 1fr;
        }

        .pine-price-gap {
            grid-template-columns:
            auto minmax(0, 1fr);
        }

        .pine-price-gap-values {
            grid-column: 1 / -1;

            justify-content: flex-end;

            padding-top: 13px;

            border-top: 1px solid rgba(189,202,186,.35);
        }

    }


    @media (max-width: 575.98px) {

        .pine-price-section {
            margin-bottom: 45px;
        }

        .pine-price-card {
            padding: 21px;
        }

        .pine-price-card-header h3 {
            font-size: 20px;
        }

        .pine-average-price {
            margin-top: 25px;
        }

        .pine-average-price strong {
            font-size: 57px;
        }

        .pine-range > div {
            padding: 12px 6px;
        }

        .pine-price-description p {
            font-size: 13px;
        }

        .pine-price-gap {
            padding: 16px;

            gap: 13px;
        }

        .pine-price-gap-content h3 {
            font-size: 15px;
        }

    }


    @media (max-width: 359.98px) {

        .pine-price-card {
            padding: 17px;
        }

        .pine-price-icon {
            width: 40px;
            height: 40px;
        }

        .pine-price-icon
        .material-symbols-outlined {
            font-size: 19px;
        }

        .pine-average-price strong {
            font-size: 50px;
        }

        .pine-average-currency {
            font-size: 19px;
        }

        .pine-average-unit {
            font-size: 12px;
        }

        .pine-range strong {
            font-size: 12px;
        }

        .pine-price-gap {
            grid-template-columns: 1fr;
        }

        .pine-price-gap-values {
            justify-content: space-between;
        }

    }

    /* ============================================================
   SECTION 3 — GREEN VS RIPE
   ============================================================ */

    .pine-context-section {
        margin-bottom: 62px;
    }


    /* ============================================================
       HEADER
       ============================================================ */

    .pine-context-header {
        display: flex;

        align-items: flex-end;

        justify-content: space-between;

        gap: 30px;

        margin-bottom: 24px;
    }

    .pine-context-header > div:first-child {
        max-width: 700px;
    }

    .pine-context-header h2 {
        margin: 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: clamp(
                27px,
                3vw,
                36px
        );

        font-weight: 800;

        line-height: 1.1;

        letter-spacing: -.035em;
    }

    .pine-context-header p {
        max-width: 650px;

        margin: 9px 0 0;

        color: var(--text-secondary);

        font-size: 14px;

        line-height: 1.7;
    }


    /* ============================================================
       PRICE SPREAD
       ============================================================ */

    .pine-context-spread {
        flex: 0 0 auto;

        min-width: 135px;

        padding: 13px 15px;

        border: 1px solid rgba(228,208,10,.35);

        border-radius: var(--radius-lg);

        background: rgba(228,208,10,.08);

        text-align: right;
    }

    .pine-context-spread span {
        display: block;

        color: #756c00;

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .12em;
    }

    .pine-context-spread strong {
        display: block;

        margin-top: 3px;

        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 18px;
    }


    /* ============================================================
       COMPARISON GRID
       ============================================================ */

    .pine-context-grid {
        display: grid;

        grid-template-columns:
        repeat(2, minmax(0, 1fr));

        gap: 18px;
    }


    /* ============================================================
       CONTEXT CARD
       ============================================================ */

    .pine-context-card {
        position: relative;

        overflow: hidden;

        padding: 26px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-2xl);

        background: var(--surface);

        box-shadow:
                0 7px 25px rgba(25,28,30,.035);
    }

    .pine-context-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;
        right: 0;

        height: 4px;
    }

    .pine-context-green::before {
        background: var(--primary);
    }

    .pine-context-ripe::before {
        background: var(--pineapple-accent);
    }


    /* ============================================================
       CARD TOP
       ============================================================ */

    .pine-context-card-top {
        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-bottom: 23px;
    }

    .pine-context-number {
        color: var(--outline);

        font-family: var(--font-mono);

        font-size: 11px;

        font-weight: 700;
    }

    .pine-context-icon {
        display: flex;

        align-items: center;

        justify-content: center;

        width: 46px;
        height: 46px;

        border-radius: var(--radius-xl);
    }

    .pine-context-green .pine-context-icon {
        background: rgba(0,107,44,.07);

        color: var(--primary);
    }

    .pine-context-ripe .pine-context-icon {
        background: rgba(228,208,10,.15);

        color: #756c00;
    }

    .pine-context-icon
    .material-symbols-outlined {
        font-size: 22px;
    }


    /* ============================================================
       CATEGORY
       ============================================================ */

    .pine-context-category {
        display: flex;

        align-items: center;

        gap: 7px;

        color: var(--text-secondary);

        font-size: 9px;

        font-weight: 800;

        letter-spacing: .14em;
    }

    .pine-context-dot {
        width: 8px;
        height: 8px;

        border-radius: 50%;
    }

    .pine-context-green
    .pine-context-dot {
        background: var(--primary);
    }

    .pine-context-ripe
    .pine-context-dot {
        background: var(--pineapple-accent);
    }


    /* ============================================================
       TITLE
       ============================================================ */

    .pine-context-card h3 {
        margin: 8px 0 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 25px;

        font-weight: 800;

        letter-spacing: -.025em;
    }


    /* ============================================================
       DESCRIPTION
       ============================================================ */

    .pine-context-description {
        min-height: 86px;

        margin: 10px 0 0;

        color: var(--text-secondary);

        font-size: 13px;

        line-height: 1.75;
    }


    /* ============================================================
       FACTS
       ============================================================ */

    .pine-context-facts {
        margin-top: 22px;

        border-top: 1px solid var(--border-color);
    }

    .pine-context-facts > div {
        display: flex;

        align-items: flex-start;

        gap: 10px;

        padding: 12px 0;

        border-bottom: 1px solid rgba(189,202,186,.35);
    }

    .pine-context-facts
    .material-symbols-outlined {
        flex: 0 0 auto;

        margin-top: 1px;

        color: var(--primary);

        font-size: 17px;
    }

    .pine-context-ripe
    .pine-context-facts
    .material-symbols-outlined {
        color: #756c00;
    }

    .pine-context-facts strong {
        display: block;

        color: var(--on-surface);

        font-size: 11px;

        font-weight: 800;
    }

    .pine-context-facts small {
        display: block;

        margin-top: 2px;

        color: var(--text-secondary);

        font-size: 10px;

        line-height: 1.4;
    }


    /* ============================================================
       PRICE FOOTER
       ============================================================ */

    .pine-context-price {
        display: grid;

        grid-template-columns:
        1fr 1fr;

        margin-top: 18px;
    }

    .pine-context-price > div + div {
        padding-left: 18px;

        border-left: 1px solid var(--border-color);
    }

    .pine-context-price span {
        display: block;

        margin-bottom: 4px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .1em;
    }

    .pine-context-price strong {
        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 16px;
    }


    /* ============================================================
       EXPLANATION
       ============================================================ */

    .pine-context-explanation {
        display: grid;

        grid-template-columns:
        auto minmax(0, 1fr);

        gap: 16px;

        align-items: flex-start;

        margin-top: 14px;

        padding: 20px 22px;

        border: 1px solid rgba(0,107,44,.12);

        border-radius: var(--radius-xl);

        background:
                linear-gradient(
                        110deg,
                        rgba(0,107,44,.045),
                        rgba(255,255,255,.9)
                );
    }

    .pine-context-explanation-icon {
        display: flex;

        align-items: center;

        justify-content: center;

        width: 43px;
        height: 43px;

        border-radius: var(--radius-lg);

        background: rgba(0,107,44,.08);

        color: var(--primary);
    }

    .pine-context-explanation-icon
    .material-symbols-outlined {
        font-size: 21px;
    }

    .pine-context-explanation > div:last-child > span {
        display: block;

        color: var(--primary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .13em;
    }

    .pine-context-explanation h3 {
        margin: 3px 0 5px;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 17px;

        font-weight: 800;
    }

    .pine-context-explanation p {
        max-width: 720px;

        margin: 0;

        color: var(--text-secondary);

        font-size: 12px;

        line-height: 1.7;
    }


    /* ============================================================
       METRICS
       ============================================================ */

    .pine-context-metrics {
        display: grid;

        grid-template-columns:
        repeat(4, minmax(0, 1fr));

        margin-top: 14px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-xl);

        background: var(--surface);

        overflow: hidden;
    }

    .pine-context-metric {
        padding: 16px;

        min-width: 0;
    }

    .pine-context-metric + .pine-context-metric {
        border-left: 1px solid var(--border-color);
    }

    .pine-context-metric-label {
        display: block;

        margin-bottom: 6px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .1em;
    }

    .pine-context-metric strong {
        display: block;

        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 18px;
    }

    .pine-context-metric small {
        display: block;

        margin-top: 3px;

        color: var(--text-secondary);

        font-size: 9px;
    }

    /* ============================================================
   SECTION 3 — RESPONSIVE
   ============================================================ */

    @media (max-width: 991.98px) {

        .pine-context-header {
            align-items: flex-start;

            flex-direction: column;

            gap: 15px;
        }

        .pine-context-spread {
            text-align: left;
        }

    }


    @media (max-width: 767.98px) {

        .pine-context-grid {
            grid-template-columns: 1fr;
        }

        .pine-context-description {
            min-height: auto;
        }

        .pine-context-metrics {
            grid-template-columns:
            repeat(2, minmax(0, 1fr));
        }

        .pine-context-metric:nth-child(3) {
            border-left: 0;

            border-top: 1px solid var(--border-color);
        }

        .pine-context-metric:nth-child(4) {
            border-top: 1px solid var(--border-color);
        }

    }


    @media (max-width: 575.98px) {

        .pine-context-section {
            margin-bottom: 45px;
        }

        .pine-context-card {
            padding: 21px;
        }

        .pine-context-card h3 {
            font-size: 22px;
        }

        .pine-context-explanation {
            padding: 17px;

            gap: 12px;
        }

        .pine-context-explanation h3 {
            font-size: 15px;
        }

    }


    @media (max-width: 359.98px) {

        .pine-context-card {
            padding: 17px;
        }

        .pine-context-icon {
            width: 40px;
            height: 40px;
        }

        .pine-context-icon
        .material-symbols-outlined {
            font-size: 19px;
        }

        .pine-context-metrics {
            grid-template-columns: 1fr;
        }

        .pine-context-metric + .pine-context-metric {
            border-left: 0;

            border-top: 1px solid var(--border-color);
        }

    }

    /* ============================================================
   SECTION 4 — HISTORICAL PRICE INDEX
   ============================================================ */

    .pine-history-section {
        margin-bottom: 62px;
    }


    /* ============================================================
       HEADER
       ============================================================ */

    .pine-history-header {
        display: flex;

        align-items: flex-end;

        justify-content: space-between;

        gap: 30px;

        margin-bottom: 22px;
    }

    .pine-history-header > div:first-child {
        max-width: 700px;
    }

    .pine-history-header h2 {
        margin: 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: clamp(
                27px,
                3vw,
                36px
        );

        font-weight: 800;

        line-height: 1.1;

        letter-spacing: -.035em;
    }

    .pine-history-header p {
        max-width: 650px;

        margin: 9px 0 0;

        color: var(--text-secondary);

        font-size: 14px;

        line-height: 1.7;
    }


    /* ============================================================
       PERIOD
       ============================================================ */

    .pine-history-period {
        display: flex;

        align-items: center;

        gap: 10px;

        flex: 0 0 auto;

        padding: 10px 13px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-lg);

        background: var(--surface);
    }

    .pine-history-period
    .material-symbols-outlined {
        color: var(--primary);

        font-size: 18px;
    }

    .pine-history-period span {
        display: block;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .12em;
    }

    .pine-history-period strong {
        display: block;

        margin-top: 2px;

        color: var(--on-surface);

        font-size: 11px;
    }


    /* ============================================================
       MAIN CARD
       ============================================================ */

    .pine-history-card {
        overflow: hidden;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-2xl);

        background: var(--surface);

        box-shadow:
                0 8px 30px rgba(25,28,30,.035);
    }


    /* ============================================================
       CARD HEADER
       ============================================================ */

    .pine-history-card-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        padding: 23px 25px;

        border-bottom: 1px solid var(--border-color);
    }

    .pine-history-card-label {
        display: block;

        margin-bottom: 4px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .13em;
    }

    .pine-history-card-header h3 {
        margin: 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 19px;

        font-weight: 800;
    }


    /* ============================================================
       TIMEFRAME TOGGLE
       ============================================================ */

    .pine-history-toggle {
        display: inline-flex;

        padding: 3px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-lg);

        background: var(--surface-container);
    }

    .pine-history-btn {
        min-width: 42px;

        padding: 7px 9px;

        border: 0;

        border-radius: 6px;

        background: transparent;

        color: var(--text-secondary);

        font-family: var(--font-mono);

        font-size: 10px;

        font-weight: 700;

        cursor: pointer;

        transition:
                background .18s ease,
                color .18s ease;
    }

    .pine-history-btn:hover {
        color: var(--primary);
    }

    .pine-history-btn.active {
        background: var(--primary);

        color: #fff;
    }


    /* ============================================================
       LEGEND
       ============================================================ */

    .pine-history-legend {
        display: flex;

        align-items: center;

        flex-wrap: wrap;

        gap: 20px;

        padding: 17px 25px 0;
    }

    .pine-history-legend-item {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        color: var(--text-secondary);

        font-size: 10px;

        font-weight: 600;
    }

    .pine-history-legend-item strong {
        margin-left: 2px;

        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 11px;
    }

    .pine-history-legend-line {
        width: 19px;
        height: 3px;

        border-radius: 99px;
    }

    .pine-history-legend-line.green {
        background: var(--primary);
    }

    .pine-history-legend-line.ripe {
        background: var(--pineapple-accent);
    }


    /* ============================================================
       CHART
       ============================================================ */

    .pine-history-chart {
        display: flex;

        min-height: 335px;

        padding: 25px 25px 12px;
    }

    .pine-chart-y-axis {
        display: flex;

        flex-direction: column;

        justify-content: space-between;

        width: 42px;

        padding:
                0 8px 27px 0;

        color: var(--text-secondary);

        font-family: var(--font-mono);

        font-size: 9px;

        text-align: right;
    }

    .pine-chart-area {
        position: relative;

        flex: 1;

        min-width: 0;

        height: 290px;
    }


    /* ============================================================
       GRID
       ============================================================ */

    .pine-chart-grid {
        position: absolute;

        inset: 0 0 27px;

        display: flex;

        flex-direction: column;

        justify-content: space-between;
    }

    .pine-chart-grid span {
        display: block;

        width: 100%;

        border-top: 1px dashed rgba(189,202,186,.55);
    }


    /* ============================================================
       SVG
       ============================================================ */

    .pine-chart-svg {
        position: absolute;

        left: 0;
        right: 0;
        top: 0;

        width: 100%;

        height: calc(100% - 27px);

        overflow: visible;

        pointer-events: none;
    }

    .pine-chart-green {
        z-index: 2;
    }

    .pine-chart-ripe {
        z-index: 3;
    }


    /* ============================================================
       POINTS
       ============================================================ */

    .pine-chart-points {
        position: absolute;

        left: 0;
        right: 0;
        top: 0;

        height: calc(100% - 27px);

        z-index: 5;

        pointer-events: none;
    }

    .pine-chart-points i {
        position: absolute;

        width: 7px;
        height: 7px;

        transform:
                translate(-50%, -50%);

        border: 2px solid var(--surface);

        border-radius: 50%;
    }

    .pine-chart-points.green i {
        background: var(--primary);
    }

    .pine-chart-points.ripe i {
        background: var(--pineapple-accent);
    }


    /* ============================================================
       X AXIS
       ============================================================ */

    .pine-chart-x-axis {
        position: absolute;

        left: 0;
        right: 0;
        bottom: 0;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 8px;

        color: var(--text-secondary);

        font-family: var(--font-mono);

        font-size: 8px;
    }

    .pine-chart-x-axis span {
        white-space: nowrap;
    }


    /* ============================================================
       SUMMARY
       ============================================================ */

    .pine-history-summary {
        display: grid;

        grid-template-columns:
        repeat(4, minmax(0, 1fr));

        border-top: 1px solid var(--border-color);
    }

    .pine-history-summary > div {
        padding: 17px 20px;
    }

    .pine-history-summary > div + div {
        border-left: 1px solid var(--border-color);
    }

    .pine-history-summary span {
        display: block;

        margin-bottom: 5px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .11em;
    }

    .pine-history-summary strong {
        display: block;

        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 17px;
    }

    .pine-history-summary small {
        display: block;

        margin-top: 3px;

        color: var(--text-secondary);

        font-size: 9px;
    }


    /* ============================================================
       NOTE
       ============================================================ */

    .pine-history-note {
        display: flex;

        align-items: flex-start;

        gap: 8px;

        padding: 12px 20px;

        border-top: 1px solid rgba(189,202,186,.35);

        background: rgba(0,107,44,.018);

        color: var(--text-secondary);

        font-size: 10px;

        line-height: 1.6;
    }

    .pine-history-note
    .material-symbols-outlined {
        flex: 0 0 auto;

        margin-top: 1px;

        color: var(--primary);

        font-size: 15px;
    }

    .pine-history-note p {
        margin: 0;
    }

    /* ============================================================
   SECTION 4 — RESPONSIVE
   ============================================================ */

    @media (max-width: 991.98px) {

        .pine-history-header {
            align-items: flex-start;

            flex-direction: column;

            gap: 15px;
        }

    }


    @media (max-width: 767.98px) {

        .pine-history-card-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .pine-history-toggle {
            width: 100%;
        }

        .pine-history-btn {
            flex: 1;
        }

        .pine-history-summary {
            grid-template-columns:
            repeat(2, minmax(0, 1fr));
        }

        .pine-history-summary > div:nth-child(3) {
            border-left: 0;

            border-top: 1px solid var(--border-color);
        }

        .pine-history-summary > div:nth-child(4) {
            border-top: 1px solid var(--border-color);
        }

    }


    @media (max-width: 575.98px) {

        .pine-history-section {
            margin-bottom: 45px;
        }

        .pine-history-card-header {
            padding: 19px;
        }

        .pine-history-legend {
            padding-left: 19px;
            padding-right: 19px;
        }

        .pine-history-chart {
            min-height: 280px;

            padding:
                    20px
                    14px
                    10px;
        }

        .pine-chart-y-axis {
            width: 35px;

            font-size: 8px;
        }

        .pine-chart-area {
            height: 240px;
        }

        .pine-history-summary > div {
            padding: 14px;
        }

        .pine-history-summary strong {
            font-size: 15px;
        }

    }


    @media (max-width: 359.98px) {

        .pine-history-toggle {
            gap: 1px;
        }

        .pine-history-btn {
            min-width: 0;

            padding:
                    7px 5px;

            font-size: 9px;
        }

        .pine-history-chart {
            padding-left: 10px;
            padding-right: 10px;
        }

        .pine-chart-y-axis {
            width: 30px;

            padding-right: 5px;
        }

        .pine-chart-x-axis {
            font-size: 7px;
        }

        .pine-chart-x-axis span:nth-child(even) {
            display: none;
        }

        .pine-history-summary {
            grid-template-columns: 1fr;
        }

        .pine-history-summary > div + div {
            border-left: 0;

            border-top: 1px solid var(--border-color);
        }

    }


    /* ============================================================
   SECTION 5 — DAILY PRICE HISTORY
   ============================================================ */

    .pine-table-section {
        margin-bottom: 62px;
    }


    /* ============================================================
       HEADER
       ============================================================ */

    .pine-table-header {
        display: flex;

        align-items: flex-end;

        justify-content: space-between;

        gap: 30px;

        margin-bottom: 22px;
    }

    .pine-table-header > div:first-child {
        max-width: 700px;
    }

    .pine-table-header h2 {
        margin: 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: clamp(
                27px,
                3vw,
                36px
        );

        font-weight: 800;

        line-height: 1.1;

        letter-spacing: -.035em;
    }

    .pine-table-header p {
        max-width: 650px;

        margin: 9px 0 0;

        color: var(--text-secondary);

        font-size: 14px;

        line-height: 1.7;
    }


    /* ============================================================
       RECORD COUNT
       ============================================================ */

    .pine-table-record-count {
        flex: 0 0 auto;

        min-width: 105px;

        padding: 11px 14px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-lg);

        background: var(--surface);

        text-align: center;
    }

    .pine-table-record-count strong {
        display: block;

        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 20px;
    }

    .pine-table-record-count span {
        display: block;

        margin-top: 2px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 700;

        letter-spacing: .08em;
    }


    /* ============================================================
       TABLE CARD
       ============================================================ */

    .pine-history-table-card {
        overflow: hidden;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-2xl);

        background: var(--surface);

        box-shadow:
                0 8px 30px rgba(25,28,30,.035);
    }


    /* ============================================================
       TABLE TOP
       ============================================================ */

    .pine-history-table-top {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        padding: 19px 23px;

        border-bottom: 1px solid var(--border-color);
    }

    .pine-history-table-top > div {
        display: flex;

        align-items: center;

        gap: 10px;
    }

    .pine-history-table-top
    .material-symbols-outlined {
        display: flex;

        align-items: center;

        justify-content: center;

        width: 36px;
        height: 36px;

        border-radius: var(--radius-lg);

        background: rgba(0,107,44,.07);

        color: var(--primary);

        font-size: 18px;
    }

    .pine-history-table-top strong {
        display: block;

        color: var(--on-surface);

        font-size: 12px;

        font-weight: 800;
    }

    .pine-history-table-top small {
        display: block;

        margin-top: 2px;

        color: var(--text-secondary);

        font-size: 9px;
    }

    .pine-table-unit {
        padding: 6px 9px;

        border-radius: 6px;

        background: var(--surface-container);

        color: var(--text-secondary);

        font-family: var(--font-mono);

        font-size: 9px;

        font-weight: 700;
    }


    /* ============================================================
       TABLE
       ============================================================ */

    .pine-history-table-wrapper {
        overflow-x: auto;
    }

    .pine-history-table {
        width: 100%;

        min-width: 720px;

        border-collapse: collapse;
    }

    .pine-history-table thead {
        background: rgba(0,107,44,.025);
    }

    .pine-history-table th {
        padding: 12px 16px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .1em;

        text-align: left;

        white-space: nowrap;
    }

    .pine-history-table th:not(:first-child) {
        text-align: right;
    }

    .pine-history-table td {
        padding: 15px 16px;

        border-top: 1px solid rgba(189,202,186,.35);

        color: var(--on-surface);

        font-size: 11px;

        text-align: right;

        white-space: nowrap;
    }

    .pine-history-table td:first-child {
        text-align: left;
    }

    .pine-history-table tbody tr {
        transition: background .15s ease;
    }

    .pine-history-table tbody tr:hover {
        background: rgba(0,107,44,.018);
    }

    .pine-history-table tbody tr.latest {
        background: rgba(0,107,44,.035);
    }


    /* ============================================================
       DATE
       ============================================================ */

    .pine-table-date strong {
        display: block;

        color: var(--on-surface);

        font-size: 11px;

        font-weight: 800;
    }

    .pine-table-date span {
        display: inline-block;

        margin-top: 4px;

        padding: 2px 6px;

        border-radius: 4px;

        background: rgba(0,107,44,.08);

        color: var(--primary);

        font-size: 7px;

        font-weight: 800;

        letter-spacing: .05em;
    }


    /* ============================================================
       VALUES
       ============================================================ */

    .pine-range-value {
        color: var(--text-secondary);

        font-family: var(--font-mono);

        font-size: 10px;
    }

    .pine-table-average {
        font-family: var(--font-mono);

        font-size: 13px;
    }

    .pine-table-average.green {
        color: var(--primary);
    }

    .pine-table-average.ripe {
        color: #756c00;
    }


    /* ============================================================
       GAP
       ============================================================ */

    .pine-table-gap {
        display: inline-block;

        min-width: 48px;

        padding: 5px 7px;

        border-radius: 6px;

        background: rgba(228,208,10,.11);

        color: #756c00;

        font-family: var(--font-mono);

        font-size: 10px;

        font-weight: 800;

        text-align: center;
    }


    /* ============================================================
       MOBILE HISTORY
       ============================================================ */

    .pine-mobile-history {
        display: none;
    }


    /* ============================================================
       FOOTER
       ============================================================ */

    .pine-history-table-footer {
        display: flex;

        align-items: flex-start;

        gap: 8px;

        padding: 12px 20px;

        border-top: 1px solid rgba(189,202,186,.35);

        background: rgba(0,107,44,.018);

        color: var(--text-secondary);

        font-size: 10px;

        line-height: 1.6;
    }

    .pine-history-table-footer
    .material-symbols-outlined {
        flex: 0 0 auto;

        color: var(--primary);

        font-size: 15px;
    }

    .pine-history-table-footer p {
        margin: 0;
    }

    /* ============================================================
   SECTION 5 — RESPONSIVE
   ============================================================ */

    @media (max-width: 991.98px) {

        .pine-table-header {
            align-items: flex-start;

            flex-direction: column;

            gap: 15px;
        }

        .pine-table-record-count {
            text-align: left;
        }

    }


    @media (max-width: 767.98px) {

        .pine-history-table-wrapper {
            display: none;
        }

        .pine-mobile-history {
            display: block;
        }

        .pine-mobile-history-item {
            padding: 17px 19px;

            border-bottom: 1px solid rgba(189,202,186,.4);
        }

        .pine-mobile-history-item.latest {
            background: rgba(0,107,44,.035);
        }

        .pine-mobile-history-date {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;

            margin-bottom: 14px;
        }

        .pine-mobile-history-date strong {
            color: var(--on-surface);

            font-size: 12px;

            font-weight: 800;
        }

        .pine-mobile-history-date span {
            padding: 3px 6px;

            border-radius: 4px;

            background: rgba(0,107,44,.08);

            color: var(--primary);

            font-size: 7px;

            font-weight: 800;

            letter-spacing: .05em;
        }

        .pine-mobile-history-values {
            display: grid;

            grid-template-columns:
            1fr 1fr auto;

            gap: 12px;
        }

        .pine-mobile-history-values > div {
            min-width: 0;
        }

        .pine-mobile-history-values span {
            display: block;

            margin-bottom: 4px;

            color: var(--text-secondary);

            font-size: 7px;

            font-weight: 800;

            letter-spacing: .1em;
        }

        .pine-mobile-history-values strong {
            display: block;

            color: var(--on-surface);

            font-family: var(--font-mono);

            font-size: 15px;
        }

        .pine-mobile-history-values div:nth-child(1) strong {
            color: var(--primary);
        }

        .pine-mobile-history-values div:nth-child(2) strong {
            color: #756c00;
        }

        .pine-mobile-history-values small {
            display: block;

            margin-top: 3px;

            color: var(--text-secondary);

            font-family: var(--font-mono);

            font-size: 8px;
        }

        .pine-mobile-history-values
        div:last-child {
            text-align: right;
        }

        .pine-mobile-history-values
        div:last-child strong {
            padding-top: 2px;

            color: #756c00;
        }

    }


    @media (max-width: 575.98px) {

        .pine-table-section {
            margin-bottom: 45px;
        }

        .pine-history-table-top {
            padding: 16px 18px;
        }

        .pine-history-table-footer {
            padding: 11px 16px;
        }

    }


    @media (max-width: 359.98px) {

        .pine-mobile-history-item {
            padding: 15px;
        }

        .pine-mobile-history-values {
            gap: 7px;
        }

        .pine-mobile-history-values strong {
            font-size: 14px;
        }

        .pine-mobile-history-values small {
            font-size: 7px;
        }

    }

    /* ============================================================
   SECTION 6 — MONTHLY MARKET SUMMARY
   ============================================================ */

    .pine-monthly-section {
        margin-bottom: 62px;
    }


    /* ============================================================
       HEADER
       ============================================================ */

    .pine-monthly-header {
        display: flex;

        align-items: flex-end;

        justify-content: space-between;

        gap: 30px;

        margin-bottom: 22px;
    }

    .pine-monthly-header > div:first-child {
        max-width: 700px;
    }

    .pine-monthly-header h2 {
        margin: 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: clamp(
                27px,
                3vw,
                36px
        );

        font-weight: 800;

        line-height: 1.1;

        letter-spacing: -.035em;
    }

    .pine-monthly-header p {
        max-width: 650px;

        margin: 9px 0 0;

        color: var(--text-secondary);

        font-size: 14px;

        line-height: 1.7;
    }


    /* ============================================================
       SELECTOR
       ============================================================ */

    .pine-monthly-selector {
        display: flex;

        align-items: center;

        gap: 10px;

        flex: 0 0 auto;

        padding: 10px 13px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-lg);

        background: var(--surface);
    }

    .pine-monthly-selector
    .material-symbols-outlined {
        color: var(--primary);

        font-size: 18px;
    }

    .pine-monthly-selector span {
        display: block;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .12em;
    }

    .pine-monthly-selector strong {
        display: block;

        margin-top: 2px;

        color: var(--on-surface);

        font-size: 11px;
    }


    /* ============================================================
       SUMMARY CARD
       ============================================================ */

    .pine-monthly-summary-card {
        display: grid;

        grid-template-columns:
        minmax(0, 1fr)
        150px
        150px;

        gap: 0;

        overflow: hidden;

        border-radius: var(--radius-2xl);

        background:
                linear-gradient(
                        110deg,
                        var(--primary),
                        var(--primary-container)
                );

        color: #fff;

        box-shadow:
                0 14px 35px rgba(0,107,44,.12);
    }

    .pine-monthly-summary-main {
        padding: 25px 27px;
    }

    .pine-monthly-summary-main > span {
        display: block;

        color: rgba(255,255,255,.65);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .14em;
    }

    .pine-monthly-summary-main h3 {
        margin: 5px 0 0;

        color: #fff;

        font-family: var(--font-headline);

        font-size: 23px;

        font-weight: 800;

        letter-spacing: -.025em;
    }

    .pine-monthly-summary-main p {
        max-width: 650px;

        margin: 8px 0 0;

        color: rgba(255,255,255,.68);

        font-size: 12px;

        line-height: 1.7;
    }

    .pine-monthly-summary-stat {
        display: flex;

        flex-direction: column;

        justify-content: center;

        padding: 20px;

        border-left: 1px solid rgba(255,255,255,.14);
    }

    .pine-monthly-summary-stat span {
        color: rgba(255,255,255,.58);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .11em;
    }

    .pine-monthly-summary-stat strong {
        margin-top: 4px;

        color: #fff;

        font-family: var(--font-mono);

        font-size: 25px;
    }

    .pine-monthly-summary-stat small {
        margin-top: 2px;

        color: rgba(255,255,255,.52);

        font-size: 8px;
    }


    /* ============================================================
       MONTHLY CARDS
       ============================================================ */

    .pine-monthly-grid {
        display: grid;

        grid-template-columns:
        repeat(2, minmax(0, 1fr));

        gap: 18px;

        margin-top: 18px;
    }

    .pine-monthly-card {
        position: relative;

        overflow: hidden;

        padding: 25px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-2xl);

        background: var(--surface);
    }

    .pine-monthly-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;
        right: 0;

        height: 4px;
    }

    .pine-monthly-card.green::before {
        background: var(--primary);
    }

    .pine-monthly-card.ripe::before {
        background: var(--pineapple-accent);
    }


    /* ============================================================
       CARD HEADER
       ============================================================ */

    .pine-monthly-card-header {
        display: flex;

        align-items: flex-start;

        justify-content: space-between;

        gap: 15px;
    }

    .pine-monthly-category {
        display: flex;

        align-items: center;

        gap: 7px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .13em;
    }

    .pine-monthly-category i {
        width: 8px;
        height: 8px;

        border-radius: 50%;
    }

    .pine-monthly-card.green
    .pine-monthly-category i {
        background: var(--primary);
    }

    .pine-monthly-card.ripe
    .pine-monthly-category i {
        background: var(--pineapple-accent);
    }

    .pine-monthly-card-header h3 {
        margin: 6px 0 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 21px;

        font-weight: 800;
    }

    .pine-monthly-card-header
    > .material-symbols-outlined {
        color: var(--primary);

        font-size: 23px;
    }

    .pine-monthly-card.ripe
    .pine-monthly-card-header
    > .material-symbols-outlined {
        color: #756c00;
    }


    /* ============================================================
       MAIN VALUE
       ============================================================ */

    .pine-monthly-main-value {
        display: flex;

        align-items: baseline;

        margin-top: 27px;
    }

    .pine-monthly-main-value strong {
        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 52px;

        font-weight: 800;

        line-height: .95;

        letter-spacing: -.05em;
    }

    .pine-monthly-main-value span {
        margin-left: 6px;

        color: var(--text-secondary);

        font-size: 13px;
    }

    .pine-monthly-value-label {
        display: block;

        margin-top: 5px;

        color: var(--text-secondary);

        font-size: 9px;
    }


    /* ============================================================
       METRICS
       ============================================================ */

    .pine-monthly-metrics {
        display: grid;

        grid-template-columns:
        repeat(3, 1fr);

        margin-top: 23px;

        border-top: 1px solid var(--border-color);

        border-bottom: 1px solid var(--border-color);
    }

    .pine-monthly-metrics > div {
        padding: 13px 8px;
    }

    .pine-monthly-metrics > div + div {
        border-left: 1px solid var(--border-color);
    }

    .pine-monthly-metrics span {
        display: block;

        margin-bottom: 4px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .1em;
    }

    .pine-monthly-metrics strong {
        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 14px;
    }


    /* ============================================================
       MOVEMENT
       ============================================================ */

    .pine-monthly-movement {
        margin-top: 19px;
    }

    .pine-monthly-movement-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 10px;
    }

    .pine-monthly-movement-header span {
        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .1em;
    }

    .pine-monthly-movement-header strong {
        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 10px;
    }

    .pine-monthly-bar {
        height: 6px;

        margin-top: 9px;

        overflow: hidden;

        border-radius: 99px;

        background: var(--surface-container);
    }

    .pine-monthly-bar span {
        display: block;

        height: 100%;

        border-radius: inherit;
    }

    .pine-monthly-card.green
    .pine-monthly-bar span {
        background: var(--primary);
    }

    .pine-monthly-card.ripe
    .pine-monthly-bar span {
        background: var(--pineapple-accent);
    }

    .pine-monthly-movement small {
        display: block;

        margin-top: 6px;

        color: var(--text-secondary);

        font-size: 8px;
    }


    /* ============================================================
       INSIGHT
       ============================================================ */

    .pine-monthly-insight {
        display: grid;

        grid-template-columns:
        auto minmax(0, 1fr);

        gap: 15px;

        margin-top: 14px;

        padding: 20px 22px;

        border: 1px solid rgba(0,107,44,.12);

        border-radius: var(--radius-xl);

        background:
                linear-gradient(
                        110deg,
                        rgba(0,107,44,.045),
                        rgba(255,255,255,.95)
                );
    }

    .pine-monthly-insight-icon {
        display: flex;

        align-items: center;

        justify-content: center;

        width: 43px;
        height: 43px;

        border-radius: var(--radius-lg);

        background: rgba(0,107,44,.08);

        color: var(--primary);
    }

    .pine-monthly-insight-icon
    .material-symbols-outlined {
        font-size: 21px;
    }

    .pine-monthly-insight span {
        display: block;

        color: var(--primary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .13em;
    }

    .pine-monthly-insight h3 {
        margin: 3px 0 5px;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 17px;

        font-weight: 800;
    }

    .pine-monthly-insight p {
        max-width: 720px;

        margin: 0;

        color: var(--text-secondary);

        font-size: 12px;

        line-height: 1.7;
    }


    /* ============================================================
       MONTHLY TABLE
       ============================================================ */

    .pine-monthly-table-card {
        margin-top: 14px;

        overflow: hidden;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-xl);

        background: var(--surface);
    }

    .pine-monthly-table-heading {
        padding: 17px 20px;

        border-bottom: 1px solid var(--border-color);
    }

    .pine-monthly-table-heading > div {
        display: flex;

        align-items: center;

        gap: 10px;
    }

    .pine-monthly-table-heading
    .material-symbols-outlined {
        display: flex;

        align-items: center;

        justify-content: center;

        width: 35px;
        height: 35px;

        border-radius: var(--radius-lg);

        background: rgba(0,107,44,.07);

        color: var(--primary);

        font-size: 18px;
    }

    .pine-monthly-table-heading strong {
        display: block;

        color: var(--on-surface);

        font-size: 11px;

        font-weight: 800;
    }

    .pine-monthly-table-heading small {
        display: block;

        margin-top: 2px;

        color: var(--text-secondary);

        font-size: 8px;
    }

    .pine-monthly-table-wrap {
        overflow-x: auto;
    }

    .pine-monthly-table {
        width: 100%;

        min-width: 650px;

        border-collapse: collapse;
    }

    .pine-monthly-table th {
        padding: 11px 15px;

        background: rgba(0,107,44,.025);

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .1em;

        text-align: left;
    }

    .pine-monthly-table th:not(:first-child) {
        text-align: right;
    }

    .pine-monthly-table td {
        padding: 15px;

        border-top: 1px solid rgba(189,202,186,.35);

        color: var(--text-secondary);

        font-size: 10px;

        text-align: right;
    }

    .pine-monthly-table td:first-child {
        color: var(--on-surface);

        text-align: left;
    }

    .pine-monthly-table td strong {
        font-family: var(--font-mono);

        font-size: 13px;
    }

    .pine-monthly-table td strong.green {
        color: var(--primary);
    }

    .pine-monthly-table td strong.ripe {
        color: #756c00;
    }

    .pine-monthly-gap {
        display: inline-block;

        padding: 4px 7px;

        border-radius: 5px;

        background: rgba(228,208,10,.1);

        color: #756c00;

        font-family: var(--font-mono);

        font-size: 9px;

        font-weight: 800;
    }

    /* ============================================================
   SECTION 6 — RESPONSIVE
   ============================================================ */

    @media (max-width: 991.98px) {

        .pine-monthly-header {
            align-items: flex-start;

            flex-direction: column;

            gap: 15px;
        }

        .pine-monthly-selector {
            align-self: flex-start;
        }

        .pine-monthly-summary-card {
            grid-template-columns:
            minmax(0, 1fr)
            130px
            130px;
        }

    }


    @media (max-width: 767.98px) {

        .pine-monthly-summary-card {
            grid-template-columns: 1fr;
        }

        .pine-monthly-summary-stat {
            border-top: 1px solid rgba(255,255,255,.14);

            border-left: 0;
        }

        .pine-monthly-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 575.98px) {

        .pine-monthly-section {
            margin-bottom: 45px;
        }

        .pine-monthly-summary-main {
            padding: 21px;
        }

        .pine-monthly-summary-main h3 {
            font-size: 20px;
        }

        .pine-monthly-summary-stat {
            padding: 15px 21px;
        }

        .pine-monthly-card {
            padding: 21px;
        }

        .pine-monthly-main-value strong {
            font-size: 48px;
        }

        .pine-monthly-insight {
            padding: 17px;

            gap: 12px;
        }

        .pine-monthly-insight h3 {
            font-size: 15px;
        }

    }


    @media (max-width: 359.98px) {

        .pine-monthly-card {
            padding: 17px;
        }

        .pine-monthly-metrics > div {
            padding: 11px 5px;
        }

        .pine-monthly-metrics strong {
            font-size: 12px;
        }

        .pine-monthly-main-value strong {
            font-size: 44px;
        }

        .pine-monthly-summary-main {
            padding: 17px;
        }

    }

    /* ============================================================
   SECTION 7 — MARKET INSIGHTS
   ============================================================ */

    .pine-insights-section {
        margin-bottom: 62px;
    }


    /* ============================================================
       HEADER
       ============================================================ */

    .pine-insights-header {
        margin-bottom: 23px;
    }

    .pine-insights-header > div {
        max-width: 760px;
    }

    .pine-insights-header h2 {
        margin: 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: clamp(
                27px,
                3vw,
                36px
        );

        font-weight: 800;

        line-height: 1.1;

        letter-spacing: -.035em;
    }

    .pine-insights-header p {
        max-width: 700px;

        margin: 9px 0 0;

        color: var(--text-secondary);

        font-size: 14px;

        line-height: 1.7;
    }


    /* ============================================================
       INSIGHT GRID
       ============================================================ */

    .pine-insights-grid {
        display: grid;

        grid-template-columns:
        repeat(3, minmax(0, 1fr));

        gap: 14px;
    }


    /* ============================================================
       INSIGHT CARD
       ============================================================ */

    .pine-insight-card {
        position: relative;

        min-height: 245px;

        padding: 22px;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-xl);

        background: var(--surface);

        transition:
                transform .2s ease,
                box-shadow .2s ease,
                border-color .2s ease;
    }

    .pine-insight-card:hover {
        transform: translateY(-3px);

        border-color: rgba(0,107,44,.18);

        box-shadow:
                0 12px 28px rgba(25,28,30,.055);
    }


    /* ============================================================
       ICON
       ============================================================ */

    .pine-insight-icon {
        display: flex;

        align-items: center;

        justify-content: center;

        width: 41px;
        height: 41px;

        border-radius: var(--radius-lg);

        background: rgba(0,107,44,.07);

        color: var(--primary);
    }

    .pine-insight-icon
    .material-symbols-outlined {
        font-size: 20px;
    }


    /* ============================================================
       NUMBER
       ============================================================ */

    .pine-insight-number {
        position: absolute;

        top: 23px;
        right: 22px;

        color: var(--outline);

        font-family: var(--font-mono);

        font-size: 10px;

        font-weight: 700;
    }


    /* ============================================================
       TITLE
       ============================================================ */

    .pine-insight-card h3 {
        margin: 20px 0 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 18px;

        font-weight: 800;

        letter-spacing: -.02em;
    }


    /* ============================================================
       DESCRIPTION
       ============================================================ */

    .pine-insight-card p {
        margin: 8px 0 0;

        color: var(--text-secondary);

        font-size: 11px;

        line-height: 1.7;
    }


    /* ============================================================
       TAG
       ============================================================ */

    .pine-insight-tag {
        position: absolute;

        bottom: 20px;
        left: 22px;

        padding: 4px 7px;

        border-radius: 5px;

        background: var(--surface-container);

        color: var(--text-secondary);

        font-size: 7px;

        font-weight: 800;

        letter-spacing: .1em;
    }


    /* ============================================================
       SNAPSHOT
       ============================================================ */

    .pine-insight-snapshot {
        margin-top: 18px;

        overflow: hidden;

        border: 1px solid var(--border-color);

        border-radius: var(--radius-2xl);

        background: var(--surface);
    }


    /* ============================================================
       SNAPSHOT HEADING
       ============================================================ */

    .pine-insight-snapshot-heading {
        display: flex;

        align-items: center;

        gap: 11px;

        padding: 19px 22px;

        border-bottom: 1px solid var(--border-color);
    }

    .pine-insight-snapshot-heading
    > .material-symbols-outlined {
        display: flex;

        align-items: center;

        justify-content: center;

        width: 37px;
        height: 37px;

        border-radius: var(--radius-lg);

        background: rgba(0,107,44,.07);

        color: var(--primary);

        font-size: 19px;
    }

    .pine-insight-snapshot-heading span {
        display: block;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .13em;
    }

    .pine-insight-snapshot-heading h3 {
        margin: 3px 0 0;

        color: var(--on-surface);

        font-family: var(--font-headline);

        font-size: 17px;

        font-weight: 800;
    }


    /* ============================================================
       SNAPSHOT GRID
       ============================================================ */

    .pine-insight-snapshot-grid {
        display: grid;

        grid-template-columns:
        repeat(4, minmax(0, 1fr));
    }

    .pine-insight-snapshot-item {
        padding: 18px 20px;
    }

    .pine-insight-snapshot-item + .pine-insight-snapshot-item {
        border-left: 1px solid var(--border-color);
    }

    .pine-insight-snapshot-item > span {
        display: block;

        margin-bottom: 5px;

        color: var(--text-secondary);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .11em;
    }

    .pine-insight-snapshot-item strong {
        display: block;

        color: var(--on-surface);

        font-family: var(--font-mono);

        font-size: 18px;
    }

    .pine-insight-snapshot-item small {
        display: block;

        margin-top: 3px;

        color: var(--text-secondary);

        font-size: 9px;
    }


    /* ============================================================
       SNAPSHOT NOTE
       ============================================================ */

    .pine-insight-snapshot-note {
        display: flex;

        align-items: flex-start;

        gap: 8px;

        padding: 12px 20px;

        border-top: 1px solid rgba(189,202,186,.35);

        background: rgba(0,107,44,.018);

        color: var(--text-secondary);

        font-size: 10px;

        line-height: 1.6;
    }

    .pine-insight-snapshot-note
    .material-symbols-outlined {
        flex: 0 0 auto;

        color: var(--primary);

        font-size: 15px;
    }

    .pine-insight-snapshot-note p {
        margin: 0;
    }


</style>






<div class="container-max mx-auto px-3 px-md-4 py-4 py-md-5">

    <div class="d-flex flex-column flex-lg-row gap-4">

        <main class="flex-grow-1" style="min-width:0;">

            <section class="pine-hero">

                <!-- Breadcrumb -->

                <nav class="pine-hero-breadcrumb" aria-label="Breadcrumb">

                    <a href="/">
                        Home
                    </a>

                    <span class="material-symbols-outlined">
            chevron_right
        </span>

                    <a href="#">
                        Agriculture
                    </a>

                    <span class="material-symbols-outlined">
            chevron_right
        </span>

                    <span class="current">
            Pineapple
        </span>

                </nav>


                <div class="pine-hero-grid">


                    <!-- ====================================================
                         LEFT — INTRODUCTION
                         ==================================================== -->

                    <div class="pine-hero-content">

                        <div class="pine-hero-eyebrow">

                            <span class="pine-hero-status-dot"></span>

                            AGRICULTURAL MARKET DATA

                        </div>


                        <h1>
                            Pineapple
                            <span>Price Today</span>
                        </h1>


                        <p class="pine-hero-lead">
                            Latest pineapple market prices for green and ripe
                            categories, with daily price ranges and average
                            market values.
                        </p>


                        <p class="pine-hero-copy">
                            MarketNiro provides clear and timely pineapple price
                            information for farmers, traders, retailers,
                            exporters, buyers, and market researchers.
                        </p>


                        <!-- Latest data -->

                        <div class="pine-hero-data">

                            <div class="pine-hero-data-item">

                                <div class="pine-hero-data-icon">

                        <span class="material-symbols-outlined">
                            calendar_today
                        </span>

                                </div>

                                <div>

                        <span class="pine-hero-data-label">
                            LATEST AVAILABLE DATA
                        </span>

                                    <strong>
                                        11 August 2026
                                    </strong>

                                </div>

                            </div>


                            <div class="pine-hero-data-divider"></div>


                            <div class="pine-hero-data-item">

                                <div class="pine-hero-data-icon">

                        <span class="material-symbols-outlined">
                            payments
                        </span>

                                </div>

                                <div>

                        <span class="pine-hero-data-label">
                            PRICING UNIT
                        </span>

                                    <strong>
                                        Indian Rupee / kg
                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- ====================================================
                         RIGHT — MARKET PULSE
                         ==================================================== -->

                    <div class="pine-hero-market">

                        <div class="pine-hero-market-top">

                            <div>

                    <span class="pine-market-label">
                        MARKET PULSE
                    </span>

                                <h2>
                                    Latest prices
                                </h2>

                            </div>


                            <span class="pine-market-live">

                    <i></i>

                    Available

                </span>

                        </div>


                        <!-- Green -->

                        <div class="pine-pulse-row">

                            <div class="pine-pulse-name">

                                <span class="pine-pulse-dot green"></span>

                                <div>

                                    <strong>
                                        Green
                                    </strong>

                                    <small>
                                        Min ₹40 · Max ₹42
                                    </small>

                                </div>

                            </div>


                            <div class="pine-pulse-price">

                                <strong>
                                    ₹41
                                </strong>

                                <span>
                        /kg
                    </span>

                            </div>

                        </div>


                        <!-- Ripe -->

                        <div class="pine-pulse-row">

                            <div class="pine-pulse-name">

                                <span class="pine-pulse-dot ripe"></span>

                                <div>

                                    <strong>
                                        Ripe
                                    </strong>

                                    <small>
                                        Min ₹50 · Max ₹52
                                    </small>

                                </div>

                            </div>


                            <div class="pine-pulse-price">

                                <strong>
                                    ₹51
                                </strong>

                                <span>
                        /kg
                    </span>

                            </div>

                        </div>


                        <!-- Difference -->

                        <div class="pine-pulse-difference">

                            <div>

                    <span>
                        CURRENT SPREAD
                    </span>

                                <strong>
                                    ₹10 / kg
                                </strong>

                            </div>

                            <span class="material-symbols-outlined">
                    trending_up
                </span>

                        </div>


                        <!-- Footer -->

                        <div class="pine-pulse-footer">

                <span class="material-symbols-outlined">
                    verified
                </span>

                            Latest recorded market data

                        </div>

                    </div>

                </div>

            </section>

            <!-- ============================================================
     SECTION 2 — TODAY'S MARKET PRICES
     ============================================================ -->

            <section
                class="pine-price-section"
                id="pine-market-prices"
            >

                <!-- ========================================================
                     SECTION HEADER
                     ======================================================== -->

                <div class="pine-price-section-header">

                    <div>

            <span class="pine-section-kicker">
                TODAY'S MARKET
            </span>

                        <h2>
                            Pineapple Prices
                        </h2>

                        <p>
                            Latest recorded prices for green and ripe pineapple,
                            showing the minimum, maximum, and average market value
                            per kilogram.
                        </p>

                    </div>


                    <div class="pine-price-date">

            <span class="material-symbols-outlined">
                calendar_today
            </span>

                        <div>

                <span>
                    LAST RECORDED
                </span>

                            <strong>
                                11 August 2026
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- ========================================================
                     PRICE CARDS
                     ======================================================== -->

                <div class="pine-price-cards">


                    <!-- ====================================================
                         GREEN PINEAPPLE
                         ==================================================== -->

                    <article class="pine-price-card pine-price-green">

                        <div class="pine-price-card-header">

                            <div>

                                <div class="pine-price-category">

                                    <span></span>

                                    GREEN PINEAPPLE

                                </div>

                                <h3>
                                    Green Pineapple
                                </h3>

                                <p>
                                    Industrial &amp; Export Grade
                                </p>

                            </div>


                            <div class="pine-price-icon">

                    <span class="material-symbols-outlined">
                        eco
                    </span>

                            </div>

                        </div>


                        <!-- Average -->

                        <div class="pine-average-price">

                <span class="pine-average-currency">
                    ₹
                </span>

                            <strong>
                                41
                            </strong>

                            <span class="pine-average-unit">
                    /kg
                </span>

                        </div>

                        <div class="pine-average-caption">
                            Average market price
                        </div>


                        <!-- Range -->

                        <div class="pine-range">

                            <div>

                    <span>
                        MINIMUM
                    </span>

                                <strong>
                                    ₹40
                                </strong>

                            </div>


                            <div>

                    <span>
                        MAXIMUM
                    </span>

                                <strong>
                                    ₹42
                                </strong>

                            </div>


                            <div>

                    <span>
                        SPREAD
                    </span>

                                <strong>
                                    ₹2
                                </strong>

                            </div>

                        </div>


                        <!-- Description -->

                        <div class="pine-price-description">

                            <h4>
                                Market category
                            </h4>

                            <p>
                                Green pineapple is harvested while firm and unripe
                                and is commonly associated with industrial processing
                                and export markets.
                            </p>

                        </div>


                        <div class="pine-price-card-footer">

                <span>

                    <span class="material-symbols-outlined">
                        verified
                    </span>

                    Latest available price

                </span>

                            <span>
                    INR / kg
                </span>

                        </div>

                    </article>



                    <!-- ====================================================
                         RIPE PINEAPPLE
                         ==================================================== -->

                    <article class="pine-price-card pine-price-ripe">

                        <div class="pine-price-card-header">

                            <div>

                                <div class="pine-price-category">

                                    <span></span>

                                    RIPE PINEAPPLE

                                </div>

                                <h3>
                                    Ripe Pineapple
                                </h3>

                                <p>
                                    Retail &amp; Consumer Grade
                                </p>

                            </div>


                            <div class="pine-price-icon">

                    <span class="material-symbols-outlined">
                        nutrition
                    </span>

                            </div>

                        </div>


                        <!-- Average -->

                        <div class="pine-average-price">

                <span class="pine-average-currency">
                    ₹
                </span>

                            <strong>
                                51
                            </strong>

                            <span class="pine-average-unit">
                    /kg
                </span>

                        </div>

                        <div class="pine-average-caption">
                            Average market price
                        </div>


                        <!-- Range -->

                        <div class="pine-range">

                            <div>

                    <span>
                        MINIMUM
                    </span>

                                <strong>
                                    ₹50
                                </strong>

                            </div>


                            <div>

                    <span>
                        MAXIMUM
                    </span>

                                <strong>
                                    ₹52
                                </strong>

                            </div>


                            <div>

                    <span>
                        SPREAD
                    </span>

                                <strong>
                                    ₹2
                                </strong>

                            </div>

                        </div>


                        <!-- Description -->

                        <div class="pine-price-description">

                            <h4>
                                Market category
                            </h4>

                            <p>
                                Ripe pineapple is sold closer to the retail and
                                consumer market. Its shorter shelf life can make
                                prices more sensitive to supply and local demand.
                            </p>

                        </div>


                        <div class="pine-price-card-footer">

                <span>

                    <span class="material-symbols-outlined">
                        verified
                    </span>

                    Latest available price

                </span>

                            <span>
                    INR / kg
                </span>

                        </div>

                    </article>

                </div>


                <!-- ========================================================
                     PRICE DIFFERENCE
                     ======================================================== -->

                <div class="pine-price-gap">

                    <div class="pine-price-gap-icon">

            <span class="material-symbols-outlined">
                compare_arrows
            </span>

                    </div>


                    <div class="pine-price-gap-content">

            <span>
                MARKET DIFFERENCE
            </span>

                        <h3>
                            Ripe pineapple is ₹10/kg higher
                        </h3>

                        <p>
                            The latest recorded average price for ripe pineapple
                            is ₹10 per kilogram higher than the average price
                            recorded for green pineapple.
                        </p>

                    </div>


                    <div class="pine-price-gap-values">

                        <div>

                <span>
                    GREEN
                </span>

                            <strong>
                                ₹41
                            </strong>

                        </div>


                        <span class="pine-price-gap-arrow">
                →
            </span>


                        <div>

                <span>
                    RIPE
                </span>

                            <strong>
                                ₹51
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- ========================================================
                     DATA NOTE
                     ======================================================== -->

                <div class="pine-price-note">

        <span class="material-symbols-outlined">
            info
        </span>

                    <p>
                        The latest available pineapple prices are from
                        11 August 2026. Prices are presented as recorded
                        market values per kilogram.
                    </p>

                </div>

            </section>


            <!-- ============================================================
     SECTION 3 — GREEN VS RIPE
     ============================================================ -->

            <section
                class="pine-context-section"
                id="pine-market-context"
            >

                <!-- ========================================================
                     HEADER
                     ======================================================== -->

                <div class="pine-context-header">

                    <div>

            <span class="pine-section-kicker">
                MARKET CONTEXT
            </span>

                        <h2>
                            Green vs. Ripe Pineapple
                        </h2>

                        <p>
                            The two categories serve different parts of the
                            pineapple market, which helps explain their different
                            price levels.
                        </p>

                    </div>


                    <div class="pine-context-spread">

            <span>
                CURRENT PRICE GAP
            </span>

                        <strong>
                            ₹10/kg
                        </strong>

                    </div>

                </div>


                <!-- ========================================================
                     COMPARISON
                     ======================================================== -->

                <div class="pine-context-grid">


                    <!-- ====================================================
                         GREEN
                         ==================================================== -->

                    <article class="pine-context-card pine-context-green">

                        <div class="pine-context-card-top">

                            <div class="pine-context-number">
                                01
                            </div>

                            <div class="pine-context-icon">

                    <span class="material-symbols-outlined">
                        eco
                    </span>

                            </div>

                        </div>


                        <div class="pine-context-category">

                            <span class="pine-context-dot"></span>

                            GREEN PINEAPPLE

                        </div>


                        <h3>
                            Firm &amp; unripe
                        </h3>


                        <p class="pine-context-description">
                            Green pineapple is harvested while still firm and
                            unripe and is commonly associated with industrial
                            processing and export markets.
                        </p>


                        <div class="pine-context-facts">

                            <div>

                    <span class="material-symbols-outlined">
                        inventory_2
                    </span>

                                <div>

                                    <strong>
                                        Bulk handling
                                    </strong>

                                    <small>
                                        Commonly handled in larger quantities
                                    </small>

                                </div>

                            </div>


                            <div>

                    <span class="material-symbols-outlined">
                        local_shipping
                    </span>

                                <div>

                                    <strong>
                                        Export movement
                                    </strong>

                                    <small>
                                        Suitable for longer transportation
                                    </small>

                                </div>

                            </div>


                            <div>

                    <span class="material-symbols-outlined">
                        factory
                    </span>

                                <div>

                                    <strong>
                                        Processing
                                    </strong>

                                    <small>
                                        Used in industrial applications
                                    </small>

                                </div>

                            </div>

                        </div>


                        <div class="pine-context-price">

                            <div>

                    <span>
                        CURRENT AVERAGE
                    </span>

                                <strong>
                                    ₹41
                                </strong>

                            </div>

                            <div>

                    <span>
                        RANGE
                    </span>

                                <strong>
                                    ₹40–₹42
                                </strong>

                            </div>

                        </div>

                    </article>



                    <!-- ====================================================
                         RIPE
                         ==================================================== -->

                    <article class="pine-context-card pine-context-ripe">

                        <div class="pine-context-card-top">

                            <div class="pine-context-number">
                                02
                            </div>

                            <div class="pine-context-icon">

                    <span class="material-symbols-outlined">
                        nutrition
                    </span>

                            </div>

                        </div>


                        <div class="pine-context-category">

                            <span class="pine-context-dot"></span>

                            RIPE PINEAPPLE

                        </div>


                        <h3>
                            Ready for consumption
                        </h3>


                        <p class="pine-context-description">
                            Ripe pineapple is sold closer to the retail and
                            consumer market. Its shorter shelf life makes the
                            category more sensitive to supply availability,
                            local demand, weather, and logistics.
                        </p>


                        <div class="pine-context-facts">

                            <div>

                    <span class="material-symbols-outlined">
                        storefront
                    </span>

                                <div>

                                    <strong>
                                        Retail market
                                    </strong>

                                    <small>
                                        Closer to the end consumer
                                    </small>

                                </div>

                            </div>


                            <div>

                    <span class="material-symbols-outlined">
                        schedule
                    </span>

                                <div>

                                    <strong>
                                        Short shelf life
                                    </strong>

                                    <small>
                                        Less time available for storage
                                    </small>

                                </div>

                            </div>


                            <div>

                    <span class="material-symbols-outlined">
                        local_mall
                    </span>

                                <div>

                                    <strong>
                                        Consumer demand
                                    </strong>

                                    <small>
                                        More directly linked to retail demand
                                    </small>

                                </div>

                            </div>

                        </div>


                        <div class="pine-context-price">

                            <div>

                    <span>
                        CURRENT AVERAGE
                    </span>

                                <strong>
                                    ₹51
                                </strong>

                            </div>

                            <div>

                    <span>
                        RANGE
                    </span>

                                <strong>
                                    ₹50–₹52
                                </strong>

                            </div>

                        </div>

                    </article>

                </div>


                <!-- ========================================================
                     EXPLANATION STRIP
                     ======================================================== -->

                <div class="pine-context-explanation">

                    <div class="pine-context-explanation-icon">

            <span class="material-symbols-outlined">
                lightbulb
            </span>

                    </div>


                    <div>

            <span>
                WHAT THE CURRENT DATA SHOWS
            </span>

                        <h3>
                            Ripe pineapple currently carries a ₹10/kg premium
                        </h3>

                        <p>
                            The latest recorded averages are ₹41/kg for green
                            pineapple and ₹51/kg for ripe pineapple. This difference
                            is a snapshot of the latest available market data,
                            rather than a permanent price relationship.
                        </p>

                    </div>

                </div>


                <!-- ========================================================
                     COMPARISON METRICS
                     ======================================================== -->

                <div class="pine-context-metrics">

                    <div class="pine-context-metric">

            <span class="pine-context-metric-label">
                GREEN AVERAGE
            </span>

                        <strong>
                            ₹41/kg
                        </strong>

                        <small>
                            Latest recorded average
                        </small>

                    </div>


                    <div class="pine-context-metric">

            <span class="pine-context-metric-label">
                RIPE AVERAGE
            </span>

                        <strong>
                            ₹51/kg
                        </strong>

                        <small>
                            Latest recorded average
                        </small>

                    </div>


                    <div class="pine-context-metric">

            <span class="pine-context-metric-label">
                PRICE GAP
            </span>

                        <strong>
                            ₹10/kg
                        </strong>

                        <small>
                            Ripe above green
                        </small>

                    </div>


                    <div class="pine-context-metric">

            <span class="pine-context-metric-label">
                LATEST DATA
            </span>

                        <strong>
                            11 Aug
                        </strong>

                        <small>
                            2026
                        </small>

                    </div>

                </div>

            </section>

            <!-- ============================================================
     SECTION 4 — HISTORICAL PRICE INDEX
     ============================================================ -->

            <section
                class="pine-history-section"
                id="pine-price-history"
            >

                <!-- ========================================================
                     HEADER
                     ======================================================== -->

                <div class="pine-history-header">

                    <div>

            <span class="pine-section-kicker">
                PRICE HISTORY
            </span>

                        <h2>
                            Historical Price Index
                        </h2>

                        <p>
                            Follow pineapple market movement across different
                            timeframes and compare average prices for green and
                            ripe categories.
                        </p>

                    </div>


                    <div class="pine-history-period">

            <span class="material-symbols-outlined">
                timeline
            </span>

                        <div>

                <span>
                    DATA RANGE
                </span>

                            <strong>
                                01–11 Aug 2026
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- ========================================================
                     CHART CARD
                     ======================================================== -->

                <div class="pine-history-card">


                    <!-- Chart header -->

                    <div class="pine-history-card-header">

                        <div>

                <span class="pine-history-card-label">
                    MARKET MOVEMENT
                </span>

                            <h3>
                                Average price / kg
                            </h3>

                        </div>


                        <!-- Timeframe -->

                        <div
                            class="pine-history-toggle"
                            role="group"
                            aria-label="Select pineapple price history range"
                        >

                            <button
                                type="button"
                                class="pine-history-btn active"
                                data-range="7D"
                                aria-pressed="true"
                            >
                                7D
                            </button>

                            <button
                                type="button"
                                class="pine-history-btn"
                                data-range="1M"
                                aria-pressed="false"
                            >
                                1M
                            </button>

                            <button
                                type="button"
                                class="pine-history-btn"
                                data-range="3M"
                                aria-pressed="false"
                            >
                                3M
                            </button>

                            <button
                                type="button"
                                class="pine-history-btn"
                                data-range="1Y"
                                aria-pressed="false"
                            >
                                1Y
                            </button>

                        </div>

                    </div>


                    <!-- ====================================================
                         LEGEND
                         ==================================================== -->

                    <div class="pine-history-legend">

                        <div class="pine-history-legend-item">

                            <span class="pine-history-legend-line green"></span>

                            <span>
                    Green
                </span>

                            <strong>
                                ₹41/kg
                            </strong>

                        </div>


                        <div class="pine-history-legend-item">

                            <span class="pine-history-legend-line ripe"></span>

                            <span>
                    Ripe
                </span>

                            <strong>
                                ₹51/kg
                            </strong>

                        </div>

                    </div>


                    <!-- ====================================================
                         STATIC CHART PREVIEW
                         ==================================================== -->

                    <div class="pine-history-chart">

                        <div class="pine-chart-y-axis">

                            <span>₹55</span>
                            <span>₹50</span>
                            <span>₹45</span>
                            <span>₹40</span>
                            <span>₹35</span>

                        </div>


                        <div class="pine-chart-area">

                            <!-- Grid -->

                            <div class="pine-chart-grid">

                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>

                            </div>


                            <!-- Green line -->

                            <svg
                                class="pine-chart-svg pine-chart-green"
                                viewBox="0 0 900 300"
                                preserveAspectRatio="none"
                                aria-hidden="true"
                            >

                                <defs>

                                    <linearGradient
                                        id="pineGreenFill"
                                        x1="0"
                                        y1="0"
                                        x2="0"
                                        y2="1"
                                    >

                                        <stop
                                            offset="0%"
                                            stop-color="#006b2c"
                                            stop-opacity=".18"
                                        />

                                        <stop
                                            offset="100%"
                                            stop-color="#006b2c"
                                            stop-opacity="0"
                                        />

                                    </linearGradient>

                                </defs>


                                <path
                                    d="M0,125
                           L112,125
                           L225,125
                           L337,105
                           L450,85
                           L562,65
                           L675,45
                           L787,25
                           L900,45
                           L900,300
                           L0,300 Z"
                                    fill="url(#pineGreenFill)"
                                />


                                <path
                                    d="M0,125
                           L112,125
                           L225,125
                           L337,105
                           L450,85
                           L562,65
                           L675,45
                           L787,25
                           L900,45"
                                    fill="none"
                                    stroke="#006b2c"
                                    stroke-width="3"
                                    vector-effect="non-scaling-stroke"
                                />

                            </svg>


                            <!-- Ripe line -->

                            <svg
                                class="pine-chart-svg pine-chart-ripe"
                                viewBox="0 0 900 300"
                                preserveAspectRatio="none"
                                aria-hidden="true"
                            >

                                <path
                                    d="M0,5
                           L112,5
                           L225,5
                           L337,5
                           L450,5
                           L562,5
                           L675,5
                           L787,5
                           L900,5"
                                    fill="none"
                                    stroke="#d8c400"
                                    stroke-width="3"
                                    vector-effect="non-scaling-stroke"
                                />

                            </svg>


                            <!-- Points -->

                            <div class="pine-chart-points green">

                                <i style="left:0%; top:42%;"></i>
                                <i style="left:12.5%; top:42%;"></i>
                                <i style="left:25%; top:42%;"></i>
                                <i style="left:37.5%; top:35%;"></i>
                                <i style="left:50%; top:28%;"></i>
                                <i style="left:62.5%; top:22%;"></i>
                                <i style="left:75%; top:15%;"></i>
                                <i style="left:87.5%; top:8%;"></i>
                                <i style="left:100%; top:15%;"></i>

                            </div>


                            <div class="pine-chart-points ripe">

                                <i style="left:0%; top:3%;"></i>
                                <i style="left:12.5%; top:3%;"></i>
                                <i style="left:25%; top:3%;"></i>
                                <i style="left:37.5%; top:3%;"></i>
                                <i style="left:50%; top:3%;"></i>
                                <i style="left:62.5%; top:3%;"></i>
                                <i style="left:75%; top:3%;"></i>
                                <i style="left:87.5%; top:3%;"></i>
                                <i style="left:100%; top:3%;"></i>

                            </div>


                            <!-- X labels -->

                            <div class="pine-chart-x-axis">

                    <span>
                        Aug 01
                    </span>

                                <span>
                        Aug 03
                    </span>

                                <span>
                        Aug 05
                    </span>

                                <span>
                        Aug 07
                    </span>

                                <span>
                        Aug 08
                    </span>

                                <span>
                        Aug 10
                    </span>

                                <span>
                        Aug 11
                    </span>

                            </div>

                        </div>

                    </div>


                    <!-- ====================================================
                         CHART SUMMARY
                         ==================================================== -->

                    <div class="pine-history-summary">

                        <div>

                <span>
                    GREEN
                </span>

                            <strong>
                                ₹41/kg
                            </strong>

                            <small>
                                Latest average
                            </small>

                        </div>


                        <div>

                <span>
                    RIPE
                </span>

                            <strong>
                                ₹51/kg
                            </strong>

                            <small>
                                Latest average
                            </small>

                        </div>


                        <div>

                <span>
                    SPREAD
                </span>

                            <strong>
                                ₹10/kg
                            </strong>

                            <small>
                                Current difference
                            </small>

                        </div>


                        <div>

                <span>
                    MARKET DAYS
                </span>

                            <strong>
                                9
                            </strong>

                            <small>
                                Aug 01–11
                            </small>

                        </div>

                    </div>


                    <!-- ====================================================
                         CHART FOOTNOTE
                         ==================================================== -->

                    <div class="pine-history-note">

            <span class="material-symbols-outlined">
                info
            </span>

                        <p>
                            Historical values are based on recorded market ranges.
                            The plotted line represents the midpoint average of
                            each daily minimum and maximum price.
                        </p>

                    </div>

                </div>

            </section>


            <!-- ============================================================
     SECTION 5 — DAILY PRICE HISTORY
     ============================================================ -->

            <section
                class="pine-table-section"
                id="pine-daily-history"
            >

                <!-- HEADER -->

                <div class="pine-table-header">

                    <div>

            <span class="pine-section-kicker">
                DAILY RECORDS
            </span>

                        <h2>
                            Price History
                        </h2>

                        <p>
                            A day-by-day view of recorded pineapple market prices,
                            including minimum, maximum, and average values.
                        </p>

                    </div>


                    <div class="pine-table-record-count">

                        <strong>7</strong>

                        <span>
                market days
            </span>

                    </div>

                </div>


                <!-- TABLE CARD -->

                <div class="pine-history-table-card">

                    <!-- Table top -->

                    <div class="pine-history-table-top">

                        <div>

                <span class="material-symbols-outlined">
                    table_chart
                </span>

                            <div>

                                <strong>
                                    Daily market records
                                </strong>

                                <small>
                                    Latest available records
                                </small>

                            </div>

                        </div>


                        <span class="pine-table-unit">
                ₹ / kg
            </span>

                    </div>


                    <!-- Desktop table -->

                    <div class="pine-history-table-wrapper">

                        <table class="pine-history-table">

                            <thead>

                            <tr>

                                <th>
                                    DATE
                                </th>

                                <th>
                                    GREEN
                                </th>

                                <th>
                                    GREEN AVG
                                </th>

                                <th>
                                    RIPE
                                </th>

                                <th>
                                    RIPE AVG
                                </th>

                                <th>
                                    GAP
                                </th>

                            </tr>

                            </thead>


                            <tbody>


                            <!-- 11 AUG -->

                            <tr class="latest">

                                <td>

                                    <div class="pine-table-date">

                                        <strong>
                                            11 Aug 2026
                                        </strong>

                                        <span>
                                    Latest
                                </span>

                                    </div>

                                </td>


                                <td>
                            <span class="pine-range-value">
                                ₹40 – ₹42
                            </span>
                                </td>


                                <td>
                                    <strong class="pine-table-average green">
                                        ₹41
                                    </strong>
                                </td>


                                <td>
                            <span class="pine-range-value">
                                ₹50 – ₹52
                            </span>
                                </td>


                                <td>
                                    <strong class="pine-table-average ripe">
                                        ₹51
                                    </strong>
                                </td>


                                <td>

                            <span class="pine-table-gap">
                                +₹10
                            </span>

                                </td>

                            </tr>


                            <!-- 10 AUG -->

                            <tr>

                                <td>

                                    <div class="pine-table-date">

                                        <strong>
                                            10 Aug 2026
                                        </strong>

                                    </div>

                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹40 – ₹42
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average green">
                                        ₹41
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹50 – ₹52
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average ripe">
                                        ₹51
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-table-gap">
                                +₹10
                            </span>
                                </td>

                            </tr>


                            <!-- 07 AUG -->

                            <tr>

                                <td>

                                    <div class="pine-table-date">

                                        <strong>
                                            07 Aug 2026
                                        </strong>

                                    </div>

                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹42 – ₹44
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average green">
                                        ₹43
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹50 – ₹52
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average ripe">
                                        ₹51
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-table-gap">
                                +₹8
                            </span>
                                </td>

                            </tr>


                            <!-- 06 AUG -->

                            <tr>

                                <td>

                                    <div class="pine-table-date">

                                        <strong>
                                            06 Aug 2026
                                        </strong>

                                    </div>

                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹42 – ₹44
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average green">
                                        ₹43
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹48 – ₹50
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average ripe">
                                        ₹49
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-table-gap">
                                +₹6
                            </span>
                                </td>

                            </tr>


                            <!-- 05 AUG -->

                            <tr>

                                <td>

                                    <div class="pine-table-date">

                                        <strong>
                                            05 Aug 2026
                                        </strong>

                                    </div>

                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹42 – ₹44
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average green">
                                        ₹43
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹48 – ₹50
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average ripe">
                                        ₹49
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-table-gap">
                                +₹6
                            </span>
                                </td>

                            </tr>


                            <!-- 04 AUG -->

                            <tr>

                                <td>

                                    <div class="pine-table-date">

                                        <strong>
                                            04 Aug 2026
                                        </strong>

                                    </div>

                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹42 – ₹44
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average green">
                                        ₹43
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹48 – ₹50
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average ripe">
                                        ₹49
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-table-gap">
                                +₹6
                            </span>
                                </td>

                            </tr>


                            <!-- 03 AUG -->

                            <tr>

                                <td>

                                    <div class="pine-table-date">

                                        <strong>
                                            03 Aug 2026
                                        </strong>

                                    </div>

                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹43 – ₹45
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average green">
                                        ₹44
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-range-value">
                                ₹48 – ₹50
                            </span>
                                </td>

                                <td>
                                    <strong class="pine-table-average ripe">
                                        ₹49
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-table-gap">
                                +₹5
                            </span>
                                </td>

                            </tr>

                            </tbody>

                        </table>

                    </div>


                    <!-- Mobile cards -->

                    <div class="pine-mobile-history">

                        <!-- 11 AUG -->

                        <article class="pine-mobile-history-item latest">

                            <div class="pine-mobile-history-date">

                                <strong>
                                    11 Aug 2026
                                </strong>

                                <span>
                        Latest
                    </span>

                            </div>

                            <div class="pine-mobile-history-values">

                                <div>
                                    <span>GREEN</span>
                                    <strong>₹41</strong>
                                    <small>₹40 – ₹42</small>
                                </div>

                                <div>
                                    <span>RIPE</span>
                                    <strong>₹51</strong>
                                    <small>₹50 – ₹52</small>
                                </div>

                                <div>
                                    <span>GAP</span>
                                    <strong>+₹10</strong>
                                </div>

                            </div>

                        </article>


                        <!-- 10 AUG -->

                        <article class="pine-mobile-history-item">

                            <div class="pine-mobile-history-date">

                                <strong>
                                    10 Aug 2026
                                </strong>

                            </div>

                            <div class="pine-mobile-history-values">

                                <div>
                                    <span>GREEN</span>
                                    <strong>₹41</strong>
                                    <small>₹40 – ₹42</small>
                                </div>

                                <div>
                                    <span>RIPE</span>
                                    <strong>₹51</strong>
                                    <small>₹50 – ₹52</small>
                                </div>

                                <div>
                                    <span>GAP</span>
                                    <strong>+₹10</strong>
                                </div>

                            </div>

                        </article>


                        <!-- 07 AUG -->

                        <article class="pine-mobile-history-item">

                            <div class="pine-mobile-history-date">

                                <strong>
                                    07 Aug 2026
                                </strong>

                            </div>

                            <div class="pine-mobile-history-values">

                                <div>
                                    <span>GREEN</span>
                                    <strong>₹43</strong>
                                    <small>₹42 – ₹44</small>
                                </div>

                                <div>
                                    <span>RIPE</span>
                                    <strong>₹51</strong>
                                    <small>₹50 – ₹52</small>
                                </div>

                                <div>
                                    <span>GAP</span>
                                    <strong>+₹8</strong>
                                </div>

                            </div>

                        </article>


                        <!-- 06 AUG -->

                        <article class="pine-mobile-history-item">

                            <div class="pine-mobile-history-date">

                                <strong>
                                    06 Aug 2026
                                </strong>

                            </div>

                            <div class="pine-mobile-history-values">

                                <div>
                                    <span>GREEN</span>
                                    <strong>₹43</strong>
                                    <small>₹42 – ₹44</small>
                                </div>

                                <div>
                                    <span>RIPE</span>
                                    <strong>₹49</strong>
                                    <small>₹48 – ₹50</small>
                                </div>

                                <div>
                                    <span>GAP</span>
                                    <strong>+₹6</strong>
                                </div>

                            </div>

                        </article>


                        <!-- 05 AUG -->

                        <article class="pine-mobile-history-item">

                            <div class="pine-mobile-history-date">

                                <strong>
                                    05 Aug 2026
                                </strong>

                            </div>

                            <div class="pine-mobile-history-values">

                                <div>
                                    <span>GREEN</span>
                                    <strong>₹43</strong>
                                    <small>₹42 – ₹44</small>
                                </div>

                                <div>
                                    <span>RIPE</span>
                                    <strong>₹49</strong>
                                    <small>₹48 – ₹50</small>
                                </div>

                                <div>
                                    <span>GAP</span>
                                    <strong>+₹6</strong>
                                </div>

                            </div>

                        </article>


                        <!-- 04 AUG -->

                        <article class="pine-mobile-history-item">

                            <div class="pine-mobile-history-date">

                                <strong>
                                    04 Aug 2026
                                </strong>

                            </div>

                            <div class="pine-mobile-history-values">

                                <div>
                                    <span>GREEN</span>
                                    <strong>₹43</strong>
                                    <small>₹42 – ₹44</small>
                                </div>

                                <div>
                                    <span>RIPE</span>
                                    <strong>₹49</strong>
                                    <small>₹48 – ₹50</small>
                                </div>

                                <div>
                                    <span>GAP</span>
                                    <strong>+₹6</strong>
                                </div>

                            </div>

                        </article>


                        <!-- 03 AUG -->

                        <article class="pine-mobile-history-item">

                            <div class="pine-mobile-history-date">

                                <strong>
                                    03 Aug 2026
                                </strong>

                            </div>

                            <div class="pine-mobile-history-values">

                                <div>
                                    <span>GREEN</span>
                                    <strong>₹44</strong>
                                    <small>₹43 – ₹45</small>
                                </div>

                                <div>
                                    <span>RIPE</span>
                                    <strong>₹49</strong>
                                    <small>₹48 – ₹50</small>
                                </div>

                                <div>
                                    <span>GAP</span>
                                    <strong>+₹5</strong>
                                </div>

                            </div>

                        </article>

                    </div>


                    <!-- Footer -->

                    <div class="pine-history-table-footer">

            <span class="material-symbols-outlined">
                info
            </span>

                        <p>
                            Average price is calculated from the recorded minimum
                            and maximum values for each market day.
                        </p>

                    </div>

                </div>

            </section>


            <!-- ============================================================
     SECTION 6 — MONTHLY MARKET SUMMARY
     ============================================================ -->

            <section
                class="pine-monthly-section"
                id="pine-monthly-summary"
            >

                <!-- ========================================================
                     HEADER
                     ======================================================== -->

                <div class="pine-monthly-header">

                    <div>

            <span class="pine-section-kicker">
                MONTHLY OVERVIEW
            </span>

                        <h2>
                            Market Summary
                        </h2>

                        <p>
                            A broader view of pineapple prices, helping you
                            understand the market beyond individual trading days.
                        </p>

                    </div>


                    <div class="pine-monthly-selector">

            <span class="material-symbols-outlined">
                calendar_month
            </span>

                        <div>

                <span>
                    SELECTED PERIOD
                </span>

                            <strong>
                                August 2026
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- ========================================================
                     SUMMARY HERO
                     ======================================================== -->

                <div class="pine-monthly-summary-card">

                    <div class="pine-monthly-summary-main">

            <span>
                MONTHLY MARKET VIEW
            </span>

                        <h3>
                            Pineapple prices in August 2026
                        </h3>

                        <p>
                            Green and ripe pineapple prices remained within
                            relatively narrow daily ranges in the available
                            August records, while ripe pineapple continued to
                            trade above green pineapple.
                        </p>

                    </div>


                    <div class="pine-monthly-summary-stat">

            <span>
                MARKET DAYS
            </span>

                        <strong>
                            7
                        </strong>

                        <small>
                            Recorded days shown
                        </small>

                    </div>


                    <div class="pine-monthly-summary-stat">

            <span>
                CURRENT GAP
            </span>

                        <strong>
                            ₹10
                        </strong>

                        <small>
                            Ripe vs green
                        </small>

                    </div>

                </div>


                <!-- ========================================================
                     MONTHLY COMPARISON
                     ======================================================== -->

                <div class="pine-monthly-grid">


                    <!-- ====================================================
                         GREEN MONTHLY CARD
                         ==================================================== -->

                    <article class="pine-monthly-card green">

                        <div class="pine-monthly-card-header">

                            <div>

                    <span class="pine-monthly-category">

                        <i></i>

                        GREEN PINEAPPLE

                    </span>

                                <h3>
                                    Green Market
                                </h3>

                            </div>


                            <span class="material-symbols-outlined">
                    eco
                </span>

                        </div>


                        <!-- Average -->

                        <div class="pine-monthly-main-value">

                            <strong>
                                ₹43
                            </strong>

                            <span>
                    /kg
                </span>

                        </div>

                        <small class="pine-monthly-value-label">
                            Representative average
                        </small>


                        <!-- Metrics -->

                        <div class="pine-monthly-metrics">

                            <div>

                    <span>
                        LOW
                    </span>

                                <strong>
                                    ₹41
                                </strong>

                            </div>


                            <div>

                    <span>
                        HIGH
                    </span>

                                <strong>
                                    ₹44
                                </strong>

                            </div>


                            <div>

                    <span>
                        RANGE
                    </span>

                                <strong>
                                    ₹3
                                </strong>

                            </div>

                        </div>


                        <!-- Mini movement -->

                        <div class="pine-monthly-movement">

                            <div class="pine-monthly-movement-header">

                    <span>
                        RECENT MOVEMENT
                    </span>

                                <strong>
                                    ₹44 → ₹41
                                </strong>

                            </div>


                            <div class="pine-monthly-bar">

                                <span style="width: 65%;"></span>

                            </div>

                            <small>
                                Latest recorded average is ₹41/kg
                            </small>

                        </div>

                    </article>



                    <!-- ====================================================
                         RIPE MONTHLY CARD
                         ==================================================== -->

                    <article class="pine-monthly-card ripe">

                        <div class="pine-monthly-card-header">

                            <div>

                    <span class="pine-monthly-category">

                        <i></i>

                        RIPE PINEAPPLE

                    </span>

                                <h3>
                                    Ripe Market
                                </h3>

                            </div>


                            <span class="material-symbols-outlined">
                    nutrition
                </span>

                        </div>


                        <!-- Average -->

                        <div class="pine-monthly-main-value">

                            <strong>
                                ₹50
                            </strong>

                            <span>
                    /kg
                </span>

                        </div>

                        <small class="pine-monthly-value-label">
                            Representative average
                        </small>


                        <!-- Metrics -->

                        <div class="pine-monthly-metrics">

                            <div>

                    <span>
                        LOW
                    </span>

                                <strong>
                                    ₹49
                                </strong>

                            </div>


                            <div>

                    <span>
                        HIGH
                    </span>

                                <strong>
                                    ₹51
                                </strong>

                            </div>


                            <div>

                    <span>
                        RANGE
                    </span>

                                <strong>
                                    ₹2
                                </strong>

                            </div>

                        </div>


                        <!-- Mini movement -->

                        <div class="pine-monthly-movement">

                            <div class="pine-monthly-movement-header">

                    <span>
                        RECENT MOVEMENT
                    </span>

                                <strong>
                                    ₹49 → ₹51
                                </strong>

                            </div>


                            <div class="pine-monthly-bar">

                                <span style="width: 78%;"></span>

                            </div>

                            <small>
                                Latest recorded average is ₹51/kg
                            </small>

                        </div>

                    </article>

                </div>


                <!-- ========================================================
                     MONTHLY INSIGHT
                     ======================================================== -->

                <div class="pine-monthly-insight">

                    <div class="pine-monthly-insight-icon">

            <span class="material-symbols-outlined">
                insights
            </span>

                    </div>


                    <div>

            <span>
                MARKET OBSERVATION
            </span>

                        <h3>
                            Ripe pineapple remains above green pineapple
                        </h3>

                        <p>
                            In the available August records, ripe pineapple has
                            consistently remained at a higher average price than
                            green pineapple. The latest recorded averages are
                            ₹51/kg and ₹41/kg respectively.
                        </p>

                    </div>

                </div>


                <!-- ========================================================
                     MONTHLY DATA TABLE
                     ======================================================== -->

                <div class="pine-monthly-table-card">

                    <div class="pine-monthly-table-heading">

                        <div>

                <span class="material-symbols-outlined">
                    calendar_view_month
                </span>

                            <div>

                                <strong>
                                    Monthly comparison
                                </strong>

                                <small>
                                    Green vs ripe
                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="pine-monthly-table-wrap">

                        <table class="pine-monthly-table">

                            <thead>

                            <tr>

                                <th>
                                    PERIOD
                                </th>

                                <th>
                                    GREEN AVG
                                </th>

                                <th>
                                    RIPE AVG
                                </th>

                                <th>
                                    DIFFERENCE
                                </th>

                                <th>
                                    OBSERVATION
                                </th>

                            </tr>

                            </thead>


                            <tbody>

                            <tr>

                                <td>
                                    <strong>
                                        August 2026
                                    </strong>
                                </td>

                                <td>
                                    <strong class="green">
                                        ₹43
                                    </strong>
                                </td>

                                <td>
                                    <strong class="ripe">
                                        ₹50
                                    </strong>
                                </td>

                                <td>
                            <span class="pine-monthly-gap">
                                ₹7
                            </span>
                                </td>

                                <td>
                                    Ripe above green
                                </td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </section>

            <!-- ============================================================
     SECTION 7 — MARKET INSIGHTS & PRICE DRIVERS
     ============================================================ -->

            <section
                class="pine-insights-section"
                id="pine-market-insights"
            >

                <!-- ========================================================
                     HEADER
                     ======================================================== -->

                <div class="pine-insights-header">

                    <div>

            <span class="pine-section-kicker">
                MARKET INSIGHTS
            </span>

                        <h2>
                            What Can Influence Pineapple Prices?
                        </h2>

                        <p>
                            Pineapple prices can vary with market conditions,
                            product maturity, supply, demand, transportation,
                            and the availability of fruit.
                        </p>

                    </div>

                </div>


                <!-- ========================================================
                     INSIGHT GRID
                     ======================================================== -->

                <div class="pine-insights-grid">


                    <!-- ====================================================
                         SUPPLY
                         ==================================================== -->

                    <article class="pine-insight-card">

                        <div class="pine-insight-icon">

                <span class="material-symbols-outlined">
                    inventory
                </span>

                        </div>

                        <div class="pine-insight-number">
                            01
                        </div>

                        <h3>
                            Supply Availability
                        </h3>

                        <p>
                            The amount of pineapple reaching the market can
                            influence available prices. Changes in harvest
                            volume and market arrivals can affect the balance
                            between supply and demand.
                        </p>

                        <span class="pine-insight-tag">
                SUPPLY
            </span>

                    </article>


                    <!-- ====================================================
                         DEMAND
                         ==================================================== -->

                    <article class="pine-insight-card">

                        <div class="pine-insight-icon">

                <span class="material-symbols-outlined">
                    trending_up
                </span>

                        </div>

                        <div class="pine-insight-number">
                            02
                        </div>

                        <h3>
                            Market Demand
                        </h3>

                        <p>
                            Demand from consumers, retailers, processors, and
                            other buyers can influence the price level at which
                            pineapple is traded.
                        </p>

                        <span class="pine-insight-tag">
                DEMAND
            </span>

                    </article>


                    <!-- ====================================================
                         MATURITY
                         ==================================================== -->

                    <article class="pine-insight-card">

                        <div class="pine-insight-icon">

                <span class="material-symbols-outlined">
                    nutrition
                </span>

                        </div>

                        <div class="pine-insight-number">
                            03
                        </div>

                        <h3>
                            Fruit Maturity
                        </h3>

                        <p>
                            Green and ripe pineapple represent different stages
                            of the product and can serve different market
                            requirements, which can result in different price
                            levels.
                        </p>

                        <span class="pine-insight-tag">
                QUALITY
            </span>

                    </article>


                    <!-- ====================================================
                         LOGISTICS
                         ==================================================== -->

                    <article class="pine-insight-card">

                        <div class="pine-insight-icon">

                <span class="material-symbols-outlined">
                    local_shipping
                </span>

                        </div>

                        <div class="pine-insight-number">
                            04
                        </div>

                        <h3>
                            Transportation
                        </h3>

                        <p>
                            Distance to market, transportation requirements,
                            handling, and logistics can affect how agricultural
                            produce moves from producers to buyers.
                        </p>

                        <span class="pine-insight-tag">
                LOGISTICS
            </span>

                    </article>


                    <!-- ====================================================
                         SEASONALITY
                         ==================================================== -->

                    <article class="pine-insight-card">

                        <div class="pine-insight-icon">

                <span class="material-symbols-outlined">
                    calendar_month
                </span>

                        </div>

                        <div class="pine-insight-number">
                            05
                        </div>

                        <h3>
                            Seasonal Conditions
                        </h3>

                        <p>
                            Agricultural markets can change with seasonal
                            production patterns and the amount of fruit available
                            during different periods.
                        </p>

                        <span class="pine-insight-tag">
                SEASONAL
            </span>

                    </article>


                    <!-- ====================================================
                         SHELF LIFE
                         ==================================================== -->

                    <article class="pine-insight-card">

                        <div class="pine-insight-icon">

                <span class="material-symbols-outlined">
                    schedule
                </span>

                        </div>

                        <div class="pine-insight-number">
                            06
                        </div>

                        <h3>
                            Shelf Life
                        </h3>

                        <p>
                            Ripe pineapple has a shorter shelf life than fruit
                            that is harvested at an earlier stage, which can make
                            timing and distribution important for the market.
                        </p>

                        <span class="pine-insight-tag">
                STORAGE
            </span>

                    </article>

                </div>


                <!-- ========================================================
                     CURRENT MARKET SNAPSHOT
                     ======================================================== -->

                <div class="pine-insight-snapshot">

                    <div class="pine-insight-snapshot-heading">

            <span class="material-symbols-outlined">
                monitoring
            </span>

                        <div>

                <span>
                    CURRENT SNAPSHOT
                </span>

                            <h3>
                                What the latest records show
                            </h3>

                        </div>

                    </div>


                    <div class="pine-insight-snapshot-grid">


                        <div class="pine-insight-snapshot-item">

                <span>
                    GREEN
                </span>

                            <strong>
                                ₹41/kg
                            </strong>

                            <small>
                                Latest average
                            </small>

                        </div>


                        <div class="pine-insight-snapshot-item">

                <span>
                    RIPE
                </span>

                            <strong>
                                ₹51/kg
                            </strong>

                            <small>
                                Latest average
                            </small>

                        </div>


                        <div class="pine-insight-snapshot-item">

                <span>
                    DIFFERENCE
                </span>

                            <strong>
                                ₹10/kg
                            </strong>

                            <small>
                                Ripe above green
                            </small>

                        </div>


                        <div class="pine-insight-snapshot-item">

                <span>
                    LAST RECORDED
                </span>

                            <strong>
                                11 Aug
                            </strong>

                            <small>
                                2026
                            </small>

                        </div>

                    </div>


                    <div class="pine-insight-snapshot-note">

            <span class="material-symbols-outlined">
                info
            </span>

                        <p>
                            The price difference shown here describes the latest
                            recorded market values. It should not be interpreted
                            as a fixed premium that will remain unchanged over
                            time.
                        </p>

                    </div>

                </div>

            </section>

        </main>


        <aside class="sidebar d-flex flex-column gap-4">

            <div class="pine-sidebar-snapshot">

                <div class="pine-sidebar-kicker">
                    MARKET SNAPSHOT
                </div>

                <h3>
                    Pineapple
                </h3>

                <p>
                    Latest available market data
                </p>


                <div class="pine-sidebar-price">

                    <div>
                        <span class="pine-sidebar-dot green"></span>
                        Green
                    </div>

                    <strong>
                        ₹41
                    </strong>

                    <small>
                        ₹40 — ₹42 / kg
                    </small>

                </div>


                <div class="pine-sidebar-price">

                    <div>
                        <span class="pine-sidebar-dot ripe"></span>
                        Ripe
                    </div>

                    <strong>
                        ₹51
                    </strong>

                    <small>
                        ₹50 — ₹52 / kg
                    </small>

                </div>


                <div class="pine-sidebar-date">

            <span class="material-symbols-outlined">
                calendar_today
            </span>

                    <div>
                        <small>
                            Latest recorded
                        </small>

                        <strong>
                            11 August 2026
                        </strong>
                    </div>

                </div>

            </div>


            <div class="pine-sidebar-navigation">

        <span>
            ON THIS PAGE
        </span>

                <a href="#pine-market-prices">
            <span class="material-symbols-outlined">
                payments
            </span>

                    Current prices

                    <span class="material-symbols-outlined">
                arrow_forward
            </span>
                </a>

                <a href="#pine-market-context">
            <span class="material-symbols-outlined">
                compare_arrows
            </span>

                    Green vs ripe

                    <span class="material-symbols-outlined">
                arrow_forward
            </span>
                </a>

                <a href="#pine-price-history">
            <span class="material-symbols-outlined">
                show_chart
            </span>

                    Price history

                    <span class="material-symbols-outlined">
                arrow_forward
            </span>
                </a>

            </div>

        </aside>

    </div>

</div>