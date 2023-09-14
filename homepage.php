<?php
$jsonFile = 'products.json';
$productData = json_decode(file_get_contents($jsonFile), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="homepage.css">
    <title>Homepage</title>
    <style>
        
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="homepage.php">Price Tracker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trending_products.html" target="_blank">Trending Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="service.html">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_profile.html" target="_blank">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero text-center py-5">
    <div class="container">
        <h2>Track IT Product Prices with Ease</h2>
        <p>Find the best deals on your favorite IT products.</p>
        <form class="search-form">
            <div class="input-group mb-3">
                <input type="text" id="userInput" name="query" class="form-control" placeholder="Search Product...">
                <div class="input-group-append">
                    <button class="btn btn-dark" id="voiceButton" type="button" onclick="startVoiceInput()">
                        <i class="fas fa-microphone-alt"></i>
                    </button>
                    <button class="btn btn-dark" id="enterBtn" type="button" onclick="performSearch()">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="products">
    <div class="container">
        <div class="row">
            <?php
            // Loop through the product data and generate cards for each product
            foreach ($productData as $product) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $product['image_src']; ?>" alt="<?php echo $product['item_name']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $product['item_name']; ?></h3>
                        <p class="card-text">Price: <?php echo $product['price']; ?></p>
                        <a href="#" class="btn btn-dark">View Details</a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<footer class="bg-dark text-white text-center py-3">
    <p>&copy; <?php echo date("Y"); ?> Price Tracker. All rights reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
