<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Hotel Reservation</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
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
