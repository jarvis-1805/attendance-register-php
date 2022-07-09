    <?php
      $title = "Success";
      require_once 'includes/header.php';
      require_once 'db/conn.php';

      if (isset($_POST['submit'])) {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['speciality'];
        $contact = $_POST['email'];
        $speciality = $_POST['phone'];

        $isSuccess = $crud -> insert($fname, $lname, $dob, $email, $contact, $speciality);
      }
    ?>
    
      <h1 class="text-center text-success">You Have Been Registered!</h1>

      <!-- Using $_POST method -->
      <div class="card" style="width: max-content;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['speciality']; ?></h6>
          <p class="card-text">Date Of Birth: <?php echo $_POST['dob']; ?></p>
          <p class="card-text">Email Address: <?php echo $_POST['email']; ?></p>
          <p class="card-text">Contact Number: <?php echo $_POST['phone']; ?></p>
        </div>
      </div>

      <?php 
        // $_GET['firstname'];
        // $_GET['lastname'];
        // $_GET['dob'];
        // $_GET['speciality'];
        // $_GET['email'];
        // $_GET['phone'];
      ?>

    <?php require_once 'includes/footer.php' ?>