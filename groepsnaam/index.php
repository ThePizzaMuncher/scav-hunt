<?php
session_start();
require_once("../assets/includes/conn.php");
if (isset($_SESSION["student_login"]) && $_SESSION["student_login"] == true && isset($_SESSION["student_groepID"]) && $_SESSION["student_groepID"] != -1 && isset($_SESSION["student_ID"]) && $_SESSION["student_ID"] != -1) {
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Voer je groepsnaam in!</title>
    </head>
    <body>
        <form method="post" action="input.php">
        <input type="text" name="groepsnaam">
        <input type="submit" name="submit">
        </form>
    </body>
    </html>
    ';
}
else {
    header("location: ../login/student_login.php");
}
?>