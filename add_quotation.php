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
$query = "SELECT * FROM rfp WHERE id = $id";
//execute query
$result = mysqli_query($connection, $query);
//fetch data from database
$row = mysqli_fetch_array($result);




//payment mode query
$query1 = "SELECT * FROM payment_mode";
//execute query
$result1 = mysqli_query($connection, $query1);
//fetch data from database
$row1 = mysqli_fetch_array($result1);

// terms & conditions query
$query2 = "SELECT * FROM terms_cond";
//execute query
$result2 = mysqli_query($connection, $query2);
//fetch data from database
$row2 = mysqli_fetch_array($result2);

$i=0; 
?>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">QUOTATION ENTRY</h4>
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
                        <div class="d-flex align-items-center">
                            Date : <span class="text-danger ms-2">
                                <input readonly type="date" class="form-control" id="rdate" name="rdate"
                                    value="<?php echo $row['rdate']; ?>" />
                            </span>
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-3">
                            <div class="d-flex align-items-center">
                                Customer Name : <span class="text-uppercase text-danger ms-2" id="">
                                    <input readonly type="text" class="form-control" id="cname" name="cname"
                                        value="<?php echo $row['customer']; ?>" />
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center">
                                Mobile : <span class="text-danger ms-2" id="">
                                    <input readonly type="text" class="form-control" id="mob" name="mob"
                                        value="<?php echo $row['mob']; ?>" />
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">

                            <input type="email " class="form-control" id="cemail" name="cemail"
                                placeholder="Customer Email" data-input required>

                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="category" name="category">
                                <option selected value="cx">Select Category</option>
                                <?php
                                    $cquery = "SELECT * FROM category ORDER BY id DESC";  
                                    $cresult = mysqli_query($connection, $cquery);  
                                    while($crow = mysqli_fetch_array($cresult)){      
                                    ?>
                                <option value="<?php echo $crow['id'];?>"><?php echo $crow['name'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex align-items-center">
                            Address : <span class="text-danger ms-2" id="">
                                <input readonly type="text" class="form-control" id="caddress" name="caddress"
                                    value="<?php echo $row['address']; ?>" />
                            </span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex align-items-center">
                            Description : <span class="text-danger ms-2" id="">
                                <input readonly type="text" class="form-control" id="cdescription" name="cdescription"
                                    value="<?php echo $row['description']; ?>" />
                            </span>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="d-flex align-items-center">
                            <div class="me-5">
                                Customer Area :
                            </div>

                            <textarea class="form-control ms-4" id="carea" name="carea" placeholder="Customer Area"
                                data-input> </textarea>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="d-flex align-items-center">
                            <div class="me-5">
                                Payment Mode :
                            </div>
                            <textarea rows="3" class="form-control ms-4 ml-3" id="pname" name="pname"
                                placeholder=""><?php echo $row1['pname']; ?></textarea>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                Terms & Conditions :
                            </div>

                            <textarea class="form-control" id="tname" name="tname"
                                placeholder=""><?php echo $row2['tname']; ?></textarea>

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
                                            <td>1</td>


                                            <td>
                                                <select class="form-select" name="service[]" id="service0"
                                                    onchange="chkproblem(0)">
                                                    <option disabled selected value>Select Service</option>
                                                    <?php
                          $query = "SELECT * FROM services ORDER BY serviceid ASC";  
                          $select_result = mysqli_query($connection, $query);  
                          while($row = mysqli_fetch_array($select_result)){
                  ?>
                                                    <option value="<?php echo $row['serviceid']; ?>">
                                                        <?php echo $row['sname'];?></option>
                                                    <?php
                      }
                      ?>
                                                </select>
                                                <select class="form-select" name="service" id="service" hidden>
                                                    <option disabled selected value>Select Service</option>
                                                    <?php
                                                        $query = "SELECT * FROM services ORDER BY serviceid ASC";  
                                                        $select_result = mysqli_query($connection, $query);  
                                                        while($row = mysqli_fetch_array($select_result)){
                                                    ?>
                                                    <option value="<?php echo $row['serviceid']; ?>">
                                                        <?php echo $row['sname'];?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="description[]" id="description0"
                                                    class="form-control rounded" onblur="checkr(0);" value="">
                                            </td>
                                            <td>
                                                <input type="number" name="quantity[]" id="quantity0"
                                                    class="form-control rounded" onblur="checkr(0);" value="">
                                            </td>
                                            <td>
                                                <input type="text" name="uom[]" id="uom0" class="form-control rounded"
                                                    onblur="checkr(0);" value="" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="rate[]" id="rate0"
                                                    class="form-control rounded" onblur="checkr(0);" value="" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="amount[]" id="amount0" readonly
                                                    class="form-control rounded" onblur="checkr(0);" value="">
                                            </td>
                                            <td>
                                                <input type="text" name="remark[]" id="remark0"
                                                    class="form-control rounded" onblur="checkr(0);" value="">
                                            </td>
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
<script src="https://cdn.tiny.cloud/1/om1mfe8jxhci89e1o7c1b7g2ppdze0bl1kcsn14wsky5yey4/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#carea'
});
tinymce.init({
    selector: '#pname'
});
tinymce.init({
    selector: '#tname'
});
</script>
<script type="text/javascript">
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
        ')"  name="remark[]" id="remark' + i + '" type="text" class="form-control square"></td>');

    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');


    /*1st select content copy */
    var $options = $("#service > option").clone();
    // alert($options);
    $('#service' + i).append($options);

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
    var remark = document.getElementsByName("remark[]");

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
        remarkid.push(remark[i].value);


    }



    var rdate = $("#rdate").val();
    var cname = $("#cname").val();
    var mob = $("#mob").val();
    var cemail = $("#cemail").val();
    var category = $("#category").val();
    var caddress = $("#caddress").val();
    var cdescription = $("#cdescription").val();
    var carea = tinymce.get("carea").getContent();
    var pname = tinymce.get("pname").getContent();
    var tname = tinymce.get("tname").getContent();
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

    $.ajax({
        url: "quotation_insert.php",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {

            alert('Record Saved Successfully');

            // console.log(data);
            window.location.reload();

        },
        error: function(data) {
            console.log(data);
            alert('Record Not Saved');
        }
    })




}

function checkr(i) {
    //get quantity
    var quantity = document.getElementById("quantity" + i).value;
    //get rate
    var rate = document.getElementById("rate" + i).value;
    var amount = quantity * rate;
    //set amount and amount
    document.getElementById("amount" + i).value = amount;

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