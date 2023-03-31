<?php include('./navabr.php') ?>

<section class="bg-primary-subtle py-5" >
  <div class="container pb-3" style="width: 70%; margin: auto;">
    <h1 class="h3 pb-3">Register to apply for admission</h1>

    <p>On completion of the registration process, a registration code will be provided to you. Your registration
      credentials can be used to complete the already existing imcomplete application form. There are three parts in the
      application form, Personal Details, Academic Details & Declaration. You can save the application form at every
      steps & fill up can be resumed in future using registration credentials. If you forget the registration
      credentials, entire process has to be re-initiated.</p>


    <form action="" class="py-5">

    
      <div>
      <div class="d-flex  row pb-3">
        <div class="d-flex flex-column  col-6">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control mx-2" id="name" placeholder="Name" required>
        </div>

        <div class="d-flex flex-column  col-6">
          <label for="f_name" class="form-label">Father's name</label>
          <input type="text" class="form-control mx-2" id="f_name" placeholder="Father's name" required>
        </div>
      </div>

      <div class="d-flex  row pb-3">
        <div class="d-flex flex-column  col-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control mx-2" id="email" placeholder="Email" required>
        </div>

        <div class="d-flex flex-column col-6">
          <label for="contact" class="form-label">Contact</label>
          <input type="text" class="form-control mx-2" id="contact" placeholder="99574*****" required>
        </div>
      </div>


      <div class="d-flex  row pb-3">
        <div class="d-flex flex-column  col-6">
          <label for="file" class="form-label">Highest Education Qualification</label>
          <input type="file" class="form-control mx-2" id="file" required>
        </div>

        <div class="d-flex flex-column  col-6">
          <label for="course" class="form-label">Course</label>
          <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </div>





      <div class="d-flex  row pb-3">
        <div class="d-flex flex-column  col-6">
          <label for="address" class="form-label">Address</label>
          <textarea name="" id="address" cols="30"  placeholder="Address" required ></textarea>
        </div>

        <div class="d-flex flex-column  col-6">
          <label for="dob" class="form-label">DOB</label>
          <input type="text" class="form-control mx-2" id="dob" placeholder="DOM" required>
        </div>
      </div>





      <div class="d-flex py-2 justify-content-center">
        <input type="submit" value="Register" class="btn btn-primary ">
      </div>


      </div>
    </form>

  </div>
</section>

<?php include('./footer.php') ?>