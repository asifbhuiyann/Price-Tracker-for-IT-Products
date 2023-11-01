<?php
include 'dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // email and password sent from form

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pw']);


    $sql = "SELECT * FROM users WHERE email = '$email' and pw = '$password'";
    $result = mysqli_query($conn, $sql); // or die(mysqli_error($conn));
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Data found, you can fetch it
            echo '<script>alert("Email or Password is incorrect");</script>';;
        } else {
            echo '<script>alert("Email or Password is incorrect");</script>';
            // Query was successful, but no data was returned
        }
    } else {
        // Query failed
        echo "Error: " . mysqli_error($conn);
    }

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row) {
        $active = $row['active'];
    }

    $count = mysqli_num_rows($result);
    echo "$count";
    if ($count == 1) {
        // Store user data in session
        $_SESSION['user_data'] = $row;
    
        // Set a cookie that expires when the session ends
        setcookie("user", $email, 0, "/"); // 0 means until the session ends
    
        header("location: all_products.php"); // Redirect to welcome.php
    } else {
        $error = "Your Email or Password is invalid";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(45deg, #f5e7e4, #d7d2cc);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333;
        }

        .card {
            transition: transform .2s, box-shadow .2s;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .signin-prompt a {
            color: #555;
        }

        .signin-prompt a:hover {
            text-decoration: none;
            color: #333;
        }

        main {
            flex: 1;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(1rem);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: appear 0.5s forwards;
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Price Tracker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="service.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h2 class="mb-4 text-center">Welcome Back!</h2>
                        <p class="text-center text-muted">Sign in to continue your session.</p>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input type="email" id="email" name="email" class="form-control" required placeholder="example@domain.com">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="pw" class="form-control" required placeholder="Enter your password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </form>
                        <div class="mt-3 text-center signin-prompt">
                            <p>Forgot your password? <a href="forgot_password.php">Recover it here.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>