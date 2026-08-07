
    <style>
        a.card-link{
            text-decoration:none;color:inherit;display:block;width:320px;height:320px;border-radius:16px;
            position:relative;overflow:hidden;box-shadow:0 22px 60px rgba(124,31,160,0.35);
        }

        .bg{
            position:absolute;inset:0;
            background:linear-gradient(135deg,#1b0e3d 0%,#5a1c8f 35%,#a8258f 62%,#ff5f45 100%);
            background-size:220% 220%;
            animation:drift 9s ease-in-out infinite;
        }
        @keyframes drift{
            0%{background-position:0% 20%;}
            50%{background-position:100% 80%;}
            100%{background-position:0% 20%;}
        }

        .sym{position:absolute;font-weight:800;color:rgba(255,255,255,0.16);pointer-events:none;user-select:none;}
        .sym1{left:8%;font-size:34px;animation:rise 7s linear infinite;}
        .sym2{left:28%;font-size:22px;animation:rise 9s linear infinite 1.5s;}
        .sym3{left:52%;font-size:40px;animation:rise 8s linear infinite 3s;}
        .sym4{left:72%;font-size:24px;animation:rise 6.5s linear infinite .8s;}
        .sym5{left:88%;font-size:30px;animation:rise 10s linear infinite 2.2s;}
        @keyframes rise{
            0%{bottom:-40px;opacity:0;transform:rotate(0deg);}
            10%{opacity:.5;}
            90%{opacity:.35;}
            100%{bottom:340px;opacity:0;transform:rotate(25deg);}
        }

        .content{position:relative;z-index:2;height:100%;display:flex;flex-direction:column;}

        .ticker{
            background:rgba(0,0,0,0.32);border-bottom:1px solid rgba(255,255,255,0.12);
            padding:6px 0;overflow:hidden;white-space:nowrap;
        }
        .ticker-track{display:inline-block;animation:scroll 14s linear infinite;font-family:'Courier New',monospace;font-size:10.5px;font-weight:700;color:#fff;letter-spacing:.3px;}
        .ticker-track span{margin-right:22px;}
        .tup{color:#00ffc2;} .tdn{color:#ff2d6a;}
        @keyframes scroll{
            0%{transform:translateX(0);}
            100%{transform:translateX(-50%);}
        }

        .hero{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:6px 16px 0;text-align:center;}
        .hero-label{font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:rgba(255,255,255,0.75);}
        .hero-num{
            margin-top:4px;font-size:44px;font-weight:900;letter-spacing:-1px;color:#fff;line-height:1;
            text-shadow:0 0 18px rgba(255,255,255,0.25);
            transition:transform .3s ease, text-shadow .3s ease;
        }
        .hero-num.pulse{transform:scale(1.08);text-shadow:0 0 30px rgba(0,255,194,0.75);}
        .hero-num.pulse.down{text-shadow:0 0 30px rgba(255,45,106,0.75);}
        .hero-delta{margin-top:2px;font-size:13px;font-weight:800;display:flex;align-items:center;justify-content:center;gap:4px;}
        .hero-delta.up{color:#00ffc2;} .hero-delta.down{color:#ff2d6a;}

        .chips{display:flex;gap:8px;margin-top:14px;}
        .chip{
            background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.18);border-radius:10px;
            padding:6px 10px;backdrop-filter:blur(4px);
        }
        .chip-name{font-size:9px;font-weight:700;color:rgba(255,255,255,0.8);}
        .chip-val{font-size:12px;font-weight:800;color:#fff;font-variant-numeric:tabular-nums;}

        .bottom{padding:14px 16px 16px;}
        .cta{
            display:flex;align-items:center;justify-content:center;gap:7px;
            background:linear-gradient(90deg,#ffd23f,#ff9a3f);color:#2a1400;font-weight:900;
            font-size:14px;padding:12px;border-radius:12px;letter-spacing:.2px;
            box-shadow:0 8px 22px rgba(255,180,60,0.5);
            animation:pulseBtn 2.4s ease-in-out infinite;
        }
        @keyframes pulseBtn{
            0%,100%{transform:scale(1);}
            50%{transform:scale(1.035);}
        }
        .foot{text-align:center;margin-top:8px;font-size:8.5px;color:rgba(255,255,255,0.55);font-weight:600;}
    </style>


<div class="d-flex justify-content-center align-item-center">
<a class="card-link" href="https://marketniro.com/finance/currency" target="_blank" rel="noopener">
    <div class="bg"></div>
    <div class="sym sym1">$</div>
    <div class="sym sym2">₹</div>
    <div class="sym sym3">€</div>
    <div class="sym sym4">£</div>
    <div class="sym sym5">¥</div>

    <div class="content">
        <div class="ticker">
            <div class="ticker-track" id="tickerTrack"></div>
        </div>

        <div class="hero">
            <div class="hero-label">1 USD equals</div>
            <div class="hero-num" id="heroNum">₹87.42</div>
            <div class="hero-delta up" id="heroDelta">▲ 0.06% today</div>

            <div class="chips">
                <div class="chip"><div class="chip-name">EUR/USD</div><div class="chip-val" id="chip1">1.0842</div></div>
                <div class="chip"><div class="chip-name">GBP/USD</div><div class="chip-val" id="chip2">1.2715</div></div>
            </div>
        </div>

        <div class="bottom">
            <div class="cta">
                View Live Rates
                <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="#2a1400" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 8h11M9 3.5 13.5 8 9 12.5"></path>
                </svg>
            </div>
            <div class="foot">190+ currencies · Updated live</div>
        </div>
    </div>
</a>
</div>
<script>
    (function(){

        var pairs = [
            { name: 'USD/INR', base: 87.42, decimals: 2 },
            { name: 'EUR/USD', base: 1.0842, decimals: 4 },
            { name: 'GBP/USD', base: 1.2715, decimals: 4 },
            { name: 'JPY/USD', base: 0.0067, decimals: 4 },
            { name: 'AUD/USD', base: 0.6512, decimals: 4 }
        ];

        function renderTicker(){
            var parts = pairs.map(function(p){
                var up = Math.random() > 0.5;
                var cls = up ? 'tup' : 'tdn';
                var arrow = up ? '▲' : '▼';
                return '<span>' + p.name + ' ' + p.base.toFixed(p.decimals) + ' <span class="' + cls + '">' + arrow + '</span></span>';
            });
            var row = parts.join('');
            document.getElementById('tickerTrack').innerHTML = row + row;
        }
        renderTicker();

        var hero = { base: 87.42, decimals: 2 };
        var heroNumEl = document.getElementById('heroNum');
        var heroDeltaEl = document.getElementById('heroDelta');

        function tickHero(){
            var change = (Math.random() - 0.5) * 0.06;
            hero.base += change;
            var pct = (change / hero.base) * 100;
            var isUp = change >= 0;

            heroNumEl.textContent = '₹' + hero.base.toFixed(hero.decimals);
            heroNumEl.classList.remove('pulse','down');
            void heroNumEl.offsetWidth;
            heroNumEl.classList.add('pulse');
            if (!isUp) heroNumEl.classList.add('down');

            heroDeltaEl.textContent = (isUp ? '▲ ' : '▼ ') + Math.abs(pct).toFixed(2) + '% today';
            heroDeltaEl.className = 'hero-delta ' + (isUp ? 'up' : 'down');
        }

        var chip1 = { el: document.getElementById('chip1'), base: 1.0842, decimals: 4 };
        var chip2 = { el: document.getElementById('chip2'), base: 1.2715, decimals: 4 };

        function tickChip(c){
            c.base += (Math.random() - 0.5) * 0.002;
            c.el.textContent = c.base.toFixed(c.decimals);
        }

        setInterval(tickHero, 2400);
        setInterval(function(){ tickChip(chip1); }, 1900);
        setInterval(function(){ tickChip(chip2); }, 2100);
        setInterval(renderTicker, 4000);
    })();
</script>

