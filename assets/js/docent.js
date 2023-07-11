let x = 0;
let y = 0;
let z = 0;
let xD = 53.19960224032933; let yD = 0; let zD = 5.764744310283208;//Default coords
let schaal = 19;
let map = L.map('map').setView([x, z], schaal);
let delay = 2;//Update delay in seconden.

//Copyright
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

//Initialisatie en definiering markers.


//Input
let marker1 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker2 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker3 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker4 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker5 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker6 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker7 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker8 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker9 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker10 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker11 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker12 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker13 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker14 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker15 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker16 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker17 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker18 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker19 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
let marker20 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>").openPopup();
//

setInterval(() => {//Update de map voor de docent om de seconde. (Display update)
    $output = "";
    $.ajax({url:"access/php/koter_API?/code=gi3yhk3rKNRLO73g_8", success: (result) => {
        console.log(result);
    }});
    map.removeLayer(marker1);
    marker1 = L.marker([ x , z ], {title: 'score: 6'}).addTo(map).bindPopup("<b>groep_1</b>").openPopup();
}, (delay * 1000));

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