document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("chartjs-line");

    // Controleer of het canvas-element met ID "chartjs-line" aanwezig is op de pagina
    if (ctx) {
        var gradient = ctx.getContext("2d").createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");

        // Gegevens voor de line chart
        var data = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Sales ($)",
                fill: true,
                backgroundColor: gradient,
                borderColor: "blue",
                data: [
                    2115, 1562, 1584, 1892, 1587, 1923,
                    2566, 2448, 2805, 3438, 2917, 3327
                ]
            }]
        };

        // Opties voor de line chart
        var options = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                intersect: false
            },
            hover: {
                intersect: true
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            scales: {
                xAxes: [{
                    reverse: true,
                    gridLines: {
                        color: "rgba(0,0,0,0.0)"
                    }
                }],
                yAxes: [{
                    ticks: {
                        stepSize: 1000
                    },
                    display: true,
                    borderDash: [3, 3],
                    gridLines: {
                        color: "rgba(0,0,0,0.0)"
                    }
                }]
            }
        };

        // Maak de line chart
        new Chart(ctx, {
            type: "line",
            data: data,
            options: options
        });
    }
});
