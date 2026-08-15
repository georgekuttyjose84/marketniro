/* ==========================================================================
   home.js — PineApple home page behavior
   Load this AFTER Bootstrap JS, on the home page only.
   (Mobile bottom-nav active-state JS lives in footer.tpl.php since it's shared
   across every page, not just this one.)
   ========================================================================== */

document.addEventListener('DOMContentLoaded', function () {

    // Row hover polish for all tables (price history + monthly summaries)
    document.querySelectorAll('.table-custom tbody tr').forEach(function (row) {
        row.addEventListener('mouseenter', function () {
            row.style.transform = 'scale(1.002)';
        });
        row.addEventListener('mouseleave', function () {
            row.style.transform = 'scale(1)';
        });
    });

    // Timeframe toggle buttons (7D / 1M / 3M / 1Y) on the price chart
    document.querySelectorAll('.timeframe-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.timeframe-btn').forEach(function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');

            // Hook point: fetch/re-render chart data for btn.dataset.range here
            // e.g. loadPriceChart(btn.dataset.range);
        });
    });

});


document.addEventListener("DOMContentLoaded", function () {

    /*
     * 7-day data comes directly from the controller — this is the
     * default active range, so no fetch is needed on initial load.
     */

    let currentData = sevenDaysData;
    let chart = null;

    const chartContainer = document.getElementById("pineapple-history-chart");
    const loading = document.getElementById("phi-loading");
    const errorBox = document.getElementById("phi-error");
    const rangeButtons = document.querySelectorAll(".timeframe-btn");

    function getChartHeight(containerWidth) {
        if (containerWidth <= 320) return 240;
        if (containerWidth < 576) return 300;
        return 400;
    }

    function getXAxisConfig(data, containerWidth) {
        const count = data.length;
        const minLabelSpacing = 85;
        const maxLabels = Math.max(4, Math.floor(containerWidth / minLabelSpacing));

        const config = {
            categories: data.map(function (item) {
                return item.label;
            }),
            labels: {
                rotate: containerWidth < 600 && count > 6 ? -45 : 0,
                rotateAlways: containerWidth < 600 && count > 6,
                trim: false,
                hideOverlappingLabels: true,
                style: {
                    fontSize: containerWidth < 480 ? "10px" : "12px",
                    colors: "#64748b"
                }
            },
            axisBorder: { show: false },
            axisTicks: { show: true, color: "#e5e7eb" },
            tooltip: { enabled: false }
        };

        if (count > maxLabels) {
            config.tickAmount = maxLabels;
        }

        return config;
    }

    function normalizeData(data) {
        return data.map(function (item) {
            return {
                label: item.label ?? item.price_date ?? item.date,
                green: item.green !== null && item.green !== undefined ? Number(item.green) : null,
                yellow: (
                    item.yellow !== null && item.yellow !== undefined
                        ? Number(item.yellow)
                        : (item.ripe !== null && item.ripe !== undefined ? Number(item.ripe) : null)
                )
            };
        });
    }

    function getYAxisBounds(data) {
        const values = [];

        data.forEach(function (item) {
            if (item.green !== null && item.green !== undefined) values.push(item.green);
            if (item.yellow !== null && item.yellow !== undefined) values.push(item.yellow);
        });

        if (!values.length) {
            return { min: undefined, max: undefined };
        }

        const min = Math.min.apply(null, values);
        const max = Math.max.apply(null, values);
        const range = max - min;

        // Flat line (range === 0) still needs headroom, so fall back
        // to a percentage of the value itself in that case.
        const buffer = range > 0 ? range * 0.15 : Math.max(max * 0.1, 1);

        return {
            min: Math.max(0, min - buffer),
            max: max + buffer
        };
    }

    function renderChart(rawData) {
        const data = normalizeData(rawData);
        currentData = rawData;

        if (chart) {
            chart.destroy();
            chart = null;
        }

        const containerWidth = chartContainer.offsetWidth || window.innerWidth;
        const yBounds = getYAxisBounds(data);

        const options = {
            chart: {
                type: "line",
                height: getChartHeight(containerWidth),
                toolbar: { show: false },
                zoom: { enabled: false },
                parentHeightOffset: 0,
                redrawOnWindowResize: true
            },

            series: [
                { name: "Green", data: data.map(function (item) { return item.green; }) },
                { name: "Yellow", data: data.map(function (item) { return item.yellow; }) }
            ],

            colors: ["#198754", "#eab308"],

            xaxis: getXAxisConfig(data, containerWidth),

            yaxis: {
                min: yBounds.min,
                max: yBounds.max,
                forceNiceScale: true,
                tickAmount: containerWidth < 480 ? 4 : 5,
                labels: {
                    style: {
                        fontSize: containerWidth < 480 ? "10px" : "12px",
                        colors: "#64748b"
                    },
                    formatter: function (value) {
                        if (value === null || value === undefined) return "";
                        return "₹" + Number(value).toFixed(2);
                    }
                }
            },

            stroke: { curve: "smooth", width: 3 },

            markers: {
                size: data.length <= 31 ? 4 : 0,
                hover: { size: 6 }
            },

            dataLabels: { enabled: false },

            grid: {
                borderColor: "#e5e7eb",
                padding: {
                    top: 25,
                    right: containerWidth < 360 ? 5 : 15,
                    bottom: 0,
                    left: containerWidth < 360 ? 0 : 5
                }
            },

            legend: { show: false },

            tooltip: {
                shared: true,
                intersect: false,
                theme: "dark",
                y: {
                    formatter: function (value) {
                        if (value === null || value === undefined) return "No data";
                        return "₹" + Number(value).toFixed(2);
                    }
                }
            },

            noData: {
                text: "No pineapple price data available",
                align: "center",
                verticalAlign: "middle",
                style: { color: "#64748b", fontSize: "14px" }
            }
        };

        chart = new ApexCharts(chartContainer, options);
        chart.render();
    }

    function setActiveButton(range) {
        rangeButtons.forEach(function (button) {
            const isActive = button.dataset.range === range;
            button.classList.toggle("active", isActive);
            button.setAttribute("aria-pressed", isActive ? "true" : "false");
        });
    }

    function setButtonsDisabled(disabled) {
        rangeButtons.forEach(function (button) {
            button.disabled = disabled;
        });
    }

    async function loadGraph(range) {
        errorBox.classList.remove("visible");
        errorBox.textContent = "";

        /*
         * 7D already exists in the page — skip the network request.
         */
        if (range === "7D") {
            renderChart(sevenDaysData);
            setActiveButton("7D");
            return;
        }

        loading.classList.add("visible");
        setButtonsDisabled(true);

        try {
            const response = await fetch(
                "/agriculture/pineapple/history?period=" + encodeURIComponent(range),
                { headers: { "Accept": "application/json" } }
            );

            if (!response.ok) {
                throw new Error("Unable to load pineapple price history.");
            }

            const data = await response.json();

            if (!Array.isArray(data)) {
                throw new Error("Invalid pineapple graph response.");
            }

            renderChart(data);
            setActiveButton(range);

        } catch (error) {
            console.error(error);
            errorBox.textContent = "Unable to load pineapple price history. Please try again.";
            errorBox.classList.add("visible");

        } finally {
            loading.classList.remove("visible");
            setButtonsDisabled(false);
        }
    }

    rangeButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            loadGraph(this.dataset.range);
        });
    });

    /*
     * Initial graph: 7D, using controller-passed data (matches the
     * "active" button set in the markup above).
     */
    renderChart(sevenDaysData);

    /*
     * Re-render only after resizing has stopped.
     */
    let resizeTimer;
    window.addEventListener("resize", function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            renderChart(currentData);
        }, 250);
    });

});