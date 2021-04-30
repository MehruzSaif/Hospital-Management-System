<?php 
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name='hms';

    $mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
    if($mysqli->connect_errno){
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        die();
    }
    
?>