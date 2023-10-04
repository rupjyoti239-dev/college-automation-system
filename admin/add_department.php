<?php include('./navbar.php');  ?>


     <div class="main_container p-5">
           <h1 class="text-center h3 fw-bold">Add New Department</h1>



             <form action="" method="POST" >

    <div style="width: 60%; margin: 50px auto;">


      <div class="pb-3">
        <label for="department_name" class="form-label">Department Name</label>
        <input type="text" class="form-control" id="department_name" name="department_name" placeholder="Department Name" required>
      </div>

      

      <div class="mb-3">
        <input type="submit" value="ADD" name="upload" class="btn btn-primary">
      </div>


    </div>


  </form>
     </div>


<?php include('./footer.php');  ?>     


<?php 

    //check whether submit button is clicked or not
    if(isset($_POST['upload']))
    {

     
    $department_name = $_POST['department_name'];
   
    // check department is already exist or not
  $query = mysqli_query($conn, "SELECT * FROM `department_tbl` WHERE department_name = '$department_name'");
  if(mysqli_num_rows($query)>0){
    echo "<script>alert('This department Already Exists!');
    location.href='manage_department.php';</script>";
  }else{



   // save the order in database 
    $sql = "insert into department_tbl (department_name) 
    values( '$department_name') 
            ";
     // execute the query
      $res = mysqli_query($conn,$sql);

      if($res == true)
      {
        // $_SESSION['update'] = '<div class="aletr alert-success text-center py-2 px-2">Successfully Added</div>';
        echo "<script>alert('succeddfully added');</script>";
          echo "<script>location.href='manage_department.php';</script>";
      }else{
        echo "<script>alert('failed to add');</script>";
        echo "<script>location.href='add_department.php';</script>";
      }
    }
  }
?>