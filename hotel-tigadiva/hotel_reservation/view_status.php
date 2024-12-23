<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_reservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

$sql = "SELECT * FROM reservations WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["guest_name"]. " - Room Type: " . $row["room_type"]. " - Check-in Date: " . $row["check_in_date"]. " - Check-out Date: " . $row["check_out_date"]. " - Status: " . $row["status"]. " - Payment Status: " . $row["payment_status"]. " - Total Payment: Rp " . number_format($row["total_payment"], 0, ',', '.') . " - Payment Method: " . $row["payment_method"] . "<br>";
        if ($row["payment_method"] === "Transfer") {
            $payment_sql = "SELECT * FROM payments WHERE reservation_id='" . $row["id"] . "'";
            $payment_result = $conn->query($payment_sql);
            if ($payment_result->num_rows > 0) {
                $payment_row = $payment_result->fetch_assoc();
                echo "Bank Account Number: " . $payment_row["bank_account"] . "<br>";
            }
        }
    }
    echo "<br><a href='index.php' class='btn btn-secondary'>Back to Homepage</a>";
} else {
    echo "No reservations found for this email.";
    echo "<br><a href='index.php' class='btn btn-secondary'>Back to Homepage</a>";
}

$conn->close();
?>
