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
    .about {
        background-color: var(--color-grey-ultra-light);
    }
    .balk {
        background-color: var(--color-secondary-light);
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-bottom: 0.5vw;
        flex-direction: column;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom: solid 2px var(--color-secondary);
    }

    .naam, .txt, .naam2 {
        color: var(--color-primary);
        font-size: 20px;
    }
    .naam2 {
        margin-bottom: 0vw;
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
        background-color: white;
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
                if ($gnc > 6) {
                    $gna .= $gn[0];
                    $gna .= $gn[1];
                    $gna .= $gn[2];
                    $gna .= $gn[3];
                    $gna .= $gn[4];
                    $gna .= $gn[5];
                    $gna .= $gn[6];
                    $gna .= "...";
                    $gebr = $gna;
                }

                $maxHeight = 13; // Maximum height
                $minHeight = 0; // Minimum Height
                $heightPercentage = ($row["score"] / $maxHeight) * 100;
                $heightPercentage = max($heightPercentage, 5); // Display Height At Least 5 Percent

                echo "
                <div id='$row[ID]' style='height: $heightPercentage%; width: " . (90 / $counter) . "%;' class='balk'>
                    <p class='naam2'>$gebr</p>
                    <p class='naam'>score:$row[score]</p>
                    <p class='naam'>Vraag:$row[current_vraag]</p>
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