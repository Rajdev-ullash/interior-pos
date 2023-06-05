<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
?>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">CUSTOMER</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal"
                data-bs-target="#modalx">Add new</button>
        </div>

    </div>

    <ul class="nav nav-tabs nav-tabs-line" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Done</a>
        </li>
    </ul>
    <div class="tab-content border border-top-0 p-3" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row mt-3">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Data Table</h6>
                            <div class="table-responsive" id="datagrid">
                                <table id="dataTableExample" class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>RFQ Date</th>
                                            <th>Customer Name</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Job Description</th>
                                            <th>Budget Estimate</th>
                                            <th>Survey date</th>
                                            <th>Remark</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    
                                    $query = "SELECT * FROM rfp where status = 'pending' ORDER BY id DESC";  
                                    $select_result = mysqli_query($connection, $query);
                                    //count row > 0
                                    if(mysqli_num_rows($select_result) > 0){
                                        while($row = mysqli_fetch_array($select_result)){      
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['rdate']; ?></td>
                                            <td><?php echo $row['customer']; ?></td>
                                            <td><?php echo $row['mob']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['budget']; ?></td>
                                            <td><?php echo $row['surveryschedule']; ?></td>
                                            <td><?php echo $row['remarks']; ?></td>
                                            <td>
                                                <a href="quotation_details.php?id=<?php echo $row['id']; ?>"
                                                    class="btn btn-primary btn-sm">Details</a>
                                            </td>

                                        </tr>
                                        <?php }
                                    }else{
                                        echo "<tr><td colspan='10' class='text-center'>No Data Found</td></tr>";
                                    }  
                                     ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row mt-3">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Data Table</h6>
                            <div class="table-responsive" id="datagrid">
                                <table id="dataTableExample" class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>RFQ Date</th>
                                            <th>Customer Name</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Job Description</th>
                                            <th>Budget Estimate</th>
                                            <th>Survey date</th>
                                            <th>Remark</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    
                                    $query = "SELECT * FROM rfp where status = 'done' ORDER BY id DESC";  
                                    $select_result = mysqli_query($connection, $query);
                                    //count row > 0
                                    if(mysqli_num_rows($select_result) > 0){
                                        while($row = mysqli_fetch_array($select_result)){      
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['rdate']; ?></td>
                                            <td><?php echo $row['customer']; ?></td>
                                            <td><?php echo $row['mob']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['budget']; ?></td>
                                            <td><?php echo $row['surveryschedule']; ?></td>
                                            <td><?php echo $row['remarks']; ?></td>
                                            <td>
                                                <a href="quotation_details.php?id=<?php echo $row['id']; ?>"
                                                    class="btn btn-primary btn-sm">Details</a>
                                                <a href="add_quotation.php?id=<?php echo $row['id']; ?>"
                                                    class="btn btn-danger btn-sm">Quotations</a>
                                            </td>

                                        </tr>
                                        <?php }
                                    }else{
                                        echo "<tr><td colspan='10' class='text-center'>No Data Found</td></tr>";
                                    }  
                                     ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- partial:partials/_footer.html -->
<footer
    class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
    <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com/" target="_blank">NobleUI</a>.
    </p>
    <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
</footer>
<!-- partial -->

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalx" name="modalx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NEW CUSTOMER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="frmsetup" name="frmsetup">

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="rfqDate" class="form-label">RFQ Date</label>
                                <input type="date" class="form-control" id="rfqDate" name="rfqDate"
                                    placeholder="Request For Quotation Date" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="cname" class="form-label">Customer name</label>
                                <input type="text" class="form-control" id="cname" name="cname"
                                    placeholder="Customer name">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile No">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <label for="jobDescription" class="form-label">Job Description</label>
                        <textarea class="form-control" id="jobDescription" name="jobDescription"
                            placeholder="Job Description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="bestimate" class="form-label">Budget Estimate</label>
                                <input type="text" class="form-control" id="bestimate" name="bestimate"
                                    placeholder="Budget Estimate">
                            </div>
                            <div class="col-md-6">
                                <label for="sdate" class="form-label">Survey Date</label>
                                <input type="date" class="form-control" id="sdate" name="sdate"
                                    placeholder="Survey Date">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks" placeholder="remarks">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="addRecord();">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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
<script>
var today = new Date();
var date = today.getFullYear() + '-' + (today.getMonth() + 1).toString().padStart(2, '0') + '-' + today.getDate()
    .toString().padStart(2, '0');
document.getElementById("rfqDate").value = date;
</script>
<script type="text/javascript">
function addRecord() {
    //alert(1);
    //get value
    var rfqDate = $("#rfqDate").val();
    var cname = $("#cname").val();
    var mobile = $("#mobile").val();
    var address = $("#address").val();
    var jobDescription = $("#jobDescription").val();
    var bestimate = $("#bestimate").val();
    var sdate = $("#sdate").val();
    var remarks = $("#remarks").val();

    if (cname == "") {
        alert("Customer Name is required");
        return false;
    }
    if (mobile == "") {
        alert("Mobile is required");
        return false;
    }
    if (address == "") {
        alert("Address is required");
        return false;
    }
    if (jobDescription == "") {
        alert("Job Description is required");
        return false;
    }
    if (bestimate == "") {
        alert("Budget Estimate is required");
        return false;
    }
    if (sdate == "") {
        alert("Survey Date is required");
        return false;
    }
    if (remarks == "") {
        alert("Remarks is required");
        return false;
    }

    //Add the quotation details to the database

    $.ajax({
        url: 'req_quotation_insert.php',
        type: 'POST',
        data: {
            rfqDate: rfqDate,
            cname: cname,
            mobile: mobile,
            address: address,
            jobDescription: jobDescription,
            bestimate: bestimate,
            sdate: sdate,
            remarks: remarks
        },
        success: function(response) {
            if (response == 1) {
                alert("Quotation Added Successfully");
                window.location.reload();
            } else {
                alert("Failed to add Quotation");
            }
        },
        error: function(response) {
            alert("Failed to add Quotation");
        },

    });


}
</script>

</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->

</html>