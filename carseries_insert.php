<?php
include_once('databases.php');
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	$cseries = mysqli_real_escape_string($connection, $_POST["seriesname"]);
	// $addr = mysqli_real_escape_string($connection, $_POST["addr"]);
	// $ph = mysqli_real_escape_string($connection, $_POST["phone"]);



	$query = "INSERT INTO carseries(seriesname)
       VALUES ('$cseries')";

	if(mysqli_query($connection, $query)){

		
		$output .= '
				<table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                       <th>Name</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>';
		 $query = "SELECT * FROM carseries ORDER BY seriesname DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){

			$output .="
				<tr>
				<td>".$row['seriesname']."</td>
				<td><a class='btn btn-primary btn-xs' href='model_edit.php?id=".$row['id']."'>Edit</a></td>
                <tr>
			";
		}
			$output .="</tbody></table>";
	}
			
			//echo json_encode($output);
			echo $output;
	}

?>