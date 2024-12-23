<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_reservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = MD5($_POST['password']);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['name']; // Simpan nama pengguna di sesi
    if ($row['role'] == 'admin') {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: index.php");
    }
} else {
    echo "Invalid username or password.";
}

$conn->close();
?>
