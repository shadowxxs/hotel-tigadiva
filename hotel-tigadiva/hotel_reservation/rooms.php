<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>TigaDiva Hotel - Rooms</title>
    <style>
        .card img {
            width: 100%;
            height: auto;
        }
        .card {
            margin-bottom: 20px;
        }
        .room-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .room-card {
            flex: 0 0 32%; /* Adjust this value to control the width of the cards */
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1>Our Rooms</h1>
        <div class="room-container">
            <div class="card room-card">
                <img src="images/single_room.jpg" class="card-img-top" alt="Single Room">
                <div class="card-body">
                    <h5 class="card-title">Single Room</h5>
                    <p class="card-text">Harga: Rp. 500.000</p>
                </div>
            </div>
            <div class="card room-card">
                <img src="images/double_room.jpg" class="card-img-top" alt="Double Room">
                <div class="card-body">
                    <h5 class="card-title">Double Room</h5>
                    <p class="card-text">Harga: Rp. 800.000</p>
                </div>
            </div>
            <div class="card room-card">
                <img src="images/suite_room.jpg" class="card-img-top" alt="Suite Room">
                <div class="card-body">
                    <h5 class="card-title">Suite Room</h5>
                    <p class="card-text">Harga: Rp. 1.000.000</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
