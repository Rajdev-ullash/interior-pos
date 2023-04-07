<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

$i = 0;
$grcost = 0.0;
If(!empty($_POST)){
	
	$cust = mysqli_real_escape_string($connection, $_POST["cust"]);
	$lcdate = mysqli_real_escape_string($connection, $_POST["lcdate"]);
	$shipto = mysqli_real_escape_string($connection, $_POST["shipto"]);
	$rem = mysqli_real_escape_string($connection, $_POST["rem"]);
	$gt = mysqli_real_escape_string($connection, $_POST["gtotal"]);
	$adv = mysqli_real_escape_string($connection, $_POST["adv"]);
	

	$query = "INSERT INTO sales(sdate,cidf,shipto,remarks,total,adv,status)
       VALUES ( '$lcdate','$cust', '$shipto','$rem',$gt,$adv,'new')";

	if (mysqli_query($connection, $query)) {
		    $last_id = mysqli_insert_id($connection);
            for($i=1;;$i++){
            	
       					echo "<br>";
            	$thisitem = "carno".$i;
 					if(isset($_POST[$thisitem])){
 						$sr = "des".$i;
 						$mod = "saleqty".$i;
		            	$col = "rate".$i;
		            	$ch = "amount".$i;
		            	

		            	$car = mysqli_real_escape_string($connection, $_POST[$thisitem]);
		            	$description = mysqli_real_escape_string($connection, $_POST[$sr]);
		            	$qty = mysqli_real_escape_string($connection, $_POST[$mod]);
	                	$rate = mysqli_real_escape_string($connection, $_POST[$col]);
	                	$lineamount = mysqli_real_escape_string($connection, $_POST[$ch]);
		            	

						//echo "<br>code".$_POST[$thisitem];
						$itemquery = "INSERT INTO sales_detail(invf,caridf,des,unitprice,qty,remarks)
       					VALUES ($last_id, $car, '$description', '$rate', '$qty', 'ok')";

       					if (!mysqli_query($connection, $itemquery)){
       						echo "Error: " . $query . "<br>" . mysqli_error($connection);
       						exit;
       					} else{   				   
       				
				
						echo "Data saved successfully";
						
					}
				} else{
					break;
				}
            }//for ends

		} else {
		    echo "Error: " . $query . "<br>" . mysqli_error($connection);
		    exit;
		}
 header('Location: sales_view.php');
}

?>