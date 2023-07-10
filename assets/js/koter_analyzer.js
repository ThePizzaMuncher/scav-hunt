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

let marker = L.marker([ a , b ], {icon: img, title: 'groep_1'}).addTo(map);
marker.bindPopup("<b>score: 6</b>").openPopup();

setInterval(() => {//Stuurt elke seconde een ping naar de server met de data.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    else {
        window.alert("Error: brouwser niet geaccepteerd voor deze trace methode.");
    }
    function showPosition(position) {
        console.log(Date());
        let newLatLng = new L.LatLng(a, b);
        marker.setLatLng(newLatLng);
    }
}, 1000);

/* Koter analyzer oud
//Koter analyzer * begin
const ws = new WebSocket("ws://localhost:8079");
ws.onopen = () => {
    //Hier moet nog iets komen dat de naam en het nummer van het groepje bekent is. Mischien iets met jquery -> Ajax.
    let name = "Koters for live";
    let number = 0;
    ws.send("Client joined the server. " + Date());
    setInterval(() => {//Stuurt elke seconde een ping naar de server met de data.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
        else {
            window.alert("Error: brouwser niet geaccepteerd voor deze trace methode.");
        }
        function showPosition(position) {
            let x = position.coords.latitude;
            let y = position.coords.longitude;
            ws.send(name + "{[:]}" + number + "{[:]}" + x + "{[:]}" + y + "{[:]}" + Date());
        }
    }, 1000);
}
//Koter analyzer * end
*/