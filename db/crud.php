<?php
  class crud {
    private $db;

    function __construct ( $conn ) {
      $this -> db = $conn;
    }

    public function insert ( $fname, $lname, $dob, $email, $contact, $speciality ) {
      try {
        $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress, contactnumber, speciality_id) VALUES (:fname, :lname, :dob, :email, :contact, :speciality)";
        $stmt = $this -> db -> prepare($sql);

        $stmt -> bindparam(':fname', $fname);
        $stmt -> bindparam(':lname', $lname);
        $stmt -> bindparam(':dob', $dob);
        $stmt -> bindparam(':email', $email);
        $stmt -> bindparam(':contact', $contact);
        $stmt -> bindparam(':speciality', $speciality);

        // execute statement
        $stmt -> execute();
        return true;
      } catch ( PDOException $e ) {
        echo $e -> getMessage();
        return false;
      }
    }

    public function getAttendees () {
      $sql = "SELECT * FROM `attendee` a INNER JOIN specialities s ON a.speciality_id = s.speciality_id";
      $result = $this -> db -> query($sql);
      return $result;
    }

    public function getSpecialities () {
      $sql = "SELECT * FROM `specialities`";
      $result = $this -> db -> query($sql);
      return $result;
    }
  }
?>