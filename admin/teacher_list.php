<?php include('./navbar.php');  ?>


<div class="main_container p-5">

  <h2 class="text-center h3 fw-bold pb-5">Teacher List</h2>



<div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4 text-center">
    
    <!-- 1st -->
    <?php   
  
  //getting the data from database 
  $sql = "SELECT * FROM applied_job_tbl  WHere `status`='selected' ";

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
      $name = $row['name'];
      $dept = $row['department'];
      $id = $row['user_id'];
      
     ?>



      <div class="col">
           <div class="card" style="width: 300px; ">
              
               <img src="../images/icon.webp" class="card-img-top rounded-circle" alt="..." style=" height: 150px;">
              <div class="card-body">
                <h5 class="card-title">Name: <?php echo $name; ?></h5>
                <p>Department: <?php echo $dept; ?></p>
                <p class="fw-bold"> Teacher Id: <?php echo $id; ?></p>
                <a href="teacher_info.php?id=<?php echo $id; ?>" class="btn btn-primary">More Info</a>
              </div> 
            </div>
       </div>

   <!-- end -->
   <?php
       }
     }
     else{
       // Not Available 
       echo "<div class='error'>Teacher not  available.</div>";
     } 
   
     
     ?>


</div>
 </div>





</div>


<?php include('./footer.php');  ?>