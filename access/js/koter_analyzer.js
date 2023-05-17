//Koter analyzer * begin
const ws = new WebSocket("ws://localhost:8079");
ws.onopen = () => {
    //Hier moet nog iets komen dat de naam en het nummer van het groepje bekent is. Mischien iets met nodejs -> Ajax.
    let name = "Koters";
    let number = 0;
    ws.send("Client joined the server. " + Date());
    function locatie_update() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
        else {
            window.alert("Error: brouwser niet geaccepteerd voor deze track methode.");
        }
        function showPosition(position) {
            let x = position.coords.latitude;
            let y = position.coords.longitude;
            ws.send(name + "{[:]}" + number + "{[:]}" + x + "{[:]}" + y);
        }
        locatie_update();
    }
    locatie_update();
}
//Koter analyzer * end