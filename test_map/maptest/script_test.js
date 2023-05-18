/* Google maps:
let map;

function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: -34.397, lng: 150.644 },
      zoom: 8,
    });
}

window.addEventListener("load", () => {
    initMap();
});
*/

map = new OpenLayers.Map("map");
map.addLayer(new OpenLayers.Layer.OSM());
let markers = new OpenLayers.Layer.Markers("Markers");
map.addLayer(markers);

function updateMap(x, z, zoom, update) {
    if (update != false) {
        markers.clearMarkers();
    }
    let fromProjection = new OpenLayers.Projection("EPSG:4326");
    let toProjection = new OpenLayers.Projection("EPSG:900913");
    let position = new OpenLayers.LonLat(z, x).transform( fromProjection, toProjection);
    markers.addMarker(new OpenLayers.Marker(position));
    map.setCenter(position, zoom);
}

updateMap(53.199848, 5.764583, 16, false);