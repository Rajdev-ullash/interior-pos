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
    $reqid = mysqli_real_escape_string($connection, $_POST["reqid"]);
    $uid = mysqli_real_escape_string($connection, $_POST["id"]);

    //status get in database

    $q = "SELECT * FROM quotation";
    $result5 = mysqli_query($connection, $q);
    if(!$result5){
        die("Database query failed.");
    }
    $row5 = mysqli_fetch_assoc($result5);
    $status = $row5['status'];
    

    //update quotation
    $query = "UPDATE quotation SET qdate='$rdate', customer='$cname', address='$caddress', area='$carea', mobile='$mob', email='$cemail', category='$category', description='$cdescription', paymentmode='$pname', terms='$tname',status='$status',preparedby='$preparedby' WHERE qid='$uid'";

    if (mysqli_query($connection, $query)) {
        $last_id = mysqli_insert_id($connection);
        $query = "DELETE FROM quotationdetail WHERE qidf='$uid'";
        if (mysqli_query($connection, $query)) {
            for($i=0; $i<count($service); $i++){
                $query = "INSERT INTO quotationdetail (qidf, service, description, quantity, uom, rate, remarks, amount) VALUES ('$uid', '$service[$i]', '$description[$i]', '$quantity[$i]', '$uom[$i]', '$rate[$i]', '$remark[$i]', '$amount[$i]')";
                if (mysqli_query($connection, $query)) {
                    $last_id = mysqli_insert_id($connection);
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($connection);
                }
            }
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connection);
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }

    
}



?>