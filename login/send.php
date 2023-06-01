<?php
require_once('../assets/includes/conn.php');
session_start();
$usr = htmlspecialchars($_POST["user"]);
$pw = htmlspecialchars($_POST["pw"]);
$pull = $conn->query("SELECT * FROM docent");
while ($row = $pull->fetch_assoc()) {
	if ($usr == "admin" && $pw == $row["wachtwoord"]) {
		$_SESSION["admin"] = 1;
		header("location: ../login"); // gaat weer terug naar de login, waar de gebruiker wordt doorgejaagd
		die();
	}
	if ()
}
?>
