<?php
require_once('../assets/includes/conn.php');
$pull = $conn->query('SELECT * FROM leerling');
$num = mysqli_num_rows($pull);
echo $num;
$llid = '18'; $gID = 1;
$conn->query("UPDATE leerling SET groep_ID='$gID' WHERE id='$llid'");
$pull = $conn->query('SELECT * FROM leerling');
?>