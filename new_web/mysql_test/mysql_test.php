<?php



$servername = "localhost";
$username = "a1drivin_tusr";
$password = "tEdY5Dvl!9D.";



// $conn = mysql_connect($servername, $username, $password) or die('Error with MySQL connection');
// die();
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected testing successfully";
?>

