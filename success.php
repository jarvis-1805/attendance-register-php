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

        $orig_file = $_FILES['avatar']['tmp_name'];
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$email.$ext";
        move_uploaded_file($orig_file, $destination);

        $isSuccess = $crud -> insert($fname, $lname, $dob, $email, $contact, $speciality, $destination);
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
      <img src="<?php echo file_exists($destination) ? $destination : "uploads/default-avatar.jpg"; ?>" alt="avatar" class="rounded-circle" style="width: 20%; height: 20%">
      <div class="card" style="width: max-content; margin-top: 10px;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo $specialityName['name']; ?></h6>
          <p class="card-text">Date Of Birth: <?php echo $_POST['dob']; ?></p>
          <p class="card-text">Email Address: <?php echo $_POST['email']; ?></p>
          <p class="card-text">Contact Number: <?php echo $_POST['phone']; ?></p>
        </div>
      </div>

    <?php require_once 'includes/footer.php' ?>