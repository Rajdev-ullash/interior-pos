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
            <h4 class="mb-3 mb-md-0">INVOICE</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
           <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0 me-2" onclick="addcust();">New customer</button>
           <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" onclick="addcar();">Add car</button>
             
          </div>

        </div>

      <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">SALES INFO</h6>
                <form class="forms-sample" id="frmsetup" name="frmsetup" method="post" action="invoice_insert.php">

                <div class="row mb-3">

                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Date</label>
                    <div class="col-sm-2">
                      <div class="input-group flatpickr" id="flatpickr-date">
                          <input type="text" class="form-control" id="lcdate" name="lcdate" placeholder="Select date" data-input value="<?php echo date('Y-m-d'); ?>">
                         <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                     </div>
                    </div>
                    <label for="sup" class="col-sm-1 col-form-label">Customer</label>
                    <div class="col-sm-2">
                          <select class="form-select" id="cust" name="cust">
                          <option selected disabled>Select customer</option>
                           <?php
                            $cquery = "SELECT * FROM customer ORDER BY cname DESC";  
                            $cresult = mysqli_query($connection, $cquery);  
                            while($crow = mysqli_fetch_array($cresult)){      
                            ?>
                          <option value="<?php echo $crow['cid'];?>"><?php echo $crow['cname'];?></option>
                           <?php
                          }
                          ?>
                        </select>
                    </div>
                    <label for="shipto" class="col-sm-2 col-form-label" style="text-align:right">Shipping address</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="shipto" name="shipto" placeholder="Shipping address">
                    </div>
                  </div>
                <div class="row mb-3">
                
                    <label for="rem" class="col-sm-1 col-form-label" >Remarks</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="rem" name="rem" placeholder="Remarks">
                    </div>
                     
                </div>

                <hr>
                <div class="row">
        <div class="col-sm-12">
            <table class="table" id="tab_logic">
                <thead class="thead-inverse">
                    <tr >
                        <th class="text-center" style="width:5%">
                            SL#
                        </th>
                        <th class="text-center" id="thitem" style="width:50%">
                            Description
                        </th>
                
                        <th class="text-center" id="thctn">
                           Quantity
                        </th>
                        <th class="text-center" id="thdate">
                            Rate
                        </th>
                         <th class="text-center" id="thdate">
                           Amount
                        </th>
                                           
                       
                    </tr>
                </thead>
                <tbody>
                    <tr id='addr1'></tr>    
                </tbody>
                 <tfoot>
                  <tr>
                    <td></td><td></td><td></td><td><strong>TOTAL:</strong></td><td><input type="text" class="form-control" id="gtotal" name="gtotal" placeholder="0" readonly></td>
                  </tr>
                   <tr>
                    <td></td><td></td><td></td><td><strong>ADVANCE:</strong></td><td><input type="text" class="form-control" id="adv" name="adv" placeholder="0" onblur="calbalance();"></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td><strong>BALANCE:</strong></td><td><input type="text" class="form-control" id="bal" name="bal" placeholder="0" readonly></td>
                  </tr>
                </tfoot>
            </table>
        </div>
    </div>
     </form>
     <hr>
                       <div class="row">
                    <div class="col-md-6 column text-left">
                    
                      <button id="delete_row" class="btn btn-danger" onclick="delrow();">Remove Row</button>
                    </div>
                   <div class="col-md-6 column pull-right">
                  <button type="submit" class="btn btn-primary me-2 b-right" onclick="saveRecord();">Save</button>
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

       <!-- Modal -->
              <div class="modal fade" id="modalx" name="modalx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">NEW CUSTOMER</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="forms-sample" id="frmsetup" name="frmsetup" method="post" action="invoice_insert.php">

                  <div class="mb-3">
                    <label for="cname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="cname" name="cname" placeholder="Customer name">
                  </div>

                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                  </div>

                  <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City">
                  </div>

                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                  </div>

                  <div class="mb-3">
                    <label for="contact_person" class="form-label">Contact person</label>
                    <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact person">
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


               <!-- Modal -->
              <div class="modal fade" id="modaly" name="modaly" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">AVAILABLE CARS</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">

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
                            Stock
                        </th>
                        <th class="text-center" id="thdate" style="width:7%">
                            Price
                        </th>
                        <th class="text-center" id="thdate" style="width:7%">
                            Action
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      $query = "SELECT * FROM cars WHERE stock>0 ORDER BY brand DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){      
                      ?>
                      
                      <tr id="<?php echo $i;?>">
                        <td><?php echo $i;?></td>
                       
                       <td><?php echo $row['brand'];?></td>
                       <td><?php echo $row['series'];?></td>
                        <td><?php echo $row['model'];?></td>
                         <td><?php echo $row['color'];?></td>
                          <td><?php echo $row['chassis'];?></td>
                      
                          <td><?php echo $row['stock'];?></td>
                          <td><?php echo $row['cost'];?></td>
                          <td><button type="button" class="btn btn-success btn-sm" onclick="addtocart(<?php echo $i.','.$row['carid'];?>);">Add</button></td>
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
                    <div class="modal-footer">
                      
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
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

  function addcust(){
     $('#modalx').modal('show');
  }

  function addcar(){
     $('#modaly').modal('show');
  }

  function addtocart(r,c){
    var des="";
    $('#'+r).each(function() {
        br = $(this).find("td").eq(1).html();  
        sr = $(this).find("td").eq(2).html();  
        md = $(this).find("td").eq(3).html();
        cl = $(this).find("td").eq(4).html();    
        ch = $(this).find("td").eq(5).html();
    });

   des=br+', '+sr+','+md+', '+cl+ ', Chassis: '+ch;
   
   $('#addr'+i).html('<td>'+i+'</td><td><input type="hidden" name="carno'+i+'" id="carno'+i+'" value="'+c+'"><input  name="des'+i+'" id="des'+i+'" type="text" class="form-control square" value="'+des+'" readonly></td><td><input  name="saleqty'+i+'" id="saleqty'+i+'" type="text" class="form-control square" onblur="calc('+i+')" value="0"></td><td><input  name="rate'+i+'" id="rate'+i+'" type="text" class="form-control square" onblur="calc('+i+')" value="0"></td><td><input  name="amount'+i+'" id="amount'+i+'" type="text" class="form-control square" value="0"></td></td>');

   $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
   i++;
  }

  function calc(r){
    var q = $('#saleqty'+r).val();
    var p = $('#rate'+r).val();
    var t = 0;
    var gt = 0;
    t=Number(q)*Number(p);
    if(isNaN(t)){
    Swal.fire("Error. Check your input");
  }else{
     $('#amount'+r).val(t);
     for(x=1;x<i;x++){
    gt=gt+Number($('#amount'+x).val());
}
  $('#gtotal').val(gt);
   
  }
}

function calbalance(){
    var t = $('#gtotal').val();
    var a = $('#adv').val();
    var b = 0;
    b=Number(t)-Number(a);
    if(isNaN(b)){
    Swal.fire("Error. Check your input");
  }else{
     $('#bal').val(b);
     
   
  }
}
  </script>
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->
</html>    