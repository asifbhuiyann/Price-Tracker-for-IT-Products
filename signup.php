<?php include 'dbconnect.php';

$message = ''; // Variable to store the success message

// Check if the save button was clicked
if (isset($_POST['save'])) {
    // Get the user's name and email address
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $mobile_number = $_POST["mobile_number"];
    $sex = $_POST["sex"];
    $birthDate = $_POST["birthDate"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Save the user's data to the database
    $sql = "INSERT INTO users (first_name, last_name, mobile_number, sex, birthDate, email, password) 
    VALUES ('$first_name','$last_name', '$mobile_number', '$sex' ,'$birthDate', $email',' $password')";

    if ($conn->query($sql) === TRUE) {
        $message = "New Data Inserted Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title style="height: 50px;">Record Insertion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            height: 100px;
        }
        .message {
            padding: 10px;
            /* background-color: #007bff; */
            color: #00897b;
            text-align: center;
            /* border: 1px solid #00897b; */
            margin-top: 20px;
            height: 100px;
            font-size: 30px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>New Record Insertion</h1>
    <?php 
    if ($message) { ?>
        <div class="message"><?php echo $message; ?></div>
    <?php } 
    ?>
</html>
