<!-- Head -->
<?php
require_once('../assets/includes/header.php');
require_once("../assets/includes/conn.php");
function dead() {//Dead is gone gone DX
    die("Error: ID is niet gezet of groep ID bestaat niet.");
}
?>

<!-- Main part -->
<section class="about d-flex justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex align-items-center">
        
<?php
//Check om te kijken of groep bestaat bij de $_GET methode.
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
    dead();
}
if ($check != 1) {
    dead();
}
//
$groepID = $_GET["groep"];
$pull = $conn->query("SELECT naam FROM leerling WHERE groep_ID = " . $groepID);
while ($row = $pull->fetch_assoc()) {
    echo "<p>$row[naam]</p><br>";
}
?>
    </section>
</section>


<!-- Footer, scripts -->
<?
require 'assets/includes/footer.php';
?>