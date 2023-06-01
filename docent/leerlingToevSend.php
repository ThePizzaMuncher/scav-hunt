<?php
require_once("../assets/includes/conn.php");
if (isset($_POST["submit"])) {
    if (isset($_POST["klas"]) && isset($_POST["opleiding"])) {
        $klas = htmlspecialchars($_POST["klas"]);
        $op = htmlspecialchars($_POST["opleiding"]);
        $conn->query("INSERT INTO leerling(naam, opleiding, groep_ID) VALUES ($klas, $op, 1)");
    }
}
header("../docent");
?>