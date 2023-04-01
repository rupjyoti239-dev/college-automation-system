<?php  
   include('teacher_login_check.php');
   include('../config/connection.php');
  session_destroy();

  echo "<script>location.href='../faculty.php';</script>";
?>