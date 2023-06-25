<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
    $customer_id = mysqli_real_escape_string($connection, $_POST["customer_id"]);
    $project_id = mysqli_real_escape_string($connection, $_POST["project_id"]);
    $total = mysqli_real_escape_string($connection, $_POST["total"]);
    $discount = mysqli_real_escape_string($connection, $_POST["discount"]);
    $advance = mysqli_real_escape_string($connection, $_POST["advance"]);
    $grand_total = mysqli_real_escape_string($connection, $_POST["grand_total"]);
    //take invoice id & increment it by 1
    $res = "SELECT project_id FROM invoice where project_id='$project_id'";
    $result = mysqli_query($connection, $res);
    $row = mysqli_fetch_array($result);

    //invoice date is current date
    $invoice_date = date("Y-m-d");


    //take advance & discount from invoice table
    
   
    
    
    $query = "INSERT INTO invoice(invoice_no, invoice_date, customer_id, project_id, total, discount, advance,grand_total, status) VALUES ('$invoice_id', '$invoice_date', '$customer_id', '$project_id', '$total', '$discount', '$advance','$grand_total', '$status')";

    if(mysqli_query($connection, $query)){
        echo '1';
    }
    else{
        echo("Error description: " . mysqli_error($connection));
    }

    
	
}

?>