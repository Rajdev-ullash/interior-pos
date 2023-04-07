<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";

	$user_name = mysqli_real_escape_string($connection, $_POST["user_name"]);
	$user_pass = mysqli_real_escape_string($connection, $_POST["user_pass"]);
	$user_level = mysqli_real_escape_string($connection, $_POST["user_level"]);
	$user_des = mysqli_real_escape_string($connection, $_POST["user_des"]);
	$user_status = mysqli_real_escape_string($connection, $_POST["user_status"]);
	
	

	$query = "INSERT INTO users(username, password, level, description, status) VALUES ('$user_name', '$user_pass', '$user_level', '$user_des', '$user_status')";

	if(mysqli_query($connection, $query)){
		
			echo '1';
	} else
	    echo("Error description: " . mysqli_error($connection));
			//echo json_encode($output);
			//echo $output;
	}

?>
