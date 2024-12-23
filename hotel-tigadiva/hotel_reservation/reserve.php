<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Reserve a Room</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Reserve a Room</h1>
        <form action="process_reservation.php" method="post">
            <div class="form-group">
                <label for="guest_name">Name:</label>
                <input type="text" id="guest_name" name="guest_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="room_type">Room Type:</label>
                <select id="room_type" name="room_type" class="form-control" required>
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>
            <div class="form-group">
                <label for="check_in_date">Check-in Date:</label>
                <input type="date" id="check_in_date" name="check_in_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="check_out_date">Check-out Date:</label>
                <input type="date" id="check_out_date" name="check_out_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                <select id="payment_method" name="payment_method" class="form-control" required>
                    <option value="Transfer">Transfer</option>
                    <option value="Cash">Cash</option>
                </select>
            </div>
            <div class="form-group" id="transfer_details" style="display: none;">
                <label for="bank_account">Bank Account Number:</label>
                <input type="text" id="bank_account" name="bank_account" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Reserve</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <script>
        document.getElementById('payment_method').addEventListener('change', function() {
            var transferDetails = document.getElementById('transfer_details');
            if (this.value === 'Transfer') {
                transferDetails.style.display = 'block';
            } else {
                transferDetails.style.display = 'none';
            }
        });
    </script>
</body>
</html>
