<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Sign Up</h1>
        <form action="process_signup.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Username (Email):</label>
                <input type="email" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <a href="login.php" class="btn btn-secondary">Back to Login</a>
            <a href="index.php" class="btn btn-secondary">Back to Homepage</a>
        </form>
    </div>
</body>
</html>
