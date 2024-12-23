<?php
session_start();

if (!isset($_SESSION['admin'])) {
    echo "Unauthorized access!";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_reservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE reservations SET status='$status' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Reservation updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: manage_reservations.php");
?>
