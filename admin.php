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



  <!-- login -->
  <section class="bg-primary-subtle py-5">
    <div class="container" style="width: 70%; margin: auto;">

      <h3 class="h3 py-5">Admin Login</h3>
     
      <form action="" method="POST">

        <div class="d-flex pb-3">
          <input type="email" name="email" class="form-control mx-2" placeholder="Email" required>
          <input type="password" name="password" class="form-control mx-2" placeholder="Password" required>
        </div>

        <div class="d-flex py-2 justify-content-center">
          <input type="submit" name="login" value="Login" class="btn btn-primary ">
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

  if(isset($_POST['login']))
  {

    $email = $_POST['email'];
    $password = $_POST['password'];
    

    

      $sql="SELECT * FROM admin_tbl WHERE admin_email ='$email' AND admin_password ='$password'";
      $res=mysqli_query($conn,$sql);
      $count = mysqli_num_rows($res);
      if($count == 1)
        {
           session_start();
           $_SESSION['login-success'] = '<div class="aletr alert-success text-center py-2 px-2">login Successfully.</div>';
           $_SESSION['admin_email'] = $email;
           echo  "<script>location.href='admin/admin_dashboard.php';</script>";
        }
       else{
         // echo  "<script>location.href='login.php';</script>";
         echo '<script>alert("admin Login failed");</script>';
         
       }
}
?>