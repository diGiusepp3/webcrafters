document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("chartjs-pie");

    // Controleer of het canvas-element met ID "chartjs-pie" aanwezig is op de pagina
    if (ctx) {
        // Gegevens voor de pie chart
        var data = {
            labels: ["Chrome", "Firefox", "IE"],
            datasets: [{
                data: [4306, 3801, 1689],
                backgroundColor: ["blue", "green", "red"],
                borderWidth: 5
            }]
        };

        // Opties voor de pie chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            cutoutPercentage: 0
        };

        // Maak de pie chart
        new Chart(ctx, {
            type: "pie",
            data: data,
            options: options
        });
    }
});

