<?php include('./navbar.php');  ?>


     <?php

//check whether the id and image name is set or not
if(isset($_GET['id']))
{
  //
  $id = $_GET['id'];
  

  
  
  
  
     //SQL Query to Delete Data from Database
     $sql = "delete from `subject_tbl` where  `id` = $id ";

     //Execute the Query
     $res = mysqli_query($conn, $sql);

     //Check whether the data is delete from database or not
     if($res){

           echo "<script>alert('Deleted');</script>";
          echo "<script>location.href='manage_subject.php';</script>";
        
         
     }
     else{
       
        echo "<script>alert('Failed to delete');</script>";
       echo "<script>location.href='manage_subject.php';</script>";
     }



}
else{
   echo "<script>alert('Data not Found');</script>";
  echo "<script>location.href='manage_subject.php';</script>";

}

?>




<?php include('./footer.php');  ?>     