<?php
 $hostname="localhost";
 $username="root";
 $database="college_automation_system";
 $password="";

 $conn = mysqli_connect($hostname,$username,$password,$database);
 if(!$conn){
  die("could not connect database...");
 }
//  else{
//   echo "connected";
//  }
?>
