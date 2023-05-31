<?php
session_start();

if(!isset($_SESSION['docent'])) {
	header('location:../');
	// die();
}

echo <<< main
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<div class="gordel">
		<!-- Code tonen pagina voor de koters -->
			<div class="code-pagina-knop">
				<a href="code-tonen.php"><button type="button">Code tonen</button></a>
			</div>
		</div>
	</body>
</html>
main;

?>