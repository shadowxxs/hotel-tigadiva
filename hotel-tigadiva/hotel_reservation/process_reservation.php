<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_reservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$guest_name = $_POST['guest_name'];
$email = $_POST['email'];
$room_type = $_POST['room_type'];
$check_in_date = $_POST['check_in_date'];
$check_out_date = $_POST['check_out_date'];
$payment_method = $_POST['payment_method'];
$bank_account = isset($_POST['bank_account']) ? $_POST['bank_account'] : null;
$status = 'Reserved';
$payment_status = 'Pending';

// Mengecek apakah email sudah terdaftar
$sql_check_email = "SELECT * FROM users WHERE username='$email' AND name='$guest_name'";
$result_check_email = $conn->query($sql_check_email);

if ($result_check_email->num_rows == 0) {
    echo "Error: Name and email do not match or not registered. Please sign up first.";
    echo "<br><a href='signup.php' class='btn btn-secondary'>Sign Up</a>";
    echo "<br><a href='index.php' class='btn btn-secondary'>Back to Homepage</a>";
    $conn->close();
    exit();
}

// Mengecek ketersediaan kamar
$sql_check_room = "SELECT * FROM rooms WHERE room_type='$room_type' AND status='Available' LIMIT 1";
$result_check_room = $conn->query($sql_check_room);

if ($result_check_room->num_rows == 0) {
    echo "Kamar tidak tersedia.";
    echo "<br><a href='index.php' class='btn btn-secondary'>Back to Homepage</a>";
    $conn->close();
    exit();
}

$row_room = $result_check_room->fetch_assoc();
$floor = $row_room['floor'];
$room_number = $row_room['room_number'];
$room_id = $row_room['id']; // Menyimpan room_id

// Menghitung durasi menginap
$check_in = new DateTime($check_in_date);
$check_out = new DateTime($check_out_date);
$interval = $check_in->diff($check_out);
$nights = $interval->days;

// Menghitung total pembayaran berdasarkan jenis kamar
$room_prices = [
    "Single" => 500000.00,
    "Double" => 800000.00,
    "Suite" => 1000000.00
];

$total_payment = $nights * $room_prices[$room_type];

$sql = "INSERT INTO reservations (guest_name, email, room_type, check_in_date, check_out_date, status, payment_status, total_payment, payment_method, floor, room_number, room_id)
VALUES ('$guest_name', '$email', '$room_type', '$check_in_date', '$check_out_date', '$status', '$payment_status', '$total_payment', '$payment_method', '$floor', '$room_number', '$room_id')";

if ($conn->query($sql) === TRUE) {
    $reservation_id = $conn->insert_id; // Mendapatkan ID reservasi yang baru saja dimasukkan
    
    // Mengupdate status kamar menjadi 'Booked'
    $sql_update_room = "UPDATE rooms SET status='Booked' WHERE id=$room_id";
    $conn->query($sql_update_room);

    echo "Reservation made successfully! Total Payment: Rp " . number_format($total_payment, 0, ',', '.');
    echo "<br>Payment Method: " . $payment_method;
    if ($payment_method === 'Transfer') {
        echo "<br>Bank Account Number: " . $bank_account;
        $sql_payment = "INSERT INTO payments (reservation_id, payment_method, bank_account, amount)
                        VALUES ($reservation_id, '$payment_method', '$bank_account', $total_payment)";
        if ($conn->query($sql_payment) === TRUE) {
            echo "<br>Please transfer the total amount to the provided bank account.";
        } else {
            echo "<br>Error processing payment details.";
        }
    } else {
        echo "<br>Please pay the total amount in cash upon check-in.";
    }
    echo "<br><a href='index.php' class='btn btn-secondary'>Back to Homepage</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
