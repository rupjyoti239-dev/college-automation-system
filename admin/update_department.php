<?php include('./navbar.php');  ?>


 <?php
          //Check whether the id is set or not
          if(isset($_GET['id']))
          {
                 //Get the ID and all other details
                // echo "Getting the Data";
                $id = $_GET['id'];

      $sql = "SELECT * FROM `department_tbl` WHERE `id` = '$id' ";
      $res = mysqli_query($conn, $sql);
                 
      $count= mysqli_num_rows($res);

      if($count==1){
        //get all the data
        $row = mysqli_fetch_assoc($res);
        $dept_name = $row['department_name'];
      }
      else{
        //redirect
         echo "<script>alert('data not found');</script>";
        echo "<script>location.href='manage_department.php';</script>";
      }
     
 } 
 else{
       echo "<script>alert('data not found');</script>";
      echo "<script>location.href='manage_department.php';</script>";
 }

?>        







     <div class="main_container p-5">
      <h1 class="text-center h3 fw-bold">Update Department Name</h1>


      <form action="" method="POST" >

    <div style="width: 60%; margin: 50px auto;">


      <div class="pb-3">
        <label for="department_name" class="form-label">Department Name</label>
        <input type="text" class="form-control" id="department_name" name="department_name" value="<?php echo $dept_name; ?>" placeholder="Department Name" required>
      </div>

      

      <div class="mb-3">
        <input type="submit" value="UPDATE" name="update" class="btn btn-primary">
      </div>


    </div>


  </form>

     </div>


<?php include('./footer.php');  ?>     


<?php
            if(isset($_POST['update']))
            {
                

               //1. Get all the values from our form
              
               $dept_name = $_POST['department_name'];
              
             
                // check department is already exist or not
  $query = mysqli_query($conn, "SELECT * FROM `department_tbl` WHERE department_name = '$dept_name'");
  if(mysqli_num_rows($query)>0){
    echo "<script>alert('This department Already Exists!');
    location.href='manage_department.php';</script>";
  }else{



    
                 //3. Update the Database
                 $sql2 = "UPDATE `department_tbl` SET 
                 department_name = '$dept_name' 
                 
                 
                 WHERE `id`='$id'
             ";

             //Execute the Query
             $res2 = mysqli_query($conn, $sql2);

             if($res2==true)
            {
               //profile details Updated
                       echo "<script>alert('Successfully Updated');</script>";
               echo "<script>location.href='manage_department.php';</script>";
            }
            else{
                   echo "<script>alert('Failed to Update');</script>";
              echo "<script>location.href='manage_department.php';</script>";
            }


            }
          }

       ?>
