<?php
$conn = new mysqli("localhost", "kartel", "bremankartel", "kartel");

if ($conn->connect_error) {
    die("Verbindingsfout: " . $conn->connect_error);
}
?>