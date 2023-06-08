<?php
// Load the database configuration file
include_once '../../assets/includes/conn.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array(
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
             'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $naam   = str_replace(';', '',$data[0]);
                $opleiding  = str_replace(';', '',$data[1]);
                $leerjaar  = str_replace(';', '',$data[2]);
                $groep_ID = str_replace(';', '',$data[3]);
                echo $naam . $opleiding . $leerjaar . $groep_ID;
                // Check whether member already exists in the database with the same email
               /* $prevQuery = "SELECT id FROM leerling WHERE groep_ID = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE members SET name = '".$naam."', leerjaar = '".$leerjaar."', status = '".$groep_ID."', modified = NOW() WHERE email = '".$email."'");
                }else{
                    // Insert member data in the database
                    */
                $conn->query("INSERT INTO leerling (naam, opleiding, leerjaar, groep_ID) VALUES ('$naam', '$opleiding', $leerjaar,$groep_ID)");
              //  }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
//header("Location: index.php".$qstring);