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
        echo "<script>location.href = 'teacher_dashboard.php';</script>";
      }
     
 } 
 else{
       echo "<script>alert('data not found');</script>";
      echo "<script>location.href = 'teacher_dashboard.php';</script>";
 }

?>






<div class="main_container p-5">
  <?php $date =  date("Y-m-d");  ?>

  <h3 class="h4 text-center bg-primary text-white py-3 rounded"> Mark Attendance of:  &nbsp;
    <?php echo $course_name; ?> &nbsp;
    <?php echo $semester; ?> semester &nbsp;
    <?php echo $subject_name;  ?> (<span class="h6">Date:  <?php echo $date; ?></span>)
  </h3>


  <table class="table table-striped mt-5 text-center">
    <thead class="bg-secondary text-white">
      <tr>
        <th scope="col">S.N</th>
        <th scope="col">Name</th>
        <th scope="col">Contact</th>
        <th scope="col">Course</th>
        <th scope="col">Semester</th>
        <th scope="col">Registration No</th>
        <th scope="col">Attendance</th>
      </tr>
    </thead>

    <?php


 


      $sql = "SELECT * FROM `student_tbl` WHERE `course`='$course_name'  and `semester`='$semester'  ";
      

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
               $contact = $row['mobile'];
               $course = $row['course'];
               $semester = $row['semester'];
               $u_id = $row['user_id'];
               

                 ?>






    <tbody>



      <tr>
        <td scope="row">
          <?php echo $sn++ ; ?>
        </td>


        <td>
          <?php echo $name; ?>
        </td>
        <td>
          <?php echo $contact; ?>
        </td>
        <td>
          <?php echo $course; ?>
        </td>
        <td>
          <?php echo $semester; ?>
        </td>
        <td>
          <?php echo $u_id; ?>
        </td>


      <form action="" method="POST">

             <td>
               <input id="present" type="submit" name="attendance" class="btn btn-success btn-sm" value="present"> &nbsp; &nbsp;
                   <input id="abbsent" type="submit" name="attendance" class="btn btn-danger btn-sm" value="absent">
             </td>
     
           </tr>
     
           <input type="text" name="name" value="<?php echo $name;  ?>" hidden>
           <input type="text" name="contact" value="<?php echo $contact;  ?>" hidden>
           <input type="text" name="course" value="<?php echo $course;  ?>" hidden>
           <input type="text" name="semester" value="<?php echo $semester;  ?>" hidden>
           <input type="text" name="subject_name" value="<?php echo $subject_name;  ?>" hidden>
           <input type="text" name="u_id" value="<?php echo $u_id;  ?>" hidden>
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
        <td colspan="10">
          <div class="error">Data not found</div>
        </td>
      </tr>


      <?php
              } 
             
                  ?>


    </tbody>
  </table>






</div>


<?php include('./footer.php');  ?>





   







</div>


<?php include('./footer.php');  ?>



<?php

if(isset($_POST['attendance'])){

  


  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $course = $_POST['course'];
  $semester = $_POST['semester'];
  $user_id = $_POST['u_id'];
  $date = $_POST['date'];
  $attendance = $_POST['attendance'];
  $subject = $_POST['subject_name'];



 

 

  $query = mysqli_query($conn, "SELECT * FROM `attendance_tbl` WHERE `subject`='$subject' AND `date`='$date' and `user_id`='$user_id'  ");
  if(mysqli_num_rows($query)>0){
    echo "<script>alert('Todays Attendance is already taken!');
    location.href='teacher_dashboard.php';</script>";
  }else
  {





  


  $insertquery = " insert into attendance_tbl (student_name,student_contact,course,semester,subject,user_id,date,attendance) 
  values( '$name',  '$contact',  '$course', '$semester','$subject', '$user_id',  '$date', '$attendance' ) ";

$res = mysqli_query($conn, $insertquery);



if($res){

  



}
else{

echo "<script>
alert('ERROR:::    Failed to record attendance');
location.href='teacher_dashboard.php';</script>";
}



}
}


?>




