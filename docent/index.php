<?php
if (isset($_SESSION["docent"])) { 
	if ($_SESSION["docent"] != 1) {
		header("location:../login");
	}
}
else {
	//header("location:../login");
}

require_once("../assets/includes/header.php");
require_once("../assets/includes/conn.php");
?>



<?php
	// vullen variabele programs met inhoud van database
	$leerlingen = mysqli_query($conn, "SELECT * FROM leerling");



	
echo '<div class="scrollable">
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
echo "<div class='scrollable'><table border='1' cellpadding='10'>";
echo '  <thead>     
	<tr>    
            <th>ID</th>
            <th>Voornaam</th>
            <th>Opleiding</th>
			<th>Groeps_ID</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
	</thead>
    </div>'
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
    	echo '<td><a href="edit.php?id=' . $id . '">Bewerk</a></td>';
    	echo '<td><a href="delete.php?id=' . $id . '">Verwijder</a></td>';
	echo '</tr>';
}

	echo "</table>";
	echo "<a href='leerling_toevoegen.php'><button>Toevoegen</button></a>";
?>