<?php
require_once('../assets/includes/conn.php');
$pull = $conn->query('SELECT COUNT(naam) FROM leerling WHERE opleiding_ID = 1');
echo $pull['COUNT(naam)'];

?>