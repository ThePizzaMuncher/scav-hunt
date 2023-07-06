<!-- Head -->
<?php
require 'assets/includes/header.php';
require_once("../assets/includes/conn.php");
?>

<!-- Main part -->
<section class="about d-flex justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex align-items-center">
<?php
$pull = $conn->query("SELECT * FROM groep");
echo "<table>";
while ($row = $pull->fetch_assoc()) {
    echo "<td>";
    $pull2 = $conn->query("SELECT * FROM leerling WHERE groep_ID = " . $row["ID"]);
    while ($row2 = $pull2->fetch_assoc()) {
        echo "<tr>";
        echo "<p>" . $row2["naam"] . "</p>";
        echo "</tr>";
    }
    echo "</td>";
}
echo "</table>";
?>
    </section>
</section>


<!-- Footer, scripts -->
<?
require 'assets/includes/footer.php';
?>