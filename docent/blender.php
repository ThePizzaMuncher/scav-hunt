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

<head>
	<title>Groepjes maken</title>
	<script src="../assets/js/blender.js" defer></script><!-- Blender code -->
</head>
<body id="pagina_blender">
  <section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">
      <h3 class="panel-title">Blender wzhh!!...</h3>
      <form method="post" action="">
        <div class="input-group" id="ag">
			<p>Aantal groepjes</p>
          <button type="button" class="minus-button" onclick="decrementValue(this)">-1</button>
          <input type="number" name="ag" min="0" value="0">
          <button type="button" class="plus-button" onclick="incrementValue(this)">+1</button>
        </div>
        <div class="input-group" id="amig">
		<p>Aantal mensen in groepje</p>
          <button type="button" class="minus-button" onclick="decrementValue(this)">-1</button>
          <input type="number" name="amig" min="0" id="amig" value="0">
          <button type="button" class="plus-button" onclick="incrementValue(this)">+1</button>
        </div>
        <button type="submit"><p>Genereer groepjes</p></button>
      </form>
    </section>
  </section> <!-- End About Section -->

  <script>//For value input form
    function incrementValue(button) {
      var input = button.parentNode.querySelector('input[type="number"]');
      var value = parseInt(input.value);
      input.value = value + 1;
    }

    function decrementValue(button) {
      var input = button.parentNode.querySelector('input[type="number"]');
      var value = parseInt(input.value);
      if (value > 0) {
        input.value = value - 1;
      }
    }
  </script>
</body>

<?php
	$leerlingen = mysqli_query($conn, 'SELECT * FROM leerling');
	include "../assets/includes/footer.php"
?>