<?php
 include_once('databases.php');

  $id = mysqli_real_escape_string($connection, $_GET['id']);
  $head = mysqli_real_escape_string($connection, $_GET['head']);
  $menutext = mysqli_real_escape_string($connection, $_GET['menutext']);
  $link = mysqli_real_escape_string($connection, $_GET['link']);
  $menuorder = mysqli_real_escape_string($connection, $_GET['menuorder']);
  $menu_status = mysqli_real_escape_string($connection, $_GET['menu_status']);
  $menu_access = mysqli_real_escape_string($connection, $_GET['menu_access']);


  $query = "UPDATE menu SET head='$head',menutext='$menutext',link='$link',menuorder='$menuorder',status='$menu_status',access='$menu_access' WHERE id='$id'";

  if ( $result = mysqli_query($connection, $query)) {
    echo "Record Updated Successfully";
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }

?>