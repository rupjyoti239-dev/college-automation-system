<?php include('./navbar.php');  ?>


<div class="main_container p-5">

  <h2 class="text-center h3 fw-bold pb-5">Teacher Info</h2>


  <table class="table table-striped ">
    <thead>
      <tr>
        <th scope="col">S.N</th>
        <th scope="col">Name</th>
        <th scope="col">Department</th>
        <th scope="col">Email</th>
        <th scope="col">Contact No</th>
        <th scope="col">Class Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <?php
      $sql = "SELECT * FROM `applied_job_tbl` where `status`='selected'  " ;

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
              $dept = $row['department'];
              $email = $row['email'];
              $contact = $row['contact'];
              $subject = $row['subject_name'];
             

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
          <?php echo $dept; ?>
        </td>
        <td>
          <?php echo $email; ?>
        </td>
        <td>
          <?php echo $contact; ?>
        </td>


         <td>
          <?php echo $subject; ?>
        </td>

        <td>
          <a href="assign_class.php?id=<?php echo $id; ?>" class="h6" style="text-decoration: none; color: black;">Assign class
            <i class="bi bi-eye-fill"></i></a>
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