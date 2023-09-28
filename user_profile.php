<?php
    // Include your database connection file
    include 'dbconnect.php';

    // SQL query to fetch name and email from the users table
    $sql = "SELECT first_name, last_name, mobile_number, sex, email FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $Name = $row["first_name"] . ' ' . $row["last_name"];
            $Email = $row["email"];
            $Mobile =$row["mobile_number"];
            $Sex =$row["sex"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/user_profile.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Profile</title>
    <style>
        body{
            background-color: rgb(128, 128, 128);
        }
        .card{
            background-color: rgb(35, 39, 43);
            border-radius: 10px;
            margin-top: 100px;
        }
        .info{
            color: white;
        }
        h1{
            text-align: center;
            color: white;
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
                    <a class="nav-link" href="shop.php">All Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="featured_products.php">Trending Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="service.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_profile.php">Profile</a>

            </ul>
        </div>
    </div>
</nav>

<section class="hero">
        <div class="container mt-4 mb-4 p-3">
            <div class="card p-4">
                <h1>Personal Details</h1>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <!-- Display fetched user data -->
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                        <span class="info">Name: <?php echo $Name; ?></span>
                    </div>
                    
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                        <span class="info">Email: <?php echo $Email; ?></span>
                    </div>

                    <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                        <span class="info">Mobile Number: <?php echo $Mobile; ?></span>
                    </div>
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                        <span class="info">Sex : <?php echo $Sex; ?></span>
                    </div>
                    <div class="d-flex mt-2">
                        <button class="btn btn-dark" style="border-radius: 5px;">
                        <a id="pcng" href="editinfo.php">Edit Informations</a>
                    </button>
                    </div>
                    <br>
                    <div class="d-flex mt-2">
                        <button class="btn btn-dark" style="border-radius: 5px;">
                            <a id="pcng" href="changepassword.php">Change Password</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
