//Koter analyzer * begin
const ws = new WebSocket("http://localhost:8079");
ws.onopen = () => {
    //Hier moet nog iets komen dat de naam en het nummer van het groepje bekent is. Mischien iets met nodejs -> Ajax.
    let name = "Koters";
    let number = 0;
    ws.send("Client joined the server. " + Date());
    let koterAnalyzer = 0;
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
            ws.send(name + "{[:]}" + number);
        }
        setTimeout(() => {
            if (document.getElementById("x").innerHTML == "" || document.getElementById("y").innerHTML == "") {
                window.alert("Locatie staat niet aan! Zet deze aan voor de test!");
            }
            koterAnalyzer = 1;
        }, 5000);
    }
    while (koterAnalyzer == 1) {
        locatie_update();
    }
}
//Koter analyzer * end