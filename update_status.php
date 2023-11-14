<?php
  // Replace the database credentials with your own values
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "kamsiskpmb";

  $connection = new mysqli($servername, $username, $password, $dbname);

  if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
  }

  $id = $_GET['id'];
  $status = $_GET['status'];

  $sql = "UPDATE complaint SET resolve_status = $status WHERE id = $id";

  if ($connection->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $connection->error;
  }

  $connection->close();
?>
