<?php
session_start();
require_once("../assets/includes/conn.php");
if (isset($_SESSION["student_login"]) && $_SESSION["student_login"] == true && isset($_SESSION["student_groepID"]) && $_SESSION["student_groepID"] != -1 && isset($_SESSION["student_ID"]) && $_SESSION["student_ID"] != -1 && isset($_POST["groepsnaam"]) && !empty($_POST["groepsnaam"]) && isset($_POST["submit"])) {
    $groepsnaam = htmlspecialchars($_POST["groepsnaam"]);
    $pull = $conn->query("SELECT groepsnaam FROM groep");
    $check = 0;
    while ($row = $pull->fetch_assoc()) {
        if (strtolower($groepsnaam) == strtolower($row["groepsnaam"])) {
            $check = 1;
            break;
        }
    }
    if ($check == 0) {
        $conn->query("UPDATE groep SET groepsnaam = '" . $groepsnaam . "' WHERE ID = " . $_SESSION["student_groepID"] . "");
        $_SESSION["stl_fb"] = "Je hebt '" . $groepsnaam . "' successvol aangemaakt!";
    }
    else {
        $_SESSION["stl_fb"] = "Error: team bestaat al.";
    }
}
else {
    $_SESSION["stl_fb"] = "Error: Je bent niet ingelogd.";
}
header("location: ../");
?>