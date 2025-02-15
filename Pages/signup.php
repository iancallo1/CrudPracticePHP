<?php
session_start();
include('../dbcon.php');

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Direct storage (not hashed)

    // Debug: Check if values are received
    if (empty($username) || empty($password)) {
        die("Error: Username or Password is empty.");
    }

    // Check if the user already exists
    $check_query = "SELECT * FROM users WHERE user_name = ?";
    $stmt = mysqli_prepare($connection, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Error: " . mysqli_error($connection)); // Debugging
    }

    if ($result->num_rows > 0) {
        die("Error: Username already exists.");
    }

    // Insert user into database
    $insert_query = "INSERT INTO users (user_name, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($connection, $insert_query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    if (mysqli_stmt_execute($stmt)) {
        echo "Signup successful!";
        header("Location:../index.php ?signup_success=1");
        exit();
    } else {
        die("Signup failed: " . mysqli_error($connection)); // Debugging
    }
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
                <div class="text-center mt-3 mb-4 text-primary">
                    <h3 class="fw-bold">Sign Up</h3>
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
                            <button href="index.php"type="submit" class="btn btn-success" name="signup">SIGNUP</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Already have an account? <a href="../index.php">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
