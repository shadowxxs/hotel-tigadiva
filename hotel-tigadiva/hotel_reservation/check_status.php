<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Reservation Status</title>
</head>
<body>
    <h1>Check Reservation Status</h1>
    <form action="view_status.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <button type="submit" class="btn btn-primary">Check Status</button> <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</body>
</html>
