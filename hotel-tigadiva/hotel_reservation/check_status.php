<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Check Reservation Status</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1>Check Reservation Status</h1>
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
            $sql_check_reservation = "SELECT * FROM reservations WHERE email='$user_email'";
            $result_check_reservation = $conn->query($sql_check_reservation);

            if ($result_check_reservation->num_rows > 0) {
                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th>Room Type</th><th>Room Number</th><th>Floor</th><th>Check-in Date</th><th>Status</th></tr></thead>";
                echo "<tbody>";
                while($row = $result_check_reservation->fetch_assoc()) {
                    echo "<tr><td>{$row['room_type']}</td><td>{$row['room_number']}</td><td>{$row['floor']}</td><td>{$row['check_in_date']}</td><td>{$row['status']}</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No reservations found.</p>";
            }

            $conn->close();
        } else {
            echo "<p>Please log in to check your reservation status.</p>";
        }
        ?>
    </div>
</body>
</html>
