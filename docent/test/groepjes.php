<?php
$conn = new mysqli("localhost", "kartel", "bremankartel", "kartel");

// Controleren op fouten bij het maken van de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tabel maken als deze nog niet bestaat
$table_name = 'nummers';
$sql_create_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT PRIMARY KEY, groep_ID INT)";
$conn->query($sql_create_table);

// Groep_ID toevoegen totdat de hele rij gevuld is
$row_size = 4; // Aantal kolommen in de tabel
$groep_ID = 1234;

// Het aantal keer dat de groep_ID moet worden herhaald
$repeat_count = ceil($row_size / 4);

for ($i = 0; $i < $repeat_count; $i++) {
    $sql_insert = "INSERT INTO $table_name (id, groep_ID) VALUES ($i+1, $groep_ID)";
    $conn->query($sql_insert);
}

// Databaseverbinding sluiten
$conn->close();
?>