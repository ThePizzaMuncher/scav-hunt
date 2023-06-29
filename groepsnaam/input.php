<?php
session_start();
require_once("../assets/includes/conn.php");
if (isset($_SESSION["student_login"]) && $_SESSION["student_login"] == true && isset($_SESSION["student_groepID"]) && $_SESSION["student_groepID"] != -1 && isset($_SESSION["student_ID"]) && $_SESSION["student_ID"] != -1 && isset($_POST["groepsnaam"]) && !empty($_POST["groepsnaam"]) && isset($_POST["submit"])) {
    $groepsnaam = htmlspecialchars($_POST["groepsnaam"]);
    
}
?>