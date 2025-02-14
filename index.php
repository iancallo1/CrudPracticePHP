<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
 
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="bg-white p-4 rounded shadow-sm w-100" style="max-width: 400px;">
    <h2 class="text-center mb-4 fw-bold text-primary">Login</h2>

    <?php
    session_start();
    include ('dbcon.php');
    

    if (isset($_POST['login'])) {
        $username = $_POST['user_name'];
        $password = $_POST['password'];

        // Query to check user in the database (Fill this part manually)
        $query = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password'"; 
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            // Successful login, redirect to main page
            header("Location: ./Pages/mainpage.php");
            exit();
        } else {
            echo '<div class="alert alert-danger text-center">Invalid username or password!</div>';
        }
    }
    ?>

    <form action="index.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="user_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="d-grid">
            <input type="submit" name="login" value="LOGIN" class="btn btn-primary">
        </div>
        
        <div class="card-footer text-center">
           <p> Don't have an account? <a href="./Pages/signup.php">Signup</a></p>
        </div>
        
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>
</html>
