<?php
require_once('../assets/includes/conn.php');
session_start();
/* if(isset($_SESSION['admin'])) {
	header('location:./');
	die();
} */
if(!isset($_POST)) {
	header('location:./');
	die();
}
$user = htmlspecialchars($_POST['user']);
$pw = htmlspecialchars($_POST['pw']);
$pull = $conn->query('SELECT * FROM docent');
$checkAdmin = false;
$checkDocent = false;
while($row = $pull->fetch_assoc() && !$checkAdmin && !$checkDocent) {
	if($user == 'admin' && $pw == $row['wachtwoord']) {
		$checkAdmin = true;
	}
	else if($user == $row['naam'] && $pw == $row['wachtwoord']) {
		$checkDocent = true;
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
?>
