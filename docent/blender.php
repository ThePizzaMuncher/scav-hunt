<?php
function alertAndBack($content) {
    echo "<script>
    window.alert('$content');
    window.open('../', '_self');
    </script>";
    die();
    
}
session_start();

// Hier stonden de verbindingsgegevens voor de database
// Nu niet meer

// Aantal leerlingen per groep
$aantalLeerlingenPerGroep = 4;

// hier werd met de database verbonden
// nu niet meer

require '../assets/includes/conn.php';

// Haal de leerlingen op uit de database
$fetchStudents = "SELECT ID, naam, groep_ID FROM leerling WHERE opleiding_ID = $_SESSION[opleiding_ID]";
$result = $conn->query($fetchStudents);

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


    $conn->query("UPDATE leerling SET groep_ID = 0 WHERE opleiding_ID = $_SESSION[opleiding_ID]");
    $conn->query("DELETE FROM groep WHERE ID != 0 AND docent_ID = $_SESSION[docent_ID]"); // leeg de tabel met groepen
    
    for ($i = 0, $j = 1; $i < $aantalGroepjes; $i++, $j++) {
        $aantalLeerlingenInGroep = $aantalLeerlingenPerGroep;
        if ($extraLeerlingen > 0) {
            $aantalLeerlingenInGroep++;
            $extraLeerlingen--;
        }
        $docent = $_SESSION['docent_ID'];
        $tw = telwoord($j);
        $conn->query("INSERT INTO groep (ID,groepsnaam, docent_ID) VALUES ($j, '$tw', $docent)"); // make the group
        $groep = array_slice($leerlingen, $startIndex, $startIndex + $aantalLeerlingenInGroep);
        $startIndex += $aantalLeerlingenInGroep;
        
        // Voeg de groep toe aan de database
        foreach ($groep as $leerling) {
            $leerlingId = $leerling['ID'];
            $setGroup = "UPDATE leerling SET groep_ID = $j WHERE ID = $leerlingId";
            $conn->query($setGroup);
            // $conn->query($makeGroup, $setGroup);
        }
    }
    
    alertAndBack("De groepjes zijn succesvol gegenereerd en opgeslagen in de database.");
} else {
    alertAndBack("ERROR: Er zijn geen leerlingen gevonden in de database.");
}

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

// Sluit de verbinding
$conn->close();
?>