<?php
include 'dbconnect.php';
session_start();

$email = $_SESSION['user_data']['email'];

if (isset($_POST['remove']) && isset($_POST['img_src'])) {
    // Get the img_src of the product to remove
    $imgSrcToRemove = $_POST['img_src'];

    $removeQuery = "DELETE FROM fav_prod WHERE img_src = '$imgSrcToRemove' AND user_email = '$email'";
    if ($conn->query($removeQuery)) {
        $_SESSION['message'] = $_POST['item_name'] . " removed from favorites!";
        $_SESSION['msg_type'] = "danger";
    }

}

if (isset($_POST['alert_state']) && isset($_POST['img_src'])) {
    $imgSrcToUpdate = $_POST['img_src'];
    $newAlertState = $_POST['alert_state'];
    
    // Get the product name
    $productNameQuery = "SELECT item_name FROM fav_prod WHERE img_src = '$imgSrcToUpdate' AND user_email = '$email'";
    $productNameResult = $conn->query($productNameQuery);
    $productNameRow = $productNameResult->fetch_assoc();
    $productName = $productNameRow['item_name'];

    $updateQuery = "UPDATE fav_prod SET alert_state = $newAlertState WHERE img_src = '$imgSrcToUpdate' AND user_email = '$email'";
    if ($conn->query($updateQuery)) {
        // Send email confirmation if the alert state is set
        if ($newAlertState == 1) {
            $to = $email; // Specify the recipient email address
            $subject = "Price Alert Set for $productName"; // Specify the subject
            $message = "The price alert has been successfully set for $productName."; // Specify the message body
            $headers = 'From: Price-Alert@shadmantaqi.xyz'; // Specify the sender email
            
            // Use PHP's mail function to send the email
            mail($to, $subject, $message, $headers);
        }
    }
    exit; // This stops further processing, sending the response back to the AJAX request
}


$query = "SELECT img_src, item_name, price, view_details, alert_state FROM fav_prod WHERE user_email = '$email'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Favourite</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        td {
            text-align: center;
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
                    <a class="nav-link" href="all_products.php">All Products</a>
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
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">LogOut</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
if (isset($_SESSION['message'])):
?>
    
    <div class="mt-3 alert alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show text-center mx-auto" style="max-width: 400px;" role="alert">
        <?php
        echo $_SESSION['message'];
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <td colspan="7">
                                <h4 class="text-center text-info m-0">Favourite Products</h4>
                            </td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Details</th>
                            <th>Remove</th>
                            <th>Price Alert</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><img src="<?php echo $row['img_src']; ?>" alt="Product Image"></td>
                                <td style="text-align: center;"><?php echo $row['item_name']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><a href="<?php echo $row['view_details']; ?>">Link</a></td>
                                <td>
                                    <form action="favourite.php" method="post">
                                        <input type="hidden" name="img_src" value="<?php echo $row['img_src']; ?>">
                                        <input type="hidden" name="item_name" value="<?php echo $row['item_name']; ?>"> <!-- Include the product name -->
                                        <button type="submit" name="remove" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>

                                <td>
                                <form action="favourite.php" method="post">
                                    <input type="hidden" name="img_src" value="<?php echo $row['img_src']; ?>">
                                    <label class="switch">
                                        <input type="checkbox" id="alertToggle_<?php echo $row['img_src']; ?>" name="alert_state" 
                                               <?php if ($row['alert_state'] == 1) echo 'checked'; ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').change(function() {
            var imgSrc = $(this).closest('form').find('input[name="img_src"]').val();
            var alertState = $(this).is(':checked') ? 1 : 0;
            
            $.ajax({
                url: 'favourite.php',
                type: 'POST',
                data: {
                    img_src: imgSrc,
                    alert_state: alertState
                }
            });
        });
    });
</script>


</body>
</html>
