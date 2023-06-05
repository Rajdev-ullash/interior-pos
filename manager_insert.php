<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    
    
    
    $query = "INSERT INTO manager(name, address, phone) VALUES ('$name', '$address', '$phone')";
    
	

	if(mysqli_query($connection, $query)){
		echo '1';
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
}

?>