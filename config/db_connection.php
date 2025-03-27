<?php
$dbhost = "localhost";
$dbuser = "root"; // Default XAMPP username
$dbpass = "";     // Default XAMPP password is empty
$dbname = "rasas"; // Your database name

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "Connected successfully";
}
?>
