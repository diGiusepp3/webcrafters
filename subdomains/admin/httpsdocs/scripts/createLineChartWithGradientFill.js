document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("chartjs-dashboard-line");

    if (ctx) {
        fetch('/functions/pageviewsPerDayJson.php')
            .then(response => response.json())
            .then(data => {
                var gradient = ctx.getContext("2d").createLinearGradient(0, 0, 0, 225);
                gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
                gradient.addColorStop(1, "rgba(215, 227, 244, 0)");

                new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: ["Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag", "Zondag"],
                        datasets: [{
                            label: "Pageviews",
                            fill: true,
                            backgroundColor: gradient,
                            borderColor: '#ffffff',
                            data: Object.values(data)
                        }]
                    },
                    options: {
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
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }
});
