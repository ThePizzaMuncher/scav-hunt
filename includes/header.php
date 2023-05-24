<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ValeraZSD Portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <script src="https://kit.fontawesome.com/51b9333b7a.js" crossorigin="anonymous"></script>

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
<body>
  <div id="box"></div>
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <div class="header-box"></div>
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">
      <div class="row">

        <div class="col-0">
          <a href="index.php"><img src="assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle"></a>
        </div>

        <div class="col-1">
          <div class="profile">

            <h1 class="text-light"><a href="index.php">Scav Hunt</a></h1>
            <div class="social-links mt-3 text-center">
              <a href="" target="_blank"><i class="fa-brands fa-instagram"></i></a>
              <a href="" target="_blank"><i class="fa-brands fa-youtube"></i></a>
              <a href="" target="_blank"><i class="fa-brands fa-artstation"></i></a>
            </div>
          </div>
        </div>

        <div class="col-2">
        <div class="col-lg-6">
        <h4><?php 
        require_once("includes/connection.php");
        session_start() ?></h4>
        </div>
        <div class="col-lg-6">
        <nav id="navbar" class="nav-menu navbar">
            <a href="index.php#" class="nav-link scrollto hover-sound"><i class="bx bx-home"></i> Home</a>
            <a href="index.php#about" class="nav-link scrollto hover-sound"><i class="bx bx-user"></i> About</a>
          </nav><!-- .nav-menu -->
        </div>

        </div>
      </div>
    </div>
  </header><!-- End Header -->