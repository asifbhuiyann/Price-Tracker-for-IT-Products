<?php
include 'dbconnect.php';
session_start();

// Get the email of the logged in user
$email = $_SESSION['user_data']['email'];

// SQL query to fetch first name and last name from the users table for the logged in user
$sql = "SELECT first_name, last_name FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $Name = $row["first_name"] . ' ' . $row["last_name"];
    }
} else {
    echo "No results for the current user";
}

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Featured Products</title>
    <style>
        #searchResults{
            background-color: gray;
            color: white;
            border-radius: 5px;
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
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php">Profile</a>
                    </li>

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
                        <input type="text" id="userInput" name="query" class="form-control" placeholder="Search Product..."><br>

                        <div class="input-group-append">
                            <button class="btn btn-dark" id="voiceButton" type="button" onclick="startVoiceInput()">
                                <i class="fas fa-microphone-alt"></i>
                            </button>
                            <button class="btn btn-dark" id="enterBtn" type="button" onclick="performSearch()">
                                <i class="fas fa-search"></i><br>
                            </button>
                        </div>
                    </div>
                    <div id="searchResults"></div>
                </form>
        </div>
    </section>

    <section class="products">
    <div class="container">
    <div class="row">
        <?php foreach ($productData as $product) { ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="<?php echo $product['img_src']; ?>" alt="<?php echo $product['item_name']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $product['item_name']; ?></h3>
                        <p class="card-text">Price: <?php echo $product['price']; ?></p>
                        <a href="<?php echo $product['view_details']; ?>" class="btn btn-dark">View Details</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</section>
    <?php include 'footer.php'; ?>
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

        document.addEventListener("DOMContentLoaded", function() {
            const userInput = document.getElementById("userInput");
            const enterBtn = document.getElementById("enterBtn");
            const searchResults = document.getElementById("searchResults");

            enterBtn.addEventListener("click", performSearch);

            function performSearch() {
                const query = userInput.value.trim().toLowerCase();
                if (query === "") {
                    searchResults.innerHTML = "Please enter a search query.";
                    return;
                }

                // Perform an AJAX request to a PHP script to fetch data from the database
                fetch("fetch_data.php?query=" + encodeURIComponent(query))
                    .then(response => response.json())
                    .then(data => {
                        if (data.length === 0) {
                            searchResults.innerHTML = "No matching products found.";
                        } else {
                            const resultHTML = data.map(product => `<div>${product.item_name}</div>`).join("");
                            searchResults.innerHTML = resultHTML;
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching data:", error);
                        searchResults.innerHTML = "An error occurred while fetching data.";
                        searchResults.style.backgroundColor = "initial";
                    });
            }
        });
    </script>
</body>

</html>