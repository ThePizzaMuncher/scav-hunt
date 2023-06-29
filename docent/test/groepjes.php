<?php
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
$sql = "SELECT ID, naam, groep_ID FROM leerling";
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
    echo $extraLeerlingen . " " ."EXTRA LEERLINGEN aan het begin";

    $startIndex = 0;

    for ($i = 0; $i < $aantalGroepjes; $i++) {
        $aantalLeerlingenInGroep = $aantalLeerlingenPerGroep;
        if ($extraLeerlingen > 0) {
            $aantalLeerlingenInGroep++;
            $extraLeerlingen--;
            echo $extraLeerlingen . " " ."EXTRA LEERLINGEN";
        }
        echo $startIndex . " " ."start index";
        echo $aantalLeerlingenInGroep . " " ."leerlingen in groep";
        $groep = array_slice($leerlingen, $startIndex, $aantalLeerlingenInGroep - 1);
        $startIndex += $aantalLeerlingenInGroep;
        
        // Voeg de groep toe aan de database
        foreach ($groep as $leerling) {
            $leerlingId = $leerling['ID'];
            $sql = "UPDATE leerling SET groep_ID = $i+1 WHERE ID = $leerlingId";
            $conn->query($sql);
        }
    }

    echo "De groepjes zijn succesvol gegenereerd en opgeslagen in de database.";
} else {
    echo "Er zijn geen leerlingen gevonden in de database.";
}

// Sluit de verbinding
$conn->close();
?>