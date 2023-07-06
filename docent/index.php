<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['docent'])) {
	header('location:../login');
	die();
}
if ($_SESSION['docent'] != 1) {
	header('location:../login');
	die();
}
/* if (isset($_SESSION["docent"])) {
	if ($_SESSION["docent"] != 1) {
		header("location:../login");
		die();
	}
} else {
	header("location:../login");
	die(); 
}*/

require_once("../assets/includes/header.php");
require_once("../assets/includes/conn.php");
?>

<!-- <h1>ПАЦАНЫ КОЛБАСА ЗДЕСЬ ( Ням-ням ^.^ )</h1> -->
<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset"
	style="height: 100%;">
	<section id="about" class="section-50 d-flex flex-column align-items-center">

		<?php
		// vullen variabele programs met inhoud van database
		$leerlingen = mysqli_query($conn, "SELECT * FROM leerling");
		?>
		<div class="row">
			<div class="col-lg-10">
				<h4 class="panel-title">Lijst met Leerlingen</h4>
				<?php

				echo "<div class='scrollable'><table border='1' cellpadding='10'>";
				echo "<thead>     
			<tr>    
				<th>ID</th>
				<th>Voornaam</th>
				<th>Leerjaar</th>
				<th>Groeps_ID</th>
				<th>Opleiding</th>
				<th>Bewerken</th>
				<th>Verwijderen</th>
			</tr>
		</thead>";
				echo '</div>';

				$num_rows = mysqli_num_fields($leerlingen);
				//    echo 'aantal kolommen' . $num_rows;
				$queryTxt = "";
				if (!isset($_SESSION['admin'])) { //Als docent geen admin is laat dan alleen de leerlingen zien die bij de opleiding van de desbetreffende docent horen.
					$queryTxt = " WHERE leerling.opleiding_ID = $_SESSION[opleiding_ID]";
				}
				$pull = $conn->query("SELECT leerling.naam,leerling.leerjaar,leerling.groep_ID,leerling.opleiding_ID,opleiding.ID,opleiding.opleiding_naam,groep.ID,groep.groepsnaam,leerling.ID FROM leerling INNER JOIN opleiding ON leerling.opleiding_ID = opleiding.ID INNER JOIN groep ON leerling.groep_ID = groep.ID" . $queryTxt . "");
				echo "<script>
					function vraag(id) {
						if (!confirm('Weet u zeker dat u deze persoon wilt verwijderen?')) {
							return;
						}
						window.open(document.URL + 'delete.php?id=' + id, '_self');
					}
					</script>";
				while ($row = $pull->fetch_assoc()) {
					echo "<tr>";
					echo "<td>$row[ID]</td>";
					echo "<td>$row[naam]</td>";
					echo "<td>$row[leerjaar]</td>";
					echo "<td>$row[groepsnaam]</td>";
					echo "<td>$row[opleiding_naam]</td>";
					echo "<td><a href=\"edit.php?id=$row[ID]\">Bewerk</a></td>";
					echo "<td><a onclick='vraag($row[ID])' >Verwijder</a></td>";
					echo "</tr>";
				}

				echo "</table></div>";

				?>
			</div>
			<div class="col-lg-2">
				<h4 class="panel-title">Buttons:</h4>
				<button class="custom-button"><a href="leerling_toevoegen.php">Leerling toevoegen</a></button>
<button class="custom-button-red"><a href="../login/logout.php">Uitloggen</a></button>

			</div>
		</div>
	</section>
</section>
<?php require_once("../assets/includes/footer.php"); ?>