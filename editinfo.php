<?php
include 'dbconnect.php';

$sql = "SELECT email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $Email = $row["email"];
    }
} else {
    echo "0 results";
}

if (isset($_POST['update'])) {
    // Get the user's name and email address
    $new_first_name = $_POST["new_first_name"];
    $new_last_name = $_POST["new_last_name"];
    $new_mobile_number = $_POST["new_mobile_number"];
    $new_sex = $_POST["new_sex"];
    $new_birth_date = $_POST["new_birth_date"];

    // Save the user's data to the database
    $sql = "UPDATE users SET first_name='$new_first_name', last_name='$new_last_name', mobile_number='$new_mobile_number', sex='$new_sex', birth_date='$new_birth_date' WHERE email='$Email'";
    if ($conn->query($sql) === TRUE) {
        $message = "Information Successfully Updated";
    } else {
        echo "Error Updating Information: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>


<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Update Personal Details</h2>
    <form method="post" action="editinfo.php">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="new_first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="new_last_name" required>

        <label for="mobile_number">Mobile Number:</label>
        <input type="tel" id="mobile_number" name="new_mobile_number" required>

        <label for="sex">Sex:</label>
        <select id="sex" name="new_sex" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="birth_date">Date of Birth:</label>
        <input type="date" id="birth_date" name="new_birth_date" required>
        <br><br>
        <input type="submit" name="update" value="Update Details">
    </form>


    <script>
        var message = "<?php echo $message; ?>";
        if (message) {
            alert(message);
        }
    </script>
</body>

</html>