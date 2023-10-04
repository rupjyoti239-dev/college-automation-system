<?php 
include('../config/connection.php');
include('admin_login_check.php');   
$email = $_SESSION['admin_email'];

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
  <!-- <link rel='stylesheet' id='fontawesome-css' href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1'
    type='text/css' media='all' /> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- css -->
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/admin.css">

  <title>College Automation System</title>
</head>

<body>
 
<!-- navabr -->
<section class="py-2" style="background: #537FE7;">
  <h2 class="text-center text-white">Admin Dashboard</h2>
</section>




<div class="dashboard">
     <div class="side__menu">
        <ul>


           <li>
            <a href="admin_dashboard.php"><i class="bi bi-view-stacked"></i> &nbsp; DASHBOARD</a>
           </li>

           <li>
            <a href=""><i class="bi bi-person-video2"></i> &nbsp; FACULTIES</a>
               <ul class="submenu">
                   <li><a href="./teacher_list.php">Teacher List</a></li>
                   <li><a href="class_list.php">Class List</a></li>
               </ul>
          </li>

           <li>
            <a href=""><i class="bi bi-person-square"></i> &nbsp; STUDENT</a>
            <ul class="submenu">
                   <li><a href="./student_info.php">Student Info</a></li>
                   <li><a href="">Attendence Record</a></li>
               </ul>
          </li>

          <li>
            <a href=""><i class="bi bi-bookmarks"></i> &nbsp; DEPARTMANT</a>
            <ul class="submenu">
                   <li><a href="add_department.php">Add Department</a></li>
                   <li><a href="manage_department.php">Manage Department</a></li>
               </ul>
          </li>

          <li>
            <a href=""><i class="bi bi-book-half"></i> &nbsp; COURSES</a>
            <ul class="submenu">
                   <li><a href="add_course.php">Add New Course</a></li>
                   <li><a href="manage_course.php">Manage Course</a></li>
               </ul>  
          </li>

          <li>
            <a href=""><i class="bi bi-journals"></i> &nbsp; SUBJECT</a>
            <ul class="submenu">
                   <li><a href="add_subject.php">Add Subject</a></li>
                   <li><a href="manage_subject.php">Edit Subject</a></li>
               </ul>  
          </li>


           <li>
            <a href=""><i class="bi bi-briefcase-fill"></i> &nbsp; VACANCY</a>
               <ul class="submenu">
                   <li><a href="./update_new_vacancy.php">Upload New Vacancy</a></li>
                   <li><a href="./remove_old_vacancy.php">Remove old Vacancy</a></li>
                   <li><a href="./check_job_application.php">Check Job Applications</a></li>
               </ul>  
          </li>
          <li>
            <a href=""><i class="bi bi-ui-checks"></i> &nbsp; ADMISSION</a>
               <ul class="submenu">
                   <!-- <li><a href="">Upload Admission Form</a></li>
                   <li><a href="">Remove Admission Form</a></li> -->
                   <li><a href="check_admission_application.php">Check Admission Applications</a></li>
               </ul>  
          </li>
          <li>
            <a href=""><i class="bi bi-gear-fill"></i> &nbsp; SETTINGS</a>
            <ul class="submenu">
                   <li><a href="admin_logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                   <li><a href="./admin_profile.php"><i class="bi bi-person-badge"></i> Profile</a></li>
               </ul>  
          </li>


        </ul>
     </div>