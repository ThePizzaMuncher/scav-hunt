<!-- Head -->
<?php
require_once('../assets/includes/header.php');
require_once("../assets/includes/conn.php");
?>

<!-- Main part -->
<section class="about d-flex justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex align-items-center">
        
<?php
$check = 0;
if (isset($_GET["groep"]) && !empty($_GET["groep"])) {
    $pull = $conn->query("SELECT ID FROM groep");
    while ($row = $pull->fetch_assoc()) {
        if ($_GET["groep"] == $row["ID"]) {
            $check = 1;
            break;
        }
    }
}
else {
    die("Error: ID is niet gezet of groep ID bestaat niet.");
}
$pull = $conn->query("SELECT naam FROM leerling WHERE groep_ID = ")
?>
    </section>
</section>


<!-- Footer, scripts -->
<?
require 'assets/includes/footer.php';
?>