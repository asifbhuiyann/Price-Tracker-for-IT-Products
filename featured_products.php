<?php
include 'dbconnect.php';

$sql = "SELECT first_name, last_name FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $Name = $row["first_name"] . ' ' . $row["last_name"];
    }
} else {
    echo "0 results";
}

$jsonFile = 'trending_products.json';
$productData = json_decode(file_get_contents($jsonFile), true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Featured Products</title>
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

    <section class="hero text-center py-5">
        <div class="container">
            <section class="welcome">
                <h4>Welcome <?php echo $Name; ?></h4>
                <p>We're glad you're here! <br>Find the best deals on your favorite IT products.</p>
                <br><br>
                <h2>Featured Products</h2>
                <br>
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