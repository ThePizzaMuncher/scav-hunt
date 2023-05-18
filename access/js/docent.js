//Koter analyzer * begin
let msg;
let x;
let y;
const ws = new WebSocket("ws://localhost:8079");
ws.onopen = () => {
    ws.send("Docent joined the server. " + Date());
}
function ih(naam, txt) {
    document.getElementById(naam).innerHTML = txt;
}
ws.onmessage = (msg_) => {
    msg = msg_.data;
    let dataArr = msg.split("{[:]}");
    let name = dataArr[0];
    let number = dataArr[1];
    x = dataArr[2];
    y = dataArr[3];
    let date = dataArr[4];
    ih("name", name);
    ih("number", number);
    ih("x", x);
    ih("y", y);
    ih("date", date);
}
//Koter analyzer * end