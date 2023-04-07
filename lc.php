<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
$i=0; 
?>
			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">LC ENTRY</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
           
             
          </div>

        </div>

      <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">LC INFORMATION</h6>
                <form class="forms-sample" id="frmsetup" name="frmsetup" method="post" action="lc_insert.php">

                <div class="row mb-3">
                    <label for="lcno" class="col-sm-1 col-form-label">LC No.</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="lcno" name="lcno" placeholder="LC No.">
                    </div>
                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">LC Date</label>
                    <div class="col-sm-2">
                      <div class="input-group flatpickr" id="flatpickr-date">
                          <input type="text" class="form-control" id="lcdate" name="lcdate" placeholder="Select date" data-input value="<?php echo date('Y-m-d'); ?>">
                         <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                     </div>
                    </div>
                      <label for="sup" class="col-sm-1 col-form-label">Supplier</label>
                    <div class="col-sm-2">
                          <select class="form-select" id="sup" name="sup">
                          <option selected disabled>Select supplier</option>
                           <?php
                            $cquery = "SELECT * FROM supplier ORDER BY sname DESC";  
                            $cresult = mysqli_query($connection, $cquery);  
                            while($crow = mysqli_fetch_array($cresult)){      
                            ?>
                          <option value="<?php echo $crow['sid'];?>"><?php echo $crow['sname'];?></option>
                           <?php
                          }
                          ?>
                        </select>
                    </div>
                    <label for="bank" class="col-sm-1 col-form-label">Bank</label>
                    <div class="col-sm-2">
                         <select class="form-select" id="bank" name="bank">
                          <option selected disabled>Select bank</option>
                           <?php
                            $bquery = "SELECT * FROM bank ORDER BY bank DESC";  
                            $bresult = mysqli_query($connection, $bquery);  
                            while($brow = mysqli_fetch_array($bresult)){      
                            ?>
                          <option value="<?php echo $brow['id'];?>"><?php echo $brow['bank'];?></option>
                           <?php
                          }
                          ?>
                        </select>
                    </div>
                  </div>
                <div class="row mb-3">
                    <label for="amount" class="col-sm-1 col-form-label">LC Amount</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="LC No.">
                    </div>
                    <label for="actual" class="col-sm-1 col-form-label">Actual amount</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="actual" name="actual" placeholder="LC No.">
                    </div>
                </div>

                <hr>
                            <div class="row">
        <div class="col-sm-12">
            <table class="table" id="tab_logic">
                <thead class="thead-inverse">
                    <tr >
                        <th class="text-center" style="width:3%">
                            #
                        </th>
                        <th class="text-center" id="thitem" style="width:11%">
                            Brand
                        </th>
                
                        <th class="text-center" id="thctn" style="width:12%">
                            Series
                        </th>
                        <th class="text-center" id="thdate" style="width:8%">
                            Model
                        </th>
                         <th class="text-center" id="thdate" style="width:10%">
                            Color
                        </th>
                         <th class="text-center" id="thdate" style="width:17%">
                            Chassis
                        </th>
                         <th class="text-center" id="thdate" style="width:10%">
                            Quantity
                        </th>
                        <th class="text-center" id="thdate" style="width:10%">
                            Unit price
                        </th>
                        <th class="text-center" id="thdate" style="width:10%">
                            Freight
                        </th>
                        <th class="text-center" id="thdate">
                            Actual
                        </th>
                                           
                       
                    </tr>
                </thead>
                <tbody>
                    <tr id='addr0'>
                        <td>1</td>
                        <td>
                   <select class="form-select" name="brand0" id="brand0" onchange="chkproblem(0)">
                        <option disabled selected value>Select brand</option>
                      <?php
                          $query = "SELECT * FROM carmodel ORDER BY modelname ASC";  
                          $select_result = mysqli_query($connection, $query);  
                          while($row = mysqli_fetch_array($select_result)){
                  ?>
                         <option value="<?php echo $row['modelname']; ?>"><?php echo $row['modelname'];?></option>
                    <?php
                      }
                      ?>
                        </select>
                        <select class="form-select" name="brand" id="brand" hidden>
                        <option disabled selected value>Select brand</option>
                      <?php
                          $query = "SELECT * FROM carmodel ORDER BY modelname ASC";  
                          $select_result = mysqli_query($connection, $query);  
                          while($row = mysqli_fetch_array($select_result)){
                  ?>
                         <option value="<?php echo $row['modelname']; ?>"><?php echo $row['modelname'];?></option>
                    <?php
                      }
                      ?>
                        </select>
                        </td>
                    
                       <td>
                            <select class="form-select" name="series0" id="series0">
                        <option disabled selected value="xx">Select series</option>
                      <?php
                          $query = "SELECT * FROM carseries ORDER BY seriesname ASC";  
                          $select_result = mysqli_query($connection, $query);  
                          while($row = mysqli_fetch_array($select_result)){
                  ?>
                         <option value="<?php echo $row['seriesname']; ?>"><?php echo $row['seriesname'];?></option>
                    <?php
                      }
                      ?>
                        </select>
                        <select class="form-control  rounded us" name="series" id="series" hidden>
                        <option disabled selected value="xx">Select series</option>
                     <?php
                         $query = "SELECT * FROM carseries ORDER BY seriesname ASC";  
                          $select_result = mysqli_query($connection, $query);  
                          while($row = mysqli_fetch_array($select_result)){
                  ?>
                         <option value="<?php echo $row['seriesname']; ?>"><?php echo $row['seriesname'];?></option>
                    <?php
                      }
                      ?>
                        </select>


                        </td>
                         <td>
                        <input type="text" name="mod0" id="mod0" class="form-control rounded" onblur="checkr(0);" value="">
                        </td>
                         <td>
                        <input type="text" name="color0" id="color0" class="form-control rounded" onblur="checkr(0);" value="">
                        </td>
                        <td>
                        <input type="text" name="ch0" id="ch0" class="form-control rounded" onblur="checkr(0);" value="">
                        </td>
                        <td>
                        <input type="text" name="qty0" id="qty0" class="form-control rounded" onblur="checkr(0);" value="">
                        </td>
                        <td>
                        <input type="text" name="unit0" id="unit0" class="form-control rounded" onblur="checkr(0);" value="">
                        </td>
                        <td>
                        <input type="text" name="fr0" id="fr0" class="form-control rounded" onblur="checkr(0);" value="">
                        </td>
                        <td>
                        <input type="text" name="act0" id="act0" class="form-control rounded" onblur="checkr(0);" value="">
                        </td>
                       
          
                    </tr>
                    <tr id='addr1'></tr>
                </tbody>
            </table>
        </div>
    </div>
     </form>
     <hr>
                       <div class="row">
                    <div class="col-md-6 column text-left">
                     <button id="add_row" class="btn btn-danger" onclick="addrow();">Add Row</button>
                      <button id="delete_row" class="btn btn-danger" onclick="delrow();">Remove Row</button>
                    </div>
                   <div class="col-md-6 column pull-right">
                  <button type="submit" class="btn btn-primary me-2 b-right" onclick="saveRecord();">Save changes</button>
                  <a class="btn btn-success me-2 b-right" href="supplier.php">Back</a>
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
  var i=1;
  function addrow(){
    $('#addr'+i).html('<td>'+ (i+1) +'</td><td><select class="form-select" name="brand'+i+'" id="brand'+i+'""></select></td><td><select class="form-select" name="series'+i+'" id="series'+i+'"></select></td><td><input  name="mod'+i+'" id="mod'+i+'" type="text" class="form-control square"</td><td><input  name="color'+i+'" id="color'+i+'" type="text" class="form-control square"></td><td><input  name="ch'+i+'" id="ch'+i+'" type="text" class="form-control square"></td><td><input  name="qty'+i+'" id="qty'+i+'" type="text" class="form-control square"></td><td><input  name="unit'+i+'" id="unit'+i+'" type="text" class="form-control square"></td><td><input  name="fr'+i+'" id="fr'+i+'" type="text" class="form-control square"></td><td><input  name="act'+i+'" id="act'+i+'" type="text" class="form-control square"></td>');

    $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      

/*1st select content copy */
    var $options = $("#brand > option").clone();
   // alert($options);
    $('#brand'+i).append($options);

    /*1st select content copy */
    var $options2 = $("#series > option").clone();
    $('#series'+i).append($options2);
    i++;


  }

  function delrow(){
             if(i>1){
         $("#addr"+(i-1)).html('');
         i--;
         }
  }

  function saveRecord(){
    event.preventDefault();
    $('#frmsetup').serialize();
    $('#frmsetup').submit();
   
  }

  </script>
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->
</html>    