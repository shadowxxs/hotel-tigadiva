<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Hotel Reservation</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">TigaDiva Hotel</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="reserve.php">Reserve a Room</a></li>
                <li class="nav-item"><a class="nav-link" href="check_status.php">Check Reservation Status</a></li>
                <li class="nav-item"><a class="nav-link" href="cancel.php">Cancel Reservation</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Welcome to TigaDiva Hotel</h1>
        <?php
        if (isset($_SESSION['username'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hotel_reservation";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $user_email = $_SESSION['username'];
            $user_name = $_SESSION['name'];

            // Mengecek apakah pengguna sudah melakukan reservasi dengan status 'Reserved'
            $sql_check_reservation = "SELECT * FROM reservations WHERE email='$user_email' AND status='Reserved'";
            $result_check_reservation = $conn->query($sql_check_reservation);

            if ($result_check_reservation->num_rows == 0) {
                echo "<p>Hai $user_name, kamu belum melakukan reservasi.</p>";
            } else {
                $row_reservation = $result_check_reservation->fetch_assoc();
                $room_type = $row_reservation['room_type'];
                $room_number = $row_reservation['room_number'];
                $floor = $row_reservation['floor'];
                $check_in_date = $row_reservation['check_in_date'];
                echo "<p>Hai $user_name, kamu memiliki reservasi kamar $room_type, nomor kamar $room_number, lantai $floor, dan tanggal pemesanan $check_in_date</p>";
            }

            $conn->close();
        } else {
            echo "<p>Silahkan login terlebih dahulu untuk melakukan pemesanan</p>";
        }
        ?>
    </div>
</body>
</html>
