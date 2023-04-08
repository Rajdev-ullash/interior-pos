<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}


//specific services info
if(!empty($_POST)){
    $id = mysqli_real_escape_string($connection, $_POST["serviceid"]);
    $query = "SELECT * FROM services WHERE serviceid = '$id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

?>