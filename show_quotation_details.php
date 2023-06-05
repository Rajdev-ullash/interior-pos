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
$query = "SELECT * FROM quotation WHERE qid = $id";
//execute query
$result = mysqli_query($connection, $query);
//fetch data from database
$row = mysqli_fetch_array($result);

?>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">QUOTATION Details</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">


        </div>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">QUOTATION INFORMATION</h6>
                    <div class="row mt-3">
                        <div class="d-flex">
                            Date : <span class="text-danger ms-2" id="qdate"><?php echo $row['qdate']; ?></span>
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-3">
                            <div class="d-flex">
                                Customer Name : <span class="text-uppercase text-danger ms-2"
                                    id="cname"><?php echo $row['customer']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex">
                                Mobile : <span class="text-danger ms-2" id="mob"><?php echo $row['mobile']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="email " class="form-control" id="cemail" name="cemail"
                                placeholder="Customer Email" value="<?php echo $row['email']; ?>" data-input required>
                            <input type="hidden" class="form-control" id="cstatus" name="cstatus" placeholder=""
                                value="<?php echo $row['status']; ?>">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="category" name="category">
                                <option selected value="cx">Select Category</option>
                                <?php
                                    $cquery = "SELECT * FROM category ORDER BY id DESC";  
                                    $cresult = mysqli_query($connection, $cquery);  
                                    while($crow = mysqli_fetch_array($cresult)){      
                                    ?>
                                <option value="<?php echo $crow['id']; ?>"
                                    <?php if($row['category'] == $crow['id']){ echo "selected"; } ?>>
                                    <?php echo $crow['name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex">
                            Address : <span class="text-danger ms-2" id="caddress"><?php echo $row['address']; ?></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex">
                            Description : <span class="text-danger ms-2"
                                id="cdescription"><?php echo $row['description']; ?></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex">
                            <div>
                                Customer Area :
                            </div>

                            <input type="text" class="form-control ms-4" id="carea" name="carea"
                                placeholder="Customer Area" data-input value="<?php echo $row['area']; ?>">

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex">
                            <div>
                                Payment Mode :
                            </div>

                            <input type="text" class="form-control ms-4" id="pname" name="pname" placeholder=""
                                data-input value="<?php echo $row['paymentmode']; ?>">

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex">
                            <div>
                                Terms & Conditions :
                            </div>

                            <input type="text" class="form-control" id="tname" name="tname" placeholder="" data-input
                                value="<?php echo $row['terms']; ?>">

                        </div>
                        <input type="hidden" class="form-control" id="req_id" name="req_id" value="<?php echo $id; ?>">
                    </div>

                    <form class="forms-sample mt-3" id="frmsetup" name="frmsetup" method="post" action="lc_insert.php">
                        <h4 class="form-title">Proposed Works</h4>

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
                                            <th class="text-center" id="thdate" style="width:20%">
                                                Remarks
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id='addr0'>
                                            <?php 
                                                $query = "SELECT * FROM quotationdetail WHERE qidf = '$id'";
                                                $result = mysqli_query($connection, $query);
                                                $counter = 1;
                                                //run a for loop of $total  results
                                                foreach ($result as $row ) {
                                                     echo "<tr>";
                                                    echo "<td>" . $counter . "</td>";
                                                    //form td with input field
                                                    echo "<td>" 
                                                    . "<select class='form-select' id='service0' name='service[]' required>" 
                                                    . "<option selected value=''>Select Item</option>";
                                                    //database query to fetch item list
                                                    $query = "SELECT * FROM services ORDER BY serviceid DESC";
                                                    $result = mysqli_query($connection, $query);
                                                    while ($row2 = mysqli_fetch_array($result)) {
                                                        //if item id is same as item id in the database
                                                        if ($row['service'] == $row2['serviceid']) {
                                                            echo "<option value='" . $row2['serviceid'] . "' selected>" . $row2['sname'] . "</option>";
                                                        } else {
                                                            echo "<option value='" . $row2['serviceid'] . "'>" . $row2['sname'] . "</option>";
                                                        }
                                                    }
                                                    echo "</select>" . "</td>";

                                                    echo "<td>" 
                                                        
                                                        . "<input type='text' id='description0' name='description[]' placeholder='Enter Description' class='form-control input-md' value='" . $row['description'] . "'/>" . "</td>";
                                                   
                                                    echo "<td>"
                                                        . "<input type='text' id='quantity0' name='quantity[]' placeholder='Enter Quantity' class='form-control input-md' value='" . $row['quantity'] . "'/>" . "</td>"; 
                                                    echo "<td>"
                                                        . "<input type='text' id='uom0' name='uom[]' placeholder='Enter Uom' class='form-control input-md' value='" . $row['uom'] . "'/>" . 
                                                     "</td>";
                                                    echo "<td>" 
                                                        . "<input type='text' id='rate0' name='rate[]' placeholder='Enter Rate' class='form-control input-md' value='" . $row['rate'] . "'/>" . "</td>";
                                                     "</td>";
                                                    echo "<td>" 
                                                        . "<input type='text' id='amount0' name='amount[]' placeholder='Enter Amount' class='form-control input-md' value='" . $row['amount'] . "'/>" . "</td>";
                                                    echo "<td>" 
                                                        . "<input type='text' id='remarks0' name='remarks[]' placeholder='Enter Remarks' class='form-control input-md' value='" . $row['remarks'] . "'/>" .
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
                        <div class="col-md-6 column text-left">
                            <button id="add_row" class="btn btn-danger" onclick="addrow();">Add Row</button>
                            <button id="delete_row" class="btn btn-danger" onclick="delrow();">Remove Row</button>
                        </div>
                        <div class="col-md-6 column pull-right">
                            <button type="submit" class="btn btn-primary me-2 b-right" onclick="saveRecord();">Save
                                changes</button>
                            <div id="status_update">

                            </div>

                            <a class="btn btn-success me-2 b-right" href="supplier.php">Back</a>
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
    var status = $('#cstatus').val();

    if (status == 'pending') {
        $('#status_update').html(
            '<button type="submit" class="btn btn-primary me-2 b-right" onclick="saveStatus();">Accept</button>'
        );
    } else {
        $('#status_update').html('');
    }
}

status_check();

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
        '" type="number" class="form-control square"></td><td><input onblur="checkr(' + i +
        ')"  name="remarks[]" id="remark' + i + '" type="text" class="form-control square"></td>');

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

function saveRecord() {
    var service = document.getElementsByName("service[]");
    var description = document.getElementsByName("description[]");
    var quantity = document.getElementsByName("quantity[]");
    var uom = document.getElementsByName("uom[]");
    var rate = document.getElementsByName("rate[]");
    var amount = document.getElementsByName("amount[]");
    var remarks = document.getElementsByName("remarks[]");
    var id = <?php echo $id; ?>;

    var serviceid = [];
    var descriptionid = [];
    var quantityid = [];
    var uomid = [];
    var rateid = [];
    var amountid = [];
    var remarkid = [];
    for (var i = 0; i < service.length; i++) {

        serviceid.push(service[i].value);
        descriptionid.push(description[i].value);
        quantityid.push(quantity[i].value);
        uomid.push(uom[i].value);
        rateid.push(rate[i].value);
        amountid.push(amount[i].value);
        remarkid.push(remarks[i].value);


    }



    var rdate = $("#rdate").html();
    var cname = $("#cname").html();
    var mob = $("#mob").html();
    var cemail = $("#cemail").val();
    var category = $("#category").val();
    var caddress = $("#caddress").html();
    var cdescription = $("#cdescription").html();
    var carea = $("#carea").val();
    var pname = $("#pname").val();
    var tname = $("#tname").val();
    var preparedby = '<?php echo $username ?>'
    var reqid = $("#req_id").val();

    if (cemail == '') {
        alert("Please Enter Email");
    }
    if (category == 'cx') {
        alert("Please Select Category");
    }
    if (carea == '') {
        alert("Please Select Area");
    }
    if (pname == '') {
        alert("Please Select Payment Mode");
    }
    if (tname == '') {
        alert("Please Select Terms");
    }


    var form = $('#frmsetup')[0];
    var data = new FormData(form);
    data.append("serviceid", serviceid);
    data.append("descriptionid", descriptionid);
    data.append("quantityid", quantityid);
    data.append("uomid", uomid);
    data.append("rateid", rateid);
    data.append("amountid", amountid);
    data.append("remarkid", remarkid);
    data.append("rdate", rdate);
    data.append("cname", cname);
    data.append("mob", mob);
    data.append("cemail", cemail);
    data.append("category", category);
    data.append("caddress", caddress);
    data.append("cdescription", cdescription);
    data.append("carea", carea);
    data.append("pname", pname);
    data.append("tname", tname);
    data.append("preparedby", preparedby);
    data.append("reqid", reqid);
    data.append("id", id);

    $.ajax({
        url: "show_quotation_details_update.php",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            alert("Quotation Updated Successfully");
            window.location.reload();
        },
        error: function(data) {
            console.log(data);
        }

    })

}

function checkr() {

}

function saveStatus() {
    var id = <?php echo $id ?>;

    $.ajax({
        url: "show_quotation_details_status.php",
        type: "POST",
        data: {
            id: id
        },
        success: function(data) {
            alert("Status Updated Successfully");
            window.location.href = "show_quotation.php";
        },
        error: function(data) {
            console.log(data);
        }

    })
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