<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
   

    $tname = mysqli_real_escape_string($connection, $_POST["tname"]);
    $description = mysqli_real_escape_string($connection, $_POST["description"]);
    $manager = mysqli_real_escape_string($connection, $_POST["manager"]);
    $sdate = mysqli_real_escape_string($connection, $_POST["sdate"]);
    $edate = mysqli_real_escape_string($connection, $_POST["edate"]);
    $status = mysqli_real_escape_string($connection, $_POST["status"]);
    $req_id = mysqli_real_escape_string($connection, $_POST["req_id"]);
    
    

    //update rfp
    $query = "UPDATE project_task SET taskname='$tname', description='$description', assignedto='$manager', startdate='$sdate', enddate='$edate', status='$status' WHERE taskid='$req_id' ";

    if(mysqli_query($connection, $query)){
		echo $query;
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
    

    

    
}



?>