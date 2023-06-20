<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include 'checklogin.php';
include_once('databases.php');

//get logged in user id
$username = $_SESSION['user'];

//get id from url
$id = $_GET['id'];
//select data from database
$query = "SELECT * FROM project WHERE projectid = $id";
//execute query
$result = mysqli_query($connection, $query);
//fetch data from database
$row = mysqli_fetch_array($result);

$customer_Id = $row['customer'];

$query2 = "SELECT * FROM customer where customerid = $customer_Id";
$select_result2 = mysqli_query($connection, $query2);
$row2 = mysqli_fetch_array($select_result2);

$query3 = "SELECT * FROM customer_ledger where customerid = $customer_Id";
$select_result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_array($select_result3);

$query4 = "SELECT * FROM invoice where project_id = $id";
$select_result4 = mysqli_query($connection, $query4);
$row4 = mysqli_fetch_array($select_result4);
$check_status = $row4['status'];



?>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">PROJECT DETAILS</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">


        </div>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">PROJECT INFORMATION</h6>
                    <div class="row mt-3">
                        <div class="d-flex">
                            Date : <span class="text-danger ms-2" id="qdate"><?php echo $row['datecreated']; ?></span>
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">

                        <div class="col-md-4">
                            <label for="psdate">Customer Name</label>
                            <input type="text" readonly class="form-control mt-2" id="psdate" name="psdate"
                                placeholder="Project Start Date" data-input value="<?php echo $row2['cname']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="pedate">Customer Address</label>
                            <input type="text" class="form-control mt-2" id="pedate" name="pedate"
                                placeholder="Project End Date" data-input value="<?php echo $row2['address']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="pduration">Contact No</label>
                            <input type="text" class="form-control mt-2" id="pduration" name="pduration" data-input
                                value="<?php echo $row2['mobile']; ?>">
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="">
                                Description:
                            </div>

                            <input type="text" class="form-control ms-4" id="project_name" name="project_name"
                                placeholder="Enter Project Name" data-input value="<?php echo $row3['description']; ?>">

                        </div>
                    </div>

                    <form class="forms-sample mt-3" id="frmsetup" name="frmsetup" method="post" action="lc_insert.php">
                        <h4 class="form-title">Services</h4>

                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table" id="tab_logic">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="text-center" style="width:3%">
                                                #
                                            </th>
                                            <th class="text-center" id="thitem" style="width:20%">
                                                Services
                                            </th>

                                            <th class="text-center" id="thctn" style="width:20%">
                                                Description
                                            </th>
                                            <th class="text-center" id="thdate" style="width:10%">
                                                Quantity
                                            </th>
                                            <th class="text-center" id="thdate" style="width:7%">
                                                Uom
                                            </th>
                                            <th class="text-center" id="thdate" style="width:10%">
                                                Rate
                                            </th>
                                            <th class="text-center" id="thdate" style="width:10%">
                                                Amount
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id='addr0'>
                                            <?php 
                                                $query = "SELECT * FROM projectdetail WHERE projectidf = '$id'";
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
                                                   

                                                    echo "<td>" 
                                                        
                                                        . "<input type='text' id='description0' name='description[]' readonly placeholder='Enter Description' class='form-control input-md' value='" . $row['description'] . "'/>" . "</td>";
                                                   
                                                    echo "<td>"
                                                        . "<input type='text' id='quantity0' readonly name='quantity[]' placeholder='Enter Quantity' class='form-control input-md' value='" . $row['quantity'] . "'/>" . "</td>"; 
                                                    echo "<td>"
                                                        . "<input type='text' id='uom0' name='uom[]' readonly placeholder='Enter Uom' class='form-control input-md' value='" . $row['uom'] . "'/>" . 
                                                     "</td>";
                                                    echo "<td>" 
                                                        . "<input type='text' id='rate0' name='rate[]' readonly placeholder='Enter Rate' class='form-control input-md' value='" . $row['rate'] . "'/>" . "</td>";
                                                     "</td>";
                                                    echo "<td>" 
                                                        . "<input type='text' id='amount0' name='amount[]' readonly placeholder='Enter Amount' class='form-control input-md' value='" . $row['amount'] . "' onBlur ='addSum()'/>" . "</td>";
                                                        "</td>";
                                                    echo "</tr>";
                                                    $counter++;
                                                }
                                        ?>



                                        </tr>

                                        <tr id='addr1'></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <hr>


                    <div class="row">
                        <div class="bg-white">
                            <div class="row m-5">
                                <div class="col-md-6 offset-md-6">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Total</td>
                                                <td>
                                                    <input type="text" id="total" name="total" readonly
                                                        placeholder="Total" class="form-control input-md"
                                                        value="<?php echo $format ?>" />

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Advance</td>
                                                <td>
                                                    <input type="text" oninput="g_total()" id="advance" name="advance"
                                                        placeholder="Advance" class="form-control input-md" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Discount</td>
                                                <td>
                                                    <input oninput="g_total()" type="text" id="discount" name="discount"
                                                        placeholder="Discount" class="form-control input-md" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Grand Total</td>
                                                <td id="">
                                                    <input readonly type="text" id="grand_total" name="grand_total"
                                                        class="form-control input-md" value="" />
                                                    <input type="hidden" id="check_status" name="check_status"
                                                        class="form-control input-md"
                                                        value="<?php echo $check_status ?>" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 column text-left">
                            <!-- <button id="add_row" class="btn btn-danger" onclick="addrow();">Add Row</button> -->
                            <!-- <button id="delete_row" class="btn btn-danger" onclick="delrow();">Remove Row</button> -->
                        </div>
                        <div class="col-md-6 column pull-right">
                            <div id="print"></div>
                            <div id="save_print"></div>
                            <div id="save"></div>
                            <!-- 9
                            
                            
                            
                            
                            
                            
                            
                            
                            <a id="save_print" class="btn btn-success me-2 b-right" onclick="saveData2()">save &
                                print</a>
                            <a id="save" class="btn btn-success me-2 b-right" onclick="saveData()">save</a> -->

                            <!-- <button type="submit" class="btn btn-primary me-2 b-right" onclick="saveRecord();">Save
                                changes</button> -->
                            <!-- <div id="status_update">

                            </div> -->

                            <!-- <a class="btn btn-success me-2 b-right" href="supplier.php">Back</a> -->
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>




    <!-- partial:partials/_footer.html -->
    <footer
        class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
        <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com/"
                target="_blank">NobleUI</a>.</p>
        <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i>
        </p>
    </footer>
    <!-- partial -->

</div>
</div>



<!-- core:js -->
<script src="assets/vendors/core/core.js"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="assets/vendors/flatpickr/flatpickr.min.js"></script>
<script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendors/sweetalert2/sweetalert2.min.js"></script>
<!-- End plugin js for this page -->

<!-- Plugin js for this page -->
<script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="assets/vendors/feather-icons/feather.min.js"></script>
<script src="assets/js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="assets/js/dashboard-light.js"></script>
<!-- End custom js for this page -->

<!-- Custom js for this page -->
<script src="assets/js/sweet-alert.js"></script>
<!-- End custom js for this page -->

<!-- Custom js for this page -->
<script src="assets/js/data-table.js"></script>
<!-- End custom js for this page -->

<!-- Custom js for this page -->
<script src="assets/js/form-validation.js"></script>
<script src="assets/js/bootstrap-maxlength.js"></script>
<script src="assets/js/inputmask.js"></script>
<script src="assets/js/select2.js"></script>
<script src="assets/js/typeahead.js"></script>
<script src="assets/js/tags-input.js"></script>
<script src="assets/js/dropzone.js"></script>
<script src="assets/js/dropify.js"></script>
<script src="assets/js/pickr.js"></script>
<script src="assets/js/flatpickr.js"></script>
<!-- End custom js for this page -->

<script type="text/javascript">
function status_check() {
    var status = $('#check_status').val();

    console.log(status);

    if (status == 'done') {
        //disable save button
        $('#print').html(
            '<a class="btn btn-success me-2 b-right" href="invoice_print.php?id=<?php echo $customer_Id ?>" target="_blank">Print</a>'
        );

        $('#save').html('');
        $('#save_print').html('');


    } else {

        //disable print button
        $('#print').html('');
        $('#save').html('<a id="save" class="btn btn-success me-2 b-right" onclick="saveData()">save</a>');
        $('#save_print').html(
            '<a id="save_print" class="btn btn-success me-2 b-right" onclick="saveData2()">save & print</a>');
    }
}

status_check();

function g_total() {
    var total = <?php echo $total ?>;
    var discount = $('#discount').val();
    var advance = $('#advance').val();
    var g_total = 0;
    var g_total = total - discount - advance;
    $('#grand_total').val(g_total);
}

g_total();

var i = 1;



function addrow() {
    //td value id increment by 1

    $('#addr' + i).html('<td>' + (i + 1) + '</td><td><select onchange="chkproblem(' + i +
        ')" class="form-select" name="service[]" id="service' +
        i + '""></select></td><td><input onblur="checkr(' + i + ')"  name="description[]" id="description' +
        i + '" type="text" class="form-control square"</td><td><input onblur="checkr(' + i +
        ')"  name="quantity[]" id="quantity' + i +
        '" type="number" class="form-control square"></td><td><input onblur="checkr(' + i +
        ')"  name="uom[]" id="uom' + i +
        '" type="text" class="form-control square" readonly></td><td><input onblur="checkr(' + i +
        ')"  name="rate[]" id="rate' + i +
        '" type="number" class="form-control square" readonly></td><td><input onblur="checkr(' + i +
        ')"  name="amount[]" id="amount' + i +
        '" type="number" class="form-control square"></td>');

    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');


    /*1st select content copy */
    //take only first two options and clone it & by default 'select first item' text show in 1st select box
    // var $options = $('#service').clone().html();
    // var $options = $('#service').clone().html();


    // alert($options);
    // $('#service' + i).append($options);

    //get service_info from database
    $.ajax({
        url: "all_service.php",
        type: "POST",
        success: function(data) {
            var obj = JSON.parse(data);
            console.log(obj);
            //set value to service
            var options = '<option value="">Select Item</option>';
            for (var j = 0; j < obj.length; j++) {
                console.log(obj[j].serviceid);


                options += '<option value="' + obj[j].serviceid + '">' + obj[j].sname +
                    '</option>';


            }
            $('#service' + (i - 1)).append(options);
        }

    })




    i++;

}



function chkproblem(id) {
    var serviceid = document.getElementById("service" + id).value;

    //get specific_service_info from database
    $.ajax({
        url: "specific_service_info.php",
        type: "POST",
        data: {
            serviceid: serviceid
        },
        success: function(data) {
            var obj = JSON.parse(data);
            //set value to uom & rate
            document.getElementById("uom" + id).value = obj.uom;
            document.getElementById("rate" + id).value = obj.rate;




        }

    })
}

//create a function & sum all amount value & set it to total_budget & it change automatically when amount change without page refresh
function sum() {
    var sum = 0;
    var amount = document.getElementsByName("amount[]");
    var amountId = [];
    for (var i = 0; i < amount.length; i++) {
        amountId.push(amount[i].value);
    }
    for (var i = 0; i < amountId.length; i++) {
        sum = sum + parseInt(amountId[i]);
    }
    document.getElementById("total_budget").value = sum;

}
sum();

function addSum() {
    var sum = 0;
    var amount = document.getElementsByName("amount[]");
    var amountId = [];
    for (var i = 0; i < amount.length; i++) {
        amountId.push(amount[i].value);
    }
    for (var i = 0; i < amountId.length; i++) {
        sum = sum + parseInt(amountId[i]);
    }
    document.getElementById("total_budget").value = sum;

}

function saveStatus() {
    var id = <?php echo $id ?>;

    $.ajax({
        url: "show_project_details_status.php",
        type: "POST",
        data: {
            id: id
        },
        success: function(data) {
            alert("Status Updated Successfully");
            window.location.href = "show_project.php";
        },
        error: function(data) {
            console.log(data);
        }

    })
}

function saveRecord() {
    var service = document.getElementsByName("service[]");
    var description = document.getElementsByName("description[]");
    var quantity = document.getElementsByName("quantity[]");
    var uom = document.getElementsByName("uom[]");
    var rate = document.getElementsByName("rate[]");
    var amount = document.getElementsByName("amount[]");
    var serviceid = [];
    var descriptionid = [];
    var quantityid = [];
    var uomid = [];
    var rateid = [];
    var amountid = [];
    for (var i = 0; i < service.length; i++) {

        serviceid.push(service[i].value);
        descriptionid.push(description[i].value);
        quantityid.push(quantity[i].value);
        uomid.push(uom[i].value);
        rateid.push(rate[i].value);
        amountid.push(amount[i].value);
    }



    var qdate = $("#qdate").html();
    var psdate = $("#psdate").val();
    var pedate = $("#pedate").val();
    var pduration = $("#pduration").val();
    var pmanager = $("#pmanager").val();
    var project_name = $("#project_name").val();
    var cname = $("#cname").html();
    var cdescription = $("#cdescription").html();
    var pname = $("#pname").val();
    var caddress = $("#caddress").val();
    var carea = $("#carea").val();
    var cmob = $("#cmob").val();
    var cemail = $("#cemail").val();
    var ccategory = $("#ccategory").val();
    var total_budget = $("#total_budget").val();
    var id = <?php echo $id ?>;


    var form = $('#frmsetup')[0];
    var data = new FormData(form);
    data.append("serviceid", serviceid);
    data.append("descriptionid", descriptionid);
    data.append("quantityid", quantityid);
    data.append("uomid", uomid);
    data.append("rateid", rateid);
    data.append("amountid", amountid);
    data.append("qdate", qdate);
    data.append("psdate", psdate);
    data.append("pedate", pedate);
    data.append("pduration", pduration);
    data.append("pmanager", pmanager);
    data.append("project_name", project_name);
    data.append("cname", cname);
    data.append("cdescription", cdescription);
    data.append("pname", pname);
    data.append("caddress", caddress);
    data.append("carea", carea);
    data.append("cmob", cmob);
    data.append("cemail", cemail);
    data.append("ccategory", ccategory);
    data.append("total_budget", total_budget);
    data.append("id", id);





    $.ajax({
        url: "show_project_details_update.php",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            alert("Project Updated Successfully");
            window.location.reload();
        },
        error: function(data) {
            console.log(data);
        }

    })

}

function saveData() {
    //take customer id
    var customer_Id = <?php echo $customer_Id ?>;
    console.log(customer_Id);

    //take project id
    var project_id = <?php echo $id ?>;
    console.log(project_id);

    //take total
    var total = $("#total").val();

    //take discount
    var discount = $("#discount").val();

    //take advance
    var advance = $("#advance").val();

    //grand total
    var grand_total = $("#grand_total").val();

    if (discount == "") {
        discount = 0;
    }
    if (advance == "") {
        advance = 0;
    }
    if (grand_total == "") {
        grand_total = 0;
    }
    $.ajax({
        url: "invoice_save.php",
        type: "POST",
        data: {
            customer_id: customer_Id,
            project_id: project_id,
            total: total,
            discount: discount,
            advance: advance,
            grand_total: grand_total
        },
        success: function(data) {
            alert("Invoice Created Successfully");
            // window.location.href = "invoice.php";
            window.location.reload();
        },
        error: function(data) {
            console.log(data);
        }

    })



}

function saveData2() {
    //take customer id
    var customer_Id = <?php echo $customer_Id ?>;
    console.log(customer_Id);

    //take project id
    var project_id = <?php echo $id ?>;
    console.log(project_id);

    //take total
    var total = $("#total").val();

    //take discount
    var discount = $("#discount").val();

    //take advance
    var advance = $("#advance").val();

    //grand total
    var grand_total = $("#grand_total").val();

    if (discount == "") {
        discount = 0;
    }
    if (advance == "") {
        advance = 0;
    }
    if (grand_total == "") {
        grand_total = 0;
    }
    $.ajax({
        url: "invoice_save.php",
        type: "POST",
        data: {
            customer_id: customer_Id,
            project_id: project_id,
            total: total,
            discount: discount,
            advance: advance,
            grand_total: grand_total
        },
        success: function(data) {
            alert("Invoice Created Successfully");
            window.location.href = "invoice_print.php?id=<?php echo $customer_Id ?>";
        },
        error: function(data) {
            console.log(data);
        }

    })



}

function checkr() {

}












function delrow() {
    if (i > 1) {
        $("#addr" + (i - 1)).html('');
        i--;
    }
}
</script>
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->

</html>