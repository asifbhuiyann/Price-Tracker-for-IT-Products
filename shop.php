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
    <title>All Products</title>
    <style>
        
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

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
            <div class="col-md-3 mb-4">
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

<?php include 'footer.php'; ?>
</body>
</html>
