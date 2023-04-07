<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
$c=0; 
$lc = $_GET['id'];
  $squery = "SELECT * FROM lc WHERE lcid=$lc";  
  $sresult = mysqli_query($connection, $squery);  
  $srow = mysqli_fetch_array($sresult);
?>
			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">LC ENTRY</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
           
             <button type="button" class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0" onclick="opencostform();">ADD COST</button>
             <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" onclick="approvelc();">APPROVE</button>
          </div>

        </div>

      <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">LC INFORMATION</h6>
                <form class="forms-sample" id="frmsetup" name="frmsetup" method="post" action="lc_update.php">

                <div class="row mb-3">
                    <label for="lcno" class="col-sm-1 col-form-label">LC No.</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="lcno" name="lcno" placeholder="LC No." value="<?php echo $srow['lcno']; ?>">
                      <input type="hidden" class="form-control" id="lcid" name="lcid" placeholder="LC No." value="<?php echo $srow['lcid']; ?>">
                    </div>
                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">LC Date</label>
                    <div class="col-sm-2">
                      <div class="input-group flatpickr" id="flatpickr-date">
                          <input type="text" class="form-control" id="lcdate" name="lcdate" placeholder="Select date" data-input value="<?php echo $srow['lcdate']; ?>">
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
                              if($crow['sid']==$srow['supplier'])
                              $sel="selected";
                              else $sel="";
                            ?>
                          <option value="<?php echo $crow['sid'];?>" <?php echo $sel; ?>><?php echo $crow['sname'];?></option>
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
                            if($brow['id']==$srow['bank'])
                              $sel="selected";
                              else $sel="";   
                            ?>
                          <option value="<?php echo $brow['id'];?>" <?php echo $sel; ?>><?php echo $brow['bank'];?></option>
                           <?php
                          }
                          ?>
                        </select>
                    </div>
                  </div>
                <div class="row mb-3">
                    <label for="amount" class="col-sm-1 col-form-label">LC Amount</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="LC Amount" value="<?php echo $srow['lcamount']; ?>">
                    </div>
                    <label for="actual" class="col-sm-1 col-form-label">Actual amount</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="actual" name="actual" placeholder="Actual amount" value="<?php echo $srow['actualamount']; ?>">
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
                    <?php 
                    $listquery="SELECT * FROM lc_detail WHERE lcidf=$lc";
                     $listresult = mysqli_query($connection, $listquery);  
                     while($lrow = mysqli_fetch_array($listresult)){ 
                    ?>
                    <tr id='addr<?php echo $c; ?>'>
                        <td>1</td>
                        <td>
                   <select class="form-select" name="brand<?php echo $c; ?>" id="brand<?php echo $c; ?>" onchange="chkproblem(0)">
                        <option disabled selected value>Select brand</option>
                      <?php
                          $query = "SELECT * FROM carmodel ORDER BY modelname ASC";  
                          $select_result = mysqli_query($connection, $query);  
                          while($row = mysqli_fetch_array($select_result)){
                             if($row['modelname']==$lrow['brand'])
                              $sel="selected";
                              else $sel="";  
                  ?>
                         <option value="<?php echo $row['modelname']; ?>" <?php echo $sel; ?>><?php echo $row['modelname'];?></option>
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
                            <select class="form-select" name="series<?php echo $c; ?>" id="series<?php echo $c; ?>">
                        <option disabled selected value="xx">Select series</option>
                      <?php
                          $query = "SELECT * FROM carseries ORDER BY seriesname ASC";  
                          $select_result = mysqli_query($connection, $query);  
                          while($row = mysqli_fetch_array($select_result)){
                             if($row['seriesname']==$lrow['series'])
                              $sel="selected";
                              else $sel="";  
                  ?>
                         <option value="<?php echo $row['seriesname']; ?>" <?php echo $sel; ?>><?php echo $row['seriesname'];?></option>
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
                        <input type="text" name="mod<?php echo $c; ?>" id="mod<?php echo $c; ?>" class="form-control rounded" onblur="checkr(0);" value="<?php echo $lrow['model'];?>">
                        </td>
                         <td>
                        <input type="text" name="color<?php echo $c; ?>" id="color<?php echo $c; ?>" class="form-control rounded" onblur="checkr(0);" value="<?php echo $lrow['color'];?>">
                        </td>
                        <td>
                        <input type="text" name="ch<?php echo $c; ?>" id="ch<?php echo $c; ?>" class="form-control rounded" onblur="checkr(0);" value="<?php echo $lrow['chassis'];?>">
                        </td>
                        <td>
                        <input type="text" name="qty<?php echo $c; ?>" id="qty<?php echo $c; ?>" class="form-control rounded" onblur="checkr(0);" value="<?php echo $lrow['qty'];?>">
                        </td>
                        <td>
                        <input type="text" name="unit<?php echo $c; ?>" id="unit<?php echo $c; ?>" class="form-control rounded" onblur="checkr(0);" value="<?php echo $lrow['unitprice'];?>">
                        </td>
                        <td>
                        <input type="text" name="fr<?php echo $c; ?>" id="fr<?php echo $c; ?>" class="form-control rounded" onblur="checkr(0);" value="<?php echo $lrow['freight'];?>">
                        </td>
                        <td>
                        <input type="text" name="act<?php echo $c; ?>" id="act<?php echo $c; ?>" class="form-control rounded" onblur="checkr(0);" value="<?php echo $lrow['actual'];?>">
                        </td>
                    </tr>
                  <?php
                  $c++;
                }
                ?>
                 <tr id='addr<?php echo $c; ?>'>
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
                   <button type="button" class="btn btn-primary me-2 b-right" onclick="location.reload();">Refresh</button>
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
  </script>
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->
</html>    