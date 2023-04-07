<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
$id = mysqli_real_escape_string($connection, $_GET['sid']);
$sp = "SELECT * FROM supplier WHERE sid=$id";  
$sresult = mysqli_query($connection, $sp);  
$sprow = mysqli_fetch_array($sresult);
$supplier=$sprow['sname']  
?>
			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">SUPPLIER LEDGER: <?php echo $supplier; ?></h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
             <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#modalx">Add new</button>
          </div>

        </div>

      <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">TRANSACTIONS</h6>
                <div class="table-responsive" id="datagrid">
                  <table id="dataTableExample" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sl#</th>
                        <th>Transaction no</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>LC Amount (USD)</th>
                        <th>Paid (USD)</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      
                      $query = "SELECT * FROM supplier_ledger WHERE sidf=$id";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){     
                                       
                      ?>
                      <tr>
                        <td><?php echo $i;?></td>
                       <td><?php echo $row['tno'];?></td>
                       <td><?php echo $row['ldate'];?></td>
                       <td><?php echo $row['des'];?></td>
                        <td><?php echo $row['amount'];?></td>
                         <td><?php echo $row['paid'];?></td>
                        
                    
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <?php 
                       $sumquery = "SELECT SUM(amount) as bill, SUM(paid) as paid FROM supplier_ledger WHERE sidf=$id";  
                      $sumresult = mysqli_query($connection, $sumquery);  
                      $sumrow = mysqli_fetch_array($sumresult);
                      ?>   
                  <tr>
                    <td></td><td></td><td></td><td></td><td><?php echo $sumrow['bill'];?></td><td><?php echo $sumrow['paid'];?></td>
                  </tr>
                  <tr>  
                    <td></td><td></td><td></td><td></td><td>BALANCE:</td><td><?php echo $sumrow['paid']-$sumrow['bill'];?></td>
                  </tr>
  
                </tfoot>
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
                      <h5 class="modal-title" id="exampleModalLabel">ADD PAYMENT</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                  <form class="forms-sample" id="frmsetup" name="frmsetup" method="post" action="supplier_ledger_insert.php">

                  <div class="mb-3">
                    <label for="sname" class="form-label">Description</label>
                    <input type="text" class="form-control" id="des" name="des" placeholder="Description">
                    <input type="hidden" class="form-control" id="sidf" name="sidf" value="<?php echo $id; ?>">
                  </div>

                  <div class="mb-3">
                    <label for="lcid" class="form-label">LC No</label>
                    <select class="form-select" id="lcid" name="lcid">
                          <option selected disabled>Select supplier</option>
                           <?php
                            $lquery = "SELECT * FROM lc WHERE supplier=$id";  
                            $lresult = mysqli_query($connection, $lquery);  
                            while($llrow = mysqli_fetch_array($lresult)){      
                            ?>
                          <option value="<?php echo $llrow['lcno'];?>"><?php echo $llrow['lcno'];?></option>
                           <?php
                          }
                          ?>
                        </select>
                  </div>

                  <div class="mb-3">
                    <label for="addr" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="paid" name="paid" placeholder="Address">
                  </div>

               
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" onclick="addRecord();">Save</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                     </form>
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
  
       $.ajax({
             
             method: "post",
             url: "supplier_ledger_insert.php",
             datatype: "html",
             data: $('#frmsetup').serialize(),
             success: function(data){
              
                location.reload();
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