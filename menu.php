<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$query = "SELECT * FROM menu ORDER BY id DESC";
$select_result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_result)){
if ($row["status"] == "1") {
$a='<option value="">---Select Status---</option><option value="1" selected>Active</option><option value="0" >Inactive</option>';
}else if ($row["status"] == "0") {
$a='<option value="">---Select Status---</option><option value="1">Active</option><option value="0" selected>Inactive</option>';
}
if ($row["access"] == "0") {
$b='<option value="" selected>---Select Access---</option><option value="1" selected>Admin</option><option value="2" >User</option>';
}else if ($row["access"] == "1") {
$b='<option value="">---Select Access---</option><option value="1" selected>Admin</option><option value="2" >User</option>';
}else if ($row["access"] == "2"){
$b='<option value="">---Select Access---</option><option value="1">Admin</option><option value="2" selected>User</option>';
}
$output1.='<tr>';
  $output1.='<td>'.$i.'</td>';
  $output1.='<td id="head'.$row["id"].'" contenteditable>'.$row["head"].'</td>';
  $output1.='<td id="menutext'.$row["id"].'" contenteditable>'.$row["menutext"].'</td>';
  $output1.='<td id="link'.$row["id"].'" contenteditable>'.$row["link"].'</td>';
  $output1.='<td id="menuorder'.$row["id"].'" contenteditable>'.$row["menuorder"].'</td>';
  $output1.='<td>';
    $output1.='<select  id="menu_status'.$row["id"].'" name="menu_status" style="width:70px;">';
      $output1.=$a;
    $output1.='</select>';
  $output1.='</td>';
  $output1.='<td >';
    $output1.='<select  id="menu_access'.$row["id"].'" name="menu_access" style="width:70px;">';
      $output1.=$b;
    $output1.='</select>';
  $output1.='</td>';
  $output1.='<td><button type="button" onclick="editItem('.$row["id"].')" class="btn btn-info" style="font-size:20px;padding:2px;"><i class="icon-edit"></i></button><button type="button" onclick="deletem('.$row["id"].')" class="btn btn-danger" style="margin-left:10px;font-size:20px;padding:2px;"><i class="icon-trash"></i></button></td>';
$output1.='</tr>';
$i++;
}
?>
<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
  <!-- main menu header-->
  <div class="main-menu-header">
    <input type="text" placeholder="Search" class="menu-search form-control round"/>
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
                <h3>MENU SETUP</h3>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew" data-toggle="modal" data-target="#modal-item">Add new</button>
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                      <th width="5%">Menu Id</th>
                      <th width="10%">Menu Head</th>
                      <th width="10%">Menu Text</th>
                      <th width="10%">Menu Link</th>
                      <th width="5%">Menu Order</th>
                      <th width="7%">Menu Status</th>
                      <th width="7%">Menu Access</th>
                      <th width="15%">Action</th>
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
             <form method="post" class="form" id="frm_menu_setup">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Menu Setup</h4>
              </div>
              
               <div class="modal-body">
                    
                      <div class="form-group">
                      <label  for="menu_head">Menu Head</label>
                      <input type="text" class="form-control square" id="menu_head" name="menu_head" placeholder="Enter menu Head name">
                      </div>
                    <!--end form group -->
                    
                      
                        <div class="form-group">
                        <label for="menu_title">Menu Title</label>
                        <input type="text" class="form-control square" id="menu_title" placeholder="Enter Menu Title" name="menu title">
                        </div>
                      <!--end form group -->
                      
                        
                          <div class="form-group ">
                          <div class="row ">
                          <div class="col-sm-6">
                          <label  for="menu_link">Menu Link</label>
                          <input  type="text"class="form-control square" id="menu_link" name="menu_link" placeholder="Enter the menu link without extention">
                        </div>
                          <div class="col-sm-6">
                          <label  for="menu_order">Menu Order</label>
                          <Input type="text" class="form-control square" id="menu_order" name="menu_order" placeholder="Enter the order no ">
                          </div>
                        </div>
                      </div>
                        <!--end form group -->
                       
                          
                         <div class="form-group ">
                        <div class="row ">
                          <div class="col-sm-6">
                            <label  for="menu_status">Menu Status</label>
                            <select class="form-control square" id="menu_status" name="menu_status">
                              <option value="">---Select Status---</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                       </div>
                        <div class="col-sm-6">
                            <label  for="menu_access">Menu Access</label>
                            <select class="form-control square" id="menu_access" name="menu_access">
                              <option value="">---Select Access---</option>
                              <option value="1">Admin</option>
                              <option value="2">User</option>
                            </select>
                          </div>
                        </div>
                      </div>
                          <!--end form group -->
                          
                       
                        
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
    
    var menu_head = $("#menu_head").val();
    var menu_title = $("#menu_title").val();
    var menu_link = $("#menu_link").val();
    var menu_order = $("#menu_order").val();
    var menu_status = $("#menu_status").val();
    var menu_access = $("#menu_access").val();
    



    if(menu_head == ""){
      alert("menu head cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if (menu_title ==""){
      alert("menu title cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (menu_link ==""){
      alert("menu link cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (menu_order==""){
      alert("menu order cannot be empty");
      console.log('success');
       console.log('failure');
       return false;
    } else if (menu_status==""){
      alert("menu status cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (menu_access==""){
      alert("menu access cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } 

    // get values
    $.ajax({
             
             method: "post",
             url: "menu_insert.php",
             datatype: "html",
             data: $('#frm_menu_setup').serialize(),
             success: function(data){
                 if(data == "1"){
                  alertify.success('Menu Saved');
                  setTimeout(function(){location.reload()},2000);
                 }

             }
    });
    $('#modal-item').modal('hide');
      return;
    
}

      function editItem(id){
      var id = id;
      //  alert($('istock'+id).text());
      var menutext1 = $('#menutext').text();
      var head = $('#head'+id).text();
      var menutext = $('#menutext'+id).text();
      var link = $('#link'+id).text();
      var menuorder = $('#menuorder'+id).text();
      var menu_status = $('#menu_status'+id).val();
      var menu_access = $('#menu_access'+id).val();
      
      
      
      function sentDataForEdit(){
      xmlhttp = new XMLHttpRequest();
      var url = "menu_edit.php?id="+id+"&head="+head+"&menutext="+menutext+"&link="+link+"&menuorder="+menuorder+"&menu_status="+menu_status+"&menu_access="+menu_access+"";
      xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      alertify.success('Edited');
      setTimeout(function() {
      
      window.location.reload();
      }, 3000);
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