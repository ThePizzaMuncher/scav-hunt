<?php
session_start();
require_once("../assets/includes/conn.php");
if (isset($_SESSION["student_login"]) && $_SESSION["student_login"] == true && isset($_GET["vraag"]) && !empty($_GET["vraag"])) {
    $vraagID = $_GET["vraag"];
    $pull = $conn->query("SELECT * FROM groep");
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