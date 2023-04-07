<?php
 include_once('databases.php');
  
  $id = mysqli_real_escape_string($connection, $_POST['xid']);
  $xname = mysqli_real_escape_string($connection, $_POST["xname"]);
  // $addr = mysqli_real_escape_string($connection, $_POST["addr"]);
  // $ph = mysqli_real_escape_string($connection, $_POST["phone"]);
  


  $query = "UPDATE expensehead SET xname='$xname' WHERE xid='$id'";

  if ( $result = mysqli_query($connection, $query)) {
    echo "Record Updated Successfully";
    header('Location: costhead.php');
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }

?>