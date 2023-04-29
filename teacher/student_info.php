<?php include('./navbar.php');  ?>





<!-- <?php
         

      //create sql query to get all data
       $sql = "select * from `applied_job_tbl` where `user_id`='$t_id'";

     $res = mysqli_query($conn, $sql);
     
     $count= mysqli_num_rows($res);

     if($count==1){
       //get all the data
       $row = mysqli_fetch_assoc($res);
               // $id=$row['id'];
              
               $dept = $row['department'];
               $cont = $row['contact'];
               
     } else{
      //redirect
       echo "<script>alert('Details not found');</script>";
       echo "<script>location.href = 'teacher_dashboard.php';</script>";
    }
 ?> -->




<div class="main_container p-5">








    <form action="" method="POST">
            
 
         <div class="pb-3 w-25">
            <label for="course" class="form-label">course Name: </label>
            <select name="course_name" id="course" class="form-control" required>
                <?php  
                    //get the data from database
                     $sql = "SELECT * FROM `course_tbl` ";

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
                <option value="<?php echo $course; ?>">
                    <?php echo $course;  ?>
                </option>



                <?php

             }
            }
              ?>
            </select>
        </div>

       

        <input type="submit" class="btn btn-primary mb-5" name="submit" value="Check" class="btn-secondary">
    </form>


<!--  -->
    <table class="table table-striped mt-4">
  <thead class="bg-secondary text-white">
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Course</th>
      <th scope="col">Semester</th>
      <th scope="col">Registration No</th>
     
     
    </tr>
  </thead>

  <?php

if(isset($_POST['submit']))
{
 // echo "clicked";
$course = $_POST['course_name'];
 


      $sql = "SELECT * FROM `student_tbl` WHERE `course`='$course' ";
      

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
               $id = $row['user_id'];
               

                 ?>






<tbody>
    <tr>
      <td scope="row"><?php echo $sn++ ; ?></td>
     
                                    
      <td><?php echo $name; ?></td>
      <td><?php echo $contact; ?></td>
      <td><?php echo $course; ?></td>
      <td><?php echo $semester; ?></td>
      <td><?php echo $id; ?></td>
     
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