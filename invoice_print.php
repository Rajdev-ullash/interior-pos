<?php
include_once('databases.php');

function numberTowords(float $amount)
{

    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
      $get_divider = ($x == 2) ? 10 : 100;
      $amount = floor($num % $get_divider);
      $num = floor($num / $get_divider);
      $x += $get_divider == 10 ? 1 : 2;
      if ($amount) {
       $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
       $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
       $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
       '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
       '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
   else $string[] = null;
   }
   $implode_to_Rupees = implode('', array_reverse($string));
   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Poisa' : '';
   return ($implode_to_Rupees ? $implode_to_Rupees . 'Taka ' : '') . $get_paise;

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title></title>

    <!-- Bootstrap core CSS -->


    <!-- Custom styles for this template -->
    <link href="assets/css/invoice.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet'
        type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/modernizr.custom.js"></script>

</head>
<!-- <meta http-equiv="refresh" content="0; url=index.php" /> -->

<body>
    <div id="memobody" style="height:780px">
        <!-- PROCESS SECTION -->

        <?php
              $inv = $_GET["id"];         
              
              $masterquery = "SELECT * FROM invoice WHERE project_id=$inv ORDER BY invoice_no DESC LIMIT 1";  
              $masterresult = mysqli_query($connection, $masterquery);  

             while($row = mysqli_fetch_array($masterresult)) {
               $salesdate = date_format(date_create($row["invoice_date"]),"d/m/Y"); 
               $query = "SELECT * FROM customer where customerid='".$row["customer_id"]."'";
             $select_result = mysqli_query($connection, $query);
             $row1 = mysqli_fetch_assoc($select_result);
             $cname = stripslashes($row1["cname"]);
              $address = $row1["address"];


               echo "<br><br><br><br><br><br><table><tr>";
               echo "<td width='25%' style='text-align:center;border: 1px solid;'><strong>INVOICE NO:</strong>".$row["invoice_no"]."<td>";
               echo "<td width='75%'><strong>Date :</strong> ".$salesdate."<td>";
              
               echo " </tr></table>";
               echo "<p style='font-size:15px;' id='bin'><strong>BIN NO : </strong> "."002137696-0505";
               echo "</p><p style='font-size:15px;'><strong>Customer Name:</strong> ".$cname;
               echo "</p><p style='font-size:15px;'><strong>Address:</strong> ".$address;
               echo " </p>";

               $gtotal = $row["total"];
               $adv = $row["advance"];
               $dis = $row["discount"];
               //first take all invoice about this project
                $query = "SELECT * FROM invoice WHERE project_id=$inv";
                $result = mysqli_query($connection, $query);
                $counter = 1;
                $due_adv = 0;
                $due_dis = 0;

                //run a for loop of for sum advance and discount
                foreach ($result as $row ) {
                    $due_adv += $row['advance'];
                    $due_dis += $row['discount'];
                }

                //now calculate the due is total - (advance + discount)

                $due = $gtotal - ($due_adv + $due_dis);
                
               $grandtotal = $row["grand_total"];
              
             }
             
            
        

              echo "<table id='bodytable' cellpadding='3' style='font-size:14px;'>";
              echo "<thead><tr><th width='3%'> # </th>
                    <th width='20%'>Services</th>
                    <th width='20%'>Description</th>
                    <th width='10%'>Quantity</th>
                    <th width='7%'>Uom</th>
                    <th width='10%'>Rate</th>
                    <th width='10%'>Amount</th>
                    <tr></thead>";

                                                $query = "SELECT * FROM projectdetail WHERE projectidf = '$inv'";
                                                $result = mysqli_query($connection, $query);
                                                $counter = 1;
                                                $total = 0;
                                                //run a for loop of $total  results
                                                foreach ($result as $row ) {
                                                    
                                                    $total += $row['amount'];
                                                    $format = number_format($total, 2);
                                                     echo "<tr>";
                                                    echo "<td>" . $counter . "</td>";
                                                    //form td with input field
                                                    echo "<td>"; 
                                                    
                                                    //database query to fetch item list
                                                    $query = "SELECT * FROM services ORDER BY serviceid DESC";
                                                    $result = mysqli_query($connection, $query);
                                                    while ($row2 = mysqli_fetch_array($result)) {
                                                        //if item id is same as item id in the database
                                                        if ($row['service'] == $row2['serviceid']) {
                                                            //echo the item name
                                                            echo $row2['sname'];
                                                        }
                                                    }
                                                    echo  "</td>";

                                                    echo "<td>" 
                                                        
                                                        . $row['description'] . "</td>";
                                                   
                                                    echo "<td>" . $row['quantity'] . "</td>"; 
                                                    echo "<td>". $row['uom'] . 
                                                     "</td>";
                                                    echo "<td>" . $row['rate'] . "</td>";
                                                     "</td>";
                                                    echo "<td>". $row['amount'] . 
                                                        "</td>";
                                                    echo "</tr>";
                                                    $counter++;
                                                }
              
             
               echo '</tr></tbody></table><table id="footertable">'; 
                echo '<tr><td colspan="4">Total</td><td width="15%">'.number_format($gtotal,2).'</td>';
                echo '<tr><td colspan="4">Paid</td><td width="15%">'.number_format($adv,2).'</td>';
                echo '<tr><td colspan="4">Discount</td><td width="15%">'.number_format($dis,2).'</td>';
               echo '<tr><td colspan="4">Due</td><td width="15%">'.number_format($due,2).'</td>';  
               echo '<tr><td colspan="4">Grand Total</td><td width="15%">'.number_format($grandtotal,2).'</td>';  
                
              echo "</tr></table>";
              echo '<p style="text-align:left;"><strong>In Word:  </strong> '.numberTowords($grandtotal).' Only</p>'; 
              echo "<div style='margin-top:30px;bottom: 10px;width:730px;padding-bottom:20px'>
                    <div style='position:relative;width:730px;height:90px;'>
                    <div style='display:inline-block; width:200px;border:1px solid black;float:left;'>
                    <div style='margin-top: 50px;border-bottom: 1px solid black;width: 150px;margin-left: auto;margin-right: auto;'></div><p style='text-align:center;margin-top:5px;'> CUSTOMER SIGNETURE</p></div>
                    <div style='display:inline-block;width:300px;border:1px solid black;float:right;margin-right:10px;'>
                    <div style='margin-top: 50px;border-bottom: 1px solid black;width: 250px;margin-left: auto;margin-right: auto;'></div><p style='text-align:center;margin-top:5px;'>AUTHORISED SIGNATURE</p>
                    </div></div>

             
                    </div>";
               echo "";

            ?>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    function nameChange() {
        $("#logo").attr("src", "images/fadila.jpg");
        var name = $("#ccname").val();
        console.log(name);
        $("#ccname2").html("<img id='logo' src='' style='margin-bottom:-17px;padding-right:20px;'>" + name);
        $("title").html(name);



        if (name == "HOSPI LAB ESSENTIALS") {
            $("#logo").attr("src", "images/hospilab.jpg");
            $("#bin").html("");
            $("#bin").html("<strong>BIN NO : </strong> 002137696-0505");
        } else if (name == "HOSPITECH ESSENTIALS") {
            $("#logo").attr("src", "images/hospitech.jpg");
            $("#bin").html("");
            $("#bin").html("<strong>BIN NO : </strong> 001513912-0505");
        } else if (name == "LAB TRADERS") {
            $("#logo").attr("src", "images/lab-traders.jpg");
            $("#bin").html("");
            $("#bin").html("<strong>BIN NO : </strong> 002141271-0505");
        } else if (name == "") {
            $("#logo").attr("src", "images/fadila.jpg");
            $("#bin").html("");
            $("#bin").html("<strong>BIN NO : </strong> 002193268-0505");
        }
        $("#ccname").hide();
    }
    </script>
    </script>
</body>

</html>