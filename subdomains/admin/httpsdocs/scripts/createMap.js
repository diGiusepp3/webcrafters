document.addEventListener("DOMContentLoaded", function() {
    const map = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Voeg een marker toe aan de kaart
    const marker = L.marker([51.5, -0.09]).addTo(map);
});