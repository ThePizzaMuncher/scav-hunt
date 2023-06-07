<?php
if (isset($_SESSION["docent"])) { 
	if ($_SESSION["docent"] != 1) {
		header("location:../login");
		die();
	}
}
else {
	header("location:../login");
	die();
}

require_once("../assets/includes/header.php");
require_once("../assets/includes/conn.php");
?>

<!-- <h1>ПАЦАНЫ КОЛБАСА ЗДЕСЬ ( Ням-ням ^.^ )</h1> --> 
<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
  <section id="about" class="section-50 d-flex flex-column align-items-center">

LOGOUT

</section>
</section>
<?php require_once("../assets/includes/footer.php"); ?>
