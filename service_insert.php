<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $rate = mysqli_real_escape_string($connection, $_POST["rate"]);
    $uom = mysqli_real_escape_string($connection, $_POST["uom"]);
   
    
    $query = "INSERT INTO services(sname,rate,uom) VALUES ('$name', '$rate', '$uom')";
    
	

	if(mysqli_query($connection, $query)){
		echo '1';
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
}

?>