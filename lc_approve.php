<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

$i = 0;
$grcost = 0.0;
$id = mysqli_real_escape_string($connection, $_GET['id']);


	
$query = "UPDATE lc SET status='approved' WHERE lcid='$id'";

if (mysqli_query($connection, $query)) {

 $pquery = "SELECT * FROM lc WHERE lcid='$id'";
 $presult = mysqli_query($connection, $pquery);  
 $prow = mysqli_fetch_array($presult);
 $grcost = $prow['actualamount'];
 $sup = $prow['supplier'];

 $query = "INSERT INTO supplier_ledger(ldate,sidf,des,amount,paid,lcid,status)
       VALUES (NOW(),$sup,'LC actual amount',$grcost,0, '$id','new')";

	if(mysqli_query($connection, $query)){
		header('Location: supplier_ledger.php?sid='.$sup);
	}

  
 }
?>