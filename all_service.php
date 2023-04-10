<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

$query = "SELECT * FROM services";
$result = mysqli_query($connection, $query);
if(!$result){
die("Database query failed.");
}

//send data to client side in json format

echo json_encode($result->fetch_all(MYSQLI_ASSOC));

?>