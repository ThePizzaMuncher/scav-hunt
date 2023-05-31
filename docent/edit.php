<?php
/* 
 docenten_edit.PHP
 Allows user to edit specific entry in database
*/



 
 function renderForm($id, $naam, $opleiding)
 {
 ?>
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>

 <div>
 <table border='1' cellpadding='10' width='100%'>
<tr>
<td> <strong>Leerlingnummer: </strong></td><td> <input type='text' name='leerlingnummer' value='<?php echo $naam; ?>'/</td>
</tr>
<tr>
<td> <strong>voornaam: </strong></td><td>  <input type='text' name='voornaam' value='<?php echo $opleiding; ?>'/>*</td>
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
 <p>* Required</p>

 <input type="submit" name="submit" value="Submit">

 </div>

 </form>
 </body>
 </html>
 <?php
 }

 // connect to the database

 require_once("../assets/includes/conn.php");




echo '<div class="container">
		<div class="row">
			<div class="col-md-8"></div>
  
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Leerling Wijzigen</h3>
					</div>
				</div>
			
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
        $naam = mysqli_real_escape_string($conn,$_POST['leerlingnummer']);
        $opleiding = mysqli_real_escape_string($conn,$_POST['voornaam']);
    
	    // checken of volgende velden zijn gevuld
        if ($naam == '' || $opleiding == '')

		{
		    // generate error message
		    $error = 'ERROR: Please fill in all required fields!';
		    //error, display form
		    // renderForm($id, $firstname, $lastname, $error);
		    renderForm($id,$naam, $opleiding);
		}
	    else
		{
		    
		     	// save the data to the database


	$sql_query = "UPDATE leerling SET naam='$naam', opleiding='$opleiding' WHERE id='$id'" or die ("this stuffed up");
	$retval = mysqli_query( $conn,$sql_query );
           
    if(! $retval ) {
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
	    if($row)
		{
		// get data from db
		$naam = $row['naam'];
		$opleiding = $row['opleiding'];
		//$klas_id = $row['klas_id'];

        //$sql_klasid = "SELECT * FROM `klassen` where id=$klas_iddb";
        //$KlassenID = mysqli_query($con,$sql_klasid);
        //$klas_id = mysqli_fetch_array($KlassenID);
        //$Klas_id= $klas_id["klas"]
	      
		// show form
		renderForm($id, $naam, $opleiding);
       
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