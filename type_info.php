<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
    
    //get tid into url
    $tid = mysqli_real_escape_string($connection, $_POST["tid"]);
    

    $query = "SELECT * FROM type_details WHERE tid = '$tid'";

	$result = mysqli_query($connection, $query);
    $out = '';
    while($row = mysqli_fetch_assoc($result)){
        $out .= '<option value="'.$row['tdid'].'">'.$row['tdname'].'</option>';
    }
    echo $out;
}

?>