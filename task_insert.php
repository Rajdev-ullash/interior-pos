<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
    $taskid = mysqli_real_escape_string($connection, $_POST["taskid"]);
    $task = explode(",", $taskid);

    $descriptionid = mysqli_real_escape_string($connection, $_POST["descriptionid"]);
    $description = explode(",", $descriptionid);

    $assignid = mysqli_real_escape_string($connection, $_POST["assignid"]);
    $assign = explode(",", $assignid);
    
    $sdateid = mysqli_real_escape_string($connection, $_POST["sdateid"]);
    $sdate = explode(",", $sdateid);

    $edateid = mysqli_real_escape_string($connection, $_POST["edateid"]);
    $edate = explode(",", $edateid);

    $statusid = mysqli_real_escape_string($connection, $_POST["statusid"]);
    $status = explode(",", $statusid);


    for($i=0; $i<count($task); $i++){
        $query = "INSERT INTO project_task (taskname, description, assignedto, startdate, enddate, status) VALUES ('$task[$i]', '$description[$i]', '$assign[$i]', '$sdate[$i]', '$edate[$i]', '$status[$i]')";
        if (mysqli_query($connection, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connection);
        }
    }

    
}



?>