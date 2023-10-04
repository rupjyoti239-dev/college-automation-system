<?php include('./navbar.php');  ?>



     <div class="main_container p-5">
     
     
     <h3 class="h3 text-center bg-primary py-3 rounded text-white">View Monthly Attendance Record</h3>


    <form action="" method="POST" class="py-4 ">
         <div class="w-50 d-flex justify-content-between">
            <div>
              <label for="dt1" class="form-label">From</label> 
              <input type="date" name="startDate" value="" class="form-control" id="exampleCheck1">
            </div>


            <div>
              <label for="dt1" class="form-label">To</label>
              <input type="date" name="endDate" value="" class="form-control" id="exampleCheck1">
            </div>
         </div>


         <div class="w-25 mt-5">
            <div>
              <label for="course" class="form-label">Subject Name: </label>
            <select name="subject_name" id="subject" class="form-control" required>
                <?php  
                    //get the data from database
                     $sql = "SELECT * FROM `subject_tbl` where `teacher_id`='$t_id'  ";

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
              
               $subject = $row['subject_name'];
              
            ?>
                <!-- <option value="" disabled selected> Courses</option> -->
                <option value="<?php echo $subject; ?>">
                    <?php echo $subject;  ?>
                </option>



                <?php

             }
            }
              ?>
            </select>
            </div>

       </div>
       
       <input type="submit" class="btn btn-primary mt-3" name="submit" value="Check" class="btn-secondary">
    </form>
    <div class="d-flex justify-content-end"><Button class="btn btn-success" id="downloadexcel">Export To Excel</Button></div>




    <table class="table table-striped mt-4" id="table-1">
  <thead class="bg-secondary text-white">
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Course</th>
      <th scope="col">Semester</th>
      <th scope="col">Subject</th>
      <th scope="col">Registration No</th>
      <th scope="col">Date</th>
      <th scope="col" >Attendance</th>
     
    </tr>
  </thead>






<?php
if(isset($_POST['submit']))
{
 // echo "clicked";
$startDate = $_POST['startDate'];
 $endDate = $_POST['endDate'];
 $subject = $_POST['subject_name'];


      $sql = "SELECT * FROM `attendance_tbl` WHERE `subject`='$subject'   AND  date BETWEEN '$startDate' AND '$endDate' ";
      

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
      <td>

    
     
    </tr>
     <?php 
              }
            }
              else{
                //do not have the data
              //we will display the msg inside the table
                    ?>

                    <tr>
                       <td colspan="10"><div class="error">Data not found</div></td>
                    </tr>


                <?php
              } 
            }

                  ?>

     
  </tbody>
</table>

















     </div>


<?php include('./footer.php');  ?>     

