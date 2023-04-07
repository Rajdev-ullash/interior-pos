<?php
 include_once('databases.php');
  
  $id = mysqli_real_escape_string($connection, $_POST['sid']);
  $sname = mysqli_real_escape_string($connection, $_POST["sname"]);
  $addr = mysqli_real_escape_string($connection, $_POST["addr"]);
  $ph = mysqli_real_escape_string($connection, $_POST["phone"]);
  


  $query = "UPDATE supplier SET sname='$sname',saddress='$addr',phone='$ph' WHERE sid='$id'";

  if ( $result = mysqli_query($connection, $query)) {
    echo "Record Updated Successfully";
    header('Location: supplier.php');
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }

?>