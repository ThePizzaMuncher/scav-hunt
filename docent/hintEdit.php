<?php
if (!isset($_GET["id"]) && empty($_GET["id"])) {
    echo "<script>
    window.alert('Error: HintID bestaat niet.');
    window.open('../', '_self');
    </script>";
    die();
}
$hintID = $_GET["id"];
$pull = $conn->query("SELECT hintID FROM hint WHERE hintID = $hintID");
echo $pull->fetch_assoc();
require_once("../assets/includes/conn.php");
require_once("../assets/includes/header.php");
$pull;
require_once("../assets/includes/footer.php");
?>