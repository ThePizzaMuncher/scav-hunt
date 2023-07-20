<?php
session_start();
if (!isset($_SESSION['docent']) || $_SESSION['docent'] != 1) {
    echo "<script>
    window.alert('Error. geen toegang!');
    window.open('../', '_self');
    </script>";
    die();
}
require_once("../assets/includes/header.php");

require_once("../assets/includes/footer.php");
?>