<?php
/**
 * footer.tpl.php
 * Reusable site footer. Include this at the BOTTOM of every page:
 *   <?php include __DIR__ . '/includes/footer.tpl.php'; ?>
 *
 * NOTE: this file closes the .container-max <div> that header.tpl.php opened,
 * so don't close it yourself in the page content.
 */
?>

<!-- /Page content ends here -->

<!-- ============ FOOTER ============ -->
<footer class="site-footer">
    <div class="container-max mx-auto px-3 px-md-4" style="margin:0 auto;">
        <div class="row g-5">
            <div class="col-12 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <div class="footer-brand-icon">
                        <span class="material-symbols-outlined" style="color:#fff; font-size:18px;">nutrition</span>
                    </div>
                    <span style="font-size:24px; font-weight:700; color:#fff;">MarketNiro</span>
                </div>
                <p style="font-size:14px; color:var(--surface-variant); max-width:28rem; line-height:1.6;">
                    The leading global platform for agricultural commodities and financial market intelligence. Providing real-time data and predictive analytics for sustainable agricultural growth worldwide.
                </p>
                <div class="d-flex gap-3 mt-4">
                    <a class="social-icon" href="#"><span class="material-symbols-outlined" style="font-size:20px;">public</span></a>
                    <a class="social-icon" href="#"><span class="material-symbols-outlined" style="font-size:20px;">mail</span></a>
                    <a class="social-icon" href="#"><span class="material-symbols-outlined" style="font-size:20px;">share</span></a>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <h4 class="footer-heading">Resources</h4>
                <nav>
                    <a class="footer-link" href="#">Market Data</a>
                    <a class="footer-link" href="#">Terminal Beta</a>
                    <a class="footer-link" href="#">Commodity Reports</a>
                    <a class="footer-link" href="#">Farmer Portal</a>
                </nav>
            </div>
            <div class="col-6 col-md-3">
                <h4 class="footer-heading">Company</h4>
                <nav>
                    <a class="footer-link" href="#">About Us</a>
                    <a class="footer-link" href="#">Privacy Policy</a>
                    <a class="footer-link" href="#">Terms of Service</a>
                    <a class="footer-link" href="#">Contact Support</a>
                </nav>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="mb-0" style="font-size:11px; font-weight:600; color:var(--surface-variant); text-transform:uppercase; letter-spacing:0.05em;">&copy; <?php echo date('Y'); ?> MarketNiro Financial. All rights reserved.</p>
            <div class="d-flex gap-4">
                <span style="font-size:10px; font-weight:700; color:rgba(255,255,255,0.3); text-transform:uppercase; letter-spacing:0.2em;">ISO 9001 Certified</span>
                <span style="font-size:10px; font-weight:700; color:rgba(255,255,255,0.3); text-transform:uppercase; letter-spacing:0.2em;">Data Secure SSL</span>
            </div>
        </div>
    </div>
</footer>

<!-- ============ MOBILE BOTTOM NAV ============ -->
<div class="mobile-bottom-nav">
    <a class="mobile-nav-link active" href="#">
        <span class="material-symbols-outlined" style="font-size:24px;">home</span>
        <span class="label">Home</span>
    </a>
    <a class="mobile-nav-link" href="#">
        <span class="material-symbols-outlined" style="font-size:24px;">monitoring</span>
        <span class="label">Market</span>
    </a>
    <a class="mobile-nav-link" href="#">
        <span class="material-symbols-outlined" style="font-size:24px;">newspaper</span>
        <span class="label">News</span>
    </a>
    <a class="mobile-nav-link" href="#">
        <span class="material-symbols-outlined" style="font-size:24px;">person</span>
        <span class="label">Profile</span>
    </a>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Row hover polish for all tables
    document.querySelectorAll('tbody tr').forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.transform = 'scale(1.002)';
        });
        row.addEventListener('mouseleave', () => {
            row.style.transform = 'scale(1)';
        });
    });

    // Timeframe toggle buttons (7D / 1M / 3M / 1Y)
    document.querySelectorAll('.timeframe-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.timeframe-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });

    // Mobile bottom nav active state
    document.querySelectorAll('.mobile-nav-link').forEach(link => {
        link.addEventListener('click', () => {
            document.querySelectorAll('.mobile-nav-link').forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        });
    });
</script>

