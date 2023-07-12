<?php
session_start();
require_once("../../assets/includes/conn.php");
if (!isset($_SESSION["student_login"]) && !isset($_SESSION["docent"])) {
    header("location: ../../login/student_login.php");
    die();
}
require_once("../../assets/includes/header.php"); ?>
<title>Tussenstand groepjes</title>
<style>
    .balk {
        background-color: blue;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-bottom: 0.5vw;
        flex-direction: column;
    }

    .naam,
    .txt {
        color: white;
        text-shadow: 0.2vw 0.2vw 0.2vw black;
        font-size: 20px;
    }

    .txt {
        font-size: 30px;
    }

    .gordel {
        width: 100%;
        height: 14vw;
        display: flex;
        align-items: end;
        justify-content: space-around;
        text-align: center;
        flex-direction: row;
        background-color: #737373;
    }

    body {
        margin: 0vw;
    }
</style>

<?php
$pull;
if (isset($_SESSION["student_login"]) && $_SESSION["student_login"]) { //Student pull
    $opleidingID = $_SESSION["student_opleidingID"];
} else if (isset($_SESSION['docent'])) {
    $opleidingID = $_SESSION['opleiding_ID'];
}
$query = "SELECT * FROM groep WHERE docent_ID = (SELECT opleiding_ID FROM docent WHERE opleiding_ID = $opleidingID)";
$pull = $conn->query($query);
$counter = 0;
while ($row = $pull->fetch_assoc()) { //Counter of groups
    ++$counter;
}
$pull = $conn->query($query);
?>

<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">
        <div class='gordel' style='margin-top: -5vw;'>
            <p class='txt'>Tussenstand groepjes</p>
        </div>
        <div class='gordel'>

            <?php
            while ($row = $pull->fetch_assoc()) {
                //Als groepsnaam lang is, verkort deze dan voor de display.
                $gn = $row["groepsnaam"];
                $gna = "";
                $gnc = strlen($gn);
                $gebr = $gn;
                if ($gnc > 4) {
                    $gna .= $gn[0];
                    $gna .= $gn[1];
                    $gna .= $gn[2];
                    $gna .= $gn[3];
                    $gna .= "...";
                    $gebr = $gna;
                }

                $maxHeight = 13; // Maximum height
                $minHeight = 0; // Minimum Height
                $heightPercentage = ($row["score"] / $maxHeight) * 100;
                $heightPercentage = max($heightPercentage, 5); // Display Height At Least 5 Percent

                echo "
                <div id='$row[ID]' style='height: $heightPercentage%; width: " . (100 / $counter) . "%;' class='balk'>
                    <p class='naam'>$gebr</p>
                    <p class='points'>$row[score] points</p>
                </div>
                ";
            }
            ?>

        </div> <!-- Afsluiten van gordel tag -->
    </section>
</section>
<?php
require_once("../../assets/includes/footer.php");
?>