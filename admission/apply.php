<?php include('./navabr.php');?>


<section class="bg-primary-subtle py-5" >
  <div class="container pb-3" style="width: 70%; margin: auto;">
    <h1 class="h3 pb-3">Register to apply for admission</h1>

    <p>On completion of the registration process, a registration code will be provided to you. Your registration
      credentials can be used to complete the already existing imcomplete application form. There are three parts in the
      application form, Personal Details, Academic Details & Declaration. You can save the application form at every
      steps & fill up can be resumed in future using registration credentials. If you forget the registration
      credentials, entire process has to be re-initiated.</p>


    <form action="" method="POST" enctype="multipart/form-data">

    
      <div>
      <div class="d-flex  row pb-3">
        <div class="d-flex flex-column  col-6">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control mx-2"  id="name" placeholder="Name" required>
        </div>

        <div class="d-flex flex-column  col-6">
          <label for="f_name" class="form-label">Father's name</label>
          <input type="text" name="f_name" class="form-control mx-2" id="f_name" placeholder="Father's name" required>
        </div>
      </div>

      <div class="d-flex  row pb-3">
        <div class="d-flex flex-column  col-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control mx-2" id="email" placeholder="Email" required>
        </div>

        <div class="d-flex flex-column col-6">
          <label for="contact" class="form-label">Contact</label>
          <input type="text" name="contact" class="form-control mx-2" id="contact" placeholder="99574*****" required>
        </div>
      </div>


      <div class="d-flex  row pb-3">
        <div class="d-flex flex-column  col-6">
          <label for="file" class="form-label">Highest Education Qualification</label>
          <input type="file" name="pdf" class="form-control mx-2" id="file" required>
        </div>

        <div class="d-flex flex-column  col-6">
          <div class="pb-3">
        <label for="course">Course Name</label>
              <select name="course_name" id="course" class="form-control" required>
              <?php  
                    //get the data from database
                     $sql = "SELECT * FROM course_tbl";

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
              <option value="<?php echo $course; ?>"> <?php echo $course;  ?>  </option> 
              
           
           
            <?php

             }
            }
              ?>
               </select>
      </div>

        </div>
      </div>





      <div class="d-flex  row pb-3">
        <div class="d-flex flex-column  col-6">
          <label for="address" class="form-label">Address</label>
          <textarea name="address" id="address" cols="30"  placeholder="Address" required ></textarea>
        </div>

        <div class="d-flex flex-column  col-6">
          <label for="dob" class="form-label">DOB</label>
          <input type="date" name="dob" class="form-control mx-2" id="dob"  required>
        </div>
      </div>





      <div class="d-flex py-2 justify-content-center">
        <input type="text" value="pending" name="status" hidden>
        <input type="submit" name="upload" value="Register" class="btn btn-primary ">
      </div>


      </div>
    </form>

  </div>
</section>

<?php include('./footer.php') ?>

<?php 

    //check whether submit button is clicked or not
    if(isset($_POST['upload']))
    {

     
    $apply_Id = mt_rand(1000000, 9999999);
    $name = $_POST['name'];
    $father_name = $_POST['f_name'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];             
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $course = $_POST['course_name'];
    $status = $_POST['status'];
    $pdf = $_FILES['pdf'];



  if(isset($_FILES['pdf']['name']))
  {

    //upload the image
    $pdf = $_FILES['pdf']['name'];

    //auto rename our image 
    //get the extension of our image
    $tmp = explode('.', $pdf);
    $file_extension = end($tmp);
    $pdf = "certificate_".rand(000,999).'.'. $file_extension;

    $source_path = $_FILES['pdf']['tmp_name'];
    $destination_path = "../pdf/certificate/".$pdf;
    $upload = move_uploaded_file($source_path, $destination_path);
    
    //check whether the image is uploaded or not and if the image is not uploaed then stop the process
    if($upload==false){
      
      echo "<script>alert('failed to upload certificate');</script>";
      echo "<script>location.href='apply.php';</script>";
      die();
    }
  }
  else{
    $pdf = "";
  }






   

   // save the order in database 
    $sql = "insert into student_tbl (apply_id,name,father_name,email,mobile,certificate,course,dob,address,status) 
    values('$apply_Id', '$name','$father_name','$email','$contact','$pdf','$course','$dob', '$address', '$status') 
            ";
     // execute the query
      $res = mysqli_query($conn,$sql);


      if($res == true)
      {

        //  send mail to user
                  $to_email = $email;
                  $subject = "College Automation System";
                  $body = "Hello,".$name." Your application_id is ".$apply_Id; 
                  $headers = "From: rupjyotisarma706@gmail.com";
                  
                  if (mail($to_email, $subject, $body, $headers)) {
                     echo "<script>alert('mail send');</script>";

                  } else {
                      echo "<script>alert('mail not send');</script>";
                  }




        echo "<script>alert('succeddfully applied');</script>";
          echo "<script>location.href='apply.php';</script>";
      }else{
        echo "<script>alert('failed to apply');</script>";
        echo "<scrip>location.href='apply.php';</script>";
      }
    }
?>