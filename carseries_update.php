<?php
 include_once('databases.php');
  
  $id = mysqli_real_escape_string($connection, $_POST['id']);
  $sname = mysqli_real_escape_string($connection, $_POST["seriesname"]);
  // $addr = mysqli_real_escape_string($connection, $_POST["addr"]);
  // $ph = mysqli_real_escape_string($connection, $_POST["phone"]);
  


  $query = "UPDATE carseries SET seriesname='$sname' WHERE id='$id'";

  if ( $result = mysqli_query($connection, $query)) {
    echo "Record Updated Successfully";
    header('Location: series.php');
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }

?>