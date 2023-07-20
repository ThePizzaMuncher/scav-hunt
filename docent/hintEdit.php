<?php
if (!isset($_GET["id"]) && empty($_GET["id"])) {
    echo "<script>
    window.alert('Error: HintID bestaat niet.');
    window.open('../', '_self');
    </script>";
    die();
}
session_start();
require_once("../assets/includes/conn.php");
require_once("../assets/includes/header.php");
$hintID = $_GET["id"];
$pull = $conn->query("SELECT hintID FROM hint WHERE hintID = $hintID AND opleidingID = " . $_SESSION['opleiding_ID']);
$output = $pull->fetch_assoc();
echo $output["hintID"];
$pull;
require_once("../assets/includes/footer.php");
?>