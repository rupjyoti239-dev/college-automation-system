<?php 
include('../config/connection.php');
include('student_login_check.php');   
$s_id = $_SESSION['student_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- favicon -->
  <link rel="shortcut icon" href="../images/logo.svg" type="image/x-icon">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel='stylesheet' id='fontawesome-css' href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1'
    type='text/css' media='all' />

  <!-- css -->
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/admin.css">

  <title>College Automation System</title>
</head>

<body>
 
<!-- navabr -->
<section class="py-2" style="background: #537FE7;">
  <h2 class="text-center text-white">Student Dashboard</h2>
</section>




<div class="dashboard">
     <div class="side__menu">
        <ul>


           <li>
            <a href="student_dashboard.php"><i class="bi bi-view-stacked"></i> &nbsp; DASHBOARD</a>
           </li>

          

           <li>
            <a href=""><i class="bi bi-person-square"></i> &nbsp; Course</a>
            <ul class="submenu">
                   <li><a href="course_info.php">Course Info</a></li>
               </ul>
          </li>

          <li>
            <a href=""><i class="bi bi-bookmarks"></i> &nbsp; ATTENDANCE</a>
            <ul class="submenu">
                   <li><a href="check_attendance.php">Check Attendance</a></li>
                   
               </ul>
          </li>

         


           
          <li>
            <a href=""><i class="bi bi-gear-fill"></i> &nbsp; SETTINGS</a>
            <ul class="submenu">
                   <li><a href="student_logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                   <li><a href=""><i class="bi bi-person-badge"></i> Profile</a></li>
               </ul>  
          </li>


        </ul>
     </div>