
document.addEventListener("DOMContentLoaded", function() {
    var worldMapElement = document.getElementById("world_map");
    if (worldMapElement) {
        // Voer een Ajax-verzoek uit om de markers op te halen
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/functions/get_markers.php', true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {

                // Verwerk de JSON-response en haal de markers op
                var response = JSON.parse(xhr.responseText);
                var markers = response;

                // Maak de jsVectorMap aan met de bijgewerkte markers array
                var map = new jsVectorMap({
                    map: "world",
                    selector: "#world_map",
                    zoomButtons: true,
                    markers: markers,
                    markerStyle: {
                        initial: {
                            r: 9,
                            strokeWidth: 7,
                            stokeOpacity: .4,
                            fill: window.theme.primary
                        },
                        hover: {
                            fill: window.theme.primary,
                            stroke: window.theme.primary
                        }
                    },
                    zoomOnScroll: false
                });

                window.addEventListener("resize", () => {
                    map.updateSize();
                });
            } else {
                console.error('Request failed. Status: ' + xhr.status);
            }
        };

        xhr.send();
    }
});
