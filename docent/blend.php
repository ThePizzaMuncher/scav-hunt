<?php
require_once('../assets/includes/conn.php');
// $pull = $conn->query('SELECT naam FROM leerling');

$nummer = mysqli_query($conn, 'SELECT COUNT(ID) FROM leerling');
echo $nummer;
?>