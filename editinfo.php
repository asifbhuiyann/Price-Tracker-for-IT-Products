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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
        }

        .custom-form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="custom-form">
            <form method="post" action="editinfo.php">
            <h2 class="text-center mb-4">Update Personal Details</h2>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="new_first_name" required>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="new_last_name" required>
                </div>

                <div class="form-group">
                    <label for="mobile_number">Mobile Number:</label>
                    <input type="tel" class="form-control" id="mobile_number" name="new_mobile_number" required>
                </div>

                <div class="form-group">
                    <label for="sex">Sex:</label>
                    <select class="form-control" id="sex" name="new_sex" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="birth_date">Date of Birth:</label>
                    <input type="date" class="form-control" id="birth_date" name="new_birth_date" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block" name="update">Update Details</button>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var message = "<?php echo $message; ?>";
        if (message) {
            alert(message);
        }
    </script>
</body>

</html>