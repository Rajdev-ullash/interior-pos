<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
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
                        <div class="d-flex">
                            Date : <span class="text-danger ms-2"><?php echo $row['rdate']; ?></span>
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-3">
                            <div class="d-flex">
                                Customer Name : <span
                                    class="text-uppercase text-danger ms-2"><?php echo $row['customer']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex">
                                Mobile : <span class="text-danger ms-2"><?php echo $row['mob']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex">
                                Address : <span class="text-danger ms-2"><?php echo $row['address']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="sup" name="sup">
                                <option selected disabled>Select Category</option>
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
                        <div class="d-flex">
                            Address : <span class="text-danger ms-2"><?php echo $row['address']; ?></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex">
                            Description : <span class="text-danger ms-2"><?php echo $row['description']; ?></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex">
                            <div>
                                Payment Mode :
                            </div>

                            <input type="text" class="form-control ms-4" id="pname" name="pname" placeholder=""
                                data-input value="<?php echo $row1['pname']; ?>">

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="d-flex">
                            <div>
                                Terms & Conditions :
                            </div>

                            <input type="text" class="form-control" id="tname" name="tname" placeholder="" data-input
                                value="<?php echo $row2['tname']; ?>">

                        </div>
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
                                            <th class="text-center" id="thdate" style="width:10%">
                                                Uom
                                            </th>
                                            <th class="text-center" id="thdate" style="width:17%">
                                                Rate
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
                                                <select class="form-select" name="serviceid" id="serviceid">
                                                    <option disabled selected value="xx">Select series</option>
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
                                                <input type="text" name="description" id="description"
                                                    class="form-control rounded" onblur="checkr(0);" value="">
                                            </td>
                                            <td>
                                                <input type="text" name="quantity" id="quantity"
                                                    class="form-control rounded" onblur="checkr(0);" value="">
                                            </td>
                                            <td>
                                                <input type="text" name="uom" id="uom" class="form-control rounded"
                                                    onblur="checkr(0);" value="">
                                            </td>
                                            <td>
                                                <input type="text" name="rate" id="rate" class="form-control rounded"
                                                    onblur="checkr(0);" value="">
                                            </td>
                                            <td>
                                                <input type="text" name="remark" id="remark"
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

<script type="text/javascript">
//take value serviceid in onchange event of select field
document.getElementById('serviceid').onchange = function() {
    //get the selected option value from the select field
    var serviceid = this.value;
    //make a request to the server
    $.ajax({
        url: 'specific_service_info.php',
        type: 'post',
        data: {
            serviceid: serviceid
        },
        success: function(response) {
            console.log(response);
            //alert(response);
            var data = JSON.parse(response);
            console.log(data);
            //alert(index);
            // $('#description' + index).val(data.description);
            $('#uom').val(data.uom);
            $('#rate').val(data.rate);
        }
    });
}

var i = 1;

function addrow() {

    $('#addr' + i).html("<td>" + (i + 1) +
        "</td><td><select onchange='getSelectedValue()' class='form-select' name='serviceid" +
        i +
        "' id='serviceid" + i +
        "' onblur='checkr(" + i +
        ");'><option disabled selected value='xx'>Select series</option><?php $query = 'SELECT * FROM services ORDER BY serviceid ASC'; $select_result = mysqli_query($connection, $query); while($row = mysqli_fetch_array($select_result)){ ?><option value='<?php echo $row['serviceid']; ?>'><?php echo $row['sname'];?></option><?php } ?></select></td><td><input type='text' name='description" +
        i + "' id='description" + i + "' class='form-control rounded' onblur='checkr(" + i +
        ");' value=''></td><td><input type='text' name='quantity" +
        i + "' id='quantity" + i + "' class='form-control rounded' onblur='checkr(" + i +
        ");' value=''></td><td><input type='text' name='ch" +
        i + "' id='ch" + i + "' class='form-control rounded' onblur='checkr(" + i +
        ");' value=''></td><td><input type='text' name='qty" +
        i + "' id='qty" + i + "' class='form-control rounded' onblur='checkr(" + i +
        ");' value=''></td><td><input type='text' name='unit" +
        i + "' id='unit" + i + "' class='form-control rounded' onblur='checkr(" + i +
        ");' value=''></td><td><input type='text' name='fr" +
        i + "' id='fr" + i + "' class='form-control rounded' onblur='checkr(" + i + ");' value=''></td>");

    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
    i++;

}




function delrow() {
    if (i > 1) {
        $("#addr" + (i - 1)).html('');
        i--;
    }
}

function getSelectedValue() {
    //take value serviceid in onchange event of select field
    //index of selected option
    var index = document.getElementById('serviceid').selectedIndex;
    //get the selected option value from the select field
    var serviceid = document.getElementById('serviceid').options[index].value;
    alert(serviceid);

}


function saveRecord() {
    event.preventDefault();
    $('#frmsetup').serialize();
    $('#frmsetup').submit();

}
</script>
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->

</html>