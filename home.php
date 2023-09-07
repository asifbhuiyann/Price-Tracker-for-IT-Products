<?php
    include 'dbconnect.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="homepage.css">
    <title>Homepage</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <h1>Price Tracker</h1>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="trending_products.html" target="_blank">Trending Products</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="service.html">Services</a></li>
                <li><a href="user_profile.html" target="_blank">Profile</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h2>Track IT Product Prices with Ease</h2>
        <p>Find the best deals on your favorite IT products.</p>
        <form class="search-form">
            <div class="chat-footer">
                <input type="text" id="userInput" name="query" placeholder="Search Product...">
                <button id="voiceButton" onclick="startVoiceInput()"><i class="fas fa-microphone-alt"
                        onclick="startVoiceInput()" @nbsp;></i></button><br><br>
                <button id="enterBtn" onclick="performSearch()"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </section>

    <section class="products">
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <h3>Product Name</h3>
            <p>Current Price: $X.XX</p>
            <p>Previous Price: $Y.YY</p>
            <a href="#">View Details</a>
        </div>
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <h3>Product Name</h3>
            <p>Current Price: $X.XX</p>
            <p>Previous Price: $Y.YY</p>
            <a href="#">View Details</a>
        </div>
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <h3>Product Name</h3>
            <p>Current Price: $X.XX</p>
            <p>Previous Price: $Y.YY</p>
            <a href="#">View Details</a>
        </div>
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <h3>Product Name</h3>
            <p>Current Price: $X.XX</p>
            <p>Previous Price: $Y.YY</p>
            <a href="#">View Details</a>
        </div>
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <h3>Product Name</h3>
            <p>Current Price: $X.XX</p>
            <p>Previous Price: $Y.YY</p>
            <a href="#">View Details</a>
        </div>
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <h3>Product Name</h3>
            <p>Current Price: $X.XX</p>
            <p>Previous Price: $Y.YY</p>
            <a href="#">View Details</a>
        </div>
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <h3>Product Name</h3>
            <p>Current Price: $X.XX</p>
            <p>Previous Price: $Y.YY</p>
            <a href="#">View Details</a>
        </div>
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <h3>Product Name</h3>
            <p>Current Price: $X.XX</p>
            <p>Previous Price: $Y.YY</p>
            <a href="#">View Details</a>
        </div>
        <!-- Add more product items -->
    </section>

    <footer>
        <p>&copy; 2023 Price Tracker. All rights reserved.</p>
    </footer>


        </div>
    </div>
    
</body>

</html>