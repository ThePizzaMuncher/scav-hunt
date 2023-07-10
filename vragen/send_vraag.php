<?php
require_once("../assets/includes/conn.php");
session_start();
$counter = 0;
$cvp1 = 0; //Current vraag plus 1
$rw = 0;
$ia = 0; //Ingevoerde antwoord (String)
if (isset($_POST["submit"]) && isset($_SESSION['vstd_1']) && isset($_SESSION['vstd_2']) && isset($_SESSION['vstd_3'])) {
    $rw = $_SESSION['vstd_2'] + 1;//Vraag ID.
    $cvp1 = $_SESSION['vstd_1'];//Currentvraag var.
    $gi = $_SESSION['vstd_3'];//Groep ID.
    if (isset($_POST["a"])) {
        $ia = "a";
        ++$counter;
    } else if (isset($_POST["b"])) {
        $ia = "b";
        ++$counter;
    } else if (isset($_POST["c"])) {
        $ia = "c";
        ++$counter;
    } else if (isset($_POST["d"])) {
        $ia = "d";
        ++$counter;
    }
    if ($counter != 1) {
        die("Error: meerdere antwoorden ingevuld of geen antwoorden ingevuld.");
    }
    $conn->query("UPDATE groep SET current_vraag = " . $cvp1 . " WHERE ID = " . $gi . ""); //Stel volgende vraag in.
    $rw -= 1; //Om current vraag ID te pakken.
    $conn->query("INSERT INTO antwoord(antwoorden, vraag_ID, groep_ID) VALUES ('$ia', $rw, $_SESSION[student_groepID])");
    //Score updaten --- Start
    $pull = $conn->query("SELECT antwoord FROM vraag WHERE ID = $rw");//Enkele executie (pakt goede antwoord op de vraag uit DB)
    $antwoord_goed = "";
    while ($row = $pull->fetch_assoc()) {//Enkele executie.
        $antwoord_goed = $row["antwoord"];
    }
    if ($antwoord_goed == $ia) {//Als antwoord goed overeenkomt met antwoord dat is ingevult voeg dan punt toe.
        $pull = $conn->query("SELECT score FROM groep WHERE ID = $_SESSION[student_groepID]");
        $score = 0;
        while ($row = $pull->fetch_assoc()) {
            $score = $row["score"] + 1;
        }
        $conn->query("UPDATE groep SET score = $score WHERE ID = $_SESSION[student_groepID]");//Zet up to date score in DB.
    }
    //Score updaten --- End
    //Check als speurtocht over is...
    $pull = $conn->query("SELECT current_vraag FROM groep WHERE docent_ID = (SELECT ID FROM docent WHERE opleiding_ID = $_SESSION[student_opleidingID]);");
    $check = true;
    while ($row = $pull->fetch_assoc()) {
        if ($row["current_vraag"] != 13) {
            $check = false;
        }
    }
    if ($check) {//Als ieder groepje klaar is met de speurtocht doe dan...
        $winGroepID = 0;
        $pull = $conn->query("SELECT * FROM groep WHERE score = (SELECT MAX(score) FROM groep) AND docent_ID = (SELECT ID FROM docent WHERE opleiding_ID = $_SESSION[student_opleidingID]);");
        while ($row = $pull->fetch_assoc()) {
            $winGroepID = $row["ID"];
            $groepsNaam = $row["groepsnaam"];
            $pull2 = $conn->query("SELECT naam FROM leerling WHERE groep_ID = $winGroepID");
            $llArr = [];
            $llstr = "";
            while ($row2 = $pull2->fetch_assoc()) {
                array_unshift($llArr, $row2["naam"]);
            }
            $laatste = count($llArr);
            $llCounter = 0;
            foreach($llArr as $ll) {
                ++$llCounter;
                $llstr += $ll;
                if ($llCounter != $laatste) {
                    $llstr += ",";
                }
            }
            $conn->query("INSERT INTO winnaar(leerlingen, groepsnaam) VALUES ('$llstr', '$groepsNaam')");
        }
    }
    header("location: ../");
} else {
    die("Error: geen toegang!");
}
?>