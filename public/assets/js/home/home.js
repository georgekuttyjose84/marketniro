(function(){
    var heroEl = document.getElementById('marketHeroCarousel');
    if (!heroEl) return;

    var indicators = heroEl.querySelectorAll('.hero-indicator');
    var interval = parseInt(heroEl.getAttribute('data-bs-interval'), 10) || 6500;

    function setActive(index){
        indicators.forEach(function(btn, i){
            var bar = btn.querySelector('.hero-indicator-progress');
            btn.classList.remove('active', 'done');
            bar.style.animation = 'none';
            // force reflow so the animation can be re-triggered cleanly
            void bar.offsetWidth;
            bar.style.width = '';

            if (i < index) {
                btn.classList.add('done');
            } else if (i === index) {
                btn.classList.add('active');
                bar.style.animation = 'heroProgress ' + interval + 'ms linear forwards';
            } else {
                bar.style.width = '0%';
            }
        });
    }

    heroEl.addEventListener('slide.bs.carousel', function(e){ setActive(e.to); });
    setActive(0);
})();