//Koter analyzer * begin
let msg;
const ws = new WebSocket("ws://localhost:8079");
ws.onopen = () => {
    ws.send("Docent joined the server. " + Date());
}
ws.onmessage = (msg_) => {
    msg = msg_.data;
    console.log(msg);
    document.getElementById("input").innerHTML = msg;
}
//Koter analyzer * end