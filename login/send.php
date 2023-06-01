<?php
require_once('../assets/includes/conn.php');
session_start();
$usr = htmlspecialchars($_POST["user"]);
$pw = htmlspecialchars($_POST["pw"]);
$pull = $conn->query("SELECT * FROM docent");
while ($row = $pull->fetch_assoc()) {
	echo "<p>" .  . "</p>"
}
?>
