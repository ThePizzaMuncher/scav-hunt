<?php
require_once('../assets/includes/conn.php');
$pull = $conn->query('SELECT COUNT(naam) FROM leerling WHERE opleiding_ID = 1');
while($row = $pull->fetch_assoc()) echo $row;

?>