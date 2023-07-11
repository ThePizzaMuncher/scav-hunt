<?php
require_once("../includes/conn.php");
if (isset($_GET["code"]) && $_GET["code"] == "gi3yhk3rKNRLO73g_8" && isset($_SESSION["docent_ID"])) {
    $docentID = $_SESSION["docent_ID"];
    $query = "SELECT * FROM groep WHERE docent_ID = $docentID";
    $pull = $conn->query($query);
    $counter = 0;
    while ($row = $pull->fetch_assoc()) {//Telt aantal entries...
        if ($row["ID"] == 0) {//Standaart groep willen we niet.
            continue;//Sla deze over.
        }
        ++$counter;
    }
    $output = "";
    $pull = $conn->query($query);
    $counter2 = 0;
    while ($row = $pull->fetch_assoc()) {
        ++$counter2;
        if ($row["ID"] == 0) {//Standaart groep willen we niet.
            continue;//Sla deze over.
        }
        $output .= "(_)";
        $output .= $row["groepsnaam"] . ",";
        $output .= $row["current_vraag"] . ",";
        $output .= $row["score"];
        if (!$counter == $counter2) {//Als 
            $output .= "(_)";
        }
    }
    echo $output;
}
?>