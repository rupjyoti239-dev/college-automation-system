<?php include('./navbar.php');  ?>






  <div class="main_container p-5">
        
       <h3 class="h3 text-center">All Registered Student</h3>



      <table class="table table-striped ">
    <thead>
      <tr>
        <th scope="col">S.N</th>
        <th scope="col">Name</th>
        <th scope="col">Course</th>
        <th scope="col">semester</th>
        <th scope="col">Contact No</th>
        <th scope="col">Registration No</th>
      </tr>
    </thead>

    <?php
      $sql = "SELECT * FROM `student_tbl` where `status`='selected'  " ;

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
              $name = $row['name'];
              $course = $row['course'];
              $semester = $row['semester'];
              $contact = $row['mobile'];
              $id = $row['user_id'];
             

                ?>

    <tbody>
      <tr>
        <th scope="row">
          <?php echo $sn++ ; ?>
        </th>
        <td>
          <?php echo $name; ?>
        </td>
        <td>
          <?php echo $course; ?>
        </td>
        <td>
          <?php echo $semester; ?>
        </td>
        <td>
          <?php echo $contact; ?>
        </td>
        <td>
          <?php echo $id; ?>
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
          <div class="error">data not found</div>
        </td>
      </tr>

      <?php
            }

  ?>
    </tbody>

  </table>











      
     </div>


<?php include('./footer.php');  ?>     