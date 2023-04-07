<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

$i = 0;
$grcost = 0.0;
If(!empty($_POST)){
	$id = mysqli_real_escape_string($connection, $_POST["lcid"]);
	$lcno = mysqli_real_escape_string($connection, $_POST["lcno"]);
	$lcdate = mysqli_real_escape_string($connection, $_POST["lcdate"]);
	$supplier = mysqli_real_escape_string($connection, $_POST["sup"]);
	$bank = mysqli_real_escape_string($connection, $_POST["bank"]);
	$amount = mysqli_real_escape_string($connection, $_POST["amount"]);
	$actual = mysqli_real_escape_string($connection, $_POST["actual"]);

	$dquery="SELECT * FROM lc WHERE lcno='$lcno'";
	echo $dquery;
	$dresult = mysqli_query($connection, $dquery);  
	if(mysqli_num_rows($dresult)<2){

	
    $query = "UPDATE lc SET lcno='$lcno',lcdate='$lcdate',supplier=$supplier,bank=$bank,lcamount=$amount,actualamount='$actual' WHERE lcid='$id'";

	if (mysqli_query($connection, $query)) {
echo "<br>PREPARING DELETE";
		$delquery="DELETE FROM lc_detail WHERE lcidf='$id'";
		echo $delquery;
		if (mysqli_query($connection, $delquery)){
			echo "<br>RUNNING DELETE";
		  //  $last_id = mysqli_insert_id($connection);
            for($i=0;;$i++){
            	echo $i;
       					echo "<br>";
            	$thisitem = "brand".$i;
 					if(isset($_POST[$thisitem])){
 						$sr = "series".$i;
 						$mod = "mod".$i;
		            	$col = "color".$i;
		            	$ch = "ch".$i;
		            	$qty = "qty".$i;
		            	$un = "unit".$i;
		            	$fr = "fr".$i;
		            	$ac = "act".$i;

		            	$brand = mysqli_real_escape_string($connection, $_POST[$thisitem]);
		            	$series = mysqli_real_escape_string($connection, $_POST[$sr]);
		            	$model = mysqli_real_escape_string($connection, $_POST[$mod]);
		            	$chassis = mysqli_real_escape_string($connection, $_POST[$ch]);
		            	$quantity = mysqli_real_escape_string($connection, $_POST[$qty]);
		            	$unit = mysqli_real_escape_string($connection, $_POST[$un]);
		            	$frt = mysqli_real_escape_string($connection, $_POST[$fr]);
		            	$act = mysqli_real_escape_string($connection, $_POST[$ac]);
		            	$color = mysqli_real_escape_string($connection, $_POST[$col]);
		            	

						//echo "<br>code".$_POST[$thisitem];
						$itemquery = "INSERT INTO lc_detail(lcidf,brand,series,model,color,chassis,qty,unitprice,freight,actual)
       					VALUES ($id, '$brand', '$series', '$model', '$color', '$chassis', $quantity, $unit,$frt,$act)";

       					if (!mysqli_query($connection, $itemquery)){
       						echo "Error: " . $query . "<br>" . mysqli_error($connection);
       						exit;
       					} else{   				   
       				
				
						echo "Data saved successfully";
						
					}
				} else{
					echo "<br>exiting for";
					break;
				}
            }//for ends
            echo "<br>out of for";
         } //del if ends
		} else {
		    echo "Error: " . $query . "<br>" . mysqli_error($connection);
		    exit;
		}

	} else{
		echo "data exists";
	}

}
  header('Location: lc_edit.php?id='.$id);
?>