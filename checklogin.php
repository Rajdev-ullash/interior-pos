<?php
//session_start();
require_once('databases.php');

$link=basename($_SERVER['SCRIPT_FILENAME']);
$_SESSION['link']=$link;
// var_dump$_SESSION['ulevel']);();exit;
//$_SESSION['ulevel']);exit;

  if(($_SESSION['id'])!="login")
  {
    header("Location: index.php");
  }else{
 	require("checkAuthorize.php");
  }
?>