<?php
require_once('../assets/includes/conn.php');
session_start();
$usr = htmlspecialchars($_POST['user']);
$pw = htmlspecialchars($_POST['pw']);
$docent = $conn->query('SELECT * FROM docent');
$admin = $conn->query('SELECT * FROM admin');
while ($row = $docent->fetch_assoc()) {
	if ($usr == $row['naam'] && $pw == $row['wachtwoord']) {
		$_SESSION['docent'] = 1;
		header('location:../docent');
		die();
	}
} while ($row = $admin->fetch_assoc()) {
	if ($usr == $row['naam'] && $pw == $row['wachtwoord']) {
		$_SESSION['admin'] = 1;
		header('location:../admin');
		die();
	}
}
header('location:../login');
die();
?>
