<?php
include_once('databases.php');
$output="";
 $s=1;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	$lcid = mysqli_real_escape_string($connection, $_POST["lcidf"]);
	$chead = mysqli_real_escape_string($connection, $_POST["chead"]);
	$cost = mysqli_real_escape_string($connection, $_POST["cost"]);
	$rem = mysqli_real_escape_string($connection, $_POST["rem"]);

    $output.=$chead;

	$query = "INSERT INTO lc_cost(lcid,costhead,amount,remarks)
       VALUES ($lcid, '$chead', $cost, '$rem')";

	if(mysqli_query($connection, $query)){

		
		$output .= '<table id="dataTableExample" class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>Sl#</th>
                        <th>Cost head</th>
                        <th>Amount</th>
                         <th>Remarks</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>';
		 $query = "SELECT * FROM lc_cost WHERE lcid=$lcid ORDER BY costhead DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){
                     
			$output .="
				<tr>
				<td>".$s."</td>
				<td>".$row['costhead']."</td>
                <td contenteditable>".$row['amount']."</td>
                <td contenteditable>".$row['remarks']."</td>
                <td><button type='button' class='btn btn-warning btn-sm' onclick='editcost(".$s.");'>Save</button></td>
                <tr>
			";
			$s++;
		}
			$output .="</tbody></table>";
	}
			
			//echo json_encode($output);
			echo $output;
	}

?>