<?php
require_once('../assets/includes/conn.php');
$pull = $conn->query('SELECT COUNT(naam) FROM leerling WHERE opleiding_ID = 1')->fetch_array();
echo $pull[0];

?>