<?php
include 'dbconnect.php';

session_start();

// Get the email of the logged-in user
$email = $_SESSION['user_data']['email'];

// SQL query to fetch first name and last name from the users table for the logged-in user
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

// Check if the "Favorite" action is triggered (for example, by clicking a button)
if (isset($_POST['favorite']) && isset($_POST['img_src']) && isset($_POST['item_name']) && isset($_POST['price']) && isset($_POST['view_details'])) {
    // Get the product details
    $img_src = $_POST['img_src'];
    $item_name = $conn->real_escape_string($_POST['item_name']);
    $price = $_POST['price'];
    $view_details = $_POST['view_details'];

    // Check if the product is already in the user's favorite list
    $checkQuery = "SELECT * FROM fav_prod WHERE img_src = '$img_src' AND user_email = '$email'";
    $checkResult = $conn->query($checkQuery);
    
    if ($checkResult->num_rows > 0) {
        $_SESSION['message'] = "$item_name is already in your favorite list!";
        $_SESSION['msg_type'] = "warning";
    } else {
        // Insert the product into the fav_prod table with user's email
        $insertQuery = "INSERT INTO fav_prod (img_src, item_name, price, view_details, user_email) VALUES ('$img_src', '$item_name', $price, '$view_details', '$email')";
        $result = $conn->query($insertQuery);
        
        if ($result) {
        $_SESSION['message'] = "Product added to favourites!";
        $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['message'] = "Failed to add the product to favorites!";
            $_SESSION['msg_type'] = "danger";
    }
    }



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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>All Products</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .navbar-brand {
            font-weight: 600;
        }

        .hero {
            background: linear-gradient(45deg, #d7d2cc, #f5e7e4);
            color: #333;
        }

        .hero h4 {
            font-weight: 600;
        }

        .hero h2 {
            font-weight: 700;
        }

        #searchResults {
            background-color: #333;
            color: white;
            border-radius: 5px;
            padding: 1rem;
            margin-top: 1rem;
            display: none;
            /* Hidden by default */
        }

        #searchResults.show {
            display: block;
        }

        .product-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
        }

        .icon-btn {
            color: #ffffff;
            /* White text */
            background-color: #000000;
            /* Black background */
            padding: 5px;
            display: inline-block;
            text-align: center;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            margin-right: 5px;
            width: 70px;
            /* A fixed width to ensure consistency */
            font-size: 0.7rem;
        }

        .icon-btn i {
            display: block;
            /* This makes the icon appear above the text */
            margin-bottom: 2px;
            /* Space between the icon and the text */
            font-size: 1rem;
        }

        .icon-btn:hover {
            background-color: #333333;
            /* Darker gray on hover */
        }

        .icon-btn:hover,
        .icon-btn:hover i {
            color: #ffffff;
            /* Keeps the text and the icon white on hover */
            text-decoration: none;
            /* Removes any underline on hover */
        }
        
                .icon-btnA {
            color: #ffffff;
            /* White text */
            background-color: #000000;
            /* Black background */
            padding: 5px;
            display: inline-block;
            text-align: center;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            width: 250px;
            /* A fixed width to ensure consistency */
            font-size: 1rem;
        }

        .icon-btnA i {
            display: block;
            /* This makes the icon appear above the text */
            margin-bottom: 2px;
            /* Space between the icon and the text */
            font-size: 1rem;
        }

        .icon-btnA:hover {
            background-color: #333333;
            /* Darker gray on hover */
        }

        .icon-btnA:hover,
        .icon-btnA:hover i {
            color: #ffffff;
            /* Keeps the text and the icon white on hover */
            text-decoration: none;
            /* Removes any underline on hover */
        }

        .products h5.card-title {
            font-weight: 600;
        }

        .products p.card-text {
            font-size: 1rem;
            font-weight: 500;
        }

        .price-section {
            display: flex;
            align-items: center;
            justify-content: center;
            /* This will horizontally center the children */
            gap: 0.5rem;
        }

        .product-price {
            font-size: 1rem;
            font-weight: 500;
        }

        .fas.fa-money-bill-wave {
            font-size: 1.2rem;
            color: green;
            /* or any other color you prefer */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            /* stack child elements vertically */
            justify-content: space-between;
            /* evenly distribute available space between children */
        }

        .product-card {
            position: relative;
        }

        .btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* This centers the button. */
        }

        #view_details {
            margin-top: 230px;
            color: #ffffff;
            /* White text */
            background-color: #000000;
            /* Black background */
            padding: 5px;
            display: inline-block;
            text-align: center;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            width: 65px;
            /* A fixed width to ensure consistency */
            font-size: 0.7rem;
        }
        

        .comparison-card {
            z-index: 1000;
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
                        <a class="nav-link" href="all_products.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="favourite.php">Favourite Items</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback</a>
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

    <section class="hero text-center py-5">
        <div class="container">
            <h4>Welcome, <?php echo $Name; ?></h4>
            <p>Discover the best deals on top IT products.</p>
            <h2>Browse Products</h2>
            <div class="search-form mt-4">
                <div class="input-group mb-3">
                    <input type="text" id="userInput" name="query" class="form-control" placeholder="Search for a product...">
                    <div class="input-group-append">
                        <button class="btn btn-dark" id="voiceButton" type="button" onclick="startVoiceInput()">
                            <i class="fas fa-microphone-alt"></i>
                        </button>
                        <button class="btn btn-dark" id="enterBtn" type="button" onclick="performSearch()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div id="productList" class="mt-3"></div>
            </div>
    </section>
    </div>
    </section>
    <?php
    if (isset($_SESSION['message'])):
    ?>
        
        <div class="mt-3 alert alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show text-center mx-auto" style="max-width: 400px;" role="alert">
            <?php
            echo str_replace('Product', $_POST['item_name'], $_SESSION['message']);
            unset($_SESSION['message']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <script>
            $(".alert").delay(5000).slideUp(200, function() {
                $(this).alert('close');
            });
        </script>
        
    <?php
    endif;
    ?>


    <section class="products bg-light py-5">
    <div class="container">
        <div class="row">
            <?php foreach ($productData as $product) { ?>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="product-card card h-100 shadow-sm">
                        <img src="<?php echo $product['img_src']; ?>" alt="<?php echo $product['item_name']; ?>" class="card-img-top">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3"><?php echo $product['item_name']; ?></h5>

                            <div class="bottom-section">
                                <div class="price-section mb-2">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <span class="product-price"><?php echo $product['price']; ?>৳</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-5">

                                    <form action="all_products.php" method="post">
                                        <input type="hidden" name="img_src" value="<?php echo $product['img_src']; ?>">
                                        <input type="hidden" name="item_name" value="<?php echo $product['item_name']; ?>">
                                        <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                                        <input type="hidden" name="view_details" value="<?php echo $product['view_details']; ?>">
                                        <button type="submit" name="favorite" title="Favorite" class="icon-btn">
                                            <i class="fas fa-heart"></i>
                                            Favorite
                                        </button>
                                    </form>
                                    
                                    <button name="compare" title="Compare" class="icon-btn" 
                                            onclick="addToCompare('<?php echo $product['img_src']; ?>', '<?php echo $product['item_name']; ?>', '<?php echo $product['price']; ?>', '<?php echo $product['view_details']; ?>');">
                                        <i class="fas fa-exchange-alt"></i>
                                        Compare
                                    </button>

                                    <a href="<?php echo $product['view_details']; ?>" title="Details" class="icon-btn">
                                    <i class="fa fa-info-circle"></i>
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Comparison Modal -->
<div class="modal fade" id="comparisonModal" tabindex="-1" role="dialog" aria-labelledby="comparisonModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="comparisonModalLabel">Product Comparison</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Dynamic content will be loaded here -->
      </div>
      
    </div>
  </div>
</div>


<div id="comparisonCard" class="comparison-card" style="position: fixed; bottom: 20px; right: 20px; background-color: #f8d7da; color: #721c24; padding: 20px; border-radius: 5px; display: none; width: 250px;">
    <span id="comparisonText"></span>
</div>



    <?php include 'footer.php'; ?>



    <script>
    let productsToCompare = [];

    function addToCompare(img_src, item_name, price, view_details) {
        if (productsToCompare.length < 2) {
            productsToCompare.push({img_src, item_name, price, view_details});
            updateComparisonCard();
        } else {
            alert('You can only compare two products at a time.');
        }
    }

    function updateComparisonCard() {
        document.getElementById('comparisonCard').style.display = 'block';
        document.getElementById('comparisonText').innerHTML = productsToCompare.length + ' product(s) selected. <a href="javascript:void(0);" onclick="compareNow()">Compare Now</a>';
    }

    function compareNow() {
    if (productsToCompare.length === 2) {
        let comparisonTable = generateComparisonTable(productsToCompare);
        // Load the comparison table into the modal body
        $('.modal-body').html(comparisonTable);
        // Show the modal
        $('#comparisonModal').modal('show');
    } else {
        alert('Please select exactly two products to compare.');
    }
}

function generateComparisonTable(products) {
    let table = '<table class="table table-bordered">';
    table += '<tr><th>Title</th>';
    products.forEach(product => {
        table += '<th>' + product.item_name + '</th>';
    });
    table += '</tr>';

    table += '<tr><td>Image</td>';
    products.forEach(product => {
        table += '<td><img src="' + product.img_src + '" alt="' + product.item_name + '" style="width: 100px;"></td>';
    });
    table += '</tr>';

    table += '<tr><td>Product Name</td>';
    products.forEach(product => {
        table += '<td>' + product.item_name + '</td>';
    });
    table += '</tr>';

    table += '<tr><td>Price</td>';
    products.forEach(product => {
        table += '<td>' + product.price + '</td>';
    });
    table += '</tr>';

    table += '<tr><td>Details</td>';
    products.forEach(product => {
        table += '<td><a href="' + product.view_details + '" class="icon-btnA" target="_blank">Click Here to View Details</a></td>';
    });
    table += '</tr>';

    table += '</table>';
    return table;
}


    function removeFromCompare(index) {
        productsToCompare.splice(index, 1);
        updateComparisonCard();
    }
    </script>
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

        $(document).ready(function() {
            $("#userInput").on('keyup', function() {
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#productList').fadeIn();
                            $('#productList').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function() {
                $('#userInput').val($(this).text());
                $('#productList').fadeOut();
            });

            $("#enterBtn").click(function() {
                var query = $("#userInput").val();
                if (query != '') {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#productList').fadeIn();
                            $('#productList').html(data);
                        }
                    });
                }
            });
        });
    </script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>