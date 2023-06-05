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
    

    
    

    

    //get user id from session

    // $query = "INSERT INTO project(projectname,customer,datecreated,description,paymentmode,startdate,enddate,duration,pm,status) VALUES ('$project_name', '$cname', '$qdate', '$cdescription', '$pname', '$psdate', '$pedate', '$pduration',  '$pmanager', '$status')";

    $query = "INSERT INTO customer(cname,address,area,mobile,email,category,remark) VALUES ('$cname', '$caddress', '$carea', '$cmob', '$cemail', '$ccategory','none')";
    
	

	if(mysqli_query($connection, $query)){
        if(mysqli_affected_rows($connection) == 1){
            $last_id1 = mysqli_insert_id($connection);
            $dr = 0;
            $query3 = "INSERT INTO customer_ledger(tid,tdate,customerid,description,dr,cr,status,ref,remarks) VALUES ('$last_id', '$psdate', '$last_id1', 'none', '$dr','$total_budget', 'none','none','none')";
            if(mysqli_query($connection, $query3)){
                if(mysqli_affected_rows($connection) == 1){
                            echo "success";
                }else{
                            echo "fail";
                }
            }else{
                        echo("Error description: " . mysqli_error($connection));
            }

            //if excute the $query1 loop successfully then execute the $query2
            $query2 = "INSERT INTO project(projectname,customer,datecreated,description,paymentmode,startdate,enddate,duration,pm,status) VALUES ('$project_name', '$last_id1', '$qdate', '$cdescription', '$pname', '$psdate', '$pedate', '$pduration',  '$pmanager', '$status')";

            if(mysqli_query($connection, $query2)){
                if(mysqli_affected_rows($connection) == 1){
                    $last_id = mysqli_insert_id($connection);
            $count = count($service);
        
            for($i=0; $i<$count; $i++){
                $query1 = "INSERT INTO projectdetail(projectidf,service,description,quantity,uom,rate,amount,duration,startdate,status) VALUES ('$last_id', '$service[$i]', '$description[$i]', '$quantity[$i]', '$uom[$i]', '$rate[$i]', '$amount[$i]', '$pduration','$psdate', '$status')";
                if(mysqli_query($connection, $query1)){
                    if(mysqli_affected_rows($connection) == 1){
                        echo "success";
                    }else{
                        echo "fail";
                    }
                }else{
                    echo("Error description: " . mysqli_error($connection));
                }
            }
                }else{
                    echo "fail";
                }

            }else{
                echo("Error description: " . mysqli_error($connection));
            }

        }else{
            echo "fail";
        }

        // sent error message if query execution failed in query1 loop 

        echo "success";



        
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
}



?>