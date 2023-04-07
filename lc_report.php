<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
$c=0; 
$generalcost=0;
$carwisetotal=0;
$totalbuying=0;
$totalselling=0;
$totalprofit=0;
$carwiseprofit=0;
$othercost=0;
if (empty($_GET)) {
$lc =0;
}else{
$lc = $_GET['id'];
}

  $squery = "SELECT * FROM lc,bank,supplier WHERE lcid=$lc AND supplier=sid AND lc.bank=id";  
  //echo $squery;
  $sresult = mysqli_query($connection, $squery);  
  $srow = mysqli_fetch_array($sresult);
  $thislc=$srow['lcno'];

?>
			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">LC WISE REPORT</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
                          <div class="row mb-3" style="margin-top:20px;">
                    <div class="col-sm-9">
 <select class="form-select" id="selectlc" name="selectlc">
                          <option value='0' selected disabled>Select LC</option>
                           <?php
                            $bquery = "SELECT * FROM lc ORDER BY lcdate DESC";  
                            $bresult = mysqli_query($connection, $bquery);  
                            while($brow = mysqli_fetch_array($bresult)){      
                            ?>
                          <option value="<?php echo $brow['lcid'];?>"><?php echo $brow['lcno'];?></option>
                           <?php
                          }
                          ?>
                        </select>
                    </div>
                  </div>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" onclick="showreport();">Show report</button>
          </div>

        </div>

      <div class="row">
          <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">LC INFORMATION</h6>
                <table id="lchead">
                  <tr>
                    <td width="15%">LC No:</td><td width="15%"><?php echo $srow['lcno'] ?></td><td width="15%">LC Date:</td><td width="15%"><?php echo $srow['lcdate'] ?></td><td width="7%">Supplier:</td><td width="15%"><?php echo $srow['sname'] ?></td>
                  </tr>
                  <tr>
                    <td width="15%">LC Value:</td><td width="15%"><?php echo $srow['lcamount'] ?></td><td width="15%">Actual:</td><td width="15%"><?php echo $srow['actualamount'] ?></td><td width="7%">Expenditure:</td><td width="15%"><?php echo $srow['sname'] ?></td>
                  </tr>
               </table>
 
              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
              <div class="card-body">
                <h6 class="card-title">EXPENDITURE</h6>
                <table>
                  
                <?php 
                  $costquery = "SELECT * FROM lc_cost WHERE lcid=$lc";  
                  $costresult = mysqli_query($connection, $costquery);  
                  while($costrow = mysqli_fetch_array($costresult)){
                    $generalcost+=$costrow['amount'];
                  ?>
                  <tr>
                    <td><?php echo $costrow['costhead']?>:</td>
                    <td style="text-align: right"><?php echo $costrow['amount']?> (Tk)</td>
                  </tr>
                <?php
              }
                ?>
                </table>
           </div>
           </div>     
           </div>
        </div>

              <div class="row">
          <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">CAR WISE PROFIT</h6>
                <div class="table-responsive" id="datagrid">
                  <table id="dataTableExample" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sl#</th>
                        <th>Car ID</th>
                        <th>Brand</th>
                        <th>Series</th>
                        <th>Model</th>
                        <th>Chasis</th>
                        <th>Purchase cost</th>
                        <th>Additional cost</th>
                        <th>Selling price</th>
                        <th>Profit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=0;
                      $pquery = "SELECT carid,lcno,chassis,brand,series,model,color,cost,(dent+paint+dcost+miscamount) as expense,unitprice,unitprice-(cost+dent+paint+dcost+miscamount) AS profit FROM cars,sales_detail where carid=caridf AND lcno='$thislc'";  
                     // echo $pquery;
                      $presult = mysqli_query($connection, $pquery);  
                      while($prow = mysqli_fetch_array($presult)){  
            
                      
                      $carwiseprofit=$prow['profit'];
                      $carwisetotal+=$prow['expense'];
                      $totalbuying+= $prow['cost'];
                      $totalselling+=$prow['unitprice'];
                      $totalprofit+=$carwiseprofit;
                      ?>
                      <tr>
                        <td><?php echo $i;?></td>
                       <td><?php echo $prow['carid'];?></td>
                       <td><?php echo $prow['brand'];?></td>
                       <td><?php echo $prow['series'];?></td>
                        <td><?php echo $prow['model'];?></td>
                        <td><?php echo $prow['chassis'];?></td>
                         <td><?php echo $prow['cost'];?></td>
                          <td><?php echo $prow['expense'];?></td>
                    <td><?php echo $prow['unitprice'];;?></td>
                    <td><?php echo $carwiseprofit;?></td>
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td> <td><?php echo number_format((float)$totalbuying, 2, '.', '');?></td><td><?php echo number_format((float)$carwisetotal, 2, '.', '');?></td><td><?php echo number_format((float)$totalselling, 2, '.', '');?></td><td><?php echo number_format((float)$totalprofit, 2, '.', '');?></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
 
              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
              <div class="card-body">
                <h6 class="card-title">SUMMARY</h6>
                
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
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ADD/EDIT LC COST</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                   <form class="forms-sample" id="frmcost" name="frmcost">
                    <div class="row mb-3">

                    <div class="col-sm-4">
                         <select class="form-select" id="chead" name="chead">
                          <option selected disabled>Select cost head</option>
                           <?php
                            $bquery = "SELECT * FROM expensehead ORDER BY xname DESC";  
                            $bresult = mysqli_query($connection, $bquery);  
                            while($brow = mysqli_fetch_array($bresult)){   
                           ?>
                          <option value="<?php echo $brow['xname'];?>" <?php echo $sel; ?>><?php echo $brow['xname'];?></option>
                           <?php
                          }
                          ?>
                        </select>
                    </div>
                   
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost amount" value="0">
                      <input type="hidden" class="form-control" id="lcidf" name="lcidf" value="<?php echo $lc; ?>">
                    </div>
                  
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="rem" name="rem" placeholder="Remarks">
                    </div>
                    <div class="col-sm-3">
                      <button type="button" class="btn btn-primary btn-sm mb-2 mb-md-0" onclick="addcost();">Add</button>
                    </div>
                   </div>
                  </form>
                  <hr>
                  <div class="row mb-3">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Added Costs:</h6>
                <div class="table-responsive" id="datagrid">
                  <table id="dataTableExample" class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>Sl#</th>
                        <th>Cost head</th>
                        <th>Amount</th>
                         <th>Remarks</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $s=1;
                     
                      $query = "SELECT * FROM lc_cost WHERE lcid=$lc ORDER BY costhead DESC";  
                      $select_result = mysqli_query($connection, $query);  
                      while($row = mysqli_fetch_array($select_result)){   
                     
                      ?>
                      <tr>
                       <td><?php echo $s;?></td> 
                       <td contenteditable id="h<?php echo $s;?>"><?php echo $row['costhead'];?></td>
                       <td contenteditable id="a<?php echo $s;?>"><?php echo $row['amount'];?></td>
                       <td contenteditable id="r<?php echo $s;?>"><?php echo $row['remarks'];?></td>
                       <td><button type="button" class="btn btn-warning btn-sm" onclick="editcost(<?php echo $s; ?>);">Save change</button></td>
                      </tr>
                      <?php
                      $s++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div><!-- grid col ends -->
                  </div>
                    </div> <!-- modal body ends -->
                    <div class="modal-footer">
                    
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal ends -->
  
	<!-- core:js -->
	<script src="assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="assets/vendors/flatpickr/flatpickr.min.js"></script>
  <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendors/sweetalert2/sweetalert2.min.js"></script>
	<!-- End plugin js for this page -->

    <!-- Plugin js for this page -->
 
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
  var i=<?php echo $c; ?>;
  function addrow(){
   // alert(i);
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

  function opencostform(){
    //alert(77);
    $('#modalx').modal('show');
  }

  function addcost(){
  //alert(1);
       $.ajax({
             
             method: "post",
             url: "cost_insert.php",
             datatype: "html",
             data: $('#frmcost').serialize(),
             success: function(data){
                 if(data != ""){
                  $("#datagrid").html(data);
                //  $('#modalx').modal('hide');
                  showSwal('custom-position');
                 }

             }
    });
  
  }

  function editcost(r){
    var hd = $('#h'+r).text();
    var am = $('#a'+r).text();
    var rm = $('#r'+r).text();
    var id = $('#lcidf').val();
            function sentDataForEdit(){
          xmlhttp = new XMLHttpRequest();
          var url = "cost_update.php?i="+id+"&h="+hd+"&a="+am+"&r="+rm+"";
          alert(url);
          xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              alert(xmlhttp.responseText);
              document.getElementById("datagrid").innerHTML = xmlhttp.responseText;
            }
          }
          xmlhttp.open("GET",url, true);
          xmlhttp.send();
        }
        sentDataForEdit();
  }

  function approvelc(){
  var id = $('#lcidf').val();
 Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, approve it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.replace("lc_approve.php?id="+id);
    Swal.fire(
      'Success!',
      'LC is approved',
      'success'
    )
  }
})
  }

  function showreport(){
    var lc = document.getElementById("selectlc").value;
    if(lc==0){
      Swal.fire(
      
      'Select LC from list',
      
    );
      return false;
    }
    window.location.replace("lc_report.php?id="+lc);
  }
  </script>
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->
</html>    