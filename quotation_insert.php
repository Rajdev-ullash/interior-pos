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

    $remarkid = mysqli_real_escape_string($connection, $_POST["remarkid"]);
    $remark = explode(",", $remarkid);

    $amountid = mysqli_real_escape_string($connection, $_POST["amountid"]);
    $amount = explode(",", $amountid);

    $rdate = mysqli_real_escape_string($connection, $_POST["rdate"]);
    $cname = mysqli_real_escape_string($connection, $_POST["cname"]);
    $mob = mysqli_real_escape_string($connection, $_POST["mob"]);
    $cemail = mysqli_real_escape_string($connection, $_POST["cemail"]);
    $category = mysqli_real_escape_string($connection, $_POST["category"]);
    $caddress = mysqli_real_escape_string($connection, $_POST["caddress"]);
    $cdescription = mysqli_real_escape_string($connection, $_POST["cdescription"]);
    $carea = mysqli_real_escape_string($connection, $_POST["carea"]);
    $pname = mysqli_real_escape_string($connection, $_POST["pname"]);
    $tname = mysqli_real_escape_string($connection, $_POST["tname"]);
    $preparedby = mysqli_real_escape_string($connection, $_POST["preparedby"]);
    

    //get user id from session

    $query = "INSERT INTO quotation(qdate,customer,address,area,mobile,email,category,description,paymentmode,terms,status,preparedby) VALUES ('$rdate', '$cname', '$caddress', '$carea', '$mob', '$cemail', '$category',  '$cdescription', '$pname', '$tname', 'pending', '$preparedby')";
    
	

	if(mysqli_query($connection, $query)){

        if(mysqli_affected_rows($connection) == 1){
            $last_id = mysqli_insert_id($connection);
            $count = count($service);
        
            for($i=0; $i<$count; $i++){
                $query1 = "INSERT INTO quotationdetail(qidf,service,description,quantity,uom,rate,amount,remarks) VALUES ('$last_id', '$service[$i]', '$description[$i]', '$quantity[$i]', '$uom[$i]', '$rate[$i]', '$amount[$i]', '$remark[$i]')";
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

        // sent error message if query execution failed in query1 loop 

        echo "success";



        
	}else{
        echo("Error description: " . mysqli_error($connection));
    }
}



?>