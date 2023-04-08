<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
    $rfqDate = mysqli_real_escape_string($connection, $_POST["rfqDate"]);
    $cname = mysqli_real_escape_string($connection, $_POST["cname"]);
    $mobile = mysqli_real_escape_string($connection, $_POST["mobile"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);
    $jobDescription = mysqli_real_escape_string($connection, $_POST["jobDescription"]);
    $bestimate = mysqli_real_escape_string($connection, $_POST["bestimate"]);
    $sdate = mysqli_real_escape_string($connection, $_POST["sdate"]);
    $remarks = mysqli_real_escape_string($connection, $_POST["remarks"]);
    
    $query = "INSERT INTO rfp(rdate, customer, mob, address, description, budget, surveryschedule, remarks, status) VALUES ('$rfqDate', '$cname', '$mobile', '$address', '$jobDescription', '$bestimate', '$sdate', '$remarks', 'pending')";
    
	

	if(mysqli_query($connection, $query)){
		echo '1';
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
}

?>