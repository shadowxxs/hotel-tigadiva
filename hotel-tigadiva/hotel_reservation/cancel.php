<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Cancel Reservation</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Cancel Reservation</h1>
        <form action="process_cancel.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Cancel</button>
            <a href="index.php" class="btn btn-secondary">Back to Homepage</a>
        </form>
    </div>
</body>
</html>
