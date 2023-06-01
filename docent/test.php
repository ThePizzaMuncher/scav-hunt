<?php
/* 
 .PHP
 Allows user to create a new entry in the database
*/
require '../assets/includes/conn.php';
$id='';
$naam='';
$achternaam='';
$vakken='';

 function renderForm($id, $naam, $achternaam, $vakken)
 {
 ?>
  
 
 <form action="" method="post">
 <div>
<table border='1' cellpadding='10' width='100%'>
<tr>
<td> <strong>voornaam: </strong></td><td>  <input type='text' name='naam' value='<?php echo $naam; ?>'/>*</td>
</tr>
<tr>
<td> <strong>achternaam: </strong></td><td>  <input type='text' name='achternaam' value='<?php echo $achternaam; ?>'/>*</td>
</tr>
<tr>
<td> <strong>Vakken: </strong></td><td>  <input type='text' name='vakken' value='<?php echo $vakken; ?>'/></td>
</tr>

<?php

?>

</table>
<p>* required</p>
 <input type="submit" name="submit" value="submit">
 </div>
 </form> 

 <?php 
 }


 // connect to the database
 require '../assets/includes/conn.php';
 

echo '<div class="container">
		<div class="row">
			<div class="col-xs-8"></div>
  
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Nieuwe Docent toevoegen</h3>
					</div>
				</div>
			
		</div>
	</div>

   '
;
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 	{ 
       

 	// get form data, making sure it is valid
//	$id = $_POST['id']; 	     // get form data, making sure it is valid
	$naam = mysqli_real_escape_string($conn,$_POST['naam']);
	$achternaam = mysqli_real_escape_string($conn,$_POST['achternaam']);
	$vakken = mysqli_real_escape_string($conn,$_POST['vakken']);
	//$ziek = mysqli_real_escape_string($conn,$_POST['ziek']);

   // $klas = mysqli_real_escape_string($conn,$_POST['klas']);
   
 
 // check to make sure both fields are entered
 if ($naam == '' || $achternaam == '' || $vakken == '')
 	{
 	// generate error message
 	$error = 'ERROR: Please fill in all required fields!';
 	// if either field is blank, display the form again
 	renderForm($naam, $achternaam, $vakken);

 	}
 else
 	{ 
		 
 	// save the data to the database

	$sql_query = "INSERT INTO leerling (naam, opleiding, groep_ID) VALUES ('$naam', '$achternaam', '$vakken')";


	$retval = mysqli_query($conn, $sql_query );
   
   	if(! $retval ) {
      	die('Could not enter data: ');
   	}
   
   	echo "Entered data successfully\n";
 
 	}
}
 else
 	// if the form hasn't been submitted, display the form
 	{
 	renderForm('','','','');
 	}
?>

