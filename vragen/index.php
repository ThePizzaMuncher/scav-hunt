<?php
session_start();
require_once("../assets/includes/conn.php");
if (isset($_SESSION["student_login"]) && $_SESSION["student_login"] == true && isset($_GET["vraag"]) && !empty($_GET["vraag"])) {
    $vraagID = $_GET["vraag"];//ID van qr-code en vraag.
    $pull = $conn->query("SELECT * FROM groep WHERE ID = " . $_SESSION["student_groepID"] . "");
    while ($row = $pull->fetch_assoc()) {//Voor elke groep doe...
        if ($vraagID == ($row["current_vraag"] + 1)) {//Kijken of de volgende vraag bij de groep past.
            echo '
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Vragen</title>
                <link rel="../assets/css/style.css">
            </head>
            <body>
                <div></div>
            </body>
            </html>
            ';
            $conn->query("UPDATE groep SET current_vraag = " . ($row["current_vraag"] + 1) . " WHERE ID = " . $row["ID"] . "");//Stel volgende vraag in.
        }
    }
}
else {
    die("Error. Niet ingelogd!");
}
?>