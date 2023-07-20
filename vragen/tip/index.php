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
function setTipTxt() {
    require_once("../../assets/includes/conn.php");
    $pull = $conn->query("SELECT tip FROM hint WHERE opleidingID = $studentOpID AND hintID = $current_vraag");
    $tmpTipTxt = $pull->fetch_assoc();
    $tipTxt = $tmpTipTxt["tip"];
}
switch ($current_vraag) {
    case 0:
        setTipTxt();
    break;
    case 1:
        setTipTxt();
    break;
    case 2:
        setTipTxt();
    break;
    case 3:
        setTipTxt();
    break;
    case 4:
        setTipTxt();
    break;
    case 5:
        setTipTxt();
    break;
    case 6:
        setTipTxt();
    break;
    case 7:
        setTipTxt();
    break;
    case 8:
        setTipTxt();
    break;
    case 9:
        setTipTxt();
    break;
    case 10:
        setTipTxt();
    break;
    case 11:
        setTipTxt();
    break;
    case 12:
        setTipTxt();
    break;
    case 13:
        setTipTxt();
    break;
    default:
        $tipTxt = "Error: geen tip of hint gevonden bij dit ID.";
    break;
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