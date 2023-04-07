<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
 $tt=0;
 $prof=0;
 $sumt=0;
 $sump=0;
$from="";
$to="";
if (empty($_GET)) {
   $from=date('Y-m-01');
   $to=date('Y-m-t');
}else{
$from=$_GET['f'];
$to=$_GET['t'];
}
?>
			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">SALES REPORT (From <?php echo $from ?> to <?php echo $to ?>)</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
                          <div class="row mb-3" style="margin-top:20px;">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">From date:</label>
                    <div class="col-sm-9">
                                      <div class="input-group flatpickr" id="flatpickr-date">
                  <input type="text" class="form-control" placeholder="Select date" data-input id="fdate" name="fdate">
                  <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                </div>
                    </div>
                  </div>
              <div class="row mb-3" style="margin-top:20px;">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">To date:</label>
                    <div class="col-sm-9">
                                      <div class="input-group flatpickr" id="flatpickr-date">
                  <input type="text" class="form-control" placeholder="Select date" data-input id="tdate" name="tdate">
                  <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                </div>
                    </div>
                  </div><button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" onclick="showreport();">Show report</button>
          </div>

        </div>


      <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">SALES</h6>
                <div class="table-responsive" id="datagrid">
                  <table id="dataTableExample" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sl#</th>
                        <th>Invoice no</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Car description</th>
                        <th>Unit price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Cost</th>
                        <th>Profit estimate</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=0;
                      $tt=0;
                      $query = "SELECT invoiceno,sdate,cidf,des,unitprice,sales_detail.qty,cost,cname from sales, sales_detail, cars,customer WHERE invoiceno=invf AND caridf=carid AND cid=cidf AND Date(sdate)>='$from' AND Date(sdate)<='$to'";  

                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){ 
                       $tt=$row['qty']*$row['unitprice']; 
                       $prof=$tt-$row['cost'];
                       $sumt=$sumt+$tt;
                       $sump=$sump+$prof;
                      ?>
                      <tr>
                        <td><?php echo $i;?></td>
                       <td><?php echo $row['invoiceno'];?></td>
                       <td><?php echo $row['sdate'];?></td>
                       <td><?php echo $row['cname'];?></td>
                        <td><?php echo $row['des'];?></td>
                         <td><?php echo $row['unitprice'];?></td>
                          <td><?php echo $row['qty'];?></td>
                          <td><?php echo $tt; ?></td>
                          <td><?php echo $row['cost'];?></td>
                          <td><?php echo $prof;?></td>
                    
                       
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                    </tbody>
                    <tfoot>

                    </tfoot>
                    <tr>
                      <td></td><td></td><td></td><td></td><td></td><td></td><td><strong>TOTAL:</strong></td><td><strong><?php echo $sumt; ?></strong></td><td></td><td><strong><?php echo $sump; ?></strong></td>
                    </tr>
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

  function showreport(){
    var fd = $('#fdate').val();
    var td = $('#tdate').val();
    window.location.replace("sales_report.php?f="+fd+"&t="+td);
  }
  </script>

</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->
</html>    