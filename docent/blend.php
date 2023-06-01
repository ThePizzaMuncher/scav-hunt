<?php
require_once('../assets/includes/conn.php');
$namen = $conn->query('SELECT naam FROM leerling');
print_r($namen);
?>