<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	$name = mysqli_real_escape_string($connection, $_POST["regno"]);
	$person = mysqli_real_escape_string($connection, $_POST["capacity"]);
	$mob = mysqli_real_escape_string($connection, $_POST["trans"]);

	$query = "INSERT INTO cnf(name,person,mobile,status)
       VALUES ('$name','$person', '$mob','Active')";

	if(mysqli_query($connection, $query)){

		
		$output .= '
				<table id="dataTableExample" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID#</th>
                        <th>Name</th>
                        <th>Contact person</th>
                        <th>Mobile</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>';
		 $query = "SELECT * FROM cnf ORDER BY name DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){
			$output .="
				<tr>
				<td>".$row['cnfid']."</td>
                <td>".$row['name']."</td>
                <td>".$row['person']."</td>
                <td>".$row['mobile']."</td>
                <td>".$row['status']."</td>
                <tr>
			";
		}
			$output .="</tbody></table>";
	} else{
		 echo mysqli_error($connection);
	}
			
			//echo json_encode($output);
			echo $output;
	}

?>