<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	$sname = mysqli_real_escape_string($connection, $_POST["sname"]);
	$addr = mysqli_real_escape_string($connection, $_POST["addr"]);
	$ph = mysqli_real_escape_string($connection, $_POST["phone"]);



	$query = "INSERT INTO supplier(sname,saddress,phone)
       VALUES ('$sname', '$addr', '$ph')";

	if(mysqli_query($connection, $query)){

		
		$output .= '
				<table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                       <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                      </tr>
                    </thead>
                    <tbody>';
		 $query = "SELECT * FROM supplier ORDER BY sname DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){

			$output .="
				<tr>
				<td>".$row['sname']."</td>
                <td>".$row['saddress']."</td>
                <td>".$row['phone']."</td>
                <tr>
			";
		}
			$output .="</tbody></table>";
	}
			
			//echo json_encode($output);
			echo $output;
	}

?>