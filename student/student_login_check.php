<?php
  session_start();
  if(!isset($_SESSION['student_id'])){
    echo  "<script>location.href='../student.php';</script>";
  }
?>