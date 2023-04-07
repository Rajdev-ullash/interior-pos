<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

$i = 0;
$grcost = 0.0;
If(!empty($_POST)){
	
	$lcno = mysqli_real_escape_string($connection, $_POST["lcno"]);
	$lc = mysqli_real_escape_string($connection, $_POST["lcid"]);
		

	$dquery="SELECT * FROM cars WHERE lcno='$lcno'";
	//echo $dquery;
	$dresult = mysqli_query($connection, $dquery);  
	if(mysqli_num_rows($dresult)==0){

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
		            	$ac = "act".$i;
		            	$unit = "unit".$i;
		            	$dnt = "dnt".$i;
		            	$pnt = "pnt".$i;
		            	$otxt = "otxt".$i;
		            	$oamt = "oamt".$i;
		            	$dc = "dcost".$i;

		            	$brand = mysqli_real_escape_string($connection, $_POST[$thisitem]);
		            	$series = mysqli_real_escape_string($connection, $_POST[$sr]);
		            	$model = mysqli_real_escape_string($connection, $_POST[$mod]);
		            	$chassis = mysqli_real_escape_string($connection, $_POST[$ch]);
		            	$quantity = mysqli_real_escape_string($connection, $_POST[$qty]);
		            	$act = mysqli_real_escape_string($connection, $_POST[$ac]);
		            	$color = mysqli_real_escape_string($connection, $_POST[$col]);
		            	$fob = mysqli_real_escape_string($connection, $_POST[$unit]);
		            	$dent = mysqli_real_escape_string($connection, $_POST[$dnt]);
		            	$paint = mysqli_real_escape_string($connection, $_POST[$pnt]);
		            	$misc = mysqli_real_escape_string($connection, $_POST[$otxt]);		            	
		            	$misccost = mysqli_real_escape_string($connection, $_POST[$oamt]);		            	
		            	$dcost = mysqli_real_escape_string($connection, $_POST[$dc]);	

						//echo "<br>code".$_POST[$thisitem];
						$itemquery = "INSERT INTO cars(lcno,chassis,brand,series,model,color,cost,qty,stock,entrydate,fobcost,dent,paint,misc,dcost,miscamount)
       					VALUES ('$lcno', '$chassis', '$brand', '$series', '$model', '$color', $act, $quantity,$quantity,NOW(),$fob,$dent,$paint,'$misc',$dcost,$misccost)";

       					if (!mysqli_query($connection, $itemquery)){
       						echo "Error: " . $itemquery . "<br>" . mysqli_error($connection);
       						exit;
       					} else{   				   
       				
				
						echo "Data saved successfully";
						
					}
				} else{
					break;
				}
            }//for ends
            $uquery = "UPDATE lc SET status='received' WHERE lcid='$lc'";
			//echo $uquery;
			if (mysqli_query($connection, $uquery)) {
			  header('Location: carstock.php');
			}
	} else{
		echo "data exists";
	}
	
		
}

?>