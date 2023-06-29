<?php
session_start();
require_once("../assets/includes/conn.php");
if (isset($_SESSION["student_login"]) && $_SESSION["student_login"] == true && isset($_GET["vraag"]) && !empty($_GET["vraag"])) {
    $vraagID = $_GET["vraag"];
    $pull = $conn->query("SELECT * FROM groep");
    $check = 0;
    while ($row = $pull->fetch_assoc()) {//Voor elke groep doe...
        if ($vraagID == ($row["current_vraag"] + 1)) {//Kijken of de volgende vraag bij de groep past.
            $conn->query("UPDATE groep SET current_vraag = " . ($row["current_vraag"] + 1) . " WHERE ID = " . $row["ID"] . "");//Voeg
        }
    }
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vragen</title>
    </head>
    <body>
        
    </body>
    </html>
    ';
}
else {
    die("Error. Niet ingelogd!");
}
?>