<?php
require_once("../assets/includes/conn.php");
if (isset($_POST["submit"])) {
    echo "janus";
    $klas = htmlspecialchars($_POST["naam"]);
    $op = htmlspecialchars($_POST["opleiding"]);
    echo $op . "|" . $klas;
    $one = 1;
    $check = $conn->query("INSERT INTO leerling (naam, opleiding, groep_ID) VALUES (" . $klas . ", " . $op . ", " . $one . ")");
    if (!$check) {
        echo "<br>Dikke error!";
    }
}
?>