<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	//insert into database
    $serviceid = mysqli_real_escape_string($connection, $_POST["serviceid"]);
    $service = explode(",", $serviceid);

    $descriptionid = mysqli_real_escape_string($connection, $_POST["descriptionid"]);
    $description = explode(",", $descriptionid);

    $quantityid = mysqli_real_escape_string($connection, $_POST["quantityid"]);
    $quantity = explode(",", $quantityid);
    
    $uomid = mysqli_real_escape_string($connection, $_POST["uomid"]);
    $uom = explode(",", $uomid);

    $rateid = mysqli_real_escape_string($connection, $_POST["rateid"]);
    $rate = explode(",", $rateid);


    $amountid = mysqli_real_escape_string($connection, $_POST["amountid"]);
    $amount = explode(",", $amountid);

    $qdate = mysqli_real_escape_string($connection, $_POST["qdate"]);
    $psdate = mysqli_real_escape_string($connection, $_POST["psdate"]);
    $pedate = mysqli_real_escape_string($connection, $_POST["pedate"]);
    $pduration = mysqli_real_escape_string($connection, $_POST["pduration"]);
    $pmanager = mysqli_real_escape_string($connection, $_POST["pmanager"]);
    $project_name = mysqli_real_escape_string($connection, $_POST["project_name"]);
    $cname = mysqli_real_escape_string($connection, $_POST["cname"]);
    $cdescription = mysqli_real_escape_string($connection, $_POST["cdescription"]);
    $pname = mysqli_real_escape_string($connection, $_POST["pname"]);
    $status = "pending";
    $caddress = mysqli_real_escape_string($connection, $_POST["caddress"]);
    $carea = mysqli_real_escape_string($connection, $_POST["carea"]);
    $cmob  = mysqli_real_escape_string($connection, $_POST["cmob"]);
    $cemail = mysqli_real_escape_string($connection, $_POST["cemail"]);
    $ccategory = mysqli_real_escape_string($connection, $_POST["ccategory"]);
    $total_budget = mysqli_real_escape_string($connection, $_POST["total_budget"]);
    $id = mysqli_real_escape_string($connection, $_POST["id"]);
    

    
    

    

    //get status from db

    $q = "SELECT * FROM project where projectid = '$id'";
    $result5 = mysqli_query($connection, $q);
    $row5 = mysqli_fetch_assoc($result5);
    $status = $row5['status'];


    //update query result

    $query = "UPDATE project set projectname = '$project_name', customer = '$cname', datecreated = '$qdate', description = '$cdescription', paymentmode = '$pname', startdate = '$psdate', enddate = '$pedate', duration = '$pduration', pm = '$pmanager', status = '$status' WHERE projectid = '$id'";
    $result = mysqli_query($connection, $query);
    if(mysqli_query($connection, $query)){
        //last id
        $last_id = mysqli_insert_id($connection);

        $query2 = "DELETE FROM projectdetail WHERE projectidf = '$id'";
       if(mysqli_query($connection, $query2)){
        for($i = 0; $i < count($service); $i++){
            $query3 = "INSERT INTO projectdetail(projectidf, service, description, quantity, uom, rate, amount) VALUES ('$id', '$service[$i]', '$description[$i]', '$quantity[$i]', '$uom[$i]', '$rate[$i]', '$amount[$i]')";
            $result3 = mysqli_query($connection, $query3);
            if(!$result3){
                die("Database query failed.");
            }
        }
        $query4 = "UPDATE customer_ledger SET cr = '$total_budget' WHERE tid = '$id'";
        $result4 = mysqli_query($connection, $query4);
        if(!$result4){
            die("Database query failed.");
        }
        else{
            echo json_encode($result4);
        }
        
       }
        
        
        
    }
    
}



?>