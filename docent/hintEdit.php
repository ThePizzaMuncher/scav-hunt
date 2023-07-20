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
$pull = $conn->query("SELECT * FROM hint WHERE hintID = $hintID AND opleidingID = " . $_SESSION['opleiding_ID']);
$output = $pull->fetch_assoc();
if (!isset($output["hintID"])) {
    echo "<script>
    window.alert('Error: geen tip bij opgegeven ID.');
    window.open('../hints.php', '_self');
    </script>";
    die();
}
echo '
<form method="post" action="hintUpdate.php">
    <input type="number" name="id" value="' . $output["hintID"] . '" style="display: none;">
    <input type="text" name="hint" value="' . $output["tip"] . '">
    <input type="submit" name="submit" value="Update">
</form>
';
$pull;
require_once("../assets/includes/footer.php");
?>