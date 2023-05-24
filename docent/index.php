<?php
/* Even een voorbeeld van dat de docent eerst moet ingelogd zijn etc...
if ($_SESSION["login_docent"] == "true") {

}
else {
    header("location: ../");//Als je niet bent ingelogd, ga dan weer terug.
}
*/
echo <<< main
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docenten pagina</title>
    <script src="../assets/js/libs/OL_lib/OpenLayers.js" defer></script>
    <script src="../assets/js/docent.js" defer></script>
    <link rel="stylesheet" href="../assets/css/koter_analyzer.css">
</head>
<body>
    <p>Naam: <span id="name"></span></p>
    <p>Nummer: <span id="number"></span></p>
    <p>x: <span id="x"></span></p>
    <p>y: <span id="y"></span></p>
    <p>Datum: <span id="date"></span></p>
    <div id="map"></div>
</body>
</html>
main;
?>