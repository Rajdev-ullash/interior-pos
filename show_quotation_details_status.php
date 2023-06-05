<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

//just update the status

if(!empty($_POST)){
    $id = mysqli_real_escape_string($connection, $_POST["id"]);
    $query = "UPDATE quotation SET status = 'done' WHERE qid = '$id'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Database query failed.");
    }
    echo json_encode($result);
}