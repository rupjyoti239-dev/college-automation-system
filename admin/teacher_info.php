<?php include('./navbar.php');  ?>


<?php
          //Check whether the id is set or not
          if(isset($_GET['id']))
          {
                 //Get the ID and all other details
                // echo "Getting the Data";
                $id = $_GET['id'];

      $sql = "SELECT * FROM `applied_job_tbl` WHERE `user_id` = '$id' ";
      $res = mysqli_query($conn, $sql);
                 
      $count= mysqli_num_rows($res);

      if($count==1){
        //get all the data
        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];
        $dept_name = $row['department'];
        $contact = $row['contact'];
        $email = $row['email'];
      }
      else{
        //redirect
         echo "<script>alert('data not found');</script>";
        echo "<script>location.href = 'teacher_info.php';</script>";
      }
     
 } 
 else{
       echo "<script>alert('data not found');</script>";
      echo "<script>location.href = 'teacher_info.php';</script>";
 }

?>


<div class="main_container py-5 ">


  <h1 class="text-center h3 fw-bold pb-5">Teacher Info</h1>

  <div class="card mb-3" style="max-width: 540px; margin:auto;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="../images/icon.webp" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Name: <?php echo $name ?> </h5>
          <p class="card-text "> <span class="fw-medium"> Department: </span> <?php echo $dept_name ?></p>
          <p class="card-text "> <span class="fw-medium"> Contact: </span> <?php echo $contact ?></p>
          <p class="card-text "> <span class="fw-medium"> Email: </span> <?php echo $email ?></p>
          <p class="card-text "> <span class="fw-medium"> Teacher Id: </span> <?php echo $id ?></p>
          <p><span class="fw-medium"> Subjects: </span> </p>
               <ul>

<?php   
  
  //getting the data from database 
  $sql = "SELECT * FROM subject_tbl  WHere `teacher_id`='$id' ";

  //execute the query
  $res = mysqli_query($conn,$sql);
  
  //count rows
  $count = mysqli_num_rows($res);

  //check whether data is available or not
  if($count>0)
  {
    //data is available

    while($row=mysqli_fetch_assoc($res)){

      //get all the value
      $id = $row['id'];
      $sub = $row['subject_name'];
     ?>


            <li><?php echo $sub; ?></li>
             <?php
               }
             }
             else{
               // Not Available 
               echo "<div class='error'>Subject Not Assigned</div>";
             } 
           
             
             ?>



          </ul>


        </div>
      </div>
    </div>
  </div>



</div>




<?php include('./footer.php');  ?>