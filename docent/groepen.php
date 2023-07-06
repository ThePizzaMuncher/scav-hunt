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

require_once("../assets/includes/header.php");
require_once("../assets/includes/conn.php");
?>

<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset"
	style="height: 100%;">
	<section id="about" class="section-50 d-flex flex-column align-items-center">
		<?php
			$groepen = $conn->query('SELECT * FROM groep');
			$num_rows = $groepen->num_rows;
		?>

		<div class="row">
			<div class="col-lg-10">
				<h4 class="panel-title">Groepjes</h4>
				<div class="scrollable">
					<table border="1" cellpadding="10">
						<thead>
							<tr>    
								<th>ID</th>
								<th>Naam</th>
								<th>Huidige vraag</th>
								<th>Score</th>
							</tr>
						</thead>
					</div>
					<?php
					while ($row = $groepen->fetch_assoc()) {
						if ($row["ID"] != 0) {
							echo "<tr>";
							echo "<td>$row[ID]</td>";
							echo "<td><a href='ll_ig.php/?groep=$row[ID]'>$row[groepsnaam]</a></td>";
							echo "<td>$row[current_vraag]</td>";
							echo "<td>$row[score]</td>";
							echo "</tr>";
						}
					}
					?>
					</table>
				</div>
		</div>
	</section>
</section>