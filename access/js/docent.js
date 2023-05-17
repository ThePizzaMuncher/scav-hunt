//Koter analyzer * begin
const ws = new WebSocket("http://localhost:8079");
ws.onopen = () => {
    ws.send("Docent joined the server. " + Date());
}
ws.onmessage = (msg) => {
    document.getElementById("input").innerHTML = msg;
}
//Koter analyzer * end