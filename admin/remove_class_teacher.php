<?php include('./navbar.php');  ?>


     <?php

//check whether the id and image name is set or not
if(isset($_GET['id']))
{
  //
  $id = $_GET['id'];
  
     //SQL Query to Delete Data from Database
     $sql = " UPDATE `subject_tbl` 
       
     SET 
                 teacher_id = '' ,
                 class_teacher = 'N/A'
     
     where  `id` = '$id' ";

     //Execute the Query
     $res = mysqli_query($conn, $sql);

     //Check whether the data is delete from database or not
     if($res){

          
          echo "<script>alert('Removed');
          location.href='class_list.php';</script>";
        
         
     }
     else{
       
        
       echo "<script>
       alert('Failed to Remove');
       location.href='class_list.php';</script>";
     }



}
else{
   echo "<script>alert('Data not Found');</script>";
  echo "<script>location.href='manage_course.php';</script>";

}

?>




<?php include('./footer.php');  ?>     