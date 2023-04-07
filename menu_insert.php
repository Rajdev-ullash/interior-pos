<?php
include_once('databases.php');
//var_dump($_POST);exit;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	
	$menu_head = mysqli_real_escape_string($connection, $_POST["menu_head"]);
	$menu_title = mysqli_real_escape_string($connection, $_POST["menu_title"]);
	$menu_link = mysqli_real_escape_string($connection, $_POST["menu_link"]);
	$menu_order = mysqli_real_escape_string($connection, $_POST["menu_order"]);
	$menu_status = mysqli_real_escape_string($connection, $_POST["menu_status"]);
	$menu_access = mysqli_real_escape_string($connection, $_POST["menu_access"]);
	

	$query = "INSERT INTO menu(head, menutext, link, menuorder, status, access) VALUES ('$menu_head', '$menu_title', '$menu_link', '$menu_order', '$menu_status', '$menu_access')";

	if(mysqli_query($connection, $query)){
		
			echo '1';
	} else
	    echo("Error description: " . mysqli_error($connection));
			
			//echo json_encode($output);
			//echo $output;
	}

?>
