<?php
require_once("../assets/includes/conn.php");
session_start();
$counter = 0;
$cvp1 = 0; //Current vraag plus 1
$rw = 0;
$ia = 0; //Ingevoerde antwoord (String)
if (isset($_POST["submit"]) && isset($_POST["cvp1"]) && isset($_POST["rw"])) {
    $rw = $_POST["rw"];
    $cvp1 = $_POST["cvp1"];
    $gi = $_POST["gi"];
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
    $conn->query("UPDATE groep SET current_vraag = " . $cvp1 . " WHERE ID = " .  . ""); //Stel volgende vraag in.
    $rw -= 1; //Om current vraag ID te pakken.
    $conn->query("INSERT INTO antwoord(antwoorden, vraag_ID, groep_ID) VALUES ('$ia', $rw, $_SESSION[student_groepID])");
    header("location: ../");
} else {
    die("Error: geen toegang!");
}
?>