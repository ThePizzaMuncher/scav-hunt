<?php
require_once("../assets/includes/conn.php");
session_start();
$counter = 0;
$cvp1 = 0; //Current vraag plus 1
$rw = 0;
$ia = 0; //Ingevoerde antwoord (String)
if (isset($_POST["submit"]) && isset($_SESSION['vstd_1']) && isset($_SESSION['vstd_2']) && isset($_SESSION['vstd_3'])) {
    $rw = $_SESSION['vstd_2'];
    $cvp1 = $_SESSION['vstd_1'];
    $gi = $_SESSION['vstd_3'];
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
    header("location: ../");
} else {
    die("Error: geen toegang!");
}
?>