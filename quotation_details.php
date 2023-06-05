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

                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Date :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="date" class="form-control" id="rdate" name="rdate" placeholder="Date"
                                data-input value="<?php echo $row['rdate']; ?>">

                        </div>
                    </div>

                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Customer Name :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="text" class="form-control" id="customer" name="customer"
                                placeholder="Customer Name" data-input value="<?php echo $row['customer']; ?>">

                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Mobile :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="text" class="form-control" id="mob" name="mob" placeholder="Customer Mobile"
                                data-input value="<?php echo $row['mob']; ?>">
                            <input type="hidden" class="form-control" id="cstatus" name="cstatus" placeholder=""
                                value="<?php echo $row['status']; ?>">
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Address :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Customer Address" data-input value="<?php echo $row['address']; ?>">
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Description :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Customer Description" data-input
                                value="<?php echo $row['description']; ?>">
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Budget :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="text" class="form-control" id="budget" name="budget"
                                placeholder="Customer Budget" data-input value="<?php echo $row['budget']; ?>">
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Survey Schedule :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="date" class="form-control" id="surveryschedule" name="surveryschedule"
                                placeholder="Survey Schedule" data-input value="<?php echo $row['surveryschedule']; ?>">

                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Remarks :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks"
                                data-input value="<?php echo $row['remarks']; ?>">

                        </div>
                    </div>

                    <div class="row mt-3">
                        <input type="hidden" class="form-control" id="req_id" name="req_id" value="<?php echo $id; ?>">
                    </div>


                    <hr>
                    <div class="row">

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





function saveRecord() {




    var rdate = $('#rdate').val();
    var customer = $('#customer').val();
    var mob = $('#mob').val();
    var address = $('#address').val();
    var description = $('#description').val();
    var budget = $('#budget').val();
    var surveryschedule = $('#surveryschedule').val();
    var remarks = $('#remarks').val();
    var status = $('#cstatus').val();
    var req_id = $('#req_id').val();

    var form = $('#frmsetup')[0];
    var data = new FormData(form);
    data.append('rdate', rdate);
    data.append('customer', customer);
    data.append('mob', mob);
    data.append('address', address);
    data.append('description', description);
    data.append('budget', budget);
    data.append('surveryschedule', surveryschedule);
    data.append('remarks', remarks);
    data.append('status', status);
    data.append('req_id', req_id);



    $.ajax({
        url: "req_quotation_details_update.php",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            alert("Req Quotation Updated Successfully");
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
        url: "req_quotation_details_status.php",
        type: "POST",
        data: {
            id: id
        },
        success: function(data) {
            alert("Status Updated Successfully");
            window.location.href = "req_quotation.php";
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