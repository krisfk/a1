<?php

//Insert to db    
$dbhost  = "localhost:3307";
 $dbuser  = "root";
 $dbpass  = "";
 $dbname  = "meghongk_db3";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>