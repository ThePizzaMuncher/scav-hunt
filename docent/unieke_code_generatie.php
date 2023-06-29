<?php
require_once("../assets/includes/header.php");
require_once("../assets/includes/conn.php");
function random() {
    return rand(1, 9);
}
//Maak code en jaag in database

$code = 0;
$pull = $conn->query("SELECT * FROM uniekecode WHERE ID = 1");
//Laat code zien
echo '
<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
	<section id="about" class="section-50 d-flex flex-column align-items-center">
    <h1>Code: ';
    while ($row = $pull->fetch_assoc()) {
        $code = $row["code"];
        if ($code == 0) {//Als code nog niet bestaat doe dan...
            $conn->query("UPDATE uniekecode SET code = " . random() . random() . random() . random() . " WHERE ID = 1");
            break;
        }
    }
    if ($code == "0") {
        $code = "Momenteel geen speurtocht.";
    }
    echo "<p>$code</p>";
    echo '
    </h1>
</section>
</section>
';
require_once("../assets/includes/footer.php");
?>