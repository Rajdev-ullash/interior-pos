<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
?>
			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">SUPPLIER</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
             <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#modalx">Add new</button>
          </div>

        </div>

      <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Data Table</h6>
                <div class="table-responsive" id="datagrid">
                  <table id="dataTableExample" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Prefix</th>
                        <th>Reg no</th>
                        <th>Fuel</th>
                        <th>Capacity</th>
                        <th>Transport</th>
                        <th>Status</th>
                        <th>Penalty</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "SELECT * FROM truck ORDER BY trans DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){      
                      ?>
                      <tr>
                       <td><?php echo $row['prefix'];?></td>
                       <td><?php echo $row['regno'];?></td>
                       <td><?php echo $row['fuel'];?></td>
                       <td><?php echo $row['capacity'];?></td>
                       <td><?php echo $row['trans'];?></td>
                       <td><?php echo $row['status'];?></td>
                       <td><?php echo $row['penalty'];?></td>
                      </tr>
                      <?php
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
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com/" target="_blank">NobleUI</a>.</p>
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
                      <h5 class="modal-title" id="exampleModalLabel">NEW TRUCK</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                   <form class="forms-sample" id="frmsetup" name="frmsetup">
                     <div class="mb-3">
                     <label for="regno" class="form-label">Prefix</label>
                   <select class="form-select" id="pfix" name="pfix">
                      <option selected disabled>Select fuel type</option>
                      <option>CMTR</option>
                      <option>DMTR</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="regno" class="form-label">Registration no.</label>
                    <input type="text" class="form-control" id="regno" name="regno" placeholder="Reg no">
                  </div>
                  <div class="mb-3">
                     <label for="regno" class="form-label">Fuel</label>
                   <select class="form-select" id="fuel" name="fuel">
                      <option selected disabled>Select fuel type</option>
                      <option>DISEL</option>
                      <option>CNG</option>
                      <option>LPG</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="regno" class="form-label">Capacity</label>
                    <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Capacity">
                  </div>
                    <div class="mb-3">
                    <label for="regno" class="form-label">Transport</label>
                    <input type="text" class="form-control" id="capacity" name="trans" placeholder="trans">
                  </div>
                </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="addRecord();">Save</button>
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
  
  <script type="text/javascript">
  function addRecord(){
  //alert(1);
       $.ajax({
             
             method: "post",
             url: "truck_insert.php",
             datatype: "html",
             data: $('#frmsetup').serialize(),
             success: function(data){
                 if(data != ""){
                  $("#datagrid").html(data);
                  $('#modalx').modal('hide');
                  showSwal('custom-position');
                 }

             }
    });
  
  }
  </script>

</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->
</html>    