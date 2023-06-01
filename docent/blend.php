<?php
require_once('../assets/includes/conn.php');
$namen = $conn->query('SELECT naam FROM leerling');
echo $namen['num_rows'];
?>