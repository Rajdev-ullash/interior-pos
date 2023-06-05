<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
    $rpdate = mysqli_real_escape_string($connection, $_POST["rpdate"]);
    $cname = mysqli_real_escape_string($connection, $_POST["cname"]);
    $reference = mysqli_real_escape_string($connection, $_POST["reference"]);
    $description = mysqli_real_escape_string($connection, $_POST["description"]);
    $amount = mysqli_real_escape_string($connection, $_POST["amount"]);
    $ptype = mysqli_real_escape_string($connection, $_POST["ptype"]);
    $cdetails = mysqli_real_escape_string($connection, $_POST["cdetails"]);
    $cdates = mysqli_real_escape_string($connection, $_POST["cdates"]);
    $status = 'pending';
    
    
    $query = "INSERT INTO paymentin(pdate, customerid, ref, description, amount, paytype, chequeinfo,chequedate, status) VALUES ('$rpdate', '$cname', '$reference', '$description', '$amount', '$ptype', '$cdetails', '$cdates', '$status')";
    
	

	if(mysqli_query($connection, $query)){
		echo '1';
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
}

?>