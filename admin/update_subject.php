<?php include('./navbar.php');  ?>


 <?php
          //Check whether the id is set or not
          if(isset($_GET['id']))
          {
                 //Get the ID and all other details
                // echo "Getting the Data";
                $id = $_GET['id'];

      $sql = "SELECT * FROM `subject_tbl` WHERE `id` = '$id' ";
      $res = mysqli_query($conn, $sql);
                 
      $count= mysqli_num_rows($res);

      if($count==1){
        //get all the data
        $row = mysqli_fetch_assoc($res);
        $subject_name = $row['subject_name'];
        $course_name = $row['course_name'];
        $semester = $row['semester'];
      }
      else{
        //redirect
         echo "<script>alert('data not found');</script>";
        echo "<script>location.href='manage_subject.php';</script>";
      }
     
 } 
 else{
       echo "<script>alert('data not found');</script>";
      echo "<script>location.href='manage_subject.php';</script>";
 }

?>        







     <div class="main_container p-5">
      <h1 class="text-center h3 fw-bold">Update Class Details</h1>


      <form action="" method="POST" >

    <div style="width: 60%; margin: 50px auto;">


      <div class="pb-3">
        <label for="subject_name" class="form-label">Subject Name</label>
        <input type="text" class="form-control" id="subject_name" name="subject_name" value="<?php echo $subject_name; ?>" placeholder="Subject Name" required>
      </div>

      <div class="pb-3">
         <label for="course">Course Name</label>
              <select name="course_name" id="course"  class="form-control" required>
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
              
               $subject_name = $_POST['subject_name'];
               $course_name = $_POST['course_name'];
               $semester = $_POST['semester'];
              
              


                 
  // check class is already exist or not
  $query = mysqli_query($conn, "SELECT * FROM `subject_tbl` WHERE subject_name = '$subject_name' and semester = '$semester' and course_name = '$course_name' ");
  if(mysqli_num_rows($query)>0){
    echo "<script>alert('This Subject Already Exists!');
    location.href='manage_subject.php';</script>";
  }else{


    
                 //3. Update the Database
                 $sql2 = "UPDATE `subject_tbl` SET 
                 subject_name = '$subject_name' ,
                 course_name = '$course_name',
                 semester = '$semester'
                 
                 
                 WHERE `id`='$id'
             ";

             //Execute the Query
             $res2 = mysqli_query($conn, $sql2);

             if($res2==true)
            {
               //profile details Updated
                       echo "<script>alert('Successfully Updated');</script>";
               echo "<script>location.href='manage_subject.php';</script>";
            }
            else{
                   echo "<script>alert('Failed to Update');</script>";
              echo "<script>location.href='manage_subject.php';</script>";
            }


            }
          }
       ?>
