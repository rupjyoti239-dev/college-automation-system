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

        <?php $date =  date("Y-m-d");  ?>
        <h3 class="text-center h4 py-1 rounded bg-primary text-white my-5">Today's Attendance (<?php echo $date; ?>)</h3>


<table class="table table-striped mt-4">
  <thead class="bg-secondary text-white">
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Course</th>
      <th scope="col">Semester</th>
      <th scope="col">Contact No</th>
      <th scope="col">Registration No</th>
      <th scope="col">Date</th>
      <th scope="col" >Attendance</th>
     
     
    </tr>
  </thead>

  <?php


 // echo "clicked";
// $startDate = $_POST['startDate'];
//  $endDate = $_POST['endDate'];
//  $name = $_POST['std_name'];


      $sql = "SELECT * FROM `attendance_tbl` WHERE `subject`='$subject' AND date ='$date' ";
      

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
               $name = $row['student_name'];
               $contact = $row['student_contact'];
               $course = $row['course'];
               $semester = $row['semester'];
               $subject = $row['subject'];
               $id = $row['user_id'];
               $date = $row['date'];
               $attendance = $row['attendance'];

                 ?>






<tbody>
    <tr>
      <td scope="row"><?php echo $sn++ ; ?></td>
     
                                    
       <td><?php echo $name; ?></td>
      <td><?php echo $contact; ?></td>
      <td><?php echo $course; ?></td>
      <td><?php echo $semester; ?></td>
      <td><?php echo $subject; ?></td>
      <td><?php echo $id; ?></td>
      <td><?php echo $date; ?></td>
      <td><?php echo $attendance; ?></td>
      

    
     
    </tr>
     <?php 
              }
            }
              else{
                //do not have the data
              //we will display the msg inside the table
                    ?>

                    <tr>
                       <td colspan="10"><div class="error">No data found</div></td>
                    </tr>


                <?php
              } 
           

                  ?>

     
  </tbody>
</table>














    </div>


<?php include('./footer.php');  ?>     