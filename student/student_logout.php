<?php  
   include('student_login_check.php');
   include('../config/connection.php');
  session_destroy();

  echo "<script>location.href='../student.php';</script>";
?>