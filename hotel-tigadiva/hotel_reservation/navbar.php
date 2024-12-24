<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">TigaDiva Hotel</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'reserve.php' ? 'active' : '' ?>"><a class="nav-link" href="reserve.php">Reserve a Room</a></li>
            <li class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'rooms.php' ? 'active' : '' ?>"><a class="nav-link" href="rooms.php">Rooms</a></li>
            <li class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'check_status.php' ? 'active' : '' ?>"><a class="nav-link" href="check_status.php">Check Reservation Status</a></li>
            <li class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'cancel_reservation.php' ? 'active' : '' ?>"><a class="nav-link" href="cancel_reservation.php">Cancel Reservation</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['username'])): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notifications" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Notifications
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifications">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "hotel_reservation";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $user_email = $_SESSION['username'];
                        $sql_check_reservation = "SELECT * FROM reservations WHERE email='$user_email'";
                        $result_check_reservation = $conn->query($sql_check_reservation);

                        if ($result_check_reservation->num_rows > 0) {
                            while($row = $result_check_reservation->fetch_assoc()) {
                                if ($row['status'] == 'Reserved') {
                                    echo "<a class='dropdown-item' href='check_status.php'>Kamu memiliki pemesanan kamar {$row['room_type']} pada tanggal {$row['check_in_date']} silahkan cek di bagian reservation status</a>";
                                } elseif ($row['status'] == 'Cancelled') {
                                    echo "<a class='dropdown-item' href='#'>Kamu telah membatalkan pemesanan</a>";
                                }
                            }
                        } else {
                            echo "<a class='dropdown-item' href='#'>Kamu tidak memiliki pesan</a>";
                        }

                        $conn->close();
                        ?>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
