<?php
session_start();
if (isset($_SESSION["docent"])) { 
	if ($_SESSION["docent"] != 1) {
		header("location:../login");
	}
}
else {
	header("location:../login");
}

/* 
 .PHP
 Allows user to create a new entry in the database
*/
require '../assets/includes/conn.php';
$id='';
$naam='';
$opleiding='';
$groep_ID='1';

 function renderForm($id, $naam, $opleiding, $groep_ID)
 {
 ?>
  
 
 <form action="" method="post">
 <div>
<table border='1' cellpadding='10' width='100%'>
<tr>
<td> <strong>voornaam: </strong></td><td>  <input type='text' name='naam' value='<?php echo $naam; ?>'/>*</td>
</tr>
<tr>
<td> <strong>opleiding: </strong></td><td>  <input type='text' name='opleiding' value='<?php echo $opleiding; ?>'/>*</td>
</tr>
<input hidden readonly type='text' name='groep_ID' value='1'/></td>

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
						<h3 class="panel-title">Nieuwe Leerling toevoegen</h3>
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
	$opleiding = mysqli_real_escape_string($conn,$_POST['opleiding']);
	//$groep_ID = mysqli_real_escape_string($conn,$_POST['groep_ID']);
   
 
 // check to make sure both fields are entered
 if ($naam == '' || $opleiding == '' || $groep_ID == '')
 	{
 	// generate error message
 	$error = 'ERROR: Please fill in all required fields!';
 	// if either field is blank, display the form again
 	renderForm($naam, $opleiding, $groep_ID);

 	}
 else
 	{ 
		 
 	// save the data to the database

	$sql_query = "INSERT INTO leerling (naam, opleiding, groep_ID) VALUES ('$naam', '$opleiding', '$groep_ID')";


	$retval = mysqli_query($conn, $sql_query );
   
   	if(! $retval ) {
      	die('Could not enter data: ');
   	}
   
   	echo "Entered data successfully\n";
    header("Location: index.php");
 
 	}
}
 else
 	// if the form hasn't been submitted, display the form
 	{
 	renderForm('','','','');
 	}
?>

