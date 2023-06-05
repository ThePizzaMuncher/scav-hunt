<?php
session_start();
if (isset($_SESSION['docent'])) { 
	if ($_SESSION['docent'] != 1) {
		header('location:../login');
		die();
	}
}
else {
	header('location:../login');
    die();
}

require_once('../assets/includes/header.php');
require_once('../assets/includes/conn.php');
?>

<head>
	<title>Groepjes maken</title>
</head>

<?php
	$leerlingen = mysqli_query($conn, 'SELECT * FROM leerling');
	
?>