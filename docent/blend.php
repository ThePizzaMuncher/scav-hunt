<?php
require_once('../assets/includes/conn.php');
$pull = $conn->query('SELECT naam FROM leerling');

$nummer = $conn->query('SELECT COUNT(naam) FROM leerling');
echo $nummer;
?>