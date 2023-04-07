<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
$id = $_GET['id'];
$i=0; 
  $squery = "SELECT * FROM carseries WHERE id=$id";  
  $sresult = mysqli_query($connection, $squery);  
  $srow = mysqli_fetch_array($sresult);
?>
			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">CAR SERIES INFO EDIT</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
           
             
          </div>

        </div>

      <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">CARSERIES info</h6>
                   <form class="forms-sample" id="frmsetup" name="frmsetup" method="post" action="carseries_update.php">

                  <div class="mb-3">
                    <label for="seriesname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="seriesname" name="seriesname" value="<?php echo $srow['seriesname'];?>">
                     <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $srow['id'];?>">
                  </div>

                 
                </form>
                  <hr>
                  <button type="submit" class="btn btn-primary me-2" onclick="saveRecord();">Save changes</button>
                  <a class="btn btn-success me-2" href="series.php">Back</a>
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
  var rid=0;
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

  function addtruck(r,t){
    //alert(r);
    var pf = "";
    var rg = "";
    $('#'+r).each(function() {
        pf = $(this).find("td").eq(0).html();  
        rg = $(this).find("td").eq(1).html();  
    });

    $("#truckdiv ul").append('<li class="list-group-item d-flex justify-content-between text-right">'+pf+'-'+rg+'<input type="hidden" id="truck'+rid+'" name="truck'+rid+'" value="'+t+'"></li>');
    rid++;
  }

  function removetruck(){
    $("#trucklist li").eq(0).remove();
  }

  function saveRecord(){
    $('#frmsetup').submit();
  }
  </script>

</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->
</html>    