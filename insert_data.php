<?php
include ('dbcon.php');  

if(isset($_POST['add_student'])) {
    $first_name = trim($_POST['first_name']);  
    $last_name = trim($_POST['last_name']);
    $age = trim($_POST['age']);

   
    if(empty($first_name)) {  
        header('location:index.php?message=First Name Needed');
       
    } 

    
    $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) VALUES ('$first_name', '$last_name', '$age')";
    
    $result = mysqli_query($connection, $query);

    if(!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } 
    else {
        header('location:index.php?insert_msg=Your data has been added successfully');
        exit();
    }
}
?>
