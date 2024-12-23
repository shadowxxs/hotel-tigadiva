<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_reservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$reservation_id = $_POST['reservation_id'];
$room_id = $_POST['room_id']; // Pastikan room_id disertakan dalam form

// Menghapus entri di tabel `payments` yang terkait dengan reservasi
$sql_delete_payments = "DELETE FROM payments WHERE reservation_id='$reservation_id'";
if ($conn->query($sql_delete_payments) === TRUE) {
    // Setelah entri di tabel `payments` dihapus, kita bisa menghapus entri di tabel `reservations`
    $sql_delete_reservation = "DELETE FROM reservations WHERE id='$reservation_id'";
    if ($conn->query($sql_delete_reservation) === TRUE) {
        // Mengupdate status kamar menjadi 'Available' kembali
        $sql_update_room = "UPDATE rooms SET status='Available' WHERE id='$room_id'";
        $conn->query($sql_update_room);
        
        echo "Reservation deleted successfully!";
        echo "<br><a href='admin_dashboard.php' class='btn btn-secondary'>Back to Dashboard</a>";
    } else {
        echo "Error deleting reservation: " . $conn->error;
        echo "<br><a href='admin_dashboard.php' class='btn btn-secondary'>Back to Dashboard</a>";
    }
} else {
    echo "Error deleting payments: " . $conn->error;
    echo "<br><a href='admin_dashboard.php' class='btn btn-secondary'>Back to Dashboard</a>";
}

$conn->close();
?>
