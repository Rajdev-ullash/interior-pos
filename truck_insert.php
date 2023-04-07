<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	$pfix = mysqli_real_escape_string($connection, $_POST["pfix"]);
	$regno = mysqli_real_escape_string($connection, $_POST["regno"]);
	$fuel = mysqli_real_escape_string($connection, $_POST["fuel"]);
	$capacity = mysqli_real_escape_string($connection, $_POST["capacity"]);
	$trans = mysqli_real_escape_string($connection, $_POST["trans"]);



	$query = "INSERT INTO truck(prefix,regno,fuel,capacity,trans,status,penalty)
       VALUES ('$pfix', '$regno', '$fuel', $capacity, '$trans','Active',0 )";

	if(mysqli_query($connection, $query)){

		
		$output .= '
				<table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Prefix</th>
                        <th>Reg no</th>
                        <th>Fuel</th>
                        <th>Capacity</th>
                        <th>Transport</th>
                        <th>Status</th>
                        <th>Penalty</th>
                      </tr>
                    </thead>
                    <tbody>';
		 $query = "SELECT * FROM truck ORDER BY trans DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){

			$output .="
				<tr>
				<td>".$row['prefix']."</td>
                <td>".$row['regno']."</td>
                <td>".$row['fuel']."</td>
                <td>".$row['capacity']."</td>
                <td>".$row['trans']."</td>
                <td>".$row['status']."</td>
                <td>".$row['penalty']."</td>
                <tr>
			";
		}
			$output .="</tbody></table>";
	}
			
			//echo json_encode($output);
			echo $output;
	}

?>