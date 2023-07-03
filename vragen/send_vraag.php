<?php
require_once("../assets/includes/conn.php");
$a = false;
$b = false;
$c = false;
$d = false;
$counter = 0;
$cvp1 = 0;
$rw = 0;
$ia = 0;//Ingevoerde antwoord (String)
if (isset($_POST["submit"]) && isset($_POST["cvp1"]) && isset($_POST["rw"])) {
    $cvp1 = md5($_POST["cvp1"]);
    $rw = md5($_POST["rw"]);
    if (isset($_POST["a"])) {
        $a = true;
        $ia = "a";
        ++$counter;
    } else if (isset($_POST["b"])) {
        $b = true;
        $ia = "b";
        ++$counter;
    } else if (isset($_POST["c"])) {
        $c = true;
        $ia = "c";
        ++$counter;
    } else if (isset($_POST["d"])) {
        $d = true;
        $ia = "d";
        ++$counter;
    }
    if ($counter != 1) {
        die("Error: meerdere antwoorden ingevuld of geen antwoorden ingevuld.");
    }
    $conn->query("UPDATE groep SET current_vraag = " . $cvp1 . " WHERE ID = " . $rw . ""); //Stel volgende vraag in.
    $rw -= 1;//Om current vraag ID te pakken.
    $conn->query("INSERT INTO antwoord(antwoorden, vraag_ID, groep_ID) VALUES ('$ia', , $_SESSION[student_groepID])")
} else {
    die("Error: geen toegang!");
}
?>