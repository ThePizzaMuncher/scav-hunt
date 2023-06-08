<?php
session_start();
$_SESSION['pagina'] = 'login';
require_once("../assets/includes/header.php");

if (isset($_SESSION['docent'])) {
	header('location:../');
	die();
} ?>

<main id="main">

<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
  <section id="about" class="section-50 d-flex flex-column align-items-center">
    <h3>Docent en admin login</h3>
    <form method="post" action="send.php">
      <input type="text" name="user" placeholder="Username">
      <input type="password" name="pw" placeholder="Password">
      <button type="submit" name="submit">Login</button>
    </form>
  </section>
</section>


<?php
require_once("../assets/includes/footer.php");
?>