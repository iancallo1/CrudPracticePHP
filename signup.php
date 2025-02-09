<?php
session_start();
include('dbcon.php');

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Hash this before storing

    // TODO: Implement user existence check
    // TODO: Insert the user into the database with password hashing

    // Redirect to login page after successful signup
    header("Location: index.php?signup_success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row w-100">
        <div class="col-md-6 mx-auto">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Sign Up</h4>
                </div>
                <div class="card-body">
                    <form action="signup.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" name="signup">Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Already have an account? <a href="index.php">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
