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
    $approveamount = mysqli_real_escape_string($connection, $_POST["approveamount"]);
    $payid = mysqli_real_escape_string($connection, $_POST["payid"]);
    $status = 'done';
    
    
    $query = "UPDATE payment_req SET amount='$payamount',payee='$payee',type='$type_details',purpose='$purpose',paydate='$paydate',app_amount='$approveamount',status='$status' WHERE prid='$payid'";
    
	

	if(mysqli_query($connection, $query)){
		echo "1";
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
}

?>