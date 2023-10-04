<?php 
include('../config/connection.php');
include('teacher_login_check.php');   
$t_id = $_SESSION['teacher_id'];

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
  <script src="../js/app.js" defer></script>
  <script src="../js/table2excel.js" defer></script>
</head>

<body>

  <!-- navabr -->
  <section class="py-2" style="background: #537FE7;">
    <h2 class="text-center text-white">Teacher Dashboard</h2>
  </section>




  <div class="dashboard">
    <div class="side__menu">
      <ul>


        <li>
          <a href="teacher_dashboard.php"><i class="bi bi-view-stacked"></i> &nbsp; DASHBOARD</a>
        </li>



        <!-- <li>
          <a href=""><i class="bi bi-person-square"></i> &nbsp; STUDENT</a>
          <ul class="submenu">
            <li><a href="student_info.php">Student Info</a>
              <ul>

                    
              </ul>
          
          
          </li>
          </ul>
        </li> -->

        <li>
          <a href=""><i class="bi bi-bookmarks"></i> &nbsp;MARK ATTENDANCE</a>
          <ul class="submenu">
            <!-- <li><a href="#">Take Attendance</a> -->
              <!-- <li><a href="take_attendance.php">Take Attendance</a> -->
              <ul>




               <?php   
  
                  //getting the data from database 
                  $sql2 = "SELECT * FROM subject_tbl  WHERE `teacher_id`='$t_id' ";
                
                  //execute the query
                  $res2 = mysqli_query($conn,$sql2);
                  
                  //count rows
                  $count2 = mysqli_num_rows($res2);
                
                  //check whether data is available or not
                  if($count2>0)
                  {
                    //data is available
                
                    while($row2=mysqli_fetch_assoc($res2)){
                
                      //get all the value
                      $subject_id = $row2['id'];
                      $sub = $row2['subject_name'];
                     ?>
                
                
                                <li>
                                  <a href="take_attendance.php?id=<?php echo $subject_id; ?>"><?php echo $sub; ?></a>
                                </li>
                                <?php
                               }
                             }
                             else{
                               // Not Available 
                               echo "<div class='error'>Subject Not Assigned</div>";
                             } 
                           
                             
                             ?>
              </ul>
            </li>
          </ul>
        <li>




         <li>
          <a href=""><i class="bi bi-clipboard-data-fill"></i> &nbsp; ATTENDANCE RECORDS</a>
          <ul class="submenu">
            <li><a href="view_class_attendance.php">View Class Attendance</a></li>
            <li><a href="view_student_attendance.php">View Student Attendance</a></li>
            <li><a href="todays_attendance.php">Today's Repoprt</a></li>
          </ul>
        </li>




        <li>
          <a href=""><i class="bi bi-gear-fill"></i> &nbsp; SETTINGS</a>
          <ul class="submenu">
            <li><a href="teacher_logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            <li><a href="./check_job_application.php"><i class="bi bi-person-badge"></i> Profile</a></li>
          </ul>
        </li>


      </ul>
    </div>



    