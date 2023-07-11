<?php
require_once("../assets/includes/header.php");
if (!isset($_SESSION['docent'])) {
	header('location:../login'); die();
} if (!$_SESSION['docent']) {
	header('location:../login'); die();
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docenten pagina</title>
    <script src="../assets/js/libs/OL_lib/OpenLayers.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><!-- Ajax -->
    <script src="../assets/js/docent.js" defer></script>
    <link rel="stylesheet" href="../assets/css/koter_analyzer.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">
        <div class="docent-information">
            <div id="map" class="mapvoorkoters"></div>
        </div>
    </section>
</section>
<?php require_once("../assets/includes/footer.php"); ?>