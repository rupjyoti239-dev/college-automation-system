<?php include('./navbar.php');  ?>


<?php
         

      //create sql query to get all data
       $sql = "select * from `applied_job_tbl` where `user_id`='$id'";

     $res = mysqli_query($conn, $sql);
     
     $count= mysqli_num_rows($res);

     if($count==1){
       //get all the data
       $row = mysqli_fetch_assoc($res);
               // $id=$row['id'];
               $subject = $row['subject_name'];
               $course = $row['course'];
               $semester = $row['semester'];
               // $class = $row['class'];
     } else{
      //redirect
       echo "<script>alert('Details not found');</script>";
       echo "<script>location.href = 'teacher_dashboard.php';</script>";
    }
 ?>



     <div class="main_container p-5">
      <p class="text-center h5 pb-5">Subject: <?php echo $subject; ?>, &nbsp;&nbsp;  <?php echo $course; ?> &nbsp;&nbsp; <?php echo $semester; ?> Semester </p>


<div class=" p-3">
<?php $date =  date("Y-m-d");  ?>
<h2 class="h4 bg-primary py-1 text-white rounded text-center">Take Attendance of: &nbsp; <?php echo $subject; ?>, <?php echo $course; ?> <?php echo $semester; ?> Semester  &nbsp;(<?php echo $date; ?>)</h2>
      <table class="table table-striped ">
    <thead>
      <tr>
        <th scope="col">S.N</th>
        <th scope="col">Name</th>
        <th scope="col">Course</th>
        <th scope="col">semester</th>
        <th scope="col">Contact No</th>
        <th scope="col">Registration No</th>
        <th scope="col">Status</th>
      </tr>
    </thead>

    <?php
      $sql = "SELECT * FROM `student_tbl` where course = '$course' and `semester`='$semester' " ;

      //execute the query
      $res = mysqli_query($conn,$sql);

      //count rows
      $count = mysqli_num_rows($res);

      //create serial number variable
      $sn=1;

      //check whether we have data in database or not 
           if($count>0)
           {

            //we have data in database 
            //get the data and display

            while($row=mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $name = $row['name'];
              $course = $row['course'];
              $semester = $row['semester'];
              $contact = $row['mobile'];
              $id = $row['user_id'];
             

                ?>

    <tbody>
      <tr>
        <th scope="row">
          <?php echo $sn++ ; ?>
        </th>
        <td>
          <?php echo $name; ?>
        </td>
        <td>
          <?php echo $course; ?>
        </td>
        <td>
          <?php echo $semester; ?>
        </td>
        <td>
          <?php echo $contact; ?>
        </td>
        <td>
          <?php echo $id; ?>
        </td>
         <form action="" method="POST">
         <td>
          <input type="submit" name="attendance" class="btn btn-success btn-sm" value="present"> &nbsp; &nbsp;
              <input type="submit" name="attendance" class="btn btn-danger btn-sm" value="absent">
        </td>
        
        
      </tr>

              <input type="text" name="name" value="<?php echo $name;  ?>" hidden>
              <input type="text" name="course" value="<?php echo $course;  ?>" hidden>
              <input type="text" name="semester" value="<?php echo $semester;  ?>" hidden>
              <input type="text" name="contact" value="<?php echo $contact;  ?>" hidden>
              <input type="text" name="id" value="<?php echo $id;  ?>" hidden>
              <input type="text" name="subject" value="<?php echo $subject;  ?>" hidden>
              <input type="text" name="date" value="<?php echo $date;  ?>" hidden>


      </form>  
      <?php
                
              }
            }
            else{
              //do not have the data
              //we will display the msg inside the table
              ?>

      <tr>
        <td colspan="6">
          <div class="error">application not found</div>
        </td>
      </tr>

      <?php
            }

  ?>
    </tbody>

  </table>
  </div>











      
     </div>


<?php include('./footer.php');  ?>     







<?php

if(isset($_POST['attendance'])){

  $name = $_POST['name'];

  $course = $_POST['course'];
 
  $semester = $_POST['semester'];
  $contact = $_POST['contact'];
  $id = $_POST['id'];
 
  $course = $_POST['course'];
  $date = $_POST['date'];
  $attendance = $_POST['attendance'];
  $subject = $_POST['subject'];



 

 

  $query = mysqli_query($conn, "SELECT * FROM `attendance_tbl` WHERE user_id='$id' AND `date`='$date'   ");
  if(mysqli_num_rows($query)>0){
    echo "<script>alert('Todays Attendance is already taken!');
    location.href='take_attendance.php';</script>";
  }else
  {





  


  $insertquery = " insert into attendance_tbl (student_name,student_contact, course, subject, semester, user_id, date, attendance) 
  values( '$name',  '$contact',  '$course', '$subject', '$semester','$id',  '$date', '$attendance' ) ";

$res = mysqli_query($conn, $insertquery);

if($res){


echo "<script>
location.href='take_attendance.php';</script>";
}
else{

echo "<script>
alert('Failed to take');
location.href='take_attendance.php';</script>";
}



}
}


?>