<?php
session_start();
require_once("../assets/includes/conn.php");
if (isset($_SESSION["student_login"]) && $_SESSION["student_login"] == true && isset($_GET["vraag"]) && !empty($_GET["vraag"])) {
    $vraagID = $_GET["vraag"]; //ID van qr-code en vraag.
    switch ($vraagID) {//Zelf encrypted 1 t/m 13 value zodat mensen persé de QR code moeten scannen.
        case "bhefyufvu":
            $vraagID = 1;
            break;
        case "uh4r78uybr43hhj4":
            $vraagID = 2;
            break;
        case "jnrtnjb3byug":
            $vraagID = 3;
            break;
        case "ub3r7847443d":
            $vraagID = 4;
            break;
        case "herh74utb7bdddf":
            $vraagID = 5;
            break;
        case "8734gvhjvf4":
            $vraagID = 6;
            break;
        case "ipotyhbtert4":
            $vraagID = 7;
            break;
        case "twefrbhdfhrj":
            $vraagID = 8;
            break;
        case "kwhegfbewhrgskode":
            $vraagID = 9;
            break;
        case "yf734vgjersker":
            $vraagID = 10;
            break;
        case "u3748bhjweell":
            $vraagID = 11;
            break;
        case "jhbewhyyyy3ytr":
            $vraagID = 12;
            break;
        case "oi3ri43r4ff":
            $vraagID = 13;
            break;
        default:
            $vraagID = 0;
            break;
    }
    $pull = $conn->query("SELECT * FROM groep WHERE ID = " . $_SESSION["student_groepID"] . "");
    while ($row = $pull->fetch_assoc()) { //Voor de groep doe...
        if ($vraagID == ($row["current_vraag"] + 1)) { //Kijken of de volgende vraag bij de groep past.
            echo '
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Vragen</title>
                <link rel="stylesheet" href="../assets/css/style.css">
            </head>
            <body>
                <div class="keuze">';
            $opleiding = $_SESSION['student_opleidingID'];
            $docentID = -1;
            //echo $opleiding;
            //$pull2 = $conn->query("SELECT vraag.vraag, vraag.vragenlijst_ID, vraag.antwoord, vragenlijst.ID,vragenlijst.docent_ID,docent.opleiding_ID,opleiding.opleiding_naam, vraag.ID FROM vraag INNER JOIN vragenlijst ON vraag.vragenlijst_ID = vragenlijst.ID INNER JOIN docent ON vragenlijst.docent_ID = docent.ID INNER JOIN opleiding ON docent.opleiding_ID = opleiding.ID WHERE vraag.ID = $vraagID AND opleiding.ID = $opleiding");
            $pull2a = $conn->query("SELECT vragenlijst.docent_ID, vragenlijst.ID, docent.opleiding_ID, docent.naam FROM vragenlijst INNER JOIN docent ON vragenlijst.docent_ID = docent.ID");
            while ($row2a = $pull2a->fetch_assoc()) {
                //echo $opleiding;
                if ($opleiding == $row2a["opleiding_ID"]) { //Zoek opleiding bij student en docent.
                    $docentID = $row2a["docent_ID"];
                }
            }
            //echo $docentID;
            $pull2b = $conn->query("SELECT ID FROM vragenlijst WHERE docent_ID = $docentID");
            $vragenlijstID = -1;
            while ($row2b = $pull2b->fetch_assoc()) {
                $vragenlijstID = $row2b["ID"];
            }
            if ($docentID == -1 || $vragenlijstID == -1) { //Error melding
                die("Error: geen passende vragenlijst gevonden bij opleiding.");
            }
            $pull2c = $conn->query("SELECT * FROM vraag WHERE vragenlijst_ID = $vragenlijstID");
            $vraagArr = [];
            while ($row2c = $pull2c->fetch_assoc()) { //Maak array met nummers en ID's, omdat vraag ID ook groter kan zijn dan 13 voor andere opleidingen.
                array_push($vraagArr, $row2c["ID"]); //Voeg ID van vraag toe aan array.
            }
            /*print_r($vraagArr);
            die("test");*/
            $pull2 = $conn->query("SELECT * FROM vraag WHERE vragenlijst_ID = $vragenlijstID AND ID = " . $vraagArr[$vraagID - 1] . "");
            while ($row2 = $pull2->fetch_assoc()) {
                //Meegeven van data naar send_vraag.php
                $_SESSION['vstd_1'] = $row["current_vraag"] + 1;
                $_SESSION['vstd_2'] = $row2["ID"];
                $_SESSION['vstd_3'] = $row["ID"];
                //
                $contentArr = explode(",", $row2["content"]);
                echo "<p>Vraag:&nbsp;" . $row2["vraag"] . "</p>";
                echo "<form method='post' action='send_vraag.php'>
                ";
                $indoorCounter = 0 ;
                $in = "a";
                foreach($contentArr as $content) {
                    echo "<p>$contentArr[$indoorCounter]</p>
                    <input type='checkbox' name='$in'>";
                    ++$indoorCounter;
                    ++$in;
                }
                /*
                <p>$contentArr[0]</p>
                <input type='checkbox' name='a'>
                <p>$contentArr[1]</p>
                <input type='checkbox' name='b'>
                <p>$contentArr[2]</p>
                <input type='checkbox' name='c'>
                <p>$contentArr[3]</p>
                */
                echo "
                <br>
                <input type='submit' name='submit' value='Vraag inleveren'>
                </form>";
            }
            echo '
                </div>
            </body>
            </html>
            ';
        } else {
            echo "<script defer>
            setTimeout(() => {
                window.alert('Deze vraag past momenteel niet bij je team.');
                window.open('../',  '_self');
            }, 200);
            </script>";
        }
    }
} else {
    die("Error: geen toegang!");
}
?>