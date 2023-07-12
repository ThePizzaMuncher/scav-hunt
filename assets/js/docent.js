let x = 0;
let y = 0;
let z = 0;
let xD = 53.20520165616047; let yD = 0; let zD = 5.7932224928774785;//Default coords
let schaal = 14;
let map = L.map('map').setView([x, z], schaal);
let delay = 10;//Update delay in seconden.

//Copyright
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
//

//Functional credits to http://www.openstreetmap.org/copyrigh. All map code belongs to leaflet and openstreetmap.
let elements = document.getElementsByClassName("leaflet-control-attribution leaflet-control");
for (let i = 0; i < elements.length; i++) {
  elements[i].style.display = "none";
}
//


//Prefire Initialisatie en definiering markers.
let marker1 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker2 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker3 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker4 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker5 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker6 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker7 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker8 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker9 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker10 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker11 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker12 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker13 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker14 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker15 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker16 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker17 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker18 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker19 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
let marker20 = L.marker([ xD , zD ], {title: 'score: ?'}).addTo(map).bindPopup("<b>Loading</b>");
//

marker1.openPopup();//Zodat de camera van de map goed zit.

function clearMap() {
    map.removeLayer(marker1);
    map.removeLayer(marker2);
    map.removeLayer(marker3);
    map.removeLayer(marker4);
    map.removeLayer(marker5);
    map.removeLayer(marker6);
    map.removeLayer(marker7);
    map.removeLayer(marker8);
    map.removeLayer(marker9);
    map.removeLayer(marker10);
    map.removeLayer(marker11);
    map.removeLayer(marker12);
    map.removeLayer(marker13);
    map.removeLayer(marker14);
    map.removeLayer(marker15);
    map.removeLayer(marker16);
    map.removeLayer(marker17);
    map.removeLayer(marker18);
    map.removeLayer(marker19);
    map.removeLayer(marker20);
}

//Route lijn
    // Color for the line - #7cd3ff
    // Or #3561ff or #001483
    // Here is just our css variables for colors:
    //   --color-primary: #001483;
    //   --color-secondary: #3561ff;
    //   --color-secondary-light: #7cd3ff;
let markerArr = [
    L.latLng(53.19953936450951, 5.764675396916245),
    L.latLng(53.2025419, 5.768891),
    L.latLng(53.2019744, 5.7752356),
    L.latLng(53.2018883, 5.7780158),
    L.latLng(53.1977613, 5.7790154),
    L.latLng(53.2042041, 5.7874331),
    L.latLng(53.2032373, 5.789344),
    L.latLng(53.2001074, 5.7914455),
    L.latLng(53.1985783, 5.7936149),
    L.latLng(53.1994306, 5.7950412),
    L.latLng(53.2012202, 5.7929217),
    L.latLng(53.1980566, 5.7923676),
    L.latLng(53.1971942, 5.7805127),
    L.latLng(53.1976139, 5.7746288),
    L.latLng(53.19953936450951, 5.764675396916245)
];
var walkingRoute = L.polyline(markerArr, { color: '#ff3535', weight: 2 }).addTo(map);
map.fitBounds(walkingRoute.getBounds());
//
update();//Prefire zodat laden niet in intervaltimer zit.
function update() {
    clearMap();
    $.ajax({url:"../assets/php/koter_API.php/?code=gi3yhk3rKNRLO73g_8", success: (result) => {
        let output = result;
    let dataArr = output.split("(_)");
    console.log(output);
    dataArr.forEach((s) => {//Voor elk groepje doe...
        let Ix = 0;
        let Iy = 0;
        let Iz = 0;
        let innerOutput = s.split(",");
        let naam = innerOutput[0];
        let current_vraag = parseInt(innerOutput[1]);
        let score = parseInt(innerOutput[2]);
        let ID = parseInt(innerOutput[3]);
        let popupData = "<a href='ll_ig.php/?groep=" + ID + "'>" + naam + "</a><br>score:" + score + "<br>vraag:" + current_vraag;
        switch (current_vraag) {//Pak coordinaten bij passende qr-code.
            case 0:
                Ix = 53.19953936450951;
                Iz = 5.764675396916245;
            break;
            case 1:
                Ix = 53.2025419;
                Iz = 5.768891;
            break;
            case 2:
                Ix = 53.2019744;
                Iz = 5.7752356;
            break;
            case 3:
                Ix = 53.2018883;
                Iz = 5.7780158;
            break;
            case 4:
                Ix = 53.1977613;
                Iz = 5.7790154;
            break;
            case 5:
                Ix = 53.2042041;
                Iz = 5.7874331;
            break;
            case 6:
                Ix = 53.2032373;
                Iz = 5.789344;
            break;
            case 7:
                Ix = 53.2001074;
                Iz = 5.7914455;
            break;
            case 8:
                Ix = 53.1985783;
                Iz = 5.7936149;
            break;
            case 9:
                Ix = 53.1994306;
                Iz = 5.7950412;
            break;
            case 10:
                Ix = 53.2012202;
                Iz = 5.7929217;
            break;
            case 11:
                Ix = 53.1980566;
                Iz = 5.7923676;
            break;
            case 12:
                Ix = 53.1971942;
                Iz = 5.7805127;
            break;
            case 13:
                Ix = 53.1976139;
                Iz = 5.7746288;
            break;
            default:
                window.alert("Vraag uit vragenbereik!");
            break;
        }
        console.log("x:" + Ix + ", z=" + Iz);
        switch (ID) {//Maak markers op map van groepen met desbetreffende data.
            case 1:
                marker1 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 2:
                marker2 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 3:
                marker3 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 4:
                marker4 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 5:
                marker5 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 6:
                marker6 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 7:
                marker7 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 8:
                marker8 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 9:
                marker9 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 10:
                marker10 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 11:
                marker11 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 12:
                marker12 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 13:
                marker13 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 14:
                marker14 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 15:
                marker15 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 16:
                marker16 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 17:
                marker17 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 18:
                marker18 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 19:
                marker19 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            case 20:
                marker20 = L.marker([ Ix , Iz ], {title: score}).addTo(map).bindPopup(popupData);
            break;
            default:
                window.alert("Teveel groepen!")//Omdat het hardcoded is tot 20.
            break;
        }
    });
    //marker1 = L.marker([ x , z ], {title: 'score: 6'}).addTo(map).bindPopup("<b>groep_1</b>");
}});
}

setInterval(() => {//Update de map voor de docent om de aangegeven seconden.
    update();
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