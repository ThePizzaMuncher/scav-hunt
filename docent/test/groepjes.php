<?php
session_start();
// Verbindingsgegevens voor de database
$servername = "localhost";
$username = "kartel";
$password = "bremankartel";
$dbname = "kartel";

// Aantal leerlingen per groep
$aantalLeerlingenPerGroep = 4;

// Maak een nieuwe databaseverbinding
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Verbindingsfout: " . $conn->connect_error);
}

// Haal de leerlingen op uit de database
$sql = "SELECT ID, naam, groep_ID FROM leerling WHERE opleiding_ID = $_SESSION[opleiding_ID]";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $leerlingen = array();

    // Voeg de leerlingen toe aan een array
    while ($row = $result->fetch_assoc()) {
        $leerlingen[] = $row;
    }

    // Randomize de volgorde van de leerlingen
    shuffle($leerlingen);

    // Bereken het aantal groepjes en extra leerlingen
    $aantalLeerlingen = count($leerlingen);
    $aantalGroepjes = floor($aantalLeerlingen / $aantalLeerlingenPerGroep);
    $extraLeerlingen = $aantalLeerlingen % $aantalLeerlingenPerGroep; 

    $startIndex = 0;

    // (hopefully opsolete) code for making the groups
    /* for ($i = 0; $i < $aantalGroepjes; ++$i) {
        $query = "INSERT INTO groep (ID, docent_ID, groepsnaam) VALUES ('$i', '$_SESSION[opleiding_ID]', '" . telwoord($i) . "')";
		$conn->query($query); // create groups
    } */


    $conn->query("UPDATE leerling SET groep_ID = 0 WHERE opleiding_ID = $_SESSION[opleiding_ID]");
    $conn->query('DELETE FROM groep WHERE ID != 0'); // leeg de tabel met groepen
    
    for ($i = 0, $j = 1; $i < $aantalGroepjes; $i++, $j++) {
        $aantalLeerlingenInGroep = $aantalLeerlingenPerGroep;
        if ($extraLeerlingen > 0) {
            $aantalLeerlingenInGroep++;
            $extraLeerlingen--;
        }
        $makeGroup = "INSERT INTO groep (ID, groepsnaam, docent_ID) VALUES ('$j', '" . telwoord($j) . "', '$_SESSION[opleiding_ID]')";
        $conn->query($makeGroup); // make the group
        $groep = array_slice($leerlingen, $startIndex, $startIndex + $aantalLeerlingenInGroep - 1);
        $startIndex += $aantalLeerlingenInGroep;
        
        // Voeg de groep toe aan de database
        foreach ($groep as $leerling) {
            $leerlingId = $leerling['ID'];
            $setGroup = "UPDATE leerling SET groep_ID = $j WHERE ID = $leerlingId";
            $conn->query($setGroup);
            // $conn->query($makeGroup, $setGroup);
        }
    }
    
    echo "De groepjes zijn succesvol gegenereerd en opgeslagen in de database.";
} else {
    echo "Er zijn geen leerlingen gevonden in de database.";
}

// Sluit de verbinding
$conn->close();

function telwoord(int $nummer) {
	switch($nummer) {
		case 1: return 'één';
		case 2: return 'twee';
		case 3: return 'drie';
		case 4: return 'vier';
		case 5: return 'vijf';
		case 6: return 'zes';
		case 7: return 'zeven';
		case 8: return 'acht';
		case 9: return 'negen';
		case 10: return 'tien';
		case 11: return 'elf';
		case 12: return 'twaalf';
		case 13: return 'dertien';
		case 14: return 'veertien';
		case 15: return 'vijftien';
		default: return $nummer;
	}
}
?>