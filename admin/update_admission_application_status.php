<?php include('./navbar.php');  ?>

<?php  
//Check whether the id is set or not
if(isset($_GET['id']))
{
       //Get the ID and all other details
      // echo "Getting the Data";
      $id = $_GET['id'];
       //create sql query to get all data
       $sql = "select * from `student_tbl` where `id`=$id";

     $res = mysqli_query($conn, $sql);
     
     $count= mysqli_num_rows($res);

     if($count==1){
       //get all the data
       $row = mysqli_fetch_assoc($res);
       $id=$row['id'];
       $name = $row['name'];
       $f_name = $row['father_name'];
       $address = $row['address'];
       $email = $row['email'];
       $contact = $row['mobile'];
       $pdf = $row['certificate'];
      //  $status = $row['status'];
      
      
       
     }
     else{
       //redirect
      echo "<script>alert('Details not found');</script>";
       echo "<script>location.href = 'check_admission_application.php';</script>";
     }
    
} 
else{
     //redirect to manage car page
     echo "<script>location.href = 'check_admission_application.php';</script>";
}
?>




<div class="main_container p-5 ">

  <p class="fw-bold">
    <!-- <?php echo $pdf; ?> -->
     <a href="http://localhost/college-automation-system/pdf/certificate/<?php echo $pdf; ?>" target="_blank" class="btn btn-sm"> <span class="fw-bold btn btn-sm bg-success text-white">Download certificate <i class="fa-solid fa-file-arrow-down text-warning"></i></span> </a>

    <!-- <i class="fa-solid fa-circle-down"></i> -->
  </p>

  

  <form action="" method="post">
     <select name="status" id="status" class="form-control w-25"  required>
                 
                <option value="selected">Select</option>
                <option value="rejected">Reject</option>
               
              </select>

              <input type="text" value="1st" name="semester" hidden>
    <input type="submit" name="submit" value="Update Status"  class="btn btn-primary my-4">

  </form>



</div>


<?php include('./footer.php');  ?>



<?php
       
       if(isset($_POST['submit']))
       {
          //echo "Clicked";
          //1. Get all the values from our form
          // $id = $_POST['id'];
          $status = $_POST['status'];
          $sem = $_POST['semester'];


          //. Update the Database
          $sql2 = "UPDATE `student_tbl` SET 
          `status` = '$status',
          `semester` = '$sem'
         
          WHERE `id`=$id
      ";

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //4. REdirect to Manage Category with MEssage
                //CHeck whether executed or not
                if($res2==true)
                {


                 if($status == 'selected'){
                   // set teacher id and password

                  $user_id = mt_rand(1000, 9999);
                  $password = mt_rand(1000000, 9999999);

                    $sql3 = "UPDATE `student_tbl` SET 
                    `user_id` = '$user_id',
                    `password` = '$password'
                   
                   WHERE `id`=$id
                 ";
                  // execute the query
                   $res = mysqli_query($conn,$sql3);

                  //  send mail to user
                  $to_email = $email;
                  $subject = "College Automation System";
                  $body = "Hello,".$name." Your Admission form is accepted. You can login by using the following ID and Password UserId is ".$user_id." and Password: ".$password; 
                  $headers = "From: rupjyotisarma706@gmail.com";
                  
                  if (mail($to_email, $subject, $body, $headers)) {
                     echo "<script>alert('mail send');</script>";

                  } else {
                      echo "<script>alert('mail not send');</script>";
                  }



                  

                 }else{

                  // remove userid and password
                   $userId = "";
                  $password = "";

                    $sql3 = "UPDATE `student_tbl` SET 
                    `user_id` = '$userId',
                    `password` = '$password'
                   
                   WHERE `id`=$id
                 ";
                  // execute the query
                   $res = mysqli_query($conn,$sql3);

                    $to_email = $email;
                  $subject = "College Automation System";
                  $body = "Sorry, Your application is rejected"; 
                  $headers = "From: rupjyotisarma706@gmail.com";
                  
                  if (mail($to_email, $subject, $body, $headers)) {
                    //  echo "<script>alert('mail send');</script>";

                  } else {
                      echo "<script>alert('mail not send');</script>";
                  }

                 } 


                 







                   
                  echo "<script>alert('succeddfully updated');</script>";
                  echo "<script>location.href='check_admission_application.php';</script>";
                }
                else{

                     echo "<script>alert('failed to update');</script>";
          echo "<script>location.href='check_admission_application.php';</script>";
                }

       }
     ?>