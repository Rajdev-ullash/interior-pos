<?php 
include 'header.php';
include 'sidebar.php';
include 'navbar.php';
include 'checklogin.php';
include_once('databases.php');

//get logged in user id
$username = $_SESSION['user'];

//get id from url
$id = $_GET['id'];
//select data from database
$query = "SELECT * FROM project WHERE projectid = $id";
//execute query
$result = mysqli_query($connection, $query);
//fetch data from database
$row = mysqli_fetch_array($result);

$customer_Id = $row['customer'];
$project_Id = $row['projectid'];

?>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">TASK DETAILS</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">


        </div>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">TASK INFORMATION</h6>

                    <hr>
                    <div class="row mt-3">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Task List</h6>
                                    <div class="table-responsive" id="datagrid">
                                        <table id="" class="table table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Task Name</th>
                                                    <th>Description</th>
                                                    <th>Assigned Manger</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                    
                                    $query = "SELECT * FROM project_task WHERE pid = '$id'";  
                                    $select_result = mysqli_query($connection, $query);
                                    //count row > 0
                                    if(mysqli_num_rows($select_result) > 0){
                                        while($row = mysqli_fetch_array($select_result)){      
                                    ?>
                                                <tr>
                                                    <td><?php echo ++$i; ?></td>
                                                    <td><?php echo $row['taskname']; ?></td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    <td>
                                                        <?php

                                                $query = "SELECT * FROM manager WHERE id = '".$row['assignedto']."'";
                                                $result = mysqli_query($connection, $query);
                                                $service = mysqli_fetch_assoc($result);
                                                echo $service['name'];
                                                
                                                ?>

                                                    </td>
                                                    </td>
                                                    <td><?php echo $row['startdate']; ?></td>
                                                    <td><?php echo $row['enddate']; ?></td>
                                                    <td>
                                                        <?php if($row['status'] == '0'){ ?>
                                                        <span class="text-warning">Pending</span>

                                                        <?php }else{ ?>
                                                        <span class="text-success">Done</span>
                                                        <?php } ?>
                                                    </td>

                                                    <td>
                                                        <a href="show_task_details.php?id=<?php echo $row['taskid']; ?>"
                                                            class="btn btn-primary btn-sm">Details</a>
                                                    </td>

                                                </tr>
                                                <?php }
                                    }else{
                                        echo "<tr><td colspan='10' class='text-center'>No Data Found</td></tr>";
                                    }  
                                     ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 column text-left">
                            <!-- <button id="add_row" class="btn btn-danger" onclick="addrow();">Add Row</button> -->
                            <!-- <button id="delete_row" class="btn btn-danger" onclick="delrow();">Remove Row</button> -->
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>




    <!-- partial:partials/_footer.html -->
    <footer
        class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
        <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com/"
                target="_blank">NobleUI</a>.</p>
        <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i>
        </p>
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
function status_check() {
    var status = $('#cstatus').val();

    if (status == 'pending') {
        $('#status_update').html(
            '<button type="submit" class="btn btn-primary me-2 b-right" onclick="saveStatus();">Accept</button>'
        );
    } else {
        $('#status_update').html('');
    }
}

status_check();

var i = 1;



function addrow() {
    //td value id increment by 1

    $('#addr' + i).html('<td>' + (i + 1) + '</td><td><select onchange="chkproblem(' + i +
        ')" class="form-select" name="service[]" id="service' +
        i + '""></select></td><td><input onblur="checkr(' + i + ')"  name="description[]" id="description' +
        i + '" type="text" class="form-control square"</td><td><input onblur="checkr(' + i +
        ')"  name="quantity[]" id="quantity' + i +
        '" type="number" class="form-control square"></td><td><input onblur="checkr(' + i +
        ')"  name="uom[]" id="uom' + i +
        '" type="text" class="form-control square" readonly></td><td><input onblur="checkr(' + i +
        ')"  name="rate[]" id="rate' + i +
        '" type="number" class="form-control square" readonly></td><td><input onblur="checkr(' + i +
        ')"  name="amount[]" id="amount' + i +
        '" type="number" class="form-control square"></td>');

    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');


    /*1st select content copy */
    //take only first two options and clone it & by default 'select first item' text show in 1st select box
    // var $options = $('#service').clone().html();
    // var $options = $('#service').clone().html();


    // alert($options);
    // $('#service' + i).append($options);

    //get service_info from database
    $.ajax({
        url: "all_service.php",
        type: "POST",
        success: function(data) {
            var obj = JSON.parse(data);
            console.log(obj);
            //set value to service
            var options = '<option value="">Select Item</option>';
            for (var j = 0; j < obj.length; j++) {
                console.log(obj[j].serviceid);


                options += '<option value="' + obj[j].serviceid + '">' + obj[j].sname +
                    '</option>';


            }
            $('#service' + (i - 1)).append(options);
        }

    })




    i++;

}



function chkproblem(id) {
    var serviceid = document.getElementById("service" + id).value;

    //get specific_service_info from database
    $.ajax({
        url: "specific_service_info.php",
        type: "POST",
        data: {
            serviceid: serviceid
        },
        success: function(data) {
            var obj = JSON.parse(data);
            //set value to uom & rate
            document.getElementById("uom" + id).value = obj.uom;
            document.getElementById("rate" + id).value = obj.rate;




        }

    })
}

//create a function & sum all amount value & set it to total_budget & it change automatically when amount change without page refresh
function sum() {
    var sum = 0;
    var amount = document.getElementsByName("amount[]");
    var amountId = [];
    for (var i = 0; i < amount.length; i++) {
        amountId.push(amount[i].value);
    }
    for (var i = 0; i < amountId.length; i++) {
        sum = sum + parseInt(amountId[i]);
    }
    document.getElementById("total_budget").value = sum;

}
sum();

function addSum() {
    var sum = 0;
    var amount = document.getElementsByName("amount[]");
    var amountId = [];
    for (var i = 0; i < amount.length; i++) {
        amountId.push(amount[i].value);
    }
    for (var i = 0; i < amountId.length; i++) {
        sum = sum + parseInt(amountId[i]);
    }
    document.getElementById("total_budget").value = sum;

}

function saveStatus() {
    var id = <?php echo $id ?>;

    $.ajax({
        url: "show_project_details_status.php",
        type: "POST",
        data: {
            id: id
        },
        success: function(data) {
            alert("Status Updated Successfully");
            window.location.href = "show_project.php";
        },
        error: function(data) {
            console.log(data);
        }

    })
}

function saveRecord() {
    var service = document.getElementsByName("service[]");
    var description = document.getElementsByName("description[]");
    var quantity = document.getElementsByName("quantity[]");
    var uom = document.getElementsByName("uom[]");
    var rate = document.getElementsByName("rate[]");
    var amount = document.getElementsByName("amount[]");
    var serviceid = [];
    var descriptionid = [];
    var quantityid = [];
    var uomid = [];
    var rateid = [];
    var amountid = [];
    for (var i = 0; i < service.length; i++) {

        serviceid.push(service[i].value);
        descriptionid.push(description[i].value);
        quantityid.push(quantity[i].value);
        uomid.push(uom[i].value);
        rateid.push(rate[i].value);
        amountid.push(amount[i].value);
    }



    var qdate = $("#qdate").html();
    var psdate = $("#psdate").val();
    var pedate = $("#pedate").val();
    var pduration = $("#pduration").val();
    var pmanager = $("#pmanager").val();
    var project_name = $("#project_name").val();
    var cname = $("#cname").html();
    var cdescription = $("#cdescription").html();
    var pname = $("#pname").val();
    var caddress = $("#caddress").val();
    var carea = $("#carea").val();
    var cmob = $("#cmob").val();
    var cemail = $("#cemail").val();
    var ccategory = $("#ccategory").val();
    var total_budget = $("#total_budget").val();
    var id = <?php echo $id ?>;


    var form = $('#frmsetup')[0];
    var data = new FormData(form);
    data.append("serviceid", serviceid);
    data.append("descriptionid", descriptionid);
    data.append("quantityid", quantityid);
    data.append("uomid", uomid);
    data.append("rateid", rateid);
    data.append("amountid", amountid);
    data.append("qdate", qdate);
    data.append("psdate", psdate);
    data.append("pedate", pedate);
    data.append("pduration", pduration);
    data.append("pmanager", pmanager);
    data.append("project_name", project_name);
    data.append("cname", cname);
    data.append("cdescription", cdescription);
    data.append("pname", pname);
    data.append("caddress", caddress);
    data.append("carea", carea);
    data.append("cmob", cmob);
    data.append("cemail", cemail);
    data.append("ccategory", ccategory);
    data.append("total_budget", total_budget);
    data.append("id", id);





    $.ajax({
        url: "show_project_details_update.php",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            alert("Project Updated Successfully");
            window.location.reload();
        },
        error: function(data) {
            console.log(data);
        }

    })

}

function checkr() {

}












function delrow() {
    if (i > 1) {
        $("#addr" + (i - 1)).html('');
        i--;
    }
}
</script>
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:27:41 GMT -->

</html>