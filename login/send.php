<?php
require_once('../assets/includes/conn.php');
session_start();
$user = htmlspecialchars($_POST['user']);
$pw = htmlspecialchars($_POST['pw']);
$pull = $conn->query('SELECT * FROM docent');
$checkAdmin = false;
$checkDocent = false;
while($row = $pull->fetch_assoc()) {
	if($user == 'admin' && $pw == $row['wachtwoord']) {
		$checkAdmin = true;
		break;
	}
	else if($user == $row['naam'] && $pw == $row['wachtwoord']) {
		$checkDocent = true;
		break;
	}
}
if($checkAdmin) {
	$_SESSION['admin'] = true;
	header('location:../admin');
	die();
}
if ($checkDocent) {
	$_SESSION['docent'] = true;
	header('location:../docent');
	die();
}
header('location:../');
?>
