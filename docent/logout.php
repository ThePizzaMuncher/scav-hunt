<?php
session_start();
if (isset($_SESSION["docent"])) {
    $_SESSION["docent"] = 0;
}
if (isset($_SESSION["admin"])) {
    $_SESSION["admin"] = 0;
}
header("location: ../login");
die();
?>