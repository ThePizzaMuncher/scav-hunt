<?php
require_once("../../assets/includes/conn.php");
session_start();
if (!isset($_SESSION["student_login"]) && !$_SESSION["student_login"]) {
    echo "<script>
    window.alert('Je bent niet ingelogd!');
    window.open('../../login/student_login.php', '_self');
    </script>";
    die();
}
$GID = $_SESSION["student_groepID"];
$pull = $conn->query("SELECT * FROM groep WHERE ID = $GID");
$current_vraag = 0;
while ($row = $pull->fetch_assoc()) {
    $current_vraag = $row["current_vraag"];
}
$tipTxt = "";
$stopID = $_SESSION["student_opleidingID"];//Student Opleiding ID.
$current_vraag += 1;
$pull = $conn->query("SELECT * FROM hint WHERE opleidingID = $stopID");
while ($row = $pull->fetch_assoc()) {
    if ($current_vraag == $row["hintID"]) {
        $tipTxt = $row["tip"];
        break;
    }
}
if ($tipTxt == "") {
    $tipTxt = "Error: geen tip of hint gevonden bij dit ID.";
}
require_once("../../assets/includes/header.php"); ?>
<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
	<section id="about" class="section-50 d-flex flex-column align-items-center">
<div class="container">
  <div class="row justify-content-center align-items-center" style="margin-top: 5vw; margin-bottom: 5vw;">
    <form class="col-12">
      <?php echo '<div class="form-group"><h3>' . $tipTxt . '</h3></div>'; ?>   
    </form>   
  </div>
</div>
    </section>
    </section>
<?php
require_once("../../assets/includes/footer.php");
?>