<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Developer Information</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .developer-card {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .developer-image {
            max-width: 30%;
            border-radius: 10%;
        }
        .devinfo{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="developer-card">
            <img src="asif.jpg" alt="Developer Image" class="developer-image" />
            <h3 class="mt-3">Asif Bhuiyan</h3>
            <p class="text-muted">
                <i class="fa-solid fa-graduation-cap"></i>
                BS CSE <br>
                <i class="fa-solid fa-building-columns"></i>
                North South University <br>
                <i class="fa-solid fa-envelope"></i>
                asif.bhuiyan@northsouth.edu
            </p>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>