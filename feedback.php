<?php
include 'dbconnect.php';
if (isset($_POST['save'])) {
    $name = $_POST["naam"];
    $email = $_POST["email"];
    $message = $_POST["feedback"];

    $sql = "INSERT INTO feedback (naam, email, feedback) 
    VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $message = "Feedback Sent";
    
        // Set a cookie that expires when the session ends
        setcookie("user", $email, 0, "/"); // 0 means until the session ends

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Feedback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f8;
        }

        main {
            flex: 1;
            padding-bottom: 30px;
        }

        h1 {
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        }

        button.btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 25px;
            font-weight: 600;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="all_products.php">Price Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="all_products.php">All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">LogOut</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 form-container">
                <div class="text-center mb-4">
                    <h1>Give Feedback</h1>
                    <hr class="bg-dark">
                </div>
                <form action="feedback.php" method="post">
                    <div class="form-group mb-4">
                        <input type="text" class="form-control" placeholder="Your Name" name="naam">
                    </div>
                    <div class="form-group mb-4">
                        <input type="email" class="form-control" placeholder="Your Email" name="email">
                    </div>
                    <div class="form-group mb-4">
                        <textarea class="form-control" placeholder="Your Message Here" name="feedback" rows="6"></textarea>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">SEND</button>
                </form>
            </div>
        </div>
    </div>
</main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var message = "<?php echo $message; ?>";
        if (message) {
            alert(message);
        }
    </script>
    <?php include 'footer.php';?>
</body>
</html>
