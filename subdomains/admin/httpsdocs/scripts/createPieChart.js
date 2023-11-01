document.addEventListener("DOMContentLoaded", function() {
    let ctx = document.getElementById("chartjs-dashboard-pie");
    if (ctx) {
        // Maak een AJAX-verzoek naar de PHP-pagina om de browser-telling op te halen
        fetch('/functions/getUserAgents.php')
            .then(response => response.json())
            .then(data => {
                // Gebruik de ontvangen JSON-data voor de labels en data van de grafiek
                const labels = Object.keys(data);
                const counts = Object.values(data);
                // Sorteer de browsergegevens op basis van het aantal in aflopende volgorde
                const sortedData = labels.map((label, index) => ({ label, count: counts[index] }))
                    .sort((a, b) => b.count - a.count);

                // Vul de tabel met browsergegevens
                const tableBody = document.querySelector("#browserTable tbody");
                sortedData.forEach(item => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${item.label}</td>
                        <td>${item.count}</td>
                    `;
                    tableBody.appendChild(row);
                });

                new Chart(ctx, {
                    type: "pie",
                    data: {
                        labels: labels,
                        datasets: [{
                            data: counts,
                            backgroundColor: [
                                window.theme?.primary || "blue",
                                window.theme?.warning || "yellow",
                                window.theme?.danger || "red",
                            ],
                            borderWidth: 5
                        }]
                    },
                    options: {
                        responsive: !window.MSInputMethodContext,
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        cutoutPercentage: 75
                    }
                });
            })
            .catch(error => {
                console.error('Fout bij het ophalen van de browser-telling:', error);
            });
    }
});

