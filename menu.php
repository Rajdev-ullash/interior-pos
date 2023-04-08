<?php
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include_once('databases.php');
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

<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">CUSTOMER</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal"
                data-bs-target="#modalx">Add new</button>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <div class="table-responsive" id="datagrid">
                        <table id="dataTableExample" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Menu Id</th>
                                    <th>Menu Head</th>
                                    <th>Menu Text</th>
                                    <th>Menu Link</th>
                                    <th>Menu Order</th>
                                    <th>Menu Status</th>
                                    <th>Menu Access</th>
                                    <th>Action</th>
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
    </div>

</div>



<!-- partial:partials/_footer.html -->
<footer
    class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
    <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com/" target="_blank">NobleUI</a>.
    </p>
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
                <h5 class="modal-title" id="exampleModalLabel">MENU SETUP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="frmsetup" name="frmsetup">

                    <div class="mb-3">
                        <label for="menu_head">Menu Head</label>
                        <input type="text" class="form-control square" id="menu_head" name="menu_head"
                            placeholder="Enter menu Head name">
                    </div>

                    <div class="mb-3">
                        <label for="menu_title">Menu Title</label>
                        <input type="text" class="form-control square" id="menu_title" placeholder="Enter Menu Title"
                            name="menu title">
                    </div>

                    <div class="mb-3">
                        <div class="row ">
                            <div class="col-sm-6">
                                <label for="menu_link">Menu Link</label>
                                <input type="text" class="form-control square" id="menu_link" name="menu_link"
                                    placeholder="Enter the menu link without extention">
                            </div>
                            <div class="col-sm-6">
                                <label for="menu_order">Menu Order</label>
                                <Input type="text" class="form-control square" id="menu_order" name="menu_order"
                                    placeholder="Enter the order no ">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row ">
                            <div class="col-sm-6">
                                <label for="menu_status">Menu Status</label>
                                <select class="form-control square" id="menu_status" name="menu_status">
                                    <option value="">---Select Status---</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="menu_access">Menu Access</label>
                                <select class="form-control square" id="menu_access" name="menu_access">
                                    <option value="">---Select Access---</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
                        </div>
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
<!-- main menu-->




<script type="text/javascript">
// ----------------- my functions ---------------------

function openmodal() {
    $("#modalx").modal();
}

function addRecord() {

    var menu_head = $("#menu_head").val();
    var menu_title = $("#menu_title").val();
    var menu_link = $("#menu_link").val();
    var menu_order = $("#menu_order").val();
    var menu_status = $("#menu_status").val();
    var menu_access = $("#menu_access").val();

    if (menu_head == "") {
        alert("menu head cannot be empty");
        console.log('success');
        console.log('failure');
        return false;
    } else if (menu_title == "") {
        alert("menu title cannot be empty");
        console.log('success');
        console.log('failure');
        return false;
    } else if (menu_link == "") {
        alert("menu link cannot be empty");
        console.log('success');
        console.log('failure');
        return false;
    } else if (menu_order == "") {
        alert("menu order cannot be empty");
        console.log('success');
        console.log('failure');
        return false;
    } else if (menu_status == "") {
        alert("menu status cannot be empty");
        console.log('success');
        console.log('failure');
        return false;
    } else if (menu_access == "") {
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
        success: function(data) {
            if (data) {
                Window.location.reload();
            }
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.log("Error: " + error);
        }
    });
    // $('#modalx').modal('hide');
    return;

}

function editItem(id) {
    var id = id;
    //  alert($('istock'+id).text());
    var menutext1 = $('#menutext').text();
    var head = $('#head' + id).text();
    var menutext = $('#menutext' + id).text();
    var link = $('#link' + id).text();
    var menuorder = $('#menuorder' + id).text();
    var menu_status = $('#menu_status' + id).val();
    var menu_access = $('#menu_access' + id).val();



    function sentDataForEdit() {
        xmlhttp = new XMLHttpRequest();
        var url = "menu_edit.php?id=" + id + "&head=" + head + "&menutext=" + menutext + "&link=" + link +
            "&menuorder=" + menuorder + "&menu_status=" + menu_status + "&menu_access=" + menu_access + "";
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alertify.success('Edited');
                setTimeout(function() {

                    window.location.reload();
                }, 3000);
            }
        }
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
    sentDataForEdit();
}

function deletem(id) {
    var data = {
        "id": id
    }
    $.ajax({

        method: "post",
        url: "menu_delete.php",
        data: data,
        success: function(data) {
            if (data == "1") {
                alertify.success('deleted');
                setTimeout(function() {
                    location.reload()
                }, 3000);
            }

        }
    });
}
</script>
</body>

</html>