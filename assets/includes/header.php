<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Scav Hunt</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/~fp245787/kartel/assets/img/android-chrome-512x512.png" rel="icon">
  <link href="/~fp245787/kartel/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/~fp245787/kartel/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/~fp245787/kartel/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/~fp245787/kartel/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/~fp245787/kartel/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/~fp245787/kartel/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/~fp245787/kartel/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <script src="https://kit.fontawesome.com/51b9333b7a.js" crossorigin="anonymous"></script>

  <!-- Main CSS File -->
  <link href="/~fp245787/kartel/assets/css/style.css" rel="stylesheet">

<body>
  <div id="box"> <?php include_once("../../filedir.php") ?> </div>
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <div class="header-box"></div>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <a href="/~fp245787/kartel/index.php"><img src="/~fp245787/kartel/assets/img/ScavHunt.png" alt="" class="img-fluid rounded-circle"></a>
        </div>

        <div class="col-md-3">
          <div class="profile">
            <h1 class="text-light"><a href="/~fp245787/kartel/index.php">Scav Hunt</a></h1>
            <div class="social-links mt-3 text-center">
              <a href="" target="_blank"><i class="fa-brands fa-instagram"></i></a>
              <a href="" target="_blank"><i class="fa-brands fa-youtube"></i></a>
              <a href="" target="_blank"><i class="fa-brands fa-artstation"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-7 vert">
          <h4><?php session_start(); ?></h4>

          <nav id="navbar" class="nav-menu navbar">
            <ul class="nav-menu">
              <?php
              if (isset($_SESSION["docent"])) {
                  echo <<< docent
                    <li><a href="/~fp245787/kartel/index.php" class="nav-link scrollto hover-sound"><i class="bx bx-home"></i> Home</a></li>
                    <li><a href="code-tonen.php"><i class="bx bx-code"></i>Login</a></li>
                    <li><a href="groepje-tonen.php"><i class="bx bx-group"></i> Groepjes</a></li>
                    <li><a href="winnaar-tonen.php"><i class="bx bx-trophy"></i> Winnaar</a></li>
                    <li><a href="/~fp245787/kartel/docent/koter_analyzer.php"><i class="bx bx-map"></i> Locaties</a></li>
                    <li><a href="vragen-aanpassen.php"><i class="bx bx-edit"></i> Vragen bijwerken</a></li>
                    <li><a href="docent/"><i class="bx bx-chalkboard-teacher"><i class="bx bx-user"></i> Docent</a></li>
                    <li><a href="/~fp245787/kartel/#about" class="nav-link scrollto hover-sound"><i class="bx bx-info"></i> About</a></li>
                    docent;
              } elseif (isset($_SESSION["admin"])) {
                  echo <<< admin
                  <li><a href="/~fp245787/kartel/index.php" class="nav-link scrollto hover-sound"><i class="bx bx-home"></i> Home</a></li>
                    <li><a href="code-tonen.php"><i class="bx bx-code"></i>Login</a></li>
                    <li><a href="groepje-tonen.php"><i class="bx bx-group"></i> Groepjes</a></li>
                    <li><a href="winnaar-tonen.php"><i class="bx bx-trophy"></i> Winnaar</a></li>
                    <li><a href="/~fp245787/kartel/docent/koter_analyzer.php"><i class="bx bx-map"></i> Locaties</a></li>
                    <li><a href="vragen-aanpassen.php"><i class="bx bx-edit"></i> Vragen bijwerken</a></li>
                    <li><a href="docent_toevoegen.php"><i class="bx bx-code"><i class="bx bx-user"></i>Docent toevoegen</a></li>
                    <li><a href="/~fp245787/kartel/#about" class="nav-link scrollto hover-sound"><i class="bx bx-info"></i> About</a></li>
                  admin;
              }
              else {
                function default_bar() {//De default pagina bar's voor een pagina header.
                    echo <<< default
                    <li><a href="/~fp245787/kartel/index.php" class="nav-link scrollto hover-sound"><i class="bx bx-home"></i> Home</a></li>
                    <li><a href="/~fp245787/kartel/#about" class="nav-link scrollto hover-sound"><i class="bx bx-user"></i> About</a></li>
                    default;
                }
                if (isset($_SESSION["pagina"])) {//Just yeet a session of 'pagina' by every page so we can detect witch buttons need to be displayed.
                  $pn = $_SESSION["pagina"];
                  if ($pn == "home") {
                    echo <<< home
                    <li><a href="/~fp245787/kartel/login" class="nav-link scrollto hover-sound"><i class="bx bx-user"></i> Docent login</a></li>
                    <li><a href="/~fp245787/kartel/student_code.php" class="nav-link scrollto hover-sound"><i class="bx bx-user"></i> Student login</a></li>
                    home;
                  }
                  else if ($pn == "login") {
                    echo <<< login
                    <li><a href="/~fp245787/kartel/" class="nav-link scrollto hover-sound"><i class="bx bx-user"></i> Home</a></li>
                    <li><a href="/~fp245787/kartel/#about" class="nav-link scrollto hover-sound"><i class="bx bx-user"></i> About</a></li>
                    login;
                  }
                  else {
                    default_bar();
                  }
                }
                else {
                  default_bar();
                }
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>