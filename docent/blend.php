<?php
require_once('../assets/includes/conn.php');
$pull = $conn->query('SELECT COUNT(*) FROM leerling WHERE opleiding_ID = 1 as total from leerling');
$data = $pull->fetch_assoc();
echo $data['total'];

?>