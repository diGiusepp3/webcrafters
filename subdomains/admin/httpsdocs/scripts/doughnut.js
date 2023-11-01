document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("chartjs-doughnut");

    // Controleer of het canvas-element met ID "chartjs-doughnut" aanwezig is op de pagina
    if (ctx) {
        // Gegevens voor de doughnut chart
        var data = {
            labels: ["Chrome", "Firefox", "IE"],
            datasets: [{
                data: [4306, 3801, 1689],
                backgroundColor: ["blue", "green", "red"],
                borderWidth: 5
            }]
        };

        // Opties voor de doughnut chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            cutoutPercentage: 75
        };

        // Maak de doughnut chart
        new Chart(ctx, {
            type: "doughnut",
            data: data,
            options: options
        });
    }
});
