<?php
include 'dbconnect.php';
$message = '';

// Check if the save button was clicked
if (isset($_POST['save'])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $mobile_number = $_POST["mobile_number"];
    $sex = $_POST["sex"];
    $birth_date = $_POST["birth_date"];
    $email = $_POST["email"];
    $password = $_POST["pw"];

    $sql = "INSERT INTO users (first_name, last_name, mobile_number, sex, birth_date, email, pw) 
    VALUES ('$first_name','$last_name', '$mobile_number', '$sex' ,'$birth_date', '$email','$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "Sign Up Successful";
        setcookie("user", $email, 0, "/"); // 0 means until the session ends
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: white;
        }

        .feedback-message {
            padding: 10px;
            background-color: #222;
            color: #00E676;
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: bold;
        }

        .title-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .title-text {
            font-size: 72px;
            text-align: left;
            font-weight: bold;
        }


        label,
        .btn-outline-light {
            color: black !important;
        }

        .card {
            border-radius: 10px;
        }

        .signup-card {
            padding: 20px;
            background-color: white;
            color: black;
        }

        .signup-title {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Price Tracker</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- Here's the change, from ml-auto to ms-auto -->
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light" href="login.php">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-2" href="about.php">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-2" href="service.php">SERVICES</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 title-section">
                <div class="title-text">
                    Price Tracker<br>For IT Products
                </div>
            </div>
            <div class="col-md-6">
                <!-- Feedback Message -->
                <?php if ($message) : ?>
                    <div class="feedback-message">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <!-- Signup Form -->
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card signup-card">
                            <div class="signup-title">
                                <h3>Complete Sign Up</h3>
                            </div>
                            <form action="signup.php" method="post" onSubmit="return validateForm()">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name:</label>
                                    <input type="text" id="firstName" name="first_name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name:</label>
                                    <input type="text" id="lastName" name="last_name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="mobileNumber" class="form-label">Mobile Number:</label>
                                    <input type="tel" id="mobileNumber" name="mobile_number" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="sex" class="form-label">Sex:</label>
                                    <select name="sex" class="form-control" required>
                                        <option value="">Select your sex</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="birth_date" class="form-label">Birth Date:</label>
                                    <input type="date" id="birth_date" name="birth_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" id="password" name="pw" class="form-control" required>
                                </div>

                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" name="save" class="btn btn-primary">Sign Up</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p>Already Have An Account? <a href="login.php" target="_blank">Log In</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function validateForm() {
            var firstName = document.getElementById("firstName");
            var lastName = document.getElementById("lastName");
            var mobileNumber = document.getElementById("mobileNumber");
            var sex = document.getElementById("sex");
            var birthDate = document.getElementById("birthDate");
            var email = document.getElementById("email");
            var password = document.getElementById("password");

            if (firstName.value === "") {
                alert("First name is required.");
                firstName.focus();
                return false;
            }

            if (lastName.value === "") {
                alert("Last name is required.");
                lastName.focus();
                return false;
            }

            if (mobileNumber.value === "") {
                alert("Mobile number is required.");
                mobileNumber.focus();
                return false;

            } else if (!/^\+?\d{10,12}$/.test(mobileNumber.value)) {
                alert("Invalid mobile number.");
                mobileNumber.focus();
                return false;
            }

            if (sex.value === "") {
                alert("Sex is required.");
                sex.focus();
                return false;
            }

            if (birthDate.value === "") {
                alert("Birth date is required.");
                birthDate.focus();
                return false;
            } else if (new Date(birthDate.value) > new Date()) {
                alert("Birth date cannot be in the future.");
                birthDate.focus();
                return false;
            }

            if (email.value === "") {
                alert("Email is required.");
                email.focus();
                return false;

            } else if (!/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i.test(email.value)) {
                alert("Invalid email address.");
                email.focus();
                return false;
            }

            if (password.value === "") {
                alert("Password is required.");
                password.focus();
                return false;
            } else if (password.value.length < 8) {
                alert("Password must be at least 8 characters long.");
                password.focus();
                return false;
            } else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/.test(password.value)) {
                alert("Password must contain at least one letter, one uppercase letter, and one number.");
                password.focus();
                return false;
            }

            return true;
        }
    </script>
</body>

</html>