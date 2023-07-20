<?php
session_start();
if (!isset($_SESSION['docent']) || $_SESSION['docent'] != 1) {
    echo "<script>
    window.alert('Error: geen toegang.');
    window.open('../', '_self');
    </script>";
    die();
}
if (!isset($_POST["id"]) || !isset($_POST["hint"]) || !isset($_POST["submit"])) {
    echo "<script>
    window.alert('Error: Niet alle velden zijn ingevoerd.');
    window.open('../', '_self');
    </script>";
    die();
}
require_once("../assets/includes/conn.php");
$hintID = $_POST["id"];
$hintNew = $_POST["hint"];
$conn->query("UPDATE hint SET tip = " . $hintNew . " WHERE hintID = '" . $hintID . "'");
header("location: ./hints.php");
?>