<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
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

$username_to_delete = $_POST['username'];

// Mengecek apakah pengguna yang akan dihapus adalah admin
$sql_check_role = "SELECT role FROM users WHERE username='$username_to_delete'";
$result_check_role = $conn->query($sql_check_role);
$row = $result_check_role->fetch_assoc();

if ($row['role'] == 'admin') {
    echo "Error: Cannot delete admin account.";
    echo "<br><a href='admin_dashboard.php' class='btn btn-secondary'>Back to Dashboard</a>";
    $conn->close();
    exit();
}

$sql = "DELETE FROM users WHERE username='$username_to_delete'";

if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully.";
    echo "<br><a href='admin_dashboard.php' class='btn btn-secondary'>Back to Dashboard</a>";
} else {
    echo "Error: " . $conn->error;
    echo "<br><a href='admin_dashboard.php' class='btn btn-secondary'>Back to Dashboard</a>";
}

$conn->close();
?>
