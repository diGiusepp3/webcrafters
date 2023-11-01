document.addEventListener("DOMContentLoaded", function() {
    var tableElement = document.getElementById("otherDataTable");
    if (tableElement) {
        fetch('/functions/getOtherData.php') // Vervang dit met de juiste API-endpoint
            .then(response => response.json())
            .then(data => {
                // Selecteer de tabel en de tbody waar de inhoud moet worden toegevoegd
                const table = document.getElementById('otherDataTable');
                const tbody = table.querySelector('tbody');

                // Loop door de ontvangen JSON-data en voeg rijen toe aan de tbody van de tabel
                Object.keys(data).forEach(item => {
                    const value = data[item];
                    const row = document.createElement('tr');

                    const itemCell = document.createElement('td');
                    itemCell.textContent = item;
                    row.appendChild(itemCell);

                    const valueCell = document.createElement('td');
                    valueCell.className = 'text-end';
                    valueCell.textContent = value;
                    row.appendChild(valueCell);

                    tbody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Fout bij het ophalen van andere gegevens:', error);
            });
    }
});
