<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	$sname = mysqli_real_escape_string($connection, $_POST["cname"]);
	$addr = mysqli_real_escape_string($connection, $_POST["address"]);
	$city = mysqli_real_escape_string($connection, $_POST["city"]);
	$ph = mysqli_real_escape_string($connection, $_POST["phone"]);
	$contact_person = mysqli_real_escape_string($connection, $_POST["contact_person"]);



	$query = "INSERT INTO customer(cname,address,city,phone,contact_person)
       VALUES ('$sname', '$addr','$city', '$ph','$contact_person')";

	if(mysqli_query($connection, $query)){

		
		$output .= '
				<table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                       <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Contact Person</th>
                      </tr>
                    </thead>
                    <tbody>';
		 $query = "SELECT * FROM customer ORDER BY cname DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){

			$output .="
				<tr>
				<td>".$row['cname']."</td>
                <td>".$row['address']."</td>
                <td>".$row['city']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['contact_person']."</td>
                <tr>
			";
		}
			$output .="</tbody></table>";
	}
			
			//echo json_encode($output);
			echo $output;
	}

?>