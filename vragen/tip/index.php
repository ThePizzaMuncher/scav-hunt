<?php
require_once("../../assets/includes/conn.php");
session_start();
if (!isset($_SESSION["student_login"]) && !$_SESSION["student_login"]) {
    echo "<script>
    window.alert('Je bent niet ingelogd!');
    window.open('../../login/student_login.php', '_self');
    </script>";
    die();
}
$GID = $_SESSION["student_groepID"];
$pull = $conn->query("SELECT * FROM groep WHERE ID = $GID");
$current_vraag = 0;
while ($row = $pull->fetch_assoc()) {
    $current_vraag = $row["current_vraag"];
}
$tipTxt = "";
switch ($current_vraag) {
    case 0:
        $tipTxt = "Ga vanaf school naar de elfstedenhal en kijk rond het parkeerterrein voor een volgende qr-code.";
    break;
    case 1:
        $tipTxt = "Loop nu langs de elfstedenhal in de righting van de Jumbo. Loop langs de weg die links van de jumbo loopt. Bij het kruispunt kan je de volgende qr-code vinden.";
    break;
    case 2:
        $tipTxt = "Steek over en volg de weg rechtdoor. Zoek voor een speeltuin, hier kan je de volgende qr-code vinden.";
    break;
    case 3:
        $tipTxt = "Pak de eerste weg rechts toen jullie vanaf het kruispunt naar de speeltuin liepen. Vervolg deze weg totdat je bij het water uitkomt (Ga niet over het water), sla dan links af en zoek voor de volgende qr-code.";
    break;
    case 4:
        $tipTxt = "Vervolg de weg langs het water (En blijf aan dezelfde kant van het water) totdat je uitkomt bij het standbeeld 'Ús mem' Zoek daar voor de volgende qr-code.";
    break;
    case 5:
        $tipTxt = "Als je goed hebt gekeken, dan heb je de scheve toren al gezien (De oldehove.) Rondom deze toren zit de volgende qr-code";
    break;
    case 6:
        $tipTxt = 
}
?>