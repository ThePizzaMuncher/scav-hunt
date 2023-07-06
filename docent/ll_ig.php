<!-- Head -->
<?php
require_once('../assets/includes/header.php');
require_once("../assets/includes/conn.php");
?>

<!-- Main part -->
<section class="about d-flex justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex align-items-center">
        
<?php
if (isset($_GET["id"]))
$pull = $conn->query("SELECT naam FROM leerling WHERE groep_ID = ")
?>
    </section>
</section>


<!-- Footer, scripts -->
<?
require 'assets/includes/footer.php';
?>