<?php 
  
  require_once('databases.php');

  $link_name=basename($_SESSION['link'],'.php');
  $link=$_SESSION['link'];
  $level=$_SESSION['ulevel'];

  $menuquery = "SELECT * FROM menu WHERE link='$link_name' ORDER BY menuorder";
  $menuresult = mysqli_query($connection, $menuquery);
  $row = mysqli_fetch_assoc($menuresult);

  if ($level==2) {
      if($row['access']==1){
       header("Location: denied.php");
    }
  }
  
 ?>