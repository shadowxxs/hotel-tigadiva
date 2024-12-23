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

// Mendapatkan daftar pengguna yang terdaftar
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

// Mendapatkan daftar reservasi
$sql_reservations = "SELECT * FROM reservations";
$result_reservations = $conn->query($sql_reservations);

// Mendapatkan daftar kamar yang tersedia
$sql_rooms = "SELECT * FROM rooms";
$result_rooms = $conn->query($sql_rooms);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Admin Dashboard</h1>
        <h2>Registered Users</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_users->num_rows > 0) {
                    while($row = $result_users->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["username"] . "</td>
                            <td>" . $row["role"] . "</td>
                            <td>
                                <form action='delete_user.php' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='username' value='" . $row["username"] . "'>
                                    <button type='submit' class='btn btn-danger'>Delete</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No registered users found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Reservations</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Guest Name</th>
                    <th>Email</th>
                    <th>Room Type</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_reservations->num_rows > 0) {
                    while($row = $result_reservations->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["guest_name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["room_type"] . "</td>
                            <td>" . $row["check_in_date"] . "</td>
                            <td>" . $row["check_out_date"] . "</td>
                            <td>" . $row["status"] . "</td>
                            <td>
                                <form action='cancel_reservation.php' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='reservation_id' value='" . $row["id"] . "'>
                                    <input type='hidden' name='room_id' value='" . $row["room_id"] . "'>
                                    <button type='submit' class='btn btn-warning'>Cancel</button>
                                </form>
                                <form action='delete_reservation.php' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='reservation_id' value='" . $row["id"] . "'>
                                    <input type='hidden' name='room_id' value='" . $row["room_id"] . "'>
                                    <button type='submit' class='btn btn-danger'>Delete</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No reservations found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Available Rooms</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Room Type</th>
                    <th>Floor</th>
                    <th>Room Number</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_rooms->num_rows > 0) {
                    while($row = $result_rooms->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["room_type"] . "</td>
                            <td>" . $row["floor"] . "</td>
                            <td>" . $row["room_number"] . "</td>
                            <td>" . $row["status"] . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No rooms available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
        <a href="index.php" class="btn btn-secondary">Back to Homepage</a>
    </div>
</body>
</html>
