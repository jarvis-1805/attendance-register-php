    
    <?php
      $title = "Index";
      require_once 'includes/header.php';
      require_once 'db/conn.php';
      
      $results = $crud -> getSpecialities();
    ?>

      <h1 class="text-center">Registration for CTF</h1>

      <form method="post" enctype="multipart/form-data" action="success.php">
        <div class="form-group">
          <label for="firstname">First Name</label>
          <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="form-group">
          <label for="dob">Date Of Birth</label>
          <input type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group">
          <label for="speciality">Area of Expertise</label>
          <select class="form-control" id="speciality" name="speciality">
            <?php while ($r = $results -> fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $r['speciality_id']; ?>"><?php echo $r['name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="phone">Contact Number</label>
          <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
          <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
        <div class="custom-file">
          <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" value="12000">
          <label class="custom-file-label" for="avatar">Choose Your Avatar</label>
          <small id="avatar" class="form-text text-muted">Avatar is Optional</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Submit</button>
      </form>
    
    <?php require_once 'includes/footer.php' ?>