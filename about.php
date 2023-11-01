<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .section-title {
            font-weight: bold;
            font-size: 1.8rem;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        
        .section-subtitle {
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 20px;
        }
        
        .list-group-item {
            font-size: 1.1rem;
            padding: 15px 20px;
            border: none;
            background-color: transparent;
        }
        
        .list-group-item:before {
            content: '\f058'; /* FontAwesome check-circle */
            font-family: "Font Awesome 5 Free"; 
            padding-right: 10px;
            color: #007bff;
            font-weight: 900;
        }
    </style>
</head>

<body>
<?php include 'navbar.php'; ?>
<div class="container mt-5 mb-5">
    <div class="card border-0 shadow-lg p-4">
        <div class="card-body">
            <h1 class="section-title">About Price Tracking System</h1>
            <p class="mb-5">
                Welcome to the next-gen IT Product Price Tracker. Stay ahead with real-time pricing of a plethora of IT gadgets, ensuring smart, informed decisions.
            </p>
            <h4 class="section-subtitle"><strong>Features:</strong></h4>
            <p class="mb-4">
                Our tracker is an all-in-one tool offering real-time price tracking across a spectrum of IT products, from laptops to peripherals.
            </p>
            <h4 class="section-subtitle"><strong>How It Stands Out:</strong></h4>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">Scans a plethora of online platforms for up-to-date pricing.</li>
                <li class="list-group-item">Visualizes historical price trends to help you seize the right deal.</li>
                <li class="list-group-item">Receive alerts when prices drop to your desired threshold.</li>
                <li class="list-group-item">Seamless price comparisons across different platforms.</li>
                <li class="list-group-item">Intuitive dashboard for effortless price tracking and management.</li>
            </ul>
            <h4 class="section-subtitle"><strong>Benefits:</strong></h4>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">Automated tracking saves time.</li>
                <li class="list-group-item">Cost-efficient shopping ensures value for money.</li>
                <li class="list-group-item">Make informed purchases with historical price data.</li>
                <li class="list-group-item">Caters to tech enthusiasts, professionals, and everyday shoppers.</li>
                <li class="list-group-item">Stay ahead with real-time alerts on the latest deals.</li>
            </ul>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
