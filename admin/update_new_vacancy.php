<?php include('./navbar.php');  ?>


<div class="main_container ">

  <h1 class="text-center h3 fw-bold mt-5">Update New Vacancy</h1>

  <form action="" method="POST" >

    <div style="width: 60%; margin: 50px auto;">

      <div class="pb-3">
        <label for="post-name" class="form-label">Vacancy Name</label>
        <input type="text" class="form-control" id="post-name" name="post_name" placeholder="Vacancy Name" required>
      </div>

      <div class="pb-3">
        <label for="job details" class="form-label">Job Details</label>
        <textarea name="job_details"  class="form-control" id="job details" cols="30" required></textarea>
      </div> 

      <div class="pb-3">
       <label for="salary" class="form-label">Salary</label>
       <input type="number" name="salary" class="form-control" id="salary" placeholder="salary" required>
     </div>  

     <div class="pb-3">
       <label for="last date" class="form-label">Last Date</label>
       <input type="date" name="date" class="form-control" id="last date" required>
     </div>  
     
      
      <div class="pb-3">
        <label for="qualification" class="form-label">Qualification</label>
        <textarea name="qualification"  class="form-control" id="qualification" cols="30" required></textarea>
      </div>  


       <div class="pb-3 ">
            <label for="department">Department Name: </label>
            <select name="department_name" id="department" class="form-control" required>
                <?php  
                    //get the data from database
                     $sql = "SELECT * FROM department_tbl  ";

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
              
               $dept = $row['department_name'];
              
            ?>
                <!-- <option value="" disabled selected> Courses</option> -->
                <option value="<?php echo $dept; ?>">
                    <?php echo $dept;  ?>
                </option>



                <?php

             }
            }
              ?>
            </select>
        </div>

      <div class="mb-3">
        <input type="submit" value="UPLOAD" name="upload" class="btn btn-primary">
      </div>


    </div>


  </form>

  
</div>


<?php include('./footer.php');  ?>



<?php 

    //check whether submit button is clicked or not
    if(isset($_POST['upload']))
    {

     // echo "click";
    //get all the details from the form
    // $bill_no = mt_rand(100000000, 999999999);
    $post_name = $_POST['post_name'];
    $job_details = $_POST['job_details'];             
    $salary = $_POST['salary'];
    $date = $_POST['date'];
    $dept = $_POST['department_name'];
    $qualification = $_POST['qualification'];
   

   // save the order in database 
    $sql = "insert into job_vacancy_tbl (vacancy_name,salary,qualification,job_details,department_name,last_date) 
    values( '$post_name','$salary','$qualification','$job_details','$dept','$date' ) 
            ";
     // execute the query
      $res = mysqli_query($conn,$sql);

      if($res == true)
      {
        // $_SESSION['update'] = '<div class="aletr alert-success text-center py-2 px-2">Successfully Added</div>';
        echo "<script>alert('succeddfully added');</script>";
          echo "<script>location.href='update_new_vacancy.php';</script>";
      }else{
        echo "<script>alert('failed added');</script>";
        echo "<script>location.href='update_new_vacancy.php';</script>";
      }
    }
?>