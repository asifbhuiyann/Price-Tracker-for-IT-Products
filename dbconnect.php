<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Database Connected";

?>
