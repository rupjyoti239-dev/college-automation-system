<?php  include('config/connection.php');  
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- favicon -->
  <link rel="shortcut icon" href="./images/logo.svg" type="image/x-icon">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel='stylesheet' id='fontawesome-css' href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1'
    type='text/css' media='all' />

  <!-- css -->
  <link rel="stylesheet" href="./css/index.css">
  <title>College Automation System</title>
</head>

<body>

  <!-- navbar -->
  <section class="bg-primary-subtle">
    <div class="d-flex justify-content-evenly align-items-center py-3">
      <img src="./images/side-logo.webp" class="rounded-circle" alt="" width="150px">
      <div class="text-center">
        <h1>College Automation System</h1>
        <p class="text-black">Unloking Potential, Inspiring Excellence: Discover XYZ College , Where Dreams <br>
          Take Flight and Limitless Possibilities Await !</p>
      </div>
      <img src="./images/side-logo.webp" class="rounded-circle" alt="" width="150px">
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: #537FE7;">
      <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item mx-4">
              <a class="nav-link fw-medium text-white" href="index.php">HOME</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link fw-medium text-white" href="#about">ABOUT US</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link fw-medium text-white" href="#">COURSES</a>
              <ul class="course__submenu">
                <li><a class="nav-link fw-medium text-black link-primary" href="./courses/bca.php">BCA</a></li>
                <li><a class="nav-link fw-medium text-black link-primary" href="./courses/mca.php">MCA</a></li>
                <li><a class="nav-link fw-medium text-black link-primary" href="./courses/bba.php">BBA</a></li>
                <li><a class="nav-link fw-medium text-black link-primary" href="./courses/mba.php">MBA</a></li>
                <li><a class="nav-link fw-medium text-black link-primary" href="./courses/bcom.php">B.Com</a></li>
                <li><a class="nav-link fw-medium text-black link-primary" href="./courses/mcom.php">M.com</a></li>
              </ul>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link fw-medium text-white" href="#">ADMISSION</a>
              <ul class="admission__submenu">
                <li><a class="nav-link fw-medium text-black link-primary" href="./admission/how_to_apply.php">HOW TO
                    APPLY</a></li>
                <li><a class="nav-link fw-medium text-black link-primary" href="./admission/fees.php">FEES STRUCTURE</a>
                </li>
                <li><a class="nav-link fw-medium text-black link-primary" href="./admission/apply.php">APPLY ONLINE FOR
                    ADMISSION</a></li>
              </ul>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link fw-medium text-white" href="./faculty.php">FACULTIES</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link fw-medium text-white" href="./student.php">STUDENT</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link fw-medium text-white" href="./admin.php">ADMIN</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link fw-medium text-white" href="./career.php">CAREER</a>
            </li>
        </div>
      </div>
    </nav>
  </section>


  <section class="bg-primary-subtle py-5">
    <div class="container" style="width: 70%; margin: auto;">
      <h3 class="h3 text-center fw-bold py-4">Please complete the form below to apply for a position with us</h3>


      <form action="" method="POST" enctype="multipart/form-data" onsubmit="return myFun()">
        <div style="width: 70%; margin: 50px auto;">

          <div class="pb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
          </div>

          <div class="pb-3">
            <label for="father's name" class="form-label">Father's Name</label>
            <input type="text" name="father_name" class="form-control" placeholder="Father's Name" required>
          </div>

          <div class="pb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control" cols="30" ></textarea>
          </div>

          <div class="pb-3">
            <label for="qualification" class="form-label">Resume</label>
            <input type="file" name="pdf" class="form-control" id="qualification" required>
          </div>
          
          
          <div class="pb-3">
            <label for="demo" class="form-label">D.O.B</label>
            <input type="date" name="dob" class="form-control mx-2" id="demo"  required>
          <span class="text-danger text-center  py-1 px-2" id="dob"> </span>
          </div>

          <script>
                        var todayDate = new Date();
                        var month = todayDate.getMonth() +1 ; 
                        var year = todayDate.getUTCFullYear() -60; 
                        var tdate = todayDate.getDate(); 
                           if(month < 10){
                                month = "0" + month 
                              }
                           if(tdate < 10){
                               tdate = "0" + tdate;
                              }
                        var maxDate = year + "-" + month + "-" + tdate;
                         
                        document.getElementById("demo").setAttribute("min", maxDate);
                        console.log(maxDate);
                      </script>

                    <!-- dissable future date  -->
                    <script>
                        var todayDate = new Date();
                        var month = todayDate.getMonth() +1 ; 
                        var year = todayDate.getUTCFullYear() - 0; 
                        var tdate = todayDate.getDate(); 
                           if(month < 10){
                                month = "0" + month 
                              }
                           if(tdate < 10){
                               tdate = "0" + tdate;
                              }
                        var maxDate = year + "-" + month + "-" + tdate;
                        document.getElementById("demo").setAttribute("max", maxDate);
                        console.log(maxDate);
                      </script>





          <div class="pb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>

          <script>
              function myFun(){
                var a  = document.getElementById("contactxd").value;
                if(isNaN(a)){
                  document.getElementById("messages").innerHTML="** Enter a vaild number";
                  return false;
                }
                if(a.length<10){
                  document.getElementById("messages").innerHTML="** Mobile number must be 10 digits";
                  return false;
                }
                if(a.length>10){
                  document.getElementById("messages").innerHTML="** Mobile number must be 10 digits";
                  return false;
                }
                if((a.charAt(0) != 9) && (a.charAt(0) != 8) && (a.charAt(0) != 7) && (a.charAt(0) != 6)) {
                  document.getElementById("messages").innerHTML="** Enter a vaild number";
                  return false;
                }

               
              }
            </script>


          <div class="pb-3">
            <label for="contactxd" class="form-label">Contact</label>
            <input type="text" name="contact" id="contactxd" class="form-control" required>
            <span class="text-danger text-center  py-1 px-2" id="messages"> </span>
          </div>


          <div class="pb-3">
         <label for="subject">Department Name</label>
              <select name="department_name" id="department"  class="form-control" required>
              <?php  
                    //get the data from database
                     $sql = "SELECT * FROM department_tbl";

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
              
               $department = $row['department_name'];
              
            ?>
               <!-- <option value="" disabled selected> Courses</option> -->
              <option value="<?php echo $department; ?>"> <?php echo $department;  ?>  </option> 
              
           
           
            <?php

             }
            }
              ?>
               </select>
      </div>


          <div class="my-3">
            <input type="text" value="pending" name="status" hidden>
            <input type="submit" value="APPLY" name="upload" class="btn btn-primary">
          </div>


        </div>
      </form>


    </div>
  </section>






  <!-- footer -->
  <footer class="container-fluid  py-5 bg-dark text-white">
    <div class="container text-center">
      <div class="row">


        <div class="col-md-4 col-10 col-xxl-4 ">
          <p>Contact Us:</p>
          <p> &#128222;: 800010040
          </p>
        </div>

        <div class="col-md-4 col-10 col-xxl-4">
          <div class="">
            <p>Developed By <span class="text-white fw-bold">Rupjyoti❤</span> <br>
              &#169;2023, All rights reserved</p>


          </div>
        </div>

        <div class="col-md-4 col-10 col-xxl-4 ">
          <p>Contact Us:</p>
          <a href=""><i class="fab fa-facebook mx-2"></i></a>
          <a href=""><i class="fab fa-twitter mx-2"></i></a>
          <a href=""><i class="fab fa-instagram mx-2"></i></a>
        </div>

      </div>
    </div>
    </div>
  </footer>


  <!-- js  -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
</body>

</html>


<?php 

    //check whether submit button is clicked or not
    if(isset($_POST['upload']))
    {

     
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];             
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $dept = $_POST['department_name'];
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
    $pdf = "resume_".rand(000,999).'.'. $file_extension;

    $source_path = $_FILES['pdf']['tmp_name'];
    $destination_path = "pdf/resume/".$pdf;
    $upload = move_uploaded_file($source_path, $destination_path);
    
    //check whether the image is uploaded or not and if the image is not uploaed then stop the process
    if($upload==false){
      
      echo "<script>alert('failed to upload resume');</script>";
      echo "<script>location.href='career.php';</script>";
      die();
    }
  }
  else{
    $pdf = "";
  }




// check course is already exist or not
  $query = mysqli_query($conn, "SELECT * FROM `applied_job_tbl` WHERE email = '$email' ");
  if(mysqli_num_rows($query)>0){
    echo "<script>alert('This email Already Exists!');
    location.href='job_apply.php';</script>";
  }else{
 

   

   // save the order in database 
    $sql = "insert into applied_job_tbl (name,father_name,address,resume,dob,email,contact,department,status) 
    values( '$name','$father_name','$address','$pdf','$dob','$email','$contact',' $dept','$status' ) 
            ";
     // execute the query
      $res = mysqli_query($conn,$sql);

      if($res == true)
      {
        echo "<script>alert('succeddfully applied');</script>";
          echo "<script>location.href='career.php';</script>";
      }else{
        echo "<script>alert('failed to apply');</script>";
        echo "<scrip>location.href='career.php';</script>";
      }
    }
  }
?>


