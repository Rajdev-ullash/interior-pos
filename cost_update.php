<?php
 include_once('databases.php');
 $s=1;
$output="";
  $id = mysqli_real_escape_string($connection, $_GET['i']);
  $hd = mysqli_real_escape_string($connection, $_GET['h']);
  $am = mysqli_real_escape_string($connection, $_GET['a']);
  $rm = mysqli_real_escape_string($connection, $_GET['r']);
  


  $query = "UPDATE lc_cost SET amount='$am',remarks='$rm' WHERE lcid='$id' AND costhead='$hd'";

  if ( $result = mysqli_query($connection, $query)) {
        $output .= "<table id='dataTableExample' class='table table-hover table-bordered'>
                    <thead>
                      <tr>
                        <th>Sl#</th>
                        <th>Cost head</th>
                        <th>Amount</th>
                         <th>Remarks</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>";
     $query = "SELECT * FROM lc_cost WHERE lcid=$id ORDER BY costhead DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){
                      
      $output .="
        <tr>
        <td>".$s."</td>
        <td contenteditable id='h".$s."'>".$row['costhead']."</td>
                <td contenteditable id='a".$s."'>".$row['amount']."</td>
                <td contenteditable id='r".$s."'>".$row['remarks']."</td>
                 <td><button type='button' class='btn btn-warning btn-sm' onclick='editcost(".$s.");'>Save</button></td>
                <tr>
      ";
      $s++;
    }
      $output .="</tbody></table>";

  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }
  echo $output;
?>