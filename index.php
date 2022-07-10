    
    <?php
      $title = "Index";
      require_once 'includes/header.php';
      require_once 'db/conn.php';
    ?>

      <h1 class="text-center">Registration for CTF</h1>

      <form method="post" action="success.php">
        <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="form-group">
          <label for="dob">Date Of Birth</label>
          <input type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group">
          <label for="speciality">Area of Expertise</label>
          <select class="form-control" id="speciality" name="speciality">
            <option value="1">Database Admin</option>
            <option>Software Developer</option>
            <option>Web Developer</option>
            <option>Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="phone">Contact Number</label>
          <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
          <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    
    <?php require_once 'includes/footer.php' ?>