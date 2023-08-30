<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    // echo "Database Connected ";
?>