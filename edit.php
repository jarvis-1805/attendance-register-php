    
    <?php
      $title = "Edit Record";

      require_once 'includes/header.php';
      require_once 'db/conn.php';
      
      $results = $crud -> getSpecialities();

      if (!isset($_GET['id'])) {
        echo 'error';
      } else {
        $id = $_GET['id'];
        $attendee = $crud -> getAttendeeDetails($id);
    ?>

      <h1 class="text-center">Edit Record</h1>

      <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>">
        <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
        </div>
        <div class="form-group">
          <label for="dob">Date Of Birth</label>
          <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
        </div>
        <div class="form-group">
          <label for="speciality">Area of Expertise</label>
          <select class="form-control" id="speciality" name="speciality">
            <?php while ($r = $results -> fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $r['speciality_id']; ?>"<?php if ($r['speciality_id'] == $attendee['speciality_id']) echo 'selected'; ?>>
                <?php echo $r['name']; ?>
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" aria-describedby="emailHelp" name="email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="phone">Contact Number</label>
          <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" aria-describedby="phoneHelp" name="phone">
          <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
        <button type="button" name="submit" class="btn btn-secondary" onclick="location.href='viewrecords.php'">Back to List</button>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Save Changes</button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Save Changes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure to save the changes?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" name="submit" class="btn btn-primary">Yes</button>
              </div>
            </div>
          </div>
        </div>
      </form>

    <?php } ?>

    <?php require_once 'includes/footer.php' ?>