<?php include ('../dbcon.php');?>

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    


    $query = "delete from `students` where `id` = '$id'";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed".mysqli_error($connection));
    }
    else{
        header('location:mainpage.php?delete_msg=Record Deleted');
    }
  
    }

?>

