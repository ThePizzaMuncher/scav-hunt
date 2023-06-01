<?php
require_once('../assets/includes/conn.php');
$pull = $conn->query('SELECT * FROM leerling');
$num = mysqli_num_rows($pull);
echo $num;
?>