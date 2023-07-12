<?php
$_SESSION["pagina"] = "home";
require 'assets/includes/header.php';
echo <<<meta
<html id="page_home">
<meta name="description" content="Speurtocht website. Speur je mee?">
<meta name="keywords" content="Speurtocht ROC Friese poort, Firda speurtocht, scav-hunt, Scav-Hunt">
<meta name="authors" content="wwwqr, Valerii, Dimitry, Jonathan">
meta;
$filename = "about.txt";
?>

<main id="main">
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <video id="myVideo" src="assets/mp4/Leeuwarden.mp4" autoplay loop muted></video>

    <div class="hero-container">
      <h1>Speurtocht</h1>
      <div class="text-centered">
        <p><span class="typed" data-typed-items="Adventure, Action, Leeuwarden, Team work, Firda"></span>
        </p>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
    <div class="container" style="overflow: hidden;">
        <div class="row">
          <div class="col-lg-4 justify-content-center align-items-center sticked-header-offset" style="margin-bottom: 120px;">
            <div class="section-title">
            <h2>Over</h2>
               <p>Hier vind je informatie over ons speurtochtspel!</p>
               <div class="button"><a href="login/student_login.php">
                   <p>Log in met de code <br> Daar kun je de reis beginnen! <br>  Easter egg!
                    Congratulations!</p>
                </a></div>
              </p>
            </div>
            <div class="image">
            </div>
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h2>Speurtocht</h2>
            <ul>
              <li><i class="bi bi-map"></i> <strong>Locatie:</strong> <span>Leeuwarden</span></li>
            </ul>

            <p>
              <?php

              echo convertMarkdownToHTML(file_get_contents($filename));
              ?>
            </p>
          </div>
        </div>
      </div>
    </section>

    <?php
    if (isset($_SESSION["stl_fb"]) && !empty($_SESSION["stl_fb"])) {
      echo "<script defer>
    setTimeout(() => {
      window.alert('" . $_SESSION["stl_fb"] . "');
    }, 200);
    </script>";
      $_SESSION["stl_fb"] = "0";
    }
    include "assets/includes/footer.php";
    ?>