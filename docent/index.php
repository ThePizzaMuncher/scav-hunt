<?php
session_start();
if (!isset($_SESSION['docent'])) {
	header('location:../login'); die();
} if ($_SESSION['docent'] != 1) {
	header('location:../login'); die();
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
<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
	<section id="about" class="section-50 d-flex flex-column align-items-center">

		<?php
		// vullen variabele programs met inhoud van database
		$leerlingen = mysqli_query($conn, "SELECT * FROM leerling");
		?>
		<div class="row">
			<div class="col-xs-8"></div>
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Lijst met Leerlingen</h3>
				</div>
			</div>

		</div>
		<?php 
		echo '<thead>     
			<tr>    
				<th>ID</th>
				<th>Voornaam</th>
				<th>Opleiding</th>
				<th>Groeps_ID</th>
				<th>Bewerken</th>
				<th>Verwijderen</th>
			</tr>
		</thead> ';
		echo "<div class='scrollable'><table border='1' cellpadding='10'>";
		echo '</div>';

		$num_rows = mysqli_num_fields($leerlingen);
		//    echo 'aantal kolommen' . $num_rows;

		$pull = $conn->query("SELECT ID, naam, leerjaar, groep_ID, opleiding_ID, opleiding.ID, opleiding.naam FROM leerling JOIN opleiding ON opleiding_ID = opleiding.ID");
		while($row = $pull->fetch_assoc()) {
			echo "<tr>";
			echo "<td>$row[ID]</td>";
			echo "<td>$row[naam]</td>";
			echo "<td>$row[leerjaar]</td>";
			echo "<td>$row[groep_ID]</td>";
			echo "<td>$row[opleiding_ID]</td>";
			echo "<td><a href=\"edit.php?id=$row[ID]\">Bewerk</a></td>";
            echo "<td><a href=\"delete.php?id=$row[ID]\">Verwijder</a></td>";
			echo "</tr>";
		}

		echo "</table></div>";
		echo "<a href='leerling_toevoegen.php'><button>Toevoegen</button></a>
	<a href='logout.php'><button class='button-red'>Log Out</button></a>";
		?>

	</section>
</section>
<?php require_once("../assets/includes/footer.php"); ?>