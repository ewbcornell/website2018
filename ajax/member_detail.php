<?php
  include_once '../includes/config.php';
  
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit(1);
  }

  $request = (int)$_POST['id'];
  $result = $mysqli->query("SELECT * FROM Members WHERE id = $request");
  echo json_encode($result->fetch_assoc());
  $mysqli->close();
?>
