<?php
$dbhost = "localhost"; // Default XAMPP host
$dbuser = "root"; // Default XAMPP username
$dbpass = "";     // Default XAMPP password is empty
$dbname = "rasas"; // Your database name

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$con){
    die("connection failed". mysqli_connect_error());
}else{
   
}
?>