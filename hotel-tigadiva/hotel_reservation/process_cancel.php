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

// Mengecek apakah ada reservasi dengan email yang diberikan
$sql_check_reservation = "SELECT * FROM reservations WHERE email='$email' AND status='Reserved'";
$result_check_reservation = $conn->query($sql_check_reservation);

if ($result_check_reservation->num_rows == 0) {
    echo "No active reservation found for this email.";
    echo "<br><a href='index.php' class='btn btn-secondary'>Back to Homepage</a>";
} else {
    $row_reservation = $result_check_reservation->fetch_assoc();
    $reservation_id = $row_reservation['id'];
    $room_id = $row_reservation['room_id']; // Mendapatkan room_id

    // Menghapus entri di tabel payments terlebih dahulu
    $sql_delete_payments = "DELETE FROM payments WHERE reservation_id='$reservation_id'";
    if ($conn->query($sql_delete_payments) === TRUE) {
        // Mengupdate status reservasi menjadi 'Cancelled'
        $sql_cancel_reservation = "UPDATE reservations SET status='Cancelled' WHERE id='$reservation_id'";

        if ($conn->query($sql_cancel_reservation) === TRUE) {
            // Mengupdate status kamar menjadi 'Available' kembali
            $sql_update_room = "UPDATE rooms SET status='Available' WHERE id=$room_id";
            $conn->query($sql_update_room);

            // Mengarahkan kembali ke halaman utama
            header("Location: index.php");
            exit();
        } else {
            echo "Error cancelling reservation: " . $conn->error;
            echo "<br><a href='index.php' class='btn btn-secondary'>Back to Homepage</a>";
        }
    } else {
        echo "Error deleting payments: " . $conn->error;
        echo "<br><a href='index.php' class='btn btn-secondary'>Back to Homepage</a>";
    }
}

$conn->close();
?>
