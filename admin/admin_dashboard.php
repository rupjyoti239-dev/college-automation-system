<?php include('./navbar.php');  ?>


     <div class="main_container py-5">

<div class="container mt-5 d-flex justify-content-evenly">

  <a href="teacher_list.php" style="text-decoration: none;">
  <div class="p-5 text-center fw-bold text-white rounded" style="width: 250px; height:150px; background-color: #537FE7;">
  <?php
    //sql query
       $sql = "select * from applied_job_tbl";

       //execute the query
       $res= mysqli_query($conn,$sql);

       //count rows
       $count = mysqli_num_rows($res);

      ?>
  Total Faculties <br>
  <h1><?php echo $count; ?> </h1> 
 </div></a>


  <a href="student_info.php" style="text-decoration: none;">
 <div class="p-5 text-center fw-bold text-white rounded" style="width: 250px; height:150px; background-color: #537FE7;">
  <?php
    //sql query
       $sql = "select * from student_tbl";

       //execute the query
       $res= mysqli_query($conn,$sql);

       //count rows
       $count = mysqli_num_rows($res);

      ?>
  Total Student  <br>
   <h1><?php echo $count; ?></h1> 
 </div>
 </a>

  
  <a href="manage_department.php" style="text-decoration: none;">
  <div class="p-5 text-center fw-bold text-white rounded" style="width: 250px; height:150px; background-color: #537FE7;">
  <?php
    //sql query
       $sql = "select * from department_tbl";

       //execute the query
       $res= mysqli_query($conn,$sql);

       //count rows
       $count = mysqli_num_rows($res);

      ?>
  No of Department <br>
   <h1><?php echo $count; ?></h1> 
  </div>
</div>
</a>


 <a href="manage_course.php" style="text-decoration: none;">
<div class="container mt-5 d-flex justify-content-evenly">
  <div class="p-5 text-center fw-bold text-white rounded" style="width: 250px; height:150px; background-color: #537FE7;">
  <?php
    //sql query
       $sql = "select * from course_tbl";

       //execute the query
       $res= mysqli_query($conn,$sql);

       //count rows
       $count = mysqli_num_rows($res);

      ?>
  No of Course <br>
   <h1><?php echo $count; ?></h1> 
 </div>
</a>


 <a href="check_job_application.php" style="text-decoration: none;">
 <div class="p-5 text-center fw-bold text-white rounded" style="width: 250px; height:150px; background-color: #537FE7;">
  <?php
    //sql query
       $sql = "select * from applied_job_tbl where `status`='pending'";

       //execute the query
       $res= mysqli_query($conn,$sql);

       //count rows
       $count = mysqli_num_rows($res);

      ?>
  New Job Application  <br>
   <h1><?php echo $count; ?></h1> 
 </div>
</a>

  
 <a href="check_admission_application.php" style="text-decoration: none;">
  <div class="p-5 text-center fw-bold text-white rounded" style="width: 250px; height:150px; background-color: #537FE7;">
  <?php
    //sql query
       $sql = "select * from student_tbl where `status`='pending'";

       //execute the query
       $res= mysqli_query($conn,$sql);

       //count rows
       $count = mysqli_num_rows($res);

      ?>
 New Admission Application <br>
   <h1><?php echo $count; ?></h1> 
</div>
</a>

     </div>
</div>


<?php include('./footer.php');  ?>     