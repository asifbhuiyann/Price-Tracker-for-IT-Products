<?php
include 'dbconnect.php';
session_start();

$productSql = "SELECT img_src, item_name, price, view_details FROM product_details";
$productResult = $conn->query($productSql);

// Create an empty array to store product data
$productData = [];

if ($productResult->num_rows > 0) {
    // Loop through the product details and store them in the $productData array
    while ($productRow = $productResult->fetch_assoc()) {
        $productData[] = $productRow;
    }
} else {
    echo "No products found in the database";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="homepage.css">
    <title>Explore IT Products</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .hero {
            background-color: #007BFF;
            color: #fff;
        }

        .card {
            border-radius: 10px;
            transition: all .3s;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .card-text {
            font-size: 1.1em;
            transition: font-size .3s;
        }

        .card:hover .card-text {
            font-size: 1.2em;
        }

        .btn-dark {
            border-radius: 20px;
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
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dev_info.php">Developer</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero text-center py-5">
    <div class="container">
        <h2>Discover the Best in IT Products</h2>
        <p>Get the top deals and stay updated on your favorite tech gear.</p>

    </div>
</section>

<section class="products bg-light py-5">
    <div class="container">
        <div class="row">
        <?php
                // Loop through the product data and generate cards for each product
                foreach ($productData as $product) {
                ?>
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            <img src="<?php echo $product['img_src']; ?>" alt="<?php echo $product['item_name']; ?>" class="card-img-top">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-3"><?php echo $product['item_name']; ?></h5>
                                <p class="card-text flex-grow-1">Price: <?php echo $product['price']; ?></p>
                                <a href="<?php echo $product['view_details']; ?>" class="btn btn-dark mt-3 align-self-center">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
            ?>
        </div>
    </div>
</section>
<script>
        // Initialize variables
        const voiceButton = document.getElementById('voiceButton');
        const searchInput = document.getElementById('userInput');

        let isListening = false;
        let recognition;

        // voice input
        function toggleVoiceRecognition() {
            if (!isListening) {
                isListening = true;
                searchInput.placeholder = 'Listening...';
                recognition = new webkitSpeechRecognition() || new SpeechRecognition();
                recognition.lang = 'en-US';

                recognition.onresult = function(event) {
                    const result = event.results[0][0].transcript;
                    searchInput.value = result;
                    isListening = false;
                    searchInput.placeholder = '';
                };

                recognition.onend = function() {
                    isListening = false;
                    searchInput.placeholder = '';
                };

                recognition.start();
                voiceButton.style.color = 'red';
            } else {
                isListening = false;
                searchInput.placeholder = '';
                recognition.stop();
            }
        }
        // Add click event listener to the voice button
        voiceButton.addEventListener('click', toggleVoiceRecognition);

    </script>
<?php include 'footer.php'; ?>

</body>
</html>
