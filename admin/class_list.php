<?php include('./navbar.php');  ?>


     <div class="main_container py-5">
      <h1 class="text-center h3 fw-bold pb-5">Class List</h1>

      <table class="table table-striped w-75 mx-auto">
    <thead>
      <tr>
        <th scope="col">S.N</th>
       
        <th scope="col">Subject Name</th>
        <th scope="col">Course Name</th>
        <th scope="col">Semester</th>
        <th scope="col">Teacher</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <?php
      $sql = "SELECT * FROM `subject_tbl` " ;

      //execute the query
      $res = mysqli_query($conn,$sql);

      //count rows
      $count = mysqli_num_rows($res);

      //create serial number variable
      $sn=1;

      //check whether we have data in database or not 
           if($count>0)
           {

            //we have data in database 
            //get the data and display

            while($row=mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              
              $sub = $row['subject_name'];
              $course = $row['course_name'];
              $sem = $row['semester'];
              $teacher = $row['class_teacher'];
            
             

                ?>

    <tbody>
      <tr>
        <th scope="row">
          <?php echo $sn++ ; ?>
        </th>
       
        <td>
          <?php echo $sub; ?>
        </td>
       
          <td>
          <?php echo $course; ?>
        </td>

        <td>
          <?php echo $sem; ?>
        </td>
         <td>
          <?php echo $teacher; ?>
        </td>
       
        <td>
             <a href="assign_teacher.php?id=<?php echo $id; ?>" class="h6 btn btn-success btn-sm" style="text-decoration: none; color: black;">Assign teacher
           <i class="bi bi-recycle"></i></a> &nbsp;
            <a href="remove_class_teacher.php?id=<?php echo $id; ?>" class="h6 btn btn-danger btn-sm" style="text-decoration: none; color: black;">Remove Teacher
            <i class="bi bi-trash"></i></a>

        </td>
      </tr>
      <?php
                
              }
            }
            else{
              //do not have the data
              //we will display the msg inside the table
              ?>

      <tr>
        <td colspan="6">
          <div class="error">Data not found</div>
        </td>
      </tr>

      <?php
            }

  ?>
    </tbody>

  </table>



     </div>


<?php include('./footer.php');  ?>     