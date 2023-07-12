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
    L.latLng(53.19953936450951, 5.764675396916245),//School
    L.latLng(53.2025419, 5.768891),//QR-code lantarenpaal elfstedenhal
    L.latLng(53.2019744, 5.7752356),//QR-code boom heliconweg
    L.latLng(53.2018883, 5.7780158),//QR-code boom speeltuin
    L.latLng(53.20191417168954, 5.777668488031906),//Recht stuk speeltuin --> water
    L.latLng(53.197968028128926, 5.776634618536363),//Water
    L.latLng(53.1977613, 5.7790154),//QR-code boom Harlingertrekweg zorgkantoor
    L.latLng(53.1973603806172, 5.78606385187805),//Kade
    L.latLng(53.197398069391376, 5.786395403329121),//Kade
    L.latLng(53.19752259652023, 5.786718609517128),//Kade
    L.latLng(53.19769773729382, 5.786937209551441),//Kade
    L.latLng(53.19799560131682, 5.787212063535174),//Kade
    L.latLng(53.1980901091297, 5.787295238487756),//Kade
    L.latLng(53.19844672195249, 5.787684446779131),//Kade
    L.latLng(53.199445148042145, 5.788089396110861),//Kade
    L.latLng(53.19986141479821, 5.788146773437698),//Kade
    L.latLng(53.200695845588704, 5.788028831161631),//Kade
    L.latLng(53.200890607427226, 5.787853511556566),//Kade
    L.latLng(53.20137368931313, 5.786980101202577),//Kade
    L.latLng(53.201576085643964, 5.786785655827649),//Kade
    L.latLng(53.20197896605593, 5.7866772764397885),//Kade
    L.latLng(53.20242193920472, 5.7867474042785325),//Kade
    L.latLng(53.20264501673216, 5.786864277111795),//Kade
    L.latLng(53.20312378305234, 5.787886198745272),//Kade
    L.latLng(53.2042041, 5.7874331),//QR-code boom ús mem
    L.latLng(53.20312378305234, 5.787886198745272),//Kade
    L.latLng(53.20216849349061, 5.7886295647400745),//Weg naar oldehove
    L.latLng(53.202210265722655, 5.788997027374332),//Weg naar oldehove
    L.latLng(53.20238056748853, 5.789096269107065),//Weg naar oldehove
    L.latLng(53.203002323853454, 5.789179417586173),//Weg naar oldehove
    L.latLng(53.2032373, 5.789344),//QR-code boom oldehove
    L.latLng(53.203090206713306, 5.789497709411632),//Weg naar Paté
    L.latLng(53.20241199075361, 5.7895432280095),//Weg naar Paté
    L.latLng(53.20176785181649, 5.789616159006642),//Weg naar Paté
    L.latLng(53.20166995550118, 5.789609081042085),//Weg naar Paté
    L.latLng(53.20069383887126, 5.789075339862327),//Weg naar Paté
    L.latLng(53.20051030615906, 5.789282604192586),//Weg naar Paté
    L.latLng(53.20029547280754, 5.7898169093660625),//Weg naar Paté
    L.latLng(53.2001074, 5.7914455),//QR-code boom Paté Ruiterskwartier
    L.latLng(53.20007949834585, 5.79251234710569),//Weg naar Nuances web design
    L.latLng(53.19866903684469, 5.792221410909712),//Weg naar Nuances web design
    L.latLng(53.1985783, 5.7936149),//QR-code boom Nuances web design
    L.latLng(53.1994306, 5.7950412),//QR-code prullenbak Fries museum
    L.latLng(53.2012202, 5.7929217),//QR-code De Dikke van Dale
    L.latLng(53.1980566, 5.7923676),//QR-code Achmea toren
    L.latLng(53.19825332123832, 5.792180290259803),//Weg naar Monkey town
    L.latLng(53.19844930851762, 5.788581143421005),//Weg naar Monkey town
    L.latLng(53.19716529010439, 5.787085638404203),//Weg naar Monkey town
    L.latLng(53.19701375743795, 5.786380044041571),//Weg naar Monkey town
    L.latLng(53.19721550900875, 5.780341370355722),//Weg naar Monkey town
    L.latLng(53.1971942, 5.7805127),//QR-code Monkey town
    L.latLng(53.1976139, 5.7746288),//QR-code Brug snekertrekweg
    L.latLng(53.1981372854509, 5.774603173208624),//Weg naar school
    L.latLng(53.19884985525324, 5.765448072454216),//Weg naar school
    L.latLng(53.19953936450951, 5.764675396916245)//QR-code school (einde)
];
var walkingRoute = L.polyline(markerArr, { color: '#3561ff', weight: 3 }).addTo(map);
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