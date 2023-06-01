<?php
require_once("../assets/includes/conn.php");
if (isset($_POST["submit"])) {
    echo "janus";
    $klas = htmlspecialchars($_POST["naam"]);
    $op = htmlspecialchars($_POST["opleiding"]);
    echo $op . "|" . $klas;
    $check = $conn->query("INSERT INTO leerling (naam, opleiding, groep_ID) VALUES ('$klas', '$op', 1)");
    if (!$check) {
        echo "<br>Dikke error!";
    }
}
?>