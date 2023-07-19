<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
?>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">PAYOUT LIST</h4>
        </div>
        <!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal"
                data-bs-target="#modalx">Add new</button>
        </div> -->

    </div>


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
                                    <th>Pay Date</th>
                                    <th>Amount</th>
                                    <th>Payee</th>
                                    <th>Purpose</th>
                                    <th>Type</th>
                                    <th>Payment Type</th>
                                    <th>Cheque Details</th>
                                    <th>Cheque Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $query = "SELECT * FROM payout ORDER BY payoutid DESC";  
                                    $select_result = mysqli_query($connection, $query);
                                    //count row > 0
                                    $i = 0;
                                    if(mysqli_num_rows($select_result) > 0){
                                        while($row = mysqli_fetch_array($select_result)){      
                                    ?>
                                <tr>
                                    <td>
                                        <?php echo ++$i; ?>
                                    </td>
                                    <td><?php echo $row['paydate']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo $row['payee']; ?></td>
                                    <td><?php echo $row['purpose']; ?></td>
                                    <td>
                                        <?php
                                                    $tid = $row['type'];
                                                    $query2 = "SELECT * FROM type_details WHERE tdid = '$tid'";
                                                    $result2 = mysqli_query($connection, $query2);
                                                    $row2 = mysqli_fetch_array($result2);
                                                    echo $row2['tdname'];
                                                ?>
                                    </td>
                                    <td><?php echo $row['ptype']; ?></td>
                                    <td><?php echo $row['chequeinfo']; ?></td>
                                    <td><?php echo $row['chequedate']; ?></td>




                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="modalx<?php echo $row['prid']; ?>" name="modalx"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">APPROVE
                                                    REQUISITION
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="btn-close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="forms-sample" id="approveform" name="approveform">

                                                    <div class="mb-3">
                                                        <label for="amount">
                                                            Amount
                                                        </label>
                                                        <input type="text" class="form-control" name="amount<?php 
                                                                    echo $row['prid']; ?>" id="amount<?php 
                                                                    echo $row['prid']; ?>"
                                                            value="<?php echo $row['amount']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="payee">
                                                            Payee
                                                        </label>
                                                        <input type="text" class="form-control" name="payee<?php 
                                                                    echo $row['prid']; ?>" id="payee<?php 
                                                                    echo $row['prid']; ?>"
                                                            value="<?php echo $row['payee']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="paydate">
                                                            Pay Date
                                                        </label>
                                                        <input type="date" class="form-control" name="paydate<?php 
                                                                    echo $row['prid']; ?>" id="paydate<?php 
                                                                    echo $row['prid']; ?>"
                                                            value="<?php echo $row['paydate']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="purpose">
                                                            Purpose
                                                        </label>
                                                        <input type="text" class="form-control" name="purpose<?php 
                                                                    echo $row['prid']; ?>" id="purpose<?php 
                                                                    echo $row['prid']; ?>"
                                                            value="<?php echo $row['purpose']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="type">
                                                            Type Name
                                                        </label>
                                                        <select class="form-control" name="type<?php 
                                                                    echo $row['prid']; ?>" id="type<?php 
                                                                    echo $row['prid']; ?>">
                                                            <option value="<?php echo $row['type']; ?>">
                                                                <?php echo $row2['tdname']; ?></option>
                                                            <?php
                                                                            $query3 = "SELECT * FROM type_details";
                                                                            $result3 = mysqli_query($connection, $query3);
                                                                            while($row3 = mysqli_fetch_array($result3)){
                                                                                echo "<option value='".$row3['tdid']."'>".$row3['tdname']."</option>";
                                                                            }
                                                                        ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="approveamount">
                                                            Approved Amount
                                                        </label>
                                                        <input type="number" class="form-control" name="approveamount"
                                                            id="approveamount" value="" placeholder="Approved Amount">
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" onclick="approveRecord(<?php 
                                                                    echo $row['prid']; ?>);">Approve</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>



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
                <h5 class="modal-title" id="exampleModalLabel">NEW REQUISITION
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="frmsetup" name="frmsetup">

                    <div class="mb-3">
                        <label for="payamount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="payamount" name="payamount" placeholder="Amount">
                    </div>
                    <div class="mb-3">
                        <label for="payee" class="form-label">Payee</label>
                        <input type="number" class="form-control" id="payee" name="payee" placeholder="Payee">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="type" class="form-label">
                                    Type</label>
                                <select class="form-select" id="type" name="type">
                                    <option value="">Select Type</option>
                                    <?php
                                    $query = "SELECT * FROM type ORDER BY tid DESC";
                                    $select_result = mysqli_query($connection, $query);
                                    //count row > 0
                                    if(mysqli_num_rows($select_result) > 0){
                                        while($row = mysqli_fetch_array($select_result)){
                                    ?>
                                    <option value="<?php echo $row['tid']; ?>">
                                        <?php echo $row['tname']; ?>
                                    </option>
                                    <?php }
                                    }else{
                                        echo "<option value=''>No Data Found</option>";
                                    }  
                                     ?>
                                </select>

                            </div>
                            <div class="col-md-6">
                                <label for="type_details" class="form-label">Type Name</label>
                                <select class="form-select" name="type_details" id="type_details">
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose</label>
                        <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Purpose">
                    </div>
                    <div class="mb-3">
                        <label for="paydate" class="form-label">Payment
                            Date</label>
                        <input type="date" class="form-control" id="paydate" name="paydate" placeholder="Payment Date">
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
$('#type').change(function() {
    var tid = $(this).val();
    $.ajax({
        url: "type_info.php",
        type: "POST",
        data: {
            tid: tid
        },
        success: function(dataResult) {
            $("#type_details").html(dataResult);
        }
    });
});
</script>

</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->

</html>