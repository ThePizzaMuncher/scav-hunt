<?php
session_start();
if (!isset($_SESSION['docent'])) {
	header('location:../login'); die();
} if (!$_SESSION['docent']) {
	header('location:../login'); die();
}

require_once('../assets/includes/header.php');
require_once('../assets/includes/conn.php');

?>

<head id="pagina_blender">
	<title>Groepjes maken</title>
	<script src="../js/blender.js" defer></script><!-- Blender code -->
</head>
<body>
  <section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">
      <h3 class="panel-title">Blender wzhh!!...</h3>
      <form method="post" action="">
        <div class="input-group">
          <button type="button" class="minus-button" onclick="decrementValue(this)">-1</button>
          <input type="number" placeholder="Aantal groepjes" name="ag" min="0" value="0" id="ag">
          <button type="button" class="plus-button" onclick="incrementValue(this)">+1</button>
        </div>
        <div class="input-group">
          <button type="button" class="minus-button" onclick="decrementValue(this)">-1</button>
          <input type="number" placeholder="Aantal mensen in groepje" name="amig" min="0" value="0" id="amig">
          <button type="button" class="plus-button" onclick="incrementValue(this)">+1</button>
        </div>
        <button type="submit"><p>Genereer groepjes</p></button>
      </form>
    </section>
  </section> <!-- End About Section -->
</body>

<?php
	$leerlingen = mysqli_query($conn, 'SELECT * FROM leerling');
	include "../assets/includes/footer.php"
?>