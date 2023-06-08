<?php
// include mysql database configuration file
include_once '../../assets/includes/conn.php';
 
if (isset($_POST['submit'])){
 
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)){
        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
        // Skip the first line
        fgetcsv($csvFile);
 
        // Parse data from CSV file line by line
        // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE){
            // Get row data
            $naam = $getData[0];
            $opleiding = $getData[1];
            $leerjaar = $getData[2];
            $groep_ID = '0';
 
            // If user already exists in the database with the same email
            //$query = "SELECT id FROM leerling WHERE email = '" . $getData[1] . "'";
 
            //$check = mysqli_query($conn, $query);
 
            //if ($check->num_rows > 0){
              //  mysqli_query($conn, "UPDATE leerling SET name = '" . $naam . "', leerjaar = '" . $leerjaar . "', groep_ID = '" . $groep_ID . "', created_at = NOW() WHERE email = '" . $opleiding . "'");
            //}else{
                mysqli_query($conn, "INSERT INTO leerling (naam, opleiding, leerjaar, groep_ID) VALUES ('" . $naam . "', '" . $opleiding . "', '" . $leerjaar . "', '" . $groep_ID . "')");
 
           // }
        }
 
        // Close opened CSV file
        fclose($csvFile);
 
        header("Location: index.php");
         
    }else{
        echo "Please select valid file";
    }
}
?>