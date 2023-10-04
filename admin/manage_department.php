<?php include('./navbar.php');  ?>


      <div class="main_container py-5">
      <h1 class="text-center h3 fw-bold pb-5">All Departments</h1>


      <table class="table table-striped w-75 mx-auto">
    <thead>
      <tr>
        <th scope="col">S.N</th>
       
        <th scope="col">Department Name</th>
        
        <th scope="col">Action</th>
      </tr>
    </thead>

    <?php
      $sql = "SELECT * FROM `department_tbl` " ;

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
              
              $dept = $row['department_name'];
            
             

                ?>

    <tbody>
      <tr>
        <th scope="row">
          <?php echo $sn++ ; ?>
        </th>
       
        <td>
          <?php echo $dept; ?>
        </td>
       
       
        <td>
             <a href="update_department.php?id=<?php echo $id; ?>" class="h6 btn btn-success btn-sm" style="text-decoration: none; color: black;">Update
           <i class="bi bi-recycle"></i></a> &nbsp;
            <a href="delete_department.php?id=<?php echo $id; ?>" class="h6 btn btn-danger btn-sm" style="text-decoration: none; color: black;">Delete
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