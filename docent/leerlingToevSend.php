<?php
require_once("../assets/includes/conn.php");
if (isset($_POST["submit"])) {
    echo "janus";
    $klas = htmlspecialchars($_POST["naam"]);
    $op = htmlspecialchars($_POST["opleiding"]);
    echo $op . "|" . $klas;
    $conn->query("INSERT INTO leerling(naam, opleiding, groep_ID) VALUES ('$klas', '$op', 1)");
}
?>