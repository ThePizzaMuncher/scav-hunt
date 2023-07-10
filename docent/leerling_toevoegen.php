<?php
session_start();
require_once("../assets/includes/header.php");
require_once("../assets/includes/conn.php");
if (!isset($_SESSION['docent'])) {
	header('location:../login');
	die();
}
if ($_SESSION['docent'] != 1) {
	header('location:../login');
	die();
}
/* 
 .PHP
 Allows user to create a new entry in the database
*/

$id = '';
$naam = '';
$opleiding_ID = '';
$leerjaar = '';
$groep_ID = '1';

function renderForm($id, $naam, $opleiding_ID, $leerjaar, $groep_ID)
{
	?>

	<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset"
		style="height: 100%;">
		<section id="about" class="section-50 d-flex flex-column align-items-center">
			<div class="panel-heading">
				<h3 class="panel-title">Nieuwe Leerling toevoegen</h3>
			</div>

			<form action='' method='post'>
				<div>
					<table border='1' cellpadding='10' width='100%'>
						<tr>
							<td> <strong>Voornaam: </strong></td>
							<td> <input type='text' name='naam' value='<?php echo $naam; ?>' />*</td>
						</tr>
						<tr>
						<?php
						require('../assets/includes/conn.php');

						// Get all the categories from category table
						$opleiding_ID = "SELECT ID,opleiding_naam FROM `leerling`";
						$opleiding_pull = mysqli_query($conn, $opleiding_ID);
						?>
						<select name="opleiding_ID">
							<?php
							// use a while loop to fetch data
							// from the $all_categories variable
							// and individually display as an option
							while (
								$opleiding = mysqli_fetch_array(
									$opleiding_pull
								)
							):
								;
								?>
								<option value="<?php echo $opleiding["ID"];
								// The value we usually set is the primary key
								?>">
									<?php echo $opleiding["opleiding_naam"];
									// To show the category name to the user
									?>
								</option>
								<?php
							endwhile;
							// While loop must be terminated
							?>
						</select>
						</tr>
						<tr>
							<td> <strong>Leerjaar: </strong></td>
							<td> <input type='text' name='leerjaar' value='<?php echo $leerjaar; ?>' />*</td>
						</tr>
						<input hidden readonly type='text' name='groep_ID' value='0' /></td>

					</table>
					<p>* required</p>
					<input class="custom-button" type='submit' name='submit' value='submit'>
				</div>
			</form>
		</section>
	</section>
	<?php
}


// connect to the database
require '../assets/includes/conn.php';
// check if the form has been submitted. If it has, start to process the form and save it to the database
if (isset($_POST['submit'])) {


	// get form data, making sure it is valid
//	$id = $_POST['id']; 	     // get form data, making sure it is valid
	$naam = mysqli_real_escape_string($conn, $_POST['naam']);
	$opleiding_ID = mysqli_real_escape_string($conn, $_POST['opleiding_ID']);
	$leerjaar = mysqli_real_escape_string($conn, $_POST['leerjaar']);
	//$groep_ID = mysqli_real_escape_string($conn,$_POST['groep_ID']);


	// check to make sure both fields are entered
	if ($naam == '' || $opleiding_ID == '' || $groep_ID == '' || $leerjaar == '') {
		// generate error message
		$error = 'ERROR: Please fill in all required fields!';
		// if either field is blank, display the form again
		renderForm($id, $naam, $opleiding_ID, $leerjaar, $groep_ID);

	} else {

		// save the data to the database

		$sql_query = "INSERT INTO leerling (naam, opleiding_ID,leerjaar, groep_ID) VALUES ('$naam', '$opleiding_ID','$leerjaar', '$groep_ID')";


		$retval = mysqli_query($conn, $sql_query);

		if (!$retval) {
			die('Could not enter data: ');
		}

		echo "Entered data successfully\n";
		header("Location: index.php");

	}
} else
// if the form hasn't been submitted, display the form
{
	renderForm('', '', '', '', '');
}
require_once("../assets/includes/footer.php"); ?>