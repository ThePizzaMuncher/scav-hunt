<?php

require_once('../assets/includes/conn.php');
session_start();
$usr = htmlspecialchars($_POST['user']);
$pw = htmlspecialchars($_POST['pw']);
$docent = $conn->query('SELECT * FROM docent');
$check = 0;
while ($row = $docent->fetch_assoc()) {
	if ($usr == $row['naam'] && $pw == $row['wachtwoord']) {
		$_SESSION['docent'] = $row['ID'];
		$_SESSION['opleiding'] = $row['opleiding_ID'];
		if ($row['isAdmin']) $_SESSION['admin'] = 1;
		header('location:../docent');
		die();
	} else {
		$check = 1;
	}
}
if ($check == 1) {
	$_SESSION['error'] = 'Inloggegevens onjuist.';
}
header('location:../login');
die();
?>
