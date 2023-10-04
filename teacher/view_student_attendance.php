<?php include('./navbar.php');  ?>




     <div class="main_container p-5">

     <h3 class="h3 text-center bg-primary py-3 rounded text-white">Student Attendance Record</h3>
      


    <form action="" method="POST" class="py-4">
            <div class="my-3 row col-lg-2">
              <label for="exampleFormControlInput1" class="form-label ">Student name:</label>
              <input type="text" class="form-control" name="student_name" value="" id="exampleFormControlInput1" placeholder="name">
            </div>

            <div class="my-3 row col-lg-2">
              <label for="exampleFormControlInput2" class="form-label ">Student Id:</label>
              <input type="text" class="form-control" name="student_id" value="" id="exampleFormControlInput2" placeholder="Student Id">
            </div>
               
             <div class="d-flex justify-content-between">
              <div> <h4>From</h4> <input type="date" name="startDate" value="" class="form-control" id="exampleCheck1"></div>
              <div> <h4>To</h4> <input type="date" name="endDate" value="" class="form-control" id="exampleCheck1"></div>
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
 $name = $_POST['student_name'];
 $s_id = $_POST['student_id'];


      $sql = "SELECT * FROM `attendance_tbl` WHERE  user_id='$s_id' AND student_name= '$name'  AND  date BETWEEN '$startDate' AND '$endDate' ";
      

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
               $sub = $row['subject'];
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
      <td><?php echo $sub; ?></td>
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
                       <td colspan="10"><div class="error">No data found</div></td>
                    </tr>


                <?php
              } 
            }

                  ?>

     
  </tbody>
</table>








    </div>


<?php include('./footer.php');  ?>     