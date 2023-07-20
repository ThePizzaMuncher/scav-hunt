<?php
session_start();
require_once("../assets/includes/conn.php");
if (!isset($_SESSION['docent']) || $_SESSION['docent'] != 1) {
    echo "<script>
    window.alert('Error: geen toegang.');
    window.open('../', '_self');
    </script>";
    die();
}
require_once("../assets/includes/header.php");
$dop = $_SESSION['opleiding_ID'];//Docent Opleiding ID
$pull = $conn->query("SELECT * FROM hint WHERE opleidingID = $dop");
echo "<table>";
while ($row = $pull->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["hintID"] . "</td>";
    echo "<td>" . $row["tip"] . "</td>";
    echo "<td><a href='hintEdit.php/?id=" . $row["hintID"] . "'>Bewerk</a></td>";
    echo "</tr>";
}
echo "</table>";
require_once("../assets/includes/footer.php");
?>