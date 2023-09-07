<?php include 'dbconnect.php';
// Connect to the database

// Get the username and password from the POST request
$email = $_POST["email"];
$password = $_POST["password"];

// Check if the username and password exist in the database
$sql = "SELECT * FROM users WHERE email = :email AND password = :password";
$stmt = $db->prepare($sql);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":password", $password);
$stmt->execute();

// If the user exists, set the session variables and redirect to the home page
if ($stmt->rowCount() > 0) {
  $row = $stmt->fetch();
  $_SESSION["email"] = $row["email"];
  $_SESSION["logged_in"] = true;

  // Display a success message
  echo "<h3>Login successful!</h3>";
  header("Location: home.php");
} else {
  // Display an error message
  echo "<h3>Invalid username or password.</h3>";
}
?>