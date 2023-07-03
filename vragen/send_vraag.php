<?php
require_once("../assets/includes/conn.php");
$a = false;
$b = false;
$c = false;
$d = false;
if (isset($_POST["submit"])) {
    if (isset($_POST["a"])) {
        $a = true;
    } else if (isset($_POST["b"])) {
        $b = true;
    } else if (isset($_POST["b"])) {
        $b = true;
    } else if (isset($_POST["b"])) {
        $b = true;
    }

} else {
    die("Error: geen toegang!");
}
?>