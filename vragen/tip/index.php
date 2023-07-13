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
switch ($current_vraag) {
    case 0:
        $tipTxt = "Ga vanaf school naar de elfstedenhal en kijk rond het parkeerterrein voor de eerste qr-code.";
    break;
    case 1:
        $tipTxt = "Loop nu langs de elfstedenhal in de righting van de Jumbo. Loop langs de weg die links van de jumbo loopt. Bij het kruispunt kan je de volgende qr-code vinden.";
    break;
    case 2:
        $tipTxt = "Steek over en volg de weg rechtdoor. Zoek voor een speeltuin, hier kan je de volgende qr-code vinden.";
    break;
    case 3:
        $tipTxt = "Pak de eerste weg rechts toen jullie vanaf het kruispunt naar de speeltuin liepen. Vervolg deze weg totdat je bij het water uitkomt (Ga niet over het water), sla dan links af en zoek voor de volgende qr-code.";
    break;
    case 4:
        $tipTxt = "Vervolg de weg langs het water (En blijf aan dezelfde kant van het water) totdat je uitkomt bij het standbeeld 'Ús mem' Zoek daar voor de volgende qr-code.";
    break;
    case 5:
        $tipTxt = "Als je goed hebt gekeken, dan heb je de scheve toren al gezien (De oldehove.) Rondom deze toren zit de volgende qr-code.";
    break;
    case 6:
        $tipTxt = "Loop nu terug naar de recentste kruising die je bent tegengekomen. Volg vervolgens de weg 'Westerplantage' en daarna 'Ruiterskwartier' totdat je Pathé ziet. Daar kan je de volgende qr-code vinden.";
    break;
    case 7:
        $tipTxt = "Vervolg dezelfde weg en sla de eerste rechts af. Steek niet over waneer je het water weer tegenkomt. ga bij de kade linksaf en zoek lopend naar de volgende qr-code.";
    break;
    case 8:
        $tipTxt = "Vervolg dezelfde weg en sla de eerste links af. loop dan rechtdoor totdat je bij het Fries Museum komt. Hier kan je de volgende qr-code vinden.";
    break;
    case 9:
        $tipTxt = "Vervolg dezelfde weg en sla bij de eerste links af. ga daarna de eerste rechts en loop over het water. Er is iets lekkers te eten bij De Dikke van Dale";
    break;
    case 10:
        $tipTxt = "Je hebt de grote zwarte toren vast al gezien. Loop naar de Achmea toren, hier is een nieuwe qr-code te vinden.";
    break;
    case 11:
        $tipTxt = "Volg de rechterkant van de kade. Bij Monkey Town is een nieuwe qr-code te vinden.";
    break;
    case 12:
        $tipTxt = "Blijf rechtdoor lopen aan dezelfde kant van de kade, totdat je een brug tegenkomt. scan hier de code en loop vervolgens terug naar school.";
    break;
    case 13:
        $tipTxt = "Je hebt de speurtocht afgerond! Vraag de desbetreffende docent voor de winnaars.";
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