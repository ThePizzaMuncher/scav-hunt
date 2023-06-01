<?php
require_once('../assets/includes/conn.php');
session_start();
$user = htmlspecialchars($_POST['user']);
$pw = htmlspecialchars($_POST['pw']);
$pull = $conn->query('SELECT * FROM docent');
$checkAdmin = 0;
$checkDocent = 0;
while($row = $pull->fetch_assoc()) {
	if($user == 'admin' && $pw == $row['wachtwoord']) {
		$checkAdmin = 1;
		break;
	}
	else if($user == $row['naam'] && $pw == $row['wachtwoord']) {
		$checkDocent = 1;
		break;
	}
}
if($checkAdmin == 1) {
	$_SESSION['admin'] = 1;
	header('location:../admin');
	die();
}
if ($checkDocent == 1) {
	$_SESSION['docent'] = 1;
	header('location:../docent');
	die();
}
//lfb = Login Feedback
$_SESSION["lfb"] = "Inlog gegevens onjuist";
header('location:./');
?>
