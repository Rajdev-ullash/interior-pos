<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

if(!empty($_POST)){
	$output = "";

	$user_name = mysqli_real_escape_string($connection, $_POST["user_name"]);
	$user_pass_old = mysqli_real_escape_string($connection, $_POST["user_pass_old"]);
	$user_pass_new = mysqli_real_escape_string($connection, $_POST["user_pass_new"]);
	
	if($user_name != "" && $user_pass_old != "" && $user_pass_new != ""){
    
      $sql = "SELECT * FROM users WHERE username = '".$user_name."' AND password = '".$user_pass_old."' AND status = 'Active'";
      
      $result = mysqli_query($connection,$sql);
      if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row["userid"];

        $query = "UPDATE users SET password='$user_pass_new' WHERE userid='$id'";

		if(mysqli_query($connection, $query)){
			
				echo '1';
		} else
		    echo("Error description: " . mysqli_error($connection));
				//echo json_encode($output);
				//echo $output;
		}
        
      }else{
        echo '2';
      }
    }

	

?>
