<?php
 include_once('databases.php');
//var_dump($_GET);exit;
  $id = mysqli_real_escape_string($connection, $_GET['id']);
  $username = mysqli_real_escape_string($connection, $_GET['username']);
  $password = mysqli_real_escape_string($connection, $_GET['password']);
  $level = mysqli_real_escape_string($connection, $_GET['level']);
  $description = mysqli_real_escape_string($connection, $_GET['description']);
  $status = mysqli_real_escape_string($connection, $_GET['status']);



  $query = "UPDATE users SET username='$username',password='$password',level='$level',description='$description',status='$status' WHERE userid='$id'";

  if ( $result = mysqli_query($connection, $query)) {
    echo "Record Updated Successfully";
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }

?>