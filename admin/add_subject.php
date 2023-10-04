<?php include('./navbar.php');  ?>


     <div class="main_container p-5">
           <h1 class="text-center h3 fw-bold">Add New Subject</h1>



             <form action="" method="POST" >

    <div style="width: 60%; margin: 50px auto;">

      <div class="pb-3">
        <label for="subject_name" class="form-label">Subject Name</label>
        <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Subject Name" required>
      </div>

      <div class="pb-3">
        <label for="course">Course Name</label>
              <select name="course_name" id="course" class="form-control" required>
              <?php  
                    //get the data from database
                     $sql = "SELECT * FROM course_tbl";

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
              
               $department = $row['department_name'];
              
            ?>
               <!-- <option value="" disabled selected> Courses</option> -->
              <option value="<?php echo $department; ?>"> <?php echo $department;  ?>  </option> 
              
           
           
            <?php

             }
            }
              ?>
               </select>
      </div>

      <div class="pb-3">
           <select class="form-select" name="semester" aria-label="Default select example">
             <option value="1st">1st Semester</option>
             <option value="2nd">2nd Semester</option>
             <option value="3rd">3rd Semester</option>
             <option value="4th">4th Semester</option>
             <option value="5th">5th Semester</option>
             <option value="6th">6th Semester</option>
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

     
    $subject_name = $_POST['subject_name'];
    $course = $_POST['course_name'];
    $semester = $_POST['semester'];
    $department = $_POST['department_name'];
   
   
  // check class is already exist or not
  $query = mysqli_query($conn, "SELECT * FROM `subject_tbl` WHERE subject_name = '$subject_name' and  course_name = '$course' ");
  if(mysqli_num_rows($query)>0){
    echo "<script>alert('This Subject Already Exists!');
    location.href='manage_subject.php';</script>";
  }else{





   // save the order in database 
    $sql = "insert into subject_tbl (subject_name, course_name,department_name,semester) 
    values( '$subject_name','$course','$department','$semester') 
            ";
     // execute the query
      $res = mysqli_query($conn,$sql);

      if($res == true)
      {
        // $_SESSION['update'] = '<div class="aletr alert-success text-center py-2 px-2">Successfully Added</div>';
        echo "<script>alert('succeddfully added');</script>";
          echo "<script>location.href='manage_subject.php';</script>";
      }else{
        echo "<script>alert('failed to add');</script>";
        echo "<script>location.href='add_subject.php';</script>";
      }
  }

  }   
?>