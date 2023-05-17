//Koter analyzer * begin
let koterAnalyzer = 0;
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
}
else {
    window.alert("error 1 (brouwser niet toegestaan)");
}
  function showPosition(position) {
    let x = position.coords.latitude;
    let y = position.coords.longitude
    document.getElementById("x").innerHTML = x;
    document.getElementById("y").innerHTML = y;
}
setTimeout(() => {
    if (document.getElementById("x").innerHTML == "" || document.getElementById("y").innerHTML == "") {
        window.alert("Locatie staat niet aan! Zet deze aan voor de test!");
    }
    koterAnalyzer = 1;
}, 5000);
if (koterAnalyzer == 1) {
    //Update map van groep
}
//Koter analyzer * end