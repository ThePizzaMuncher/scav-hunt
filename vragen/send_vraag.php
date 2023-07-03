<?php
require_once("../assets/includes/conn.php");
$a = false;
$b = false;
$c = false;
$d = false;
$counter = 0;
if (isset($_POST["submit"])) {
    if (isset($_POST["a"])) {
        $a = true;
        ++$counter;
    } else if (isset($_POST["b"])) {
        $b = true;
        ++$counter;
    } else if (isset($_POST["c"])) {
        $c = true;
        ++$counter;
    } else if (isset($_POST["d"])) {
        $d = true;
        ++$counter;
    }
    if ($counter != 1) {

    }

} else {
    die("Error: geen toegang!");
}
?>