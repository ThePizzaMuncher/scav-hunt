<?php
require_once("../includes/conn.php");
session_start();
if (isset($_POST["code"]) && !empty($_POST["code"]) && isset($_POST["submit"]) && isset($_POST["naam"]) && !empty($_POST["naam"])) {
    $code = $_POST["code"];
    $naam = htmlspecialchars(strtolower($_POST["naam"]));
    $groepID = -1;
    $pull = $conn->query("SELECT groep_ID, ID FROM leerling WHERE naam = " . $naam . "");
    while ($row = $pull->fetch_assoc()) {//Enkele executie van leerling. Pakt groep ID van leerling.
        $groepID = $row["groep_ID"];
        $llID = $row["ID"];
    }
    if ($groep_ID == -1) {//Als naam verkeerd is gegaan doe dan...
        $_SESSION["stl_fb"] = "Error: leerling bestaat niet of naam is verkeerd ingevoerd.";
        header("location: ../../login/student_login.php");
        die();
    }
    $pull = $conn->query("SELECT code FROM uniekecode WHERE ID = 1");//Hardcoded omdat er maar 1 unieke code is.
    while ($row = $pull->fetch_assoc()) {//Enkelijke executie van de uniekecode
        if ($row["code"] == $code) {
            $_SESSION["student_login"] = true;//Session voor toegang wordt aangemaakt.
            $_SESSION["student_groepID"] = $groepID;
            $_SESSION["student_ID"] = $llID;
            $_SESSION["stl_fb"] = "0";
            header("location: ../../vragen");
            die();
        }
        else {
            $_SESSION["student_login"] = false;
            $_SESSION["stl_fb"] = "Error: code ongeldig.";//StudentLogin Feedback
        }
    }
}
header("location: ../../login/student_login.php");
?>