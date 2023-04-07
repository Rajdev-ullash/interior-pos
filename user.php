<?php

include('checkLogin.php');
include_once('header.php');
require_once('databases.php');
$i=1;
$output1='';
$query = "SELECT * FROM users ORDER BY userid DESC";
$select_result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_result)){
//$date=date_create($row['experi_date']);
//$ex= date("d-m-Y", strtotime($row['experi_date']));
if ($row["level"] == "1") {
$a='<option value="">---Select Access---</option><option value="1" selected>Admin</option><option value="2" >Sales</option><option value="3" >Accounce</option><option value="4" >Inventory</option>';
}else if ($row["level"] == "2") {
$a='<option value="">---Select Access---</option>><option value="1" >Admin</option><option value="2" selected>Sales</option><option value="3" >Accounce</option><option value="4" >Inventory</option>';
}else if ($row["level"] == "3") {
$a='<option value="">---Select Access---</option>><option value="1" >Admin</option><option value="2" >Sales</option><option value="3" selected>Accounce</option><option value="4" >Inventory</option>';
}else if ($row["level"] == "4") {
$a='<option value="">---Select Access---</option>><option value="1" >Admin</option><option value="2" >Sales</option><option value="3" >Accounce</option><option value="4" selected>Inventory</option>';
}
if ($row["status"] == "") {
$b='<option value="" selected>---Select Access---</option><option value="1" selected>Admin</option><option value="2" >User</option>';
}else if ($row["status"] == "Active") {
$b='<option value="">---Select status---</option><option value="Active" selected>Active</option><option value="Inactive" >Inactive</option>';
}else if ($row["status"] == "Inactive"){
$b='<option value="">---Select status---</option><option value="Active">Active</option><option value="Inactive" selected>Inactive</option>';
}
$output1.='<tr>';
$output1.= '<td>' .$row['userid'].'</td>';
$output1.= '<td id="username' .$row['userid'].'" contenteditable>'.$row['username'].'</td>';
$output1.= '<td id="password' .$row['userid'].'" contenteditable>'.$row['password'].'</td>';
$output1.= '<td id="description'.$row['userid'].'" contenteditable>'.$row['description'].'</td>';
                          
$output1.= '<td>';
$output1.= '<select class="form-control square" id="level'.$row['userid'].'" name="level" style="width:70px;">';
$output1.=  $a;
$output1.= '</select></td>';
$output1.=  '<td >';
$output1.= '<select class="form-control square" id="status'.$row['userid'].'" name="status" style="width:70px;">';
$output1.=  $b ;                            
$output1.= '</select></td>';
$output1.= '<td><button type="button" onclick="editItem('.$row['userid'].')" class="btn btn-xs btn-info"><i class="icon-edit"></i></button></td>';                     
$output1.=    '</tr>';
$i++;
}
?>
<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
  <!-- main menu header-->
  <div class="main-menu-header">
    <input type="text" placeholder="Search" class="menu-search form-control square round"/>
  </div>
  <!-- / main menu header-->
  <!-- main menu content-->
  <?php
  include('sideber.php');
  ?>
  <!-- /main menu content-->
  <!-- main menu footer-->
  <!-- include includes/menu-footer-->
  <!-- main menu footer-->
</div>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="container">
        
        <div class="card">
          <div class="card-body">
            <div class="row ">
              <div class="col-sm-8">
                <h3>USER SETUP</h3>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew" data-toggle="modal" data-target="#modal-item">Add new</button>
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                    <th >User Id</th>
                    <th >User Name</th>
                    <th >User Password</th>
                    <th >User Description</th>
                    <th >User level</th>
                    <th >User Status</th>
                    <th >Action</th>    
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo $output1; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div id="modal-item" class="modal fade text-xs-left in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel1"> 
          <div class="modal-dialog" role="document">
            <!-- Modal content-->
             <form method="post" class="form" id="frm_user">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User Setup</h4>
              </div>
              
               <div class="modal-body">
                    <div class="form-group">
                    <label  for="user_name">User Name</label>
                      <input type="text" class="form-control square" id="user_name" name="user_name" placeholder="Enter User Name">
                    </div><!--end form group -->
                    <div class="form-group">
                      <label  for="user_pass">User Password</label>
                        <input type="text" class="form-control square" id="user_pass" placeholder="Enter Password" name="user_pass">
                      </div><!--end form group -->
                      <div class="form-group">
                        <label for="user_des">User Description</label>
                          <textarea class="form-control square" id="user_des" name="user_des" placeholder="Enter User Description"></textarea>
                          
                        </div><!--end form group -->
                        <div class="form-group">
                           <div class="row ">
                          <div class="col-sm-6">
                          <label  for="user_level">User Level</label>
                            <select class="form-control square" id="user_level" name="user_level">
                              <option value="">---Select Status---</option>
                              <option value="1">Admin</option>
                              <option value="2">Sales</option>
                              <option value="3">Accounce</option>
                              <option value="4">Inventory</option>
                            </select>
                          </div>
                        <div class="col-sm-6">
                          <label  for="user_status">User Status</label>
                            <select class="form-control square" id="user_status" name="user_status">
                              <option value="">---Select Access---</option>
                              <option value="Active">Active</option>
                              <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                      </div>
                          </div>
                          
                        </div><!--end form group -->
                          
                       
                        
                        <div class="modal-footer">
                          
                          <button type="button" onclick="addRecord()" class="btn btn-success btn-lg">Save</button>
                          <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Reset</button>
                          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancel</button>
                        
                        </div>
                        
                    </div>
                    </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="overlay"></div>
      <!-- jQuery CDN -->
      <?php
      include('footer.php');
      ?>
      
      <script type="text/javascript">
      // ----------------- my functions ---------------------
      
      function openmodal(){
      $("#modal-item").modal();
      }
      $(document).ready(function() {
      $('#example').DataTable();
      } );

    function addRecord() {
    
    var user_name = $("#user_name").val();
    var user_pass = $("#user_pass").val();
    var user_des = $("#user_des").val();
    var user_level = $("#user_level").val();
    var user_status = $("#user_status").val();
    var login_limit = $("#login_limit").val();
    var experi_date = $("#experi_date").val();
    
    if(user_name == ""){
      alert("user name cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if (user_pass ==""){
      alert("user password cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (user_des ==""){
      alert("user description cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (user_level==""){
      alert("user level cannot be empty");
      console.log('success');
       console.log('failure');
       return false;
    } else if (user_status==""){
      alert("user status cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (login_limit==""){
      alert("login_limit cannot be empty");
      console.log('success');
       console.log('failure');
       return false;
    } else if (experi_date==""){
      alert("user status cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    }

    // get values
    $.ajax({
             
             method: "post",
             url: "user_insert.php",
             datatype: "html",
             data: $('#frm_user').serialize(),
             success: function(data){
                 if(data.trim() == "1"){
                  $("#modal-item").hide();
                  alertify.success('Ok');
                  setTimeout(function(){location.reload()},3000);
                 }

             }
    });
   // $('#modal-item').modal('hide');
  //    return;
    
}

      function editItem(id){
      var id = id;
      //  alert($('istock'+id).text());
     
        var username = $('#username'+id).text();
        var password = $('#password'+id).text();
        var description = $('#description'+id).text();
        var level = $('#level'+id).val();
        var status = $('#status'+id).val();
        
      var login_limit = $("#login_limit"+id).text();
    var experi_date = $("#Expire"+id).val();
      
      
      function sentDataForEdit(){
          xmlhttp = new XMLHttpRequest();
          var url = "user_edit.php?id="+id+"&username="+username+"&description="+description+"&password="+password+"&level="+level+"&status="+status+"&login_limit="+login_limit+"&experi_date="+experi_date+"";
          xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              alertify.success('Edited');
            // setTimeout(function() {
             //   window.location.reload();
             // }, 3000);
            }
          }
          xmlhttp.open("GET",url, true);
          xmlhttp.send();
        }
        sentDataForEdit();
      }
  
        function deletem(id){
          var data={"id":id}
          $.ajax({
             
             method: "post",
             url: "menu_delete.php",
             data: data,
             success: function(data){
                 if(data == "1"){
                  alertify.success('deleted');
                  setTimeout(function(){location.reload()},3000);
                 }

             }
    });
        }

      </script>
    </body>
  </html>