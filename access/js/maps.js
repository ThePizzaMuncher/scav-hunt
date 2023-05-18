let map;

function initMap() {
    const position = { lat: x, lng: y };
    const placeholder = {lat: 53.202045, lng: 5.796129 };
    const { Map } = google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = google.maps.importLibrary("marker");
    map = new Map(document.getElementById("map"), {
        zoom: 4,
        center: placeholder,
        mapId: "DEMO_MAP_ID",
    });
    const marker = new AdvancedMarkerElement({
        map: map,
        position: position,
        title: "Scav-hunt",
    });
}
initMap();