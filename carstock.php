<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
?>
			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">AVAILABLE CARS</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
             
          </div>

        </div>

      <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">CAR LIST</h6>
                <div class="table-responsive" id="datagrid">
                  <table id="dataTableExample" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="text-center" style="width:2%">
                            #
                        </th>
                         <th class="text-center" id="thitem" style="width:9%">
                            Car ID
                        </th>
                        <th class="text-center" id="thitem" style="width:9%">
                            Brand
                        </th>
                
                        <th class="text-center" id="thctn" style="width:8%">
                            Series
                        </th>
                        <th class="text-center" id="thdate" style="width:5%">
                            Model
                        </th>
                         <th class="text-center" id="thdate" style="width:5%">
                            Color
                        </th>
                         <th class="text-center" id="thdate" style="width:10%">
                            Chassis
                        </th>
                         <th class="text-center" id="thdate" style="width:4%">
                            Received Qty
                        </th>
                         <th class="text-center" id="thdate" style="width:4%">
                            Available Qty
                        </th>
                        <th class="text-center" id="thdate" style="width:7%">
                            Price
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=0;
                      $query = "SELECT * FROM cars WHERE stock>0 ORDER BY brand DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){      
                      ?>
                      
                      <tr>
                        <td><?php echo $i;?></td>
                       <td><?php echo $row['carid'];?></td>
                       <td><?php echo $row['brand'];?></td>
                       <td><?php echo $row['series'];?></td>
                        <td><?php echo $row['model'];?></td>
                         <td><?php echo $row['color'];?></td>
                          <td><?php echo $row['chassis'];?></td>
                          <td><?php echo $row['qty'];?></td>
                          <td><?php echo $row['stock'];?></td>
                          <td><?php echo $row['cost'];?></td>
                       
                      </tr>
                      <?php
                      $i++;
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
                      <h5 class="modal-title" id="exampleModalLabel">NEW CUSTOMER</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                   <form class="forms-sample" id="frmsetup" name="frmsetup">

                  <div class="mb-3">
                    <label for="sname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="sname" name="sname" placeholder="Supplier name">
                  </div>

                  <div class="mb-3">
                    <label for="addr" class="form-label">Address</label>
                    <input type="text" class="form-control" id="addr" name="addr" placeholder="Address">
                  </div>
                    <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
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
  
  <script type="text/javascript">
  function addRecord(){
  //alert(1);
       $.ajax({
             
             method: "post",
             url: "supplier_insert.php",
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