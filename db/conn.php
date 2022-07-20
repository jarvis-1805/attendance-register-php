<?php
  // Development Connection
  // $host = '127.0.0.1';
  // $db = 'attendance_db';
  // $usernm = 'root';
  // $pass = '';
  // $charset = 'utf8mb4';

  // Remote Database Connection
  $host = getenv('DB_HOST');
  $db = getenv('DB_NAME');
  $usernm = getenv('DB_USERNAME');
  $pass = getenv('DB_PASS');
  $charset = 'utf8mb4';

  // Data Source Name
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

  try {
    $pdo = new PDO( $dsn, $usernm, $pass );
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch ( PDOException $e ) {
    throw new PDOException( $e -> getMessage() );
  }

  require_once 'crud.php';
  require_once 'user.php';
  $crud = new crud($pdo);
  $user = new user($pdo);

  $user -> insertUser("admin", "password");
?>