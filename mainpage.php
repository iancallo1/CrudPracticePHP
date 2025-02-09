<!DOCTYPE html>
<?php 
session_start();
include ('dbcon.php');?>
<html lang="en">
   <head>
    <title> Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
     crossorigin="anonymous">
   </head> 
   <body>

    <h1 class="text-center fw-bold display-4" style="background-color:gray ; padding:20px; color: white;">CRUD Application</h1>
    <div class="container">  
        
        <h2>ALL STUDENTS</h2> 
        <div class="box1" style="float:right; margin-bottom:10px">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style= > ADD STUDENTS </button>
        <a href="logout.php" class="btn btn-danger">Logout</a>

        </div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
            <tr> 
                <td>ID</td>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $query = "select * from `students`";
                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query failed".mysqli_error($connection));
                }
                else{

                  while($row = mysqli_fetch_assoc($result))
                {
                     ?>

                  <tr>
                    <td> <?php echo $row['id']?> </td>
                    <td><?php echo $row['first_name']?> </td>
                    <td><?php echo $row['last_name']?> </td>
                    <td><?php echo $row['age']?> </td>
                    <td><a href="update_page.php?id=<?php echo $row['id']?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td>
                </tr>
                  <?php
                  }
                 
                }
                ?>
              
            </tbody>
        </table>
          
        <?php
        if (isset($_GET['message'])){
          echo '<h6 style="text-align: center; color:red; position: fixed; top: 130px; left: 50%; transform: translateX(-50%);">' .$_GET['message']. '<h6>';
        }
        
        ?>
      <?php
        if (isset($_GET['insert_msg'])){
          echo '<h6 style="text-align: center; color:red; position: fixed; top: 130px; left: 50%; transform: translateX(-50%);">' .$_GET['insert_msg']. '<h6>';
        }
        ?>

              <?php
        if (isset($_GET['delete_msg'])){
          echo '<h6 style="text-align: center; color:red; position: fixed; top: 130px; left: 50%; transform: translateX(-50%);">' .$_GET['delete_msg']. '<h6>';
        }
        ?>


    </div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
      crossorigin="anonymous"></script>

  <!-- Modal Form -->
 <form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Add Students</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input name="first_name" class="form-control" type="text">
                <label for="last_name">Last Name</label>
                <input name="last_name" class="form-control" type="text">
                <label for="age">Age</label>
                <input name="age" class="form-control" type="text">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="add_student" value="ADD">ADD</button>
        

      </div>
    </div>
  </div>
</div>
</form>
    


   </body>
</html>