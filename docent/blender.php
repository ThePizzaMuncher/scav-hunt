<?php
session_start();
if (!isset($_SESSION['docent'])) {
	header('location:../login'); die();
} if (!$_SESSION['docent']) {
	header('location:../login'); die();
}

require_once('../assets/includes/header.php');
require_once('../assets/includes/conn.php');
?>

<head>
	<title>Groepjes maken</title>
</head>
<body>
	<form>
		<input type="number" placeholder="Aantal groepjes" name="ag">
		<input type="number" placeholder="Aantal mensen in groepje" name="amig">
		<button type="submit"><p>Genereer groepjes</p></button>
	</form>
</body>

<?php
	$leerlingen = mysqli_query($conn, 'SELECT * FROM leerling');
	
?>