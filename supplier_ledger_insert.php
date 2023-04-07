<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

$i = 1;
	$id = mysqli_real_escape_string($connection, $_POST["sidf"]);
	$paid = mysqli_real_escape_string($connection, $_POST["paid"]);
	$des = mysqli_real_escape_string($connection, $_POST["des"]);
  $lcid = mysqli_real_escape_string($connection, $_POST["lcid"]);

  $query = "INSERT INTO supplier_ledger(ldate,sidf,des,amount,paid,lcid,status)
  VALUES (NOW(),$id,'$des',0,$paid,'$lcid','new')";

	if(mysqli_query($connection, $query)){
	 header('Location: supplier_ledger.php?sid='.$id);
	}else{
     echo "Error: " . $query . "<br>" . mysqli_error($connection);
  }
			

?>