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

$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

echo "<h1>Manage Reservations</h1>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["guest_name"] . " - Email: " . $row["email"] . " - Room Type: " . $row["room_type"] . " - Status: " . $row["status"] . " - Total Payment: Rp " . number_format($row["total_payment"], 0, ',', '.') . " - Payment Method: " . $row["payment_method"] . "<br>";
        echo "<form action='update_reservation.php' method='post'>
            <input type='hidden' name='id' value='" . $row["id"] . "'>
            <select name='status'>
                <option value='Reserved' " . ($row["status"] == "Reserved" ? "selected" : "") . ">Reserved</option>
                <option value='Checked In' " . ($row["status"] == "Checked In" ? "selected" : "") . ">Checked In</option>
                <option value='Checked Out' " . ($row["status"] == "Checked Out" ? "selected" : "") . ">Checked Out</option>
                <option value='Cancelled' " . ($row["status"] == "Cancelled" ? "selected" : "") . ">Cancelled</option>
            </select>
            <input type='submit' value='Update'>
        </form><br>";
    }
} else {
    echo "No reservations found.";
}

$conn->close();
?>
