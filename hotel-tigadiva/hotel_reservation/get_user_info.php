<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_reservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_GET['email'];

$sql = "SELECT name FROM users WHERE username='$email'";
$result = $conn->query($sql);

$response = array();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['name'] = $row['name'];
} else {
    $response['name'] = null;
}

echo json_encode($response);

$conn->close();
?>
