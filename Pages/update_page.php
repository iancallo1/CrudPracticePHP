<?php include ('../dbcon.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `students` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <style>
    </style>
</head>
<body class="bg-light">

<div class="text-white text-center py-3 fs-3 fw-bold" style="background-color:gray ;">Edit Student</div>

<div class="form-container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white p-4 rounded shadow" style="margin-top: 20px;">
            <?php
            if (isset($_POST['submit_update'])) {
                if (isset($_GET['id_new'])) {
                    $idnew = $_GET['id_new'];
                }
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $age = $_POST['age'];

                $query = "UPDATE `students` SET `first_name` = '$first_name', `last_name` = '$last_name', `age` = '$age' WHERE `id` = '$idnew'";

                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Query failed: " . mysqli_error($connection));
                } else {
                    header('location:mainpage.php?update_msg=Update Success');
                }
            }
            ?>

            <form action="update_page.php?id_new=<?php echo $id; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input name="first_name" class="form-control" type="text" value="<?php echo $row['first_name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input name="last_name" class="form-control" type="text" value="<?php echo $row['last_name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input name="age" class="form-control" type="number" value="<?php echo $row['age']; ?>" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success" name="submit_update" value="UPDATE">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="text-center mt-3">
    <a href="mainpage.php" class="btn btn-secondary">Back to Home</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>
</html>
