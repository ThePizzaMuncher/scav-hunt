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

<!-- <head>
	<title>Groepjes maken</title>
	<script src="../assets/js/blender.js" defer></script>
</head> -->
<?php if(!isset($_POST)) echo <<< form
<body id="pagina_blender">
	<script src="../assets/js/blender.js" defer></script>
	<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
		<section id="about" class="section-50 d-flex flex-column align-items-center">
			<h2 class="panel-title">Blender</h2>
			<form method="post" action="">
				<h4 id="1">Aantal groepjes</h4>
				<div class="input-group" id="ag">
					<button type="button" class="minus-button" onclick="decrementValue(this)">-1</button>
					<input type="number" name="ag" min="0" value="0">
					<button type="button" class="plus-button" onclick="incrementValue(this)">+1</button>
				</div>
				<h4 id="2">Aantal mensen in groepje</h4>
				<div class="input-group" id="amig">
					<button type="button" class="minus-button" onclick="decrementValue(this)">-1</button>
					<input type="number" name="amig" min="0" id="amig" value="0">
					<button type="button" class="plus-button" onclick="incrementValue(this)">+1</button>
				</div>
				<button type="submit"><p>Genereer groepjes</p></button>
			</form>
		</section>
	</section> <!-- End About Section -->

	<script>//For value input form
		function incrementValue(button) {
			var input = button.parentNode.querySelector('input[type="number"]');
			var value = parseInt(input.value);
			input.value = value + 1;
		}

		function decrementValue(button) {
			var input = button.parentNode.querySelector('input[type="number"]');
			var value = parseInt(input.value);
			if (value > 0) {
				input.value = value - 1;
			}
		}
	</script>
<!-- </body> -->
form;
else {
	if(isset($_POST['ag'])) {
		$ag = $_POST['ag'];
		$conn->query('DELETE FROM groep');
		for($i = 1; $i <= $ag; ++$i) {
			$conn->query("INSERT INTO groep (ID) VALUES ($i)");
		}
		$gID = 1;
		$pull = $conn->query("SELECT * FROM leerling WHERE opleiding_ID = $_SESSION[opleiding_ID]");
		while($leerling = $pull->fetch_assoc()) {
			$conn->query("UPDATE leerling SET  groep_ID = '$gID' WHERE leerling.ID = $leerling[ID]");
			$gID = $gID == $ag ? 1 : +1;
		}
	} else {

	}
}
?>

<?php
$leerlingen = mysqli_query($conn, 'SELECT * FROM leerling');
include "../assets/includes/footer.php";
?>