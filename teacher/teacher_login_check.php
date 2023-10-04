<?php
  session_start();
  if(!isset($_SESSION['teacher_id'])){
    echo  "<script>location.href='../faculty.php';</script>";
  }
?>