<?php
session_start();
require_once("../assets/includes/conn.php");
if (!isset($_SESSION['docent']) || $_SESSION['docent'] != 1) {
    echo "<script>
    window.alert('Error. geen toegang!');
    window.open('../', '_self');
    </script>";
    die();
}
require_once("../assets/includes/header.php");
$dop = $_SESSION['opleiding_ID'];//Docent Opleiding ID
$pull = $conn->query("SELECT * FROM hint WHERE opleidingID = $dop");
while ($row = $pull->fetch_assoc()) {
    echo $row["tip"] . "<br>";
}
require_once("../assets/includes/footer.php");
?>