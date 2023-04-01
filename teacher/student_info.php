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
      <p class="text-center h6">Subject: <?php echo $subject; ?>, &nbsp;&nbsp;  <?php echo $course; ?> &nbsp;&nbsp;  </p>



      <table class="table table-striped ">
    <thead>
      <tr>
        <th scope="col">S.N</th>
        <th scope="col">Name</th>
        <th scope="col">Course</th>
        <th scope="col">semester</th>
        <th scope="col">Contact No</th>
        <th scope="col">Registration No</th>
      </tr>
    </thead>

    <?php
      $sql = "SELECT * FROM `student_tbl` where course = '$course'  " ;

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
        
        
      </tr>
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


<?php include('./footer.php');  ?>     