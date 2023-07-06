<?php
session_start();
include 'assets/includes/header.php';
if (!isset($_SESSION['admin'])) {
	header('location:../login');
	die();
}
?>
<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
	<section id="about" class="section-50 d-flex flex-column align-items-center">
		<h1>Admin pagina</h1>
	</section>
</section>
<?php
include 'assets/includes/footer.php';
?>