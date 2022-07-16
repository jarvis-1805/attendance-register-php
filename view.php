    
    <?php
      $title = "View Record";

      require_once 'includes/header.php';
      require_once 'includes/auth_check.php';
      require_once 'db/conn.php';

      // Get attendee by ID
      if (!isset($_GET['id'])) {
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
      } else {
        $id = $_GET['id'];
        $result = $crud -> getAttendeeDetails($id);
    ?>
    
    <div class="card" style="width: max-content;">
      <div class="card-body">
        <h5 class="card-title"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name']; ?></h6>
        <p class="card-text">Date Of Birth: <?php echo $result['dateofbirth']; ?></p>
        <p class="card-text">Email Address: <?php echo $result['emailaddress']; ?></p>
        <p class="card-text">Contact Number: <?php echo $result['contactnumber']; ?></p>
      </div>
    </div>
    <br>

    <a href="viewrecords.php" class="btn btn-info">Back to List</a>
    <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
    <!-- Button trigger modal -->
    <a href=""  class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Delete</a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card" style="width: max-content;">
              <div class="card-body">
                <?php $result = $crud -> getAttendeeDetails($id); ?>
                <h5 class="card-title"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name']; ?></h6>
                <p class="card-text">Date Of Birth: <?php echo $result['dateofbirth']; ?></p>
                <p class="card-text">Email Address: <?php echo $result['emailaddress']; ?></p>
                <p class="card-text">Contact Number: <?php echo $result['contactnumber']; ?></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Canel</button>
            <button type="button" class="btn btn-primary" onclick="location.href='delete.php?id=<?php echo $id ?>'">OK</button>
          </div>
        </div>
      </div>
    </div>

    <?php } ?>

    <?php require_once 'includes/footer.php' ?>