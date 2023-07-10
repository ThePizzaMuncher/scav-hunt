let x = 0;
let y = 0;
let z = 0;
let schaal = 19;
let map = L.map('map').setView([x, z], schaal);

let img = L.icon({
    iconUrl: 'me.png',
    iconSize:     [10, 15],
    shadowSize:   [12, 16],
    iconAnchor:   [0, 0],
    shadowAnchor: [0, 0],
    popupAnchor:  [0, 0]
});

// load a tile layer
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

let marker = L.marker([ x , z ], {icon: img, title: 'score: 6'}).addTo(map);
marker.bindPopup("<b>groep_1</b>").openPopup();

setInterval(() => {//Stuurt elke seconde een ping naar de server met de data.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    else {
        window.alert("Error: brouwser niet geaccepteerd voor deze trace methode.");
    }
    function showPosition(position) {
        console.log(Date());
        let newLatLng = new L.LatLng(x, z);
        marker.setLatLng(newLatLng);
    }
}, 1000);

/*  Koter analyzer oud
//Koter analyzer * begin
let msg;
let x;
let z;
const ws = new WebSocket("ws://localhost:8079");
map = new OpenLayers.Map("map");
map.addLayer(new OpenLayers.Layer.OSM());
let markers = new OpenLayers.Layer.Markers("Markers");
map.addLayer(markers);

ws.onopen = () => {
    ws.send("Docent joined the server. " + Date());
}

function ih(naam, txt) {
    document.getElementById(naam).innerHTML = txt;
}

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

ws.onmessage = (msg_) => {
    msg = msg_.data;
    let dataArr = msg.split("{[:]}");
    let name = dataArr[0];
    let number = dataArr[1];
    x = dataArr[2];
    z = dataArr[3];
    let date = dataArr[4];
    ih("name", name);
    ih("number", number);
    ih("x", x);
    ih("y", z);
    ih("date", date);
    updateMap(x, z, 16);
}

updateMap(53.199848, 5.764583, 16, false);
//Koter analyzer * end
*/