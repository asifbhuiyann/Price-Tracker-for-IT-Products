<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        main {
            flex: 1;
        }

        .card {
            border-radius: 10px;
        }

        .list-group-item {
            border-radius: 8px;
            margin: 5px 0;
            transition: background-color 0.3s;
        }

        .list-group-item:hover {
            background-color: #f0f0f0;
        }

        h4 {
            color: #007BFF;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <main>
        <div class="container mt-5 mb-5">
            <div class="card border-0 shadow p-4">
                <div class="card-body">
                    <h1 class="card-title mb-4">Our Exclusive Services</h1>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h4>User Accounts & Syncing</h4>
                            <p>With user accounts, sync your tracked products and settings seamlessly across multiple devices.</p>
                        </li>
                        <li class="list-group-item">
                            <h4>Real-Time Price Monitoring</h4>
                            <p>We continuously monitor product prices from various retailers, ensuring you have the latest pricing info.</p>
                        </li>
                        <li class="list-group-item">
                            <h4>Price History Insights</h4>
                            <p>Observe product price trends with our historical data, and make informed buying decisions.</p>
                        </li>
                        <li class="list-group-item">
                            <h4>Instant Price Drop Alerts</h4>
                            <p>Set your desired price, and we'll notify you the moment it's met. Never miss a deal again.</p>
                        </li>
                        <li class="list-group-item">
                            <h4>Product Availability Updates</h4>
                            <p>Stay informed when a product is back in stock or newly released. Don't miss out on limited stocks!</p>
                        </li>
                        <li class="list-group-item">
                            <h4>Comprehensive Product Reviews</h4>
                            <p>Benefit from aggregated reviews and ratings. Our goal is to help you purchase beyond just price factors.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>
