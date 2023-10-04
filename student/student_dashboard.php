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
      <div class="card mb-3" style="max-width: 540px; margin:auto;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="../images/icon.webp" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title my-2 fw-bold">Name: <?php echo $name ?> </h5>
          <p class="card-text "> <span class="fw-medium"> Department: </span> <?php echo $dept; ?></p>
          <p class="card-text "> <span class="fw-medium"> Course: </span> <?php echo $course; ?></p>
          <p class="card-text "> <span class="fw-medium"> Semester: </span> <?php echo $semester; ?></p>
          <p class="card-text "> <span class="fw-medium"> Student Id: </span> <?php echo $s_id; ?></p>
          <p><span class="fw-medium"> Subjects: </span> </p>
               <ul>

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


            <li><a href="" style="text-decoration:none;"><?php echo $sub;?></a></li>
             <?php
               }
             }
             else{
               // Not Available 
            //    echo "<div class='error'>Subject Not Assigned</div>";
             } 
           
             
             ?>


        </div>
      </div>
    </div>
  </div>



</div>


     </div>


<?php include('./footer.php');  ?>     