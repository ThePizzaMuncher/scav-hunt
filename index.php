<?php
$_SESSION["pagina"] = "home";
include 'assets/includes/header.php';
echo <<<meta
<html id="page_home">
meta;
?>
<style>
  /* Video container styles */
  .video-container {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    overflow: hidden;
    margin-bottom: 20px;
  }

  .video-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>


<main id="main">
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
  <video id="myVideo" src="assets/mp4/Leeuwarden.mp4" autoplay loop muted></video>

  <div class="hero-container" data-aos="fade-in">
    <h1>Speurtocht</h1>
    <div class="text-centered">
      <p>We are <span class="typed"
          data-typed-items="Developers, Designers, Programmers, Gamers, the team, Artists"></span>
      </p>
    </div>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 d-flex flex-column justify-content-center align-items-center sticked-header-offset"
          data-aos="fade-right">
          <div class="section-title">
            <h2>About us</h2>
            <p>Here you can find information about our scavenger hunt game!</p>
            <div class="button"><a href="catalog.php" target="_blank">
                <p>Login with the code <br> There you can start the journey! <br> Easter egg!
                  Congratulations!</p>
              </a></div>
            </p>
          </div>
          <div class="image">
          </div>
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h2>Speurtocht</h2>
          <p class="fst-italic">
            ^-^
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-play"></i> <strong>Genres:</strong> <span>
                    <?php $query = "SELECT genre FROM games";
                    $result = mysqli_query($con, $query);

                    if (!$result) {
                      echo "Error: " . mysqli_error($con);
                    }
                    $genres = array();

                    while ($row = mysqli_fetch_assoc($result)) {
                      $genre = $row['genre'];
                      $genres[] = $genre;
                    }
                    $splitGenres = array();

                    foreach ($genres as $genre) {
                      $splitGenres = array_merge($splitGenres, explode(",", $genre));
                    }
                    $genreCounts = array_count_values($splitGenres);
                    arsort($genreCounts);
                    $topGenres = array_slice(array_keys($genreCounts), 0, 5);
                    $topGenresString = implode(", ", $topGenres);
                    echo $topGenresString;
                    ?>

                  </span></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-map"></i> <strong>Location:</strong> <span>WorldWide</span></li>
              </ul>
            </div>
          </div>
          <p>
            <?php
            $filename = "assets/about_text.txt";
            echo convertMarkdownToHTML(file_get_contents($filename));
            ?>
          </p>
        </div>
      </div>
    </div>
  </section>


  <section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">
      

          <div class="full-width-block">
            <?php
            $filePath = "about.txt";

            function formatText($text)
            {
              $text = preg_replace("/\*(.*?)\*/", "<em>$1</em>", $text);
              $text = preg_replace("/\*\*(.*?)\*\*/", "<strong>$1</strong>", $text);
              $text = preg_replace("/__(.*?)__/", "<u>$1</u>", $text);

              return $text;
            }

            $content = formatText(file_get_contents($filePath));

            $lines = explode("\n", $content);
            foreach ($lines as $line) {
              if (preg_match("/^###/", $line)) {
                echo "<h3>" . substr($line, 3) . "</h4>";
              } elseif (preg_match("/^##/", $line)) {
                echo "<h2>" . substr($line, 2) . "</h3>";
              } elseif (preg_match("/^#/", $line)) {
                echo "<h1>" . substr($line, 1) . "</h2>";
              } else {
                echo "<p>" . $line . "</p>";
              }
            }
            ?>
      </div>

    </section>
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
