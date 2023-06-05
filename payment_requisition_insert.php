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
    $status = 'pending';
    
    
    $query = "INSERT INTO payment_req(amount, payee, type, purpose, paydate, status) VALUES ('$payamount', '$payee', '$type_details', '$purpose', '$paydate', '$status')";
    
	

	if(mysqli_query($connection, $query)){
		echo '1';
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
}

?>