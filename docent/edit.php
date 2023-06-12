<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['docent'])) {
	header('location:../login'); die();
} if (!$_SESSION['docent']) {
	header('location:../login'); die();
}
require_once("../assets/includes/conn.php");
?>
<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
     <section id="about" class="section-50 d-flex flex-column align-items-center">
<?php /*  docenten_edit.PHP
 Allows user to edit specific entry in database
*/
 function renderForm($id, $naam, $opleiding_ID,$leerjaar,$groep_ID)
 {
 ?>
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>

 <div>
 <table border='1' cellpadding='10' width='100%'>
<tr>
<td> <strong>Naam: </strong></td><td> <input type='text' name='leerlingnummer' value='<?php echo $naam; ?>'/></td>
</tr>
<tr>
<td> <strong>opleiding_ID: </strong></td><td>  <input type='text' name='voornaam' value='<?php echo $opleiding_ID; ?>'/></td>
</tr>
<tr>
<td> <strong>Leerjaar: </strong></td><td>  <input type='text' name='leerjaar' value='<?php echo $leerjaar; ?>'/></td>
</tr>
<tr>
<td> <strong>Groep_ID: </strong></td><td>  <input type='text' name='groepid' value='<?php echo $groep_ID; ?>'/></td>
</tr>
<tr>
<?php
require_once("../assets/includes/conn.php");
// Get all the categories from category table
    $sql_klasid = "SELECT * FROM `leerling`";
    $KlassenID = mysqli_query($conn,$sql_klasid);
?>
<select name="KlasID">
            <?php
                // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
                while ($klas_id = mysqli_fetch_array(
                        $KlassenID)):;
            ?>
                <option value="<?php echo $klas_id["id"];
                    // The value we usually set is the primary key
                ?>">
                </option>
            <?php
                endwhile;
                // While loop must be terminated
            ?>
        </select>
</tr></td>
</table>
 <p>Everything is Required</p>

 <input type="submit" name="submit" value="Wijzigen">

 </div>

 </form>

 <?php
 }
 // connect to the database
 require_once("../assets/includes/conn.php");

echo '<div class="container">
		<div class="row">
			<div class="col-md-8"></div>
				<h3 class="panel-title">Leerling Wijzigen</h3>
		</div>
	</div>
 ' 
;
 // check if the form has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit']))
{
	if (is_numeric($_POST['id']))     // confirm that the 'id' value is a valid integer before getting the form data
	{
	    $id = $_POST['id']; 	     // get form data, making sure it is valid
        $naam = mysqli_real_escape_string($conn, htmlspecialchars($_POST['leerlingnummer']));
        $opleiding_ID = mysqli_real_escape_string($conn, htmlspecialchars($_POST['voornaam']));
		$leerjaar = mysqli_real_escape_string($conn, htmlspecialchars($_POST['leerjaar']));
		$groep_ID = mysqli_real_escape_string($conn, htmlspecialchars($_POST['groepid']));
    
	    // checken of volgende velden zijn gevuld
        if ($naam == '' || $opleiding_ID == '')

		{
		    // generate error message
		    $error = 'ERROR: Please fill in all required fields!';
		    //error, display form
		    renderForm($id,$naam, $opleiding_ID,$leerjaar,$groep_ID);
		}
	    else
		{
		    
	// save the data to the database
	$sql_query = "UPDATE leerling SET naam='$naam', opleiding_ID='$opleiding_ID',leerjaar='$leerjaar',groep_ID='$groep_ID' WHERE id='$id'"; // or die("this stuffed up");
	$retval = mysqli_query( $conn,$sql_query );   
    if (! $retval ) {
        die('Could not enter data: ');
     }
		    // once saved, redirect back to the view page
		    header("Location: index.php"); 
		}

	}
	else
	    {
	    // if the 'id' isn't valid, display an error
	    echo 'Error!';
	    }
}
else
    // if the form hasn't been submitted, get the data from the db and display the form
    {
	// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
	{
	    // query db
	    $id = $_GET['id'];
	    $result = mysqli_query($conn,"SELECT * FROM leerling WHERE id=$id")
	    or die('doet niet'); 
	    $row = mysqli_fetch_array($result);
	    // check that the 'id' matches up with a row in the databse
	    if ($row)
		{
		// get data from db
		$opleidingid = $row['opleiding_ID'];
		$naam = $row['naam'];
		$pull = $conn->query("SELECT SELECT leerling.naam,leerling.leerjaar,leerling.opleiding_ID,opleiding.id,opleiding.opleiding_naam FROM leerling INNER JOIN opleiding ON leerling.opleiding_ID = opleiding.id WHERE leerling.opleiding_ID = $opleidingid");
		$row1 = $pull->fetch_array();
		$opleiding_ID = $row1['opleiding_ID'];
		$leerjaar = $row['leerjaar'];
		$groep_ID = $row['groep_ID'];
		// show form
		renderForm($id, $naam, $opleiding_ID,$leerjaar,$groep_ID);
		}
		else
		// if no match, display result
		{
		echo "No results!";
		}
	}
	else
	    // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
	{
		echo 'Error!';
	}
}
?>
     </section>
   </section> <!-- End About Section -->
<?php include "../assets/includes/footer.php" ?>