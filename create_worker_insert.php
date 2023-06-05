<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
    $cdtype = mysqli_real_escape_string($connection, $_POST["cdtype"]);
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $cperson = mysqli_real_escape_string($connection, $_POST["cperson"]);
    $status = 'pending';
    
    
    
    $query = "INSERT INTO type_details(tid,tdname,tdaddress,tdphone,tdcperson,status) VALUES ('$cdtype','$name','$address','$phone','$cperson','$status')";
    
	

	if(mysqli_query($connection, $query)){
		echo '1';
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
}

?>