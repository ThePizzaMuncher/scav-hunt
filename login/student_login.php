<?php
require_once("../assets/includes/header.php");
require_once("../assets/includes/conn.php");
echo '
<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset"
    style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">
    <form method="post" action="../assets/php/student_login_verw.php">
    <input type="text" name="code" required placeholder="Voer hier de code in">
    <input type="text" name="naam" required placeholder="Voer hier je naam in">
    <input type="submit" name="submit" value="Aanmelden">
    </form>
</section>
</section>
';
if (isset($_SESSION["stl_fb"]) && $_SESSION["stl_fb"] != "0") { //Feedback van login actie
    echo "<script defer>
    setTimeout(() => {
        window.alert('" . $_SESSION["stl_fb"] . "');
    }, 200);
    </script>";
    $_SESSION["stl_fb"] = "0";
}
require_once("../assets/includes/footer.php");
?>