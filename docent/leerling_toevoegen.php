<?php
/* 
 .PHP
 Allows user to create a new entry in the database
*/
require_once("../assets/includes/conn.php");
$id='';
$naam='';
$opleiding='';


 function renderForm($id,$naam,$opleiding)
 {
 ?>
  
 
 <form action="" method="post">
 <div>
<table border='1' cellpadding='10' width='100%'>
<tr>
<td> <strong>Naam: </strong></td><td> <input type='text' name='klas' value='<?php echo $naam; ?>'/</td>
<td> <strong>Opleiding: </strong></td><td> <input type='text' name='opleiding' value='<?php echo $opleiding; ?>'/</td>
</tr>


</table>
<p>* required</p>
 <input type="submit" name="submit" value="submit">
 </div>
 </form> 

 <?php 
 }


 // connect to the database
 require_once("../assets/includes/conn.php");
 

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
        require_once("../assets/includes/conn.php");
 	// get form data, making sure it is valid
//	$id = $_POST['id']; 	     // get form data, making sure it is valid
	$naam = mysqli_real_escape_string($conn,$_POST['klas']);
    $opleiding = mysqli_real_escape_string($conn,$_POST['opleiding']);
   
 
 // check to make sure both fields are entered
 if ($naam == '')
 	{
 	// generate error message
 	$error = 'ERROR: Please fill in all required fields!';
 	// if either field is blank, display the form again
 	renderForm($id,$naam,$opleiding);

 	}
		 

 	// save the data to the database
	$sql_query = "INSERT INTO leerling(naam, opleiding,groep_ID) VALUES ($naam, $opleiding,1)";

	$retval = mysqli_query($conn, $sql_query);
   
   	if(! $retval ) {
      	die('Could not enter data: ');
   	}
   
   /*	echo "Entered data successfully\n";
    $conn->query("INSERT INTO leerling(ID,naam, opleiding, groep_ID) VALUES ($id,$naam, $opleiding, 1)"); */
}
 else
 	// if the form hasn't been submitted, display the form
 	{
 	renderForm('','','');
 	}
?>