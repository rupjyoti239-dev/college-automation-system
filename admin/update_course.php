<?php include('./navbar.php');  ?>


 <?php
          //Check whether the id is set or not
          if(isset($_GET['id']))
          {
                 //Get the ID and all other details
                // echo "Getting the Data";
                $id = $_GET['id'];

      $sql = "SELECT * FROM `course_tbl` WHERE `id` = '$id' ";
      $res = mysqli_query($conn, $sql);
                 
      $count= mysqli_num_rows($res);

      if($count==1){
        //get all the data
        $row = mysqli_fetch_assoc($res);
        $dept_name = $row['department'];
        $course_name = $row['course_name'];
      }
      else{
        //redirect
         echo "<script>alert('data not found');</script>";
        echo "<script>location.href='manage_course.php';</script>";
      }
     
 } 
 else{
       echo "<script>alert('data not found');</script>";
      echo "<script>location.href='manage_course.php';</script>";
 }

?>        







     <div class="main_container p-5">
      <h1 class="text-center h3 fw-bold">Update Course Details</h1>


      <form action="" method="POST" >

    <div style="width: 60%; margin: 50px auto;">


      <div class="pb-3">
        <label for="course_name" class="form-label">Course Name</label>
        <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo $course_name; ?>" placeholder="Course Name" required>
      </div>

      <div class="pb-3">
         <label for="department">Department Name</label>
              <select name="department_name" id="department"  class="form-control" required>
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
               $course_name = $_POST['course_name'];
              
              
                // check course is already exist or not
  $query = mysqli_query($conn, "SELECT * FROM `course_tbl` WHERE course_name = '$course_name'  ");
  if(mysqli_num_rows($query)>0){
    echo "<script>alert('This Course Already Exists!');
    location.href='manage_course.php';</script>";
  }else{


    
                 //3. Update the Database
                 $sql2 = "UPDATE `course_tbl` SET 
                 department = '$dept_name' ,
                 course_name = '$course_name'
                 
                 
                 WHERE `id`='$id'
             ";

             //Execute the Query
             $res2 = mysqli_query($conn, $sql2);

             if($res2==true)
            {
               //profile details Updated
                       echo "<script>alert('Successfully Updated');</script>";
               echo "<script>location.href='manage_course.php';</script>";
            }
            else{
                   echo "<script>alert('Failed to Update');</script>";
              echo "<script>location.href='manage_course.php';</script>";
            }


            }
          }

       ?>
