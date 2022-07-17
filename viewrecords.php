    
    <?php
      $title = "View Records";

      require_once 'includes/header.php';
      require_once 'includes/auth_check.php';
      require_once 'db/conn.php';

      $results = $crud -> getAttendees();
    ?>
    
    <table class="table">
      <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Speciality</th>
        <th>Actions</th>
      </tr>
      <?php while ($r = $results -> fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php $id = $r['attendee_id']; echo $r['attendee_id'] ?></td>
          <td><?php echo $r['firstname'] ?></td>
          <td><?php echo $r['lastname'] ?></td>
          <td><?php echo $r['name'] ?></td>
          <td>
            <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
            <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
            <!-- Button trigger modal -->
            <a href=""  class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Delete</a>
          </td>
        </tr>
      <?php } ?>

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
    </table>
    
    <?php require_once 'includes/footer.php' ?>