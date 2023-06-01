<?php
session_start();
if (isset($_SESSION["docent"])) {
    $_SESSION["docent"] = 0;
}
?>