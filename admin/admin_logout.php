<?php  
   include('admin_login_check.php');
   include('../config/connection.php');
  session_destroy();

  echo "<script>location.href='../admin.php';</script>";
?>