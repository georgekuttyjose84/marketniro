<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketNiro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-green: #16a34a;
        }

        /* ===================== */
        /* BASE THEME */
        /* ===================== */
        body {
            background: #ffffff;
            color: #111827;
            transition: all 0.3s ease;
        }

        body.dark-mode {
            background: #0f172a;
            color: #e2e8f0;
        }

        /* ===================== */
        /* NAVBAR */
        /* ===================== */
        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
        }

        body.dark-mode .navbar {
            background: #020617;
            border-bottom: 1px solid #1e293b;
        }

        .navbar-custom {
            min-height: 100px;
            padding: 10px 0;
            max-height: 90px;
        }

        /* ===================== */
        /* LOGO */
        /* ===================== */
        .logo-img {
            height: 90px;
            width: 90px;
            object-fit: contain;
        }

        /* ===================== */
        /* BRAND TEXT */
        /* ===================== */
        .navbar-brand span {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            line-height: 1;
        }

        .brand-market {
            color: #111827;
            opacity: 0.9;
            margin-right: 2px;
        }

        body.dark-mode .brand-market {
            color: #ffffff;
        }

        .brand-niro {
            color: var(--primary-green);
        }

        /* ===================== */
        /* BUTTONS */
        /* ===================== */
        .btn-green {
            background: var(--primary-green);
            color: white;
        }

        .btn-green:hover {
            background: #15803d;
        }

        .navbar .btn {
            font-size: 0.9rem;
            padding: 6px 12px;
        }

        /* ===================== */
        /* CARDS */
        /* ===================== */
        .card {
            background: #f8fafc;
            border: none;
            border-radius: 12px;
        }

        body.dark-mode .card {
            background: #1e293b;
        }

        /* ===================== */
        /* TABLE */
        /* ===================== */
        body.dark-mode .table {
            color: #e5e7eb;
        }

        /* ===================== */
        /* RESPONSIVE */
        /* ===================== */
        @media (max-width: 768px) {
            .logo-img {
                height: 50px;
                width: 50px;
            }

            .navbar-custom {
                min-height: 70px;
            }

            .navbar-brand span {
                font-size: 1.3rem;
            }

            .navbar .btn {
                font-size: 0.8rem;
                padding: 5px 10px;
            }
        }
    </style>
</head>

<body>

<!-- HEADER -->
<nav class="navbar navbar-expand-lg px-3 navbar-custom">

    <a class="navbar-brand d-flex align-items-center fw-bold" href="/">
        <img src="/assets/market-niro-logo-transparent.png" class="logo-img me-2">
        <span class="brand-market">Market</span><span class="brand-niro">Niro</span>
    </a>

    <div class="ms-auto d-flex align-items-center gap-2">
        <button onclick="toggleTheme()" class="btn btn-sm btn-outline-dark">
            🌗
        </button>
        <a href="#" class="btn btn-sm btn-green">Login</a>
    </div>

</nav>

<!-- CONTENT -->
<div class="container mt-4">
    <?= $content ?>
</div>

<script>
function toggleTheme() {
    document.body.classList.toggle("dark-mode");
}
</script>

</body>
</html>