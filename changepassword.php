<?php
include 'dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_email = $_POST['mail'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Check if the entered email matches any email in the database
    $sql = "SELECT email FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $entered_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $email = $user['email'];

        // Now that we have verified the email, check the old password and update the password
        $sql = "SELECT pw FROM users WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();

        if ($old_password == $user->pw) {
            $sql = "UPDATE users SET pw=? WHERE email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_password, $email);

            if ($stmt->execute()) {
                // Password changed successfully
                echo '<script>alert("Password changed successfully!");</script>';
            } else {
                // Error changing password
                echo '<script>alert("Error changing password.");</script>';
            }
        } else {
            // Old password does not match
            echo '<script>alert("Old password does not match.");</script>';
        }
    } else {
        // Email not found in the database
        echo '<script>alert("Email not found in the database.");</script>';
    }
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
            background-color: #f7f9fc;
            font-family: Arial, sans-serif;
        }

        .password-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .password-form h2 {
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="password-form">
            <h2 class="text-center">Change Password</h2>
            <form method="post" action="changepassword.php">
                <div class="form-group">
                    <label for="mail">Email:</label>
                    <input type="text" class="form-control" id="mail" name="mail" required>
                </div>

                <div class="form-group">
                    <label for="old_password">Old Password:</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" required>
                </div>

                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
