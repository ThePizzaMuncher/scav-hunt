<?php require_once("../assets/includes/header.php");

if (isset($_SESSION["admin"]) || isset($_SESSION["docent"])) {
    if ($_SESSION["admin"] == 1) {
        header("location: ../admin");
    }
    if ($_SESSION["docent"] == 1) {
        header("location: ../docent");
    }
} ?>

<main id="main">

<section class="login d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
     <section id="login" class="section-50 d-flex flex-column align-items-center">
    <form method="post" action="send.php">
        <input type="text" name="user">
        <input type="password" name="pw">
        <button type="submit" name="submit">
    </form>
     </section>
     </section>

<?php
require_once("../assets/includes/footer.php");
?>