<?php
session_start();
require_once("../assets/includes/conn.php");
if (isset($_SESSION["student_login"]) && $_SESSION["student_login"] == true && isset($_GET["vraag"]) && !empty($_GET["vraag"])) {
    $vraagID = $_GET["vraag"];//ID van qr-code en vraag.
    $pull = $conn->query("SELECT * FROM groep WHERE ID = " . $_SESSION["student_groepID"] . "");
    while ($row = $pull->fetch_assoc()) {//Voor de groep doe...
        if ($vraagID == ($row["current_vraag"] + 1)) {//Kijken of de volgende vraag bij de groep past.
            echo '
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Vragen</title>
                <link rel="stylesheet" href="../assets/css/style.css">
            </head>
            <body>
                <div class="keuze">';
                $opleiding = $_SESSION['student_opleidingID'];
                echo $opleiding;
                $pull2 = $conn->query("SELECT vraag.vraag, vraag.vragenlijst_ID, vraag.antwoord, vragenlijst.ID,vragenlijst.docent_ID,docent.opleiding_ID,opleiding.opleiding_naam, vraag.ID FROM vraag INNER JOIN vragenlijst ON vraag.vragenlijst_ID = vragenlijst.ID INNER JOIN docent ON vragenlijst.docent_ID = docent.ID INNER JOIN opleiding ON docent.opleiding_ID = opleiding.ID WHERE vraag.ID = $vraagID AND opleiding.ID = $opleiding"); 
                while ($row2 = $pull2->fetch_assoc()) {
                    echo "<p>";
                    echo $row2["vraag"];
                    echo "</p>";
                }
                echo '
                </div>
            </body>
            </html>
            ';
            $conn->query("UPDATE groep SET current_vraag = " . ($row["current_vraag"] + 1) . " WHERE ID = " . $row["ID"] . "");//Stel volgende vraag in.
        }
        else {
            echo "<script defer>
            setTimeout(() => {
                window.alert('Deze vraag past momenteel niet bij je team.');
            }, 200);
            </script>";
        }
    }
}
else {
    die("Error: geen toegang!");
}
?>