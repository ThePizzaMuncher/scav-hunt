<?php
require_once('../assets/includes/conn.php');
session_start();
$usr = htmlspecialchars($_POST["user"]);
$pw = htmlspecialchars($_POST["pw"]);
$pull = $conn->query("SELECT * FROM docent");
while ($row = $pull->fetch_assoc()) {
	if ($usr == "admin" && $pw == $row["wachtwoord"]) {
		$_SESSION["admin"] = 1;
		header("location: ../admin");
		die();
	}
	if ($usr == $row["naam"] && $pw == $row["wachtwoord"]) {
		$_SESSION["docent"] = 1;
		header("location: ../docent");
		die();
	}
}
echo "Er ging iets fout! DX";
?>
