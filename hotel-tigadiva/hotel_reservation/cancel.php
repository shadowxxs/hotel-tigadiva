<?php
session_start();

if (isset($_POST['reservation_id']) && isset($_SESSION['username'])) {
    $reservation_id = $_POST['reservation_id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel_reservation";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_cancel_reservation = "UPDATE reservations SET status='Cancelled' WHERE id='$reservation_id' AND email='{$_SESSION['username']}'";
    if ($conn->query($sql_cancel_reservation) === TRUE) {
        echo "<p>Reservation cancelled successfully.</p>";
    } else {
        echo "<p>Error cancelling reservation: " . $conn->error . "</p>";
    }

    $conn->close();
} else {
    echo "<p>Invalid request.</p>";
}
?>
