<?php
 include_once('databases.php');
  
  $id = mysqli_real_escape_string($connection, $_POST['sid']);
  $sname = mysqli_real_escape_string($connection, $_POST["sname"]);
  $addr = mysqli_real_escape_string($connection, $_POST["address"]);
  $city = mysqli_real_escape_string($connection, $_POST["city"]);
  $ph = mysqli_real_escape_string($connection, $_POST["phone"]);
  $cp = mysqli_real_escape_string($connection, $_POST["contact_person"]);
  


  $query = "UPDATE customer SET cname='$sname', address='$addr',city='$city', phone='$ph' , contact_person='$cp' WHERE cid='$id'";
  echo $query;
  if ( $result = mysqli_query($connection, $query)) {
    echo "Record Updated Successfully";
    header('Location: customer.php');
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }

?>