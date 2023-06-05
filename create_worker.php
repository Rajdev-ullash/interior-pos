<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
?>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">PAYMENT RECEIVE</h4>
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
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Contact Person</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    
                                    $query = "SELECT * FROM type_details where status = 'pending' ORDER BY tdid DESC";  
                                    $select_result = mysqli_query($connection, $query);
                                    //count row > 0
                                    if(mysqli_num_rows($select_result) > 0){
                                        while($row = mysqli_fetch_array($select_result)){      
                                    ?>
                                        <tr>
                                            <td><?php echo $row['tdid']; ?></td>
                                            <td>
                                                <?php
                                                    $tid = $row['tid'];
                                                    $query1 = "SELECT * FROM type WHERE tid = '$tid'";
                                                    $select_result1 = mysqli_query($connection, $query1);
                                                    $row1 = mysqli_fetch_array($select_result1);
                                                    echo $row1['tname'];
                                                ?>
                                            </td>
                                            <td><?php echo $row['tdname']; ?></td>
                                            <td><?php echo $row['tdaddress']; ?></td>
                                            <td><?php echo $row['tdphone']; ?></td>
                                            <td><?php echo $row['tdcperson']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td>
                                                <a href="quotation_details.php?id=<?php echo $row['tdid']; ?>"
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
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Contact Person</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    
                                    $query = "SELECT * FROM type_details where status = 'done' ORDER BY tdid DESC";  
                                    $select_result = mysqli_query($connection, $query);
                                    //count row > 0
                                    if(mysqli_num_rows($select_result) > 0){
                                        while($row = mysqli_fetch_array($select_result)){      
                                    ?>
                                        <tr>
                                            <td><?php echo $row['tdid']; ?></td>
                                            <td>
                                                <?php
                                                    $tid = $row['tid'];
                                                    $query1 = "SELECT * FROM type WHERE tid = '$tid'";
                                                    $select_result1 = mysqli_query($connection, $query1);
                                                    $row1 = mysqli_fetch_array($select_result1);
                                                    echo $row1['tname'];
                                                ?>
                                            </td>
                                            <td><?php echo $row['tdname']; ?></td>
                                            <td><?php echo $row['tdaddress']; ?></td>
                                            <td><?php echo $row['tdphone']; ?></td>
                                            <td><?php echo $row['tdcperson']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td>
                                                <a href="quotation_details.php?id=<?php echo $row['tdid']; ?>"
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
                <h5 class="modal-title" id="exampleModalLabel">NEW PAYMENT RECEIVE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="frmsetup" name="frmsetup">

                    <div class="mb-3">
                        <label for="cdtype" class="form-label">Type</label>
                        <select class="form-select" id="cdtype" name="cdtype">
                            <option value="">Select Type</option>
                            <?php
                                    $query = "SELECT * FROM type ORDER BY tid DESC";  
                                    $select_result = mysqli_query($connection, $query);
                                    //count row > 0
                                    if(mysqli_num_rows($select_result) > 0){
                                        while($row = mysqli_fetch_array($select_result)){      
                                    ?>
                            <option value="<?php echo $row['tid']; ?>"><?php echo $row['tname']; ?>
                            </option>
                            <?php }
                                    }else{
                                        echo "<option value=''>No Data Found</option>";
                                    }  
                                     ?>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Description"
                            rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                    </div>
                    <div class="mb-3">
                        <label for="cperson" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" id="cperson" name="cperson"
                            placeholder="Contact Person">
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
</script>
<script type="text/javascript">
function addRecord() {
    //Get values from the form
    var cdtype = $("#cdtype").val();
    var name = $("#name").val();
    var address = $("#address").val();
    var phone = $("#phone").val();
    var cperson = $("#cperson").val();




    //Add the quotation details to the database

    $.ajax({
        url: 'create_worker_insert.php',
        type: 'POST',
        data: {
            cdtype: cdtype,
            name: name,
            address: address,
            phone: phone,
            cperson: cperson,
        },
        success: function(response) {
            if (response == 1) {
                alert("Payment Receive Added Successfully");
                window.location.reload();
            } else {
                alert("Failed to add Payment Receive");
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