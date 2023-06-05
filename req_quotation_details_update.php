<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
   

    $rdate = mysqli_real_escape_string($connection, $_POST["rdate"]);
    $customer = mysqli_real_escape_string($connection, $_POST["customer"]);
    $mobile = mysqli_real_escape_string($connection, $_POST["mob"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);
    $description = mysqli_real_escape_string($connection, $_POST["description"]);
    $budget = mysqli_real_escape_string($connection, $_POST["budget"]);
    $surveryschedule = mysqli_real_escape_string($connection, $_POST["surveryschedule"]);
    $remarks = mysqli_real_escape_string($connection, $_POST["remarks"]);
    $req_id = mysqli_real_escape_string($connection, $_POST["req_id"]);
    
    //get status from rfp
    $query1 = "SELECT status FROM rfp WHERE id='$req_id'";
    $result = mysqli_query($connection, $query1);
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];
    

    //update rfp
    $query = "UPDATE rfp SET rdate='$rdate', customer='$customer', mob='$mobile', address='$address', description='$description', budget='$budget', surveryschedule='$surveryschedule', remarks='$remarks', status='$status' WHERE id='$req_id'";

    if(mysqli_query($connection, $query)){
		echo $query;
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
    

    

    
}



?>