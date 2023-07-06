<!-- Head -->
<?php
require_once('../assets/includes/header.php');
require_once("../assets/includes/conn.php");
function dead() {//Dead is gone gone DX
    die("Error: ID is niet gezet of groep ID bestaat niet.");
}
//Toegang check
if (isset($_SESSION['docent'])) {
    if (!$_SESSION['docent']) {
        die("Error: geen toegang!");
    }
}
if (!isset($_SESSION['docent'])) {
    die("Error: geen toegang!");
}
//
?>

<!-- Main part -->
<section class="about d-flex justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex align-items-center">
        <div class="leerling-lijst">
            
        
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
$groepID = $_GET["groep"];?>

<h3>Leerling lijst voor groep №<?php echo $groepID; ?> :</h3>

<?php
$pull = $conn->query("SELECT naam FROM leerling WHERE groep_ID = " . $groepID);
while ($row = $pull->fetch_assoc()) {
    echo "<p>$row[naam]</p>";
}
?>
</div>
    </section>
</section>


<!-- Footer, scripts -->
<?php require 'assets/includes/footer.php'; ?>