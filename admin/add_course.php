<?php include('./navbar.php');  ?>


     <div class="main_container p-5">
           <h1 class="text-center h3 fw-bold">Add New Course</h1>



             <form action="" method="POST" >

    <div style="width: 60%; margin: 50px auto;">

      <div class="pb-3">
        <label for="course_name" class="form-label">Course Name</label>
        <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name" required>
      </div>

      <div class="pb-3">
        <label for="department">Department Name</label>
              <select name="department_name" id="department" class="form-control" required>
              <?php  
                    //get the data from database
                     $sql = "SELECT * FROM department_tbl";

                     //execute the query
                     $res= mysqli_query($conn,$sql);

                    //count rows
                     $count = mysqli_num_rows($res);

                    //check whether data is available or not
                    if($count>0)
           {

             //we have data in database 
             //get the data and display

             while($row=mysqli_fetch_assoc($res))
             {
              
               $dept = $row['department_name'];
              
            ?>
               <!-- <option value="" disabled selected> Courses</option> -->
              <option value="<?php echo $dept; ?>"> <?php echo $dept;  ?>  </option> 
              
           
           
            <?php

             }
            }
              ?>
               </select>
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

     
    $course_name = $_POST['course_name'];
    $dept = $_POST['department_name'];
  
    
     // check course is already exist or not
  $query = mysqli_query($conn, "SELECT * FROM `course_tbl` WHERE course_name = '$course_name' ");
  if(mysqli_num_rows($query)>0){
    echo "<script>alert('This Course Already Exists!');
    location.href='manage_course.php';</script>";
  }else{


   

   // save the order in database 
    $sql = "insert into course_tbl (course_name, department) 
    values( '$course_name','$dept') 
            ";
     // execute the query
      $res = mysqli_query($conn,$sql);

      if($res == true)
      {
        // $_SESSION['update'] = '<div class="aletr alert-success text-center py-2 px-2">Successfully Added</div>';
        echo "<script>alert('succeddfully added');</script>";
          echo "<script>location.href='manage_course.php';</script>";
      }else{
        echo "<script>alert('failed to add');</script>";
        echo "<script>location.href='add_course.php';</script>";
      }
    }
  }
?>