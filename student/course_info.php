<?php include('./navbar.php'); 


 $sql = "SELECT * FROM `student_tbl` WHERE `user_id` = '$s_id' ";
      $res = mysqli_query($conn, $sql);
                 
      $count= mysqli_num_rows($res);

      if($count==1){
        //get all the data
        $row = mysqli_fetch_assoc($res);
         $name = $row['name'];
         $dept = $row['department_name'];
         $course = $row['course'];
         $semester = $row['semester'];
      }
      else{
        //redirect
        //  echo "<script>alert('data not found');</script>";
        // echo "<script>location.href='teacher_dashboard.php';</script>";
      }
 ?>

     <div class="main_container p-5">

            <h3 class="h3 text-center">Course Name: <?php echo $course; ?>  <?php echo $semester; ?> semester </h3>
            <ul class="mt-5"><span class="fw-bold ">Subjects</span> 

                <?php   
  
  //getting the data from database 
  $sql = "SELECT * FROM subject_tbl  WHere `course_name`='$course' ";

  //execute the query
  $res = mysqli_query($conn,$sql);
  
  //count rows
  $count = mysqli_num_rows($res);

  //check whether data is available or not
  if($count>0)
  {
    //data is available

    while($row=mysqli_fetch_assoc($res)){

      //get all the value
      $id = $row['id'];
      $sub = $row['subject_name'];
     
     ?>


            <li><a href=""><?php echo $sub; ?></a></li>
             <?php
               }
             }
             else{
               // Not Available 
            //    echo "<div class='error'>Subject Not Assigned</div>";
             } 
           
             
             ?>




            </ul>


    </div>


<?php include('./footer.php');  ?>     