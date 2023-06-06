<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
    $payamount = mysqli_real_escape_string($connection, $_POST["payamount"]);
    $payee = mysqli_real_escape_string($connection, $_POST["payee"]);
    $type_details = mysqli_real_escape_string($connection, $_POST["type_details"]);
    $purpose = mysqli_real_escape_string($connection, $_POST["purpose"]);
    $paydate = mysqli_real_escape_string($connection, $_POST["paydate"]);
    $ptype = mysqli_real_escape_string($connection, $_POST["ptype"]);
    $cdetails = mysqli_real_escape_string($connection, $_POST["cdetails"]);
    $cdate = mysqli_real_escape_string($connection, $_POST["cdate"]);
    $status = 'pending';
    
    
    $query = "INSERT INTO payout(paydate, amount, payee, purpose, type, ptype, chequeinfo, chequedate, status) VALUES ('$paydate', '$payamount', '$payee', '$purpose', '$type_details', '$ptype', '$cdetails', '$cdate', '$status')";
    
	

	if(mysqli_query($connection, $query)){
		echo '1';
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
}

?>