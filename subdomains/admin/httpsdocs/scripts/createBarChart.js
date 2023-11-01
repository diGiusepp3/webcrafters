document.addEventListener("DOMContentLoaded", function() {
    var chartElement = document.getElementById("chartjs-dashboard-bar");
    if (chartElement) {
        // Bar chart
        new Chart(chartElement, {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Maa", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec"],
                datasets: [{
                    label: "Dit jaar",
                    backgroundColor: '#666667',
                    borderColor: '#8a8a8a',
                    hoverBackgroundColor: '#212121',
                    hoverBorderColor: '#30fc02',
                    data: [1, 0, 0, 2, 1, 0, 0, 0, 0, 1, 0, 0],
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    }
});
