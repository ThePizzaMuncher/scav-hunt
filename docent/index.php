<?php
require_once("../assets/includes/header.php");

/* if(!isset($_SESSION['docent'])) {
	header('location:../login/');
	die();
} */

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
		</table>
		</div>
		</div>
		</section>
		</section>
	</body>
</html>
main;

?>