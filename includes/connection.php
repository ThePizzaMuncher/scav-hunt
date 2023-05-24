<?php
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 1);

    $server = "";
    $username = "";
    $password = "";
    $dbname = "";

    try {
        $con = mysqli_connect($server, $username, $password);
        
        if (!$con) {
            throw new Exception("Error while connecting: " . mysqli_connect_error());
        }

        mysqli_select_db($con, $dbname) or die("Cannot select DB");

    } catch (Exception $e) {
        echo "Stupid error (👉ﾟヮﾟ)👉 " . $e->getMessage();
    }
        
    // Check cookie
    if (isset($_COOKIE['visitor_id'])) {
        // Use existing visitor ID from cookie
        $visitor_id = $_COOKIE['visitor_id'];
        } else {
        // Create new cookie for new visitor
        $visitor_id = uniqid();
        setcookie('visitor_id', $visitor_id, time() + 86400 * 365, '/');
        }