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
        $department_name = $row['department_name'];
       
      }
      else{
        //redirect
         echo "<script>alert('data not found');</script>";
        echo "<script>location.href='class_list.php';</script>";
      }
     
 } 
 else{
       echo "<script>alert('data not found');</script>";
      echo "<script>location.href='class_list.php';</script>";
 }

?>        











     <div class="main_container py-5">
          <h1 class="text-center h3 fw-bold ">Assign Teacher</h1>

          <form action="" method="POST" >

    <div style="width: 40%; margin: 50px auto;" class="bg-success-subtle p-3 rounded-sm" >


      <div class="pb-3">
        <label for="subject_name" class="form-label">Subject Name</label>
        <input type="text" class="form-control text-center" id="subject_name" name="subject_name" value="<?php echo $subject_name; ?>" placeholder="Subject Name" readonly>
      </div>
     
      <div class="pb-3">
         <label for="teacher">Teacher Name</label>
              <select name="teacher_name" id="teacher"  class="form-control" required>
              <?php  
                    //get the data from database
                     $sql = "SELECT * FROM applied_job_tbl where department like '%$department_name'  ";

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
              
               $name = $row['name'];
               $u_id = $row['user_id'];
              
            ?>
               <!-- <option value="" disabled selected> Courses</option> -->
              <option value="<?php echo $name; ?>"> <?php echo $name;?> (<?php echo $u_id; ?>) </option> 
              
           
           
            <?php

             }
            }
              ?>
               </select>
      </div>



    <div class="mb-3">
        <input type="submit" value="UPDATE" name="update" class="btn btn-primary">
      </div>


    </div>


  </form>

     </div>


<?php include('./footer.php');  ?>     



<?php
            if(isset($_POST['update']))
            {
                

               //1. Get all the values from our form
              
               $subject_name = $_POST['subject_name'];
               $teacher_name = $_POST['teacher_name'];
              
              


                 
  // check class is already exist or not
  // $query = mysqli_query($conn, "SELECT * FROM `subject_tbl` WHERE subject_name = '$subject_name' and semester = '$semester' and course_name = '$course_name' ");
  // if(mysqli_num_rows($query)>0){
  //   echo "<script>alert('This Subject Already Exists!');
  //   location.href='manage_subject.php';</script>";
  // }else{


    
                 //3. Update the Database
                 $sql2 = "UPDATE `subject_tbl` SET 
                 subject_name = '$subject_name' ,
                 class_teacher = '$teacher_name',
                 teacher_id = '$u_id'
                 
                 
                 WHERE `id`='$id'
             ";

             //Execute the Query
             $res2 = mysqli_query($conn, $sql2);

             if($res2==true)
            {
               //profile details Updated
                       echo "<script>alert('Successfully Updated');</script>";
               echo "<script>location.href='class_list.php';</script>";
            }
            else{
                   echo "<script>alert('Failed to Update');</script>";
              // echo "<script>location.href='class_list.php';</script>";
            }


            }
          // }
       ?>
