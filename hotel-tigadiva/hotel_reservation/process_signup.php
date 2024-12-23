<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_reservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$username = $_POST['username'];
$password = MD5($_POST['password']);
$role = 'guest';

// Mengecek apakah email sudah terdaftar
$sql_check_email = "SELECT * FROM users WHERE username='$username'";
$result_check_email = $conn->query($sql_check_email);

if ($result_check_email->num_rows > 0) {
    echo "Error: Email already registered. Please login.";
    echo "<br><a href='login.php' class='btn btn-secondary'>Login</a>";
    echo "<br><a href='index.php' class='btn btn-secondary'>Back to Homepage</a>";
    $conn->close();
    exit();
}

$sql = "INSERT INTO users (name, username, password, role) VALUES ('$name', '$username', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Sign up successful! <a href='login.php'>Click here to login</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
