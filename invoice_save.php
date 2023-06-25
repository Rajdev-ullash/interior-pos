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
    $res = "SELECT invoice_no FROM invoice ORDER BY invoice_no DESC LIMIT 1";
    $result = mysqli_query($connection, $res);
    $row = mysqli_fetch_array($result);
    $invoice_id = $row['invoice_no'] + 1;
    //invoice date is current date
    $invoice_date = date("Y-m-d");
    //invoice status is pending
    $status = 'done';

    //convert advance into integer with parseInt
    $advance = (int)$advance;
    

    
   
    
    
    $query = "INSERT INTO invoice(invoice_no, invoice_date, customer_id, project_id, total, discount, advance,grand_total, status) VALUES ('$invoice_id', '$invoice_date', '$customer_id', '$project_id', '$total', '$discount', '$advance','$grand_total', '$status')";

    if(mysqli_query($connection, $query)){
        //update into customer ledger table to dr to advances
        $query = "UPDATE customer_ledger SET dr = dr + '$advance' WHERE customerid = '$customer_id'";
        mysqli_query($connection, $query);
        
        if(mysqli_query($connection, $query)){
            echo "Success";
        }
        else{
            echo("Error description: " . mysqli_error($connection));
        }


        echo '1';
    }
    else{
        echo("Error description: " . mysqli_error($connection));
    }

    
	
}

?>