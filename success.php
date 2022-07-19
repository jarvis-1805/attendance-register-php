    <?php
      $title = "Success";
      require_once 'includes/header.php';
      require_once 'db/conn.php';
      require_once 'sendemail.php';

      if (isset($_POST['submit'])) {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $speciality = $_POST['speciality'];

        $isSuccess = $crud -> insert($fname, $lname, $dob, $email, $contact, $speciality);
        $specialityName = $crud -> getSpecialityById($speciality);

        if ($isSuccess) {
          SendEmail::SendMail($email, $fname.$lname, 'Welcome to CTF-1.0 2022', 'You have successfuly registered for this year\'s CTF-1.0');
          include 'includes/successmessage.php';
        } else {
          include 'includes/errormessage.php';
        }
      }
    ?>
    
      <!-- Using $_POST method -->
      <div class="card" style="width: max-content;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo $specialityName['name']; ?></h6>
          <p class="card-text">Date Of Birth: <?php echo $_POST['dob']; ?></p>
          <p class="card-text">Email Address: <?php echo $_POST['email']; ?></p>
          <p class="card-text">Contact Number: <?php echo $_POST['phone']; ?></p>
        </div>
      </div>

    <?php require_once 'includes/footer.php' ?>