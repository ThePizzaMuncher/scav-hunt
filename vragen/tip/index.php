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
$studentOpID = $_SESSION["student_opleidingID"];
$pull = $conn->query("SELECT * FROM hint WHERE opleidingID = $studentOpID");
while ($current_vraag_row = $pull->fetch_assoc()) {
    echo $current_vraag_row["hintID"];
switch ($current_vraag_row["hintID"]) {
    case 0:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 1:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 2:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 3:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 4:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 5:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 6:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 7:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 8:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 9:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 10:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 11:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 12:
        $tipTxt = $current_vraag_row["tip"];
    break;
    case 13:
        $tipTxt = $current_vraag_row["tip"];
    break;
    default:
        $tipTxt = "Error: geen tip of hint gevonden bij dit ID.";
    break;
}
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