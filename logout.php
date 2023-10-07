<?php include 'dbconnect.php';

session_start();

if (isset($_SESSION['email'])) {
    // Unset all of the session variables
    $_SESSION = array();

    session_destroy();

    header("Location: login.php");
    exit(); 
} 
else {

    header("Location: login.php");
    exit();
}
