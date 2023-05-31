<?php
require_once("../assets/includes/header.php");
require_once("../assets/includes/conn.php");

/*if(!isset($_SESSION['docent'])) {
	header('location:../login');
	die();
}*/

echo <<< main
<!DOCTYPE html>
<html>
	<body>
	<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
     <section id="about" class="section-50">
	<h3>Student Table</h3>	
	 <!-- Namen tonen div -->
		<div class="main-list">
		<table>
			<tr>
				<th>Naam</th>
				<th>Opleiding</th>
			</tr>
		</table>
		<div class="scrollable">
		<table>
			<tr>
				<td>Wieger Jacobs</td>
				<td>Ethical hacker in progress</td>
			</tr>
			<tr>
				<td>Jonathan eppinga</td>
				<td>Destiny 2 strijder</td>
			</tr>
			<tr>
				<td>Valerii Kozhevets</td>
				<td>Ukrainian man (Designer)</td>
			</tr>
			<tr>
				<td>Dimitry de Hoop</td>
				<td>Game developer in opleiding</td>
			</tr>
			<tr>
				<td>Bogusz</td>
				<td>Software developer</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse 3</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse 2</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse 1</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse Ahh ///</td>
			</tr>
			<tr>
				<td>Marcel miedema</td>
				<td>Secratresse Finish</td>
			</tr>
		</table>
		</div>
		</div>
		</section>
		</section>
	</body>
</html>
main;
require_once("../assets/includes/header.php");
?>


EFFE TESTE
<?php
	// vullen variabele programs met inhoud van database
	$leerlingen = mysqli_query($conn, "SELECT * FROM leerling");



	
echo '<div class="container">
		<div class="row">
			<div class="col-xs-8"></div>
  
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Lijst met Leerlingen</h3>
					</div>
				</div>
			
		</div>
	</div>

   ' 
;
echo "<table border='1' cellpadding='10'>";
echo '  <thead>     
	<tr>    
            <th>ID</th>
            <th>Voornaam</th>
            <th>Opleiding</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
	</thead>
    '
;

$num_rows = mysqli_num_fields($leerlingen);
//    echo 'aantal kolommen' . $num_rows;

while($row = mysqli_fetch_row($leerlingen)) 
{
	for ($i=0; $i < $num_rows; $i++)
	{
            if ($i == 6) {
                // Get all the categories from category table
                $sql_klasid = "SELECT * FROM `leerling` where id = $row[$i]";
                $KlassenID = mysqli_query($conn,$sql_klasid);
                $klas_id = mysqli_fetch_array($KlassenID);
            }
            else
            {
    		echo '<td>' . $row[$i] . '</td>';
            }

	}
	$id= $row[0];
    	echo '<td><a href="docenten_edit.php?id=' . $id . '">Bewerk</a></td>';
    	echo '<td><a href="docenten_delete.php?id=' . $id . '">Verwijder</a></td>';
	echo '</tr>';
}

	echo "</table>";
?>