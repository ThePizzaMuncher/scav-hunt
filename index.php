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

  <section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">
      <!-- Video loop -->
      <div class="video-container">
        <video autoplay loop muted>
          <source src="assets/mp4/Leeuwarden.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      
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
