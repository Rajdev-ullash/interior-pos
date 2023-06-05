<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
?>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">CREATE TYPE</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal"
                data-bs-target="#modalx">Add new</button>
        </div>

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
                                    <th>Type Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $query = "SELECT * FROM type";  
                                    $select_result = mysqli_query($connection, $query);
                                    //count row > 0
                                    if(mysqli_num_rows($select_result) > 0){
                                        while($row = mysqli_fetch_array($select_result)){      
                                    ?>
                                <tr>
                                    <td><?php echo $row['tid']; ?></td>
                                    <td><?php echo $row['tname']; ?></td>
                                    <td>
                                        <a href="edit_type.php?tid=<?php echo $row['tid']; ?>"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a href="delete_type.php?tid=<?php echo $row['tid']; ?>"
                                            class="btn btn-danger btn-sm">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">NEW TYPE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="frmsetup" name="frmsetup">
                    <div class="mb-3">
                        <label for="tname" class="form-label">Type Name</label>
                        <input type="text" class="form-control" id="tname" name="tname" placeholder="Type Name">
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
    var tname = $("#tname").val();




    //Add the quotation details to the database

    $.ajax({
        url: 'type_insert.php',
        type: 'POST',
        data: {
            tname: tname,
        },
        success: function(response) {
            if (response == 1) {
                alert("Type Added Successfully");
                window.location.reload();
            } else {
                alert("Failed to add Type");
            }
        },
        error: function(response) {
            alert("Failed to add Type");
        },

    });


}
</script>

</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->

</html>