<?php

include('checkLogin.php');
include_once('header.php');
require_once('databases.php');

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
               
              </div>
              <div class="col-lg-12 col-md-12">
                <form method="post" class="form" id="frm_user">
            
                    <div class="form-group">
                    <label  for="user_name">User Name</label>
                      <input type="text" class="form-control square" id="user_name" name="user_name" placeholder="Enter User Name">
                    </div><!--end form group -->
                    <div class="form-group">
                      <label  for="user_pass">User Password</label>
                        <input type="text" class="form-control square" id="user_pass_old" placeholder="Enter Password" name="user_pass_old">
                      </div><!--end form group -->
                      <div class="form-group">
                        <label for="user_des">New Password</label>
                          <input type="text" class="form-control square" id="user_pass_new" placeholder="Enter New Password" name="user_pass_new">
                          
                        </div><!--end form group -->
                        
                         <div class="form-group"> 
                          <button type="button" onclick="addRecord()" class="btn btn-success btn-lg">Save</button>
                                                  
                        </div>
                        
                    </div>
              </div>
            </div>
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
    var user_pass = $("#user_pass_old").val();
    var user_pass_new = $("#user_pass_new").val();
    
    
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
    } else if (user_pass_new ==""){
      alert("user password new cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    }

    // get values
    $.ajax({
             
             method: "post",
             url: "user_pass_chan.php",
             datatype: "html",
             data: $('#frm_user').serialize(),
             success: function(data){
                 if(data.trim() == "1"){
                 
                  alertify.success('Password Changed');
                  setTimeout(function(){window.location.href="logout.php";},3000);
                 }else{
                  alertify.success('Wrong Username or Password Password');
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