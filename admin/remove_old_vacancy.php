<?php include('./navbar.php');  ?>


<div class="main_container p-5">
  <h3 class="h3 text-center">Remove Old Vacancy</h3>

  <table class="table table-striped ">
    <thead>
      <tr>
        <th scope="col">S.N</th>
        <th scope="col">Vacancy Name</th>
        <th scope="col">job Details</th>
        <th scope="col">Department</th>
        <th scope="col">Last Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <?php
      $sql = "SELECT * FROM `job_vacancy_tbl`  " ;

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
              $job_name = $row['vacancy_name'];
              $details = $row['job_details'];
              $date = $row['last_date'];
              $dept = $row['department_name'];
             

                ?>

    <tbody>
      <tr>
        <th scope="row">
          <?php echo $sn++ ; ?>
        </th>
        <td>
          <?php echo $job_name; ?>
        </td>
        <td class="w-50">
          <?php echo $details; ?>
        </td>
        <td>
          <?php echo $dept; ?>
        </td>
        <td>
          <?php echo $date; ?>
        </td>
      
        <td>
          <a href="delete_old_vacancy.php?id=<?php echo $id; ?>" class="h6" style="text-decoration: none; color: black;">Remove
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