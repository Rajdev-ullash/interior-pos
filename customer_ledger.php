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
$query = "SELECT * FROM customer WHERE customerid = $id";
//execute query
$result = mysqli_query($connection, $query);
//fetch data from database
$row = mysqli_fetch_array($result);

$query5 = "SELECT * FROM customer_ledger WHERE customerid = $id";

$result5 = mysqli_query($connection, $query5);
$row5 = mysqli_fetch_array($result5);

?>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Customer Details</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">


        </div>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">CUSTOMER INFORMATION</h6>

                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Customer Name :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="text" readonly class="form-control" id="tname" name="tname"
                                placeholder="Task Name" data-input value="<?php echo $row['cname']; ?>">

                        </div>
                    </div>

                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Address :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="text" readonly class="form-control" id="description" name="description"
                                placeholder="Description" data-input value="<?php echo $row['address']; ?>">

                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Customer Type :</p>
                        </div>
                        <div class="col-md-11">
                            <select class="form-select mt-2" id="manager" name="manager" disabled>
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
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Debit :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="text" readonly class="form-control" id="sdate" name="sdate" data-input
                                value="<?php echo $row5['dr']; ?>">
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-1 ">
                            <p>Credit :</p>
                        </div>
                        <div class="col-md-11">
                            <input type="text" readonly class="form-control" id="edate" name="edate" data-input
                                value="<?php echo $row5['cr']; ?>">
                        </div>
                    </div>

                    <div class="row mt-3 align-items-center">
                        <!-- <div class="col-md-1 ">
                            <p>Task Status :</p>
                        </div> -->



                        <hr>
                        <!-- <div class="row">

                            <div class="col-md-6 column pull-right">
                                <button type="submit" class="btn btn-primary me-2 b-right" onclick="saveRecord();">Save
                                    changes</button>

                                <a class="btn btn-success me-2 b-right" href="supplier.php">Back</a>
                            </div>
                        </div> -->


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
function saveRecord() {

    var tname = $('#tname').val();
    var description = $('#description').val();
    var manager = $('#manager').val();
    var sdate = $('#sdate').val();
    var edate = $('#edate').val();
    var status = $('#status').val();
    var id = <?php echo $id; ?>;
    // alert(id);

    var form = $('#frmsetup')[0];
    var data = new FormData(form);

    data.append('tname', tname);
    data.append('description', description);
    data.append('manager', manager);
    data.append('sdate', sdate);
    data.append('edate', edate);
    data.append('status', status);
    data.append('req_id', id);






    $.ajax({
        url: "show_task_details_update.php",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            // console.log(data);
            alert("Task Updated Successfully");
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
</script>
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->

</html>