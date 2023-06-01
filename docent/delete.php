<?php
/* 
 delete.PHP
 Deletes a specific entry from the 'leerling' table
 Docent can delete a student
*/

 // connect to the database
 include('database.php');
 

 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysqli_query($conn, "DELETE FROM leerling WHERE id=$id")
 
 or die(); 
 
 // redirect back to the view page
 header("Location: index.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: index.php");
 }
 
?>