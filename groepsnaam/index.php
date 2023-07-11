<?php
session_start();
require_once("../assets/includes/header.php");
require_once("../assets/includes/conn.php");
if (isset($_SESSION["student_login"]) && $_SESSION["student_login"] == true && isset($_SESSION["student_groepID"]) && $_SESSION["student_groepID"] != -1 && isset($_SESSION["student_ID"]) && $_SESSION["student_ID"] != -1) {
    echo '
    <section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset"
    style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">
        <form method="post" action="input.php">
        <input type="text" name="groepsnaam" placeholder="Voer je groepsnaam in">
        <input type="submit" name="submit" value="maak groep">
        </form>
    </section>
    </section>
    ';
}
else {
    header("location: ../login/student_login.php");
}
if (isset($_SESSION["stl_fb"]) && !empty($_SESSION["stl_fb"])) {
    echo "<script defer>
    setTimeout(() => {
      window.alert('" . $_SESSION["stl_fb"] . "');
    }, 200);
    </script>";
    $_SESSION["stl_fb"] = "0";
  }
  require_once("../assets/includes/footer.php");
