<?php include('./navbar.php');  ?>


<?php
          //Check whether the id is set or not
          if(isset($_GET['id']))
          {
                 //Get the ID and all other details
                // echo "Getting the Data";
                $id = $_GET['id'];

      $sql = "SELECT * FROM `applied_job_tbl` WHERE `id` = '$id' ";
      $res = mysqli_query($conn, $sql);
                 
      $count= mysqli_num_rows($res);

      if($count==1){
        //get all the data
        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];
        $dept_name = $row['department'];
        $contact = $row['contact'];
      }
      else{
        //redirect
         echo "<script>alert('data not found');</script>";
        echo "<script>location.href='teacher_info.php';</script>";
      }
     
 } 
 else{
       echo "<script>alert('data not found');</script>";
      echo "<script>location.href='teacher_info.php';</script>";
 }

?>        


     <div class="main_container">


      <div class="shadow-sm bg-white p-3 w-50 mx-auto my-5">
        <form action="" method="POST">
            <div class="pb-3">
        <label for="teacher_name" class="form-label">Teacher Name</label>
        <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="<?php echo $name; ?>" readonly>
      </div>
        <div class="pb-3">
        <label for="department" class="form-label">Department</label>
        <input type="text" class="form-control" id="department" name="department" value="<?php echo $dept_name; ?>"  readonly>
      </div>
        <div class="pb-3">
        <label for="contact" class="form-label">Contact</label>
        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>" readonly>
      </div>

      
      <div class="bg-success-subtle p-3">
      <div class="pb-3 ">
         <label for="course" class="form-label">Course Name</label>
              <select name="course_name" id="course"  class="form-control" required>
              <?php  
                    //get the data from database
                     $sql = "SELECT * FROM course_tbl ";

                     //execute the query  where department_name LIKE '%$dept_name%'
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
              
               $course = $row['course_name'];
              
            ?>
               <!-- <option value="" disabled selected> Courses</option> -->
              <option value="<?php echo $course; ?>"> <?php echo $course;  ?>  </option> 
              
           
           
            <?php

             }
            }
              ?>
               </select>
      </div>

      <div class="pb-3 ">
         <label for="subject" class="form-label">Subject Name</label>
              <select name="subject_name" id="subject"  class="form-control" required>
              <?php  
                    //get the data from database
                     $sql = "SELECT * FROM subject_tbl ";

                     //execute the query  where department_name LIKE '%$dept_name%'
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
              
               $subject = $row['subject_name'];
              
            ?>
               <!-- <option value="" disabled selected> Courses</option> -->
              <option value="<?php echo $subject; ?>"> <?php echo $subject;  ?>  </option> 
              
           
           
            <?php

             }
            }
              ?>
               </select>
      </div>


      <div class="pb-3 ">
        <label for="sem" class="form-label">Semester Name:</label>
           <select class="form-select" name="semester" id="sem" aria-label="Default select example">
             <option value="1st">1st Semester</option>
             <option value="2nd">2nd Semester</option>
             <option value="3rd">3rd Semester</option>
             <option value="4th">4th Semester</option>
             <option value="5th">5th Semester</option>
             <option value="6th">6th Semester</option>
           </select>     
      </div>

 <div class="mb-3">
        <input type="submit" value="UPDATE" name="update" class="btn btn-primary">
      </div>


        </form>
          </div>       


      </div>

        
     </div>


<?php include('./footer.php');  ?>     




<?php
            if(isset($_POST['update']))
            {
                

               //1. Get all the values from our form
              
              
               $subject = $_POST['subject_name'];
               $course = $_POST['course_name'];
               $sem = $_POST['semester'];
              
              
                // check course is already exist or not
  $query = mysqli_query($conn, "SELECT * FROM `applied_job_tbl` WHERE subject_name = '$subject'  ");
  if(mysqli_num_rows($query)>0){
    echo "<script>alert('This class is already assign!');
    location.href='teacher_info.php';</script>";
  }else{


    
                 //3. Update the Database
                 $sql2 = "UPDATE `applied_job_tbl` SET 
                
                 subject_name = '$subject',
                 course = '$course',
                 semester = '$sem'
                 
                 
                 WHERE `id`='$id'
             ";

             //Execute the Query
             $res2 = mysqli_query($conn, $sql2);

             if($res2==true)
            {
               //profile details Updated
                       echo "<script>alert('Successfully Updated');</script>";
               echo "<script>location.href='teacher_info.php';</script>";
            }
            else{
                   echo "<script>alert('Failed to Update');</script>";
              echo "<script>location.href='teacher_info.php';</script>";
            }


            }
          }

       ?>
