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
        $tipTxt = "Bij het kruispunt sla je rechts af tot dat je weer een kruising tegenkomt. Zoek hier naar de volgende qr-code.";
    break;
    case 3:
        $tipTxt = "Ga niet over de brug, maar blijf aan deze kant van het water. Sla links af en zoek lopend naar de volgende qr-code.";
    break;
    case 4:
        $tipTxt = "Ga nu de eerste weg weer links en zoek lopend naar de volgende qr-code.";
}
?>