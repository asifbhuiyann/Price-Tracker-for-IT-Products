<?php
// Include the database connection file
include 'dbconnect.php';

// Process the form data if it has been submitted
if (isset($_POST['save'])) {
    // Get the email address from the form
    $email = $_POST['email'];

    // Check if the email address is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // The email address is not valid
        echo "Please enter a valid email address.";
    } else {
        // Check if the email exists in the database
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // The email exists in the database
            // Generate a one-time reset key
            $resetKey = bin2hex(random_bytes(16));

            // Store the reset key in the database for this user
            $updateResetKeySql = "UPDATE users SET reset_key = '$resetKey' WHERE email = '$email'";
            $conn->query($updateResetKeySql);

            // Construct the reset link
            $resetLink = "https://shadmantaqi.xyz/changepassword.php?key=$resetKey";

            // Send a password reset email to the user
            $to = $email;
            $subject = "Password Reset Requested";
            $message = "Click the following link to reset your password: <a href='" . $resetLink . "'>Click to change password</a>";
            $headers = "From: Price-Alert@shadmantaqi.xyz";

            mail($to, $subject, $message, $headers);
            echo '<script>alert("An email with instructions to reset your password has been sent to your email address.");</script>';
        } else {
            // The email does not exist in the database
            echo '<script>alert("This email is not associated with any account. Please create a new account.");</script>';
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title text-center">Find your Price Tracker Account</h1>
                        <p class="text-center">Enter the Email Associated With Your Account to Change Password.</p>
                        <form action="forgot_password.php" method="post">
                            <div class="mb-3">
                                <label for="emailAddress" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="emailAddress" name="email" aria-describedby="emailHelp" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="save">Receive Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
