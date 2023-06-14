<?php
require_once('../assets/includes/conn.php');
$pull = $conn->query('SELECT naam FROM leerling WHERE opleiding_ID = 1');
$lln;
while($row = mysqli_fetch_assoc($pull)) {
	array_push($lln, $row);
} echo count($lln);
?>