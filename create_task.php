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

?>
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Task</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">


        </div>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">TASK INFORMATION</h6>
                    <div class="row mt-3 align-items-center">

                        <div class="col-md-4">
                            <label for="pid">Project Id</label>
                            <input type="text" class="form-control mt-2" id="pid" name="pid" data-input
                                value="<?php echo $row['projectid']; ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="project_name">Project Name</label>
                            <input type="text" class="form-control mt-2" id="project_name" name="project_name"
                                data-input value="<?php echo $row['projectname']; ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="pedate">Project Start Date</label>
                            <input type="date" class="form-control mt-2" id="psdate" name="psdate"
                                placeholder="Project End Date" data-input value="<?php echo $row['startdate']; ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-md-4">
                            <label for="pduration">Project Duration</label>
                            <input type="text" class="form-control mt-2" id="pduration" name="pduration" data-input
                                value="<?php echo $row['duration']; ?> " readonly>
                        </div>
                        <div class="col-md-4">
                            <?php 

                            $query3 = "SELECT * FROM customer WHERE customerid = $row[customer]";
                            $result3 = mysqli_query($connection, $query3);
                            $row3 = mysqli_fetch_array($result3);
                            
                            ?>
                            <label for="cname">Customer Name</label>
                            <input type="text" class="form-control mt-2" id="cname" name="cname" data-input
                                value="<?php echo $row3['cname']; ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <?php 

                            $query3 = "SELECT * FROM customer WHERE customerid = $row[customer]";
                            $result3 = mysqli_query($connection, $query3);
                            $row3 = mysqli_fetch_array($result3);
                            
                            ?>
                            <label for="cname">Customer Name</label>
                            <input type="text" class="form-control mt-2" id="caddress" name="caddress" data-input
                                value="<?php echo $row3['address']; ?>" readonly>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="pmanager">Project Manager</label>
                            <select class="form-select mt-2" id="pmanager" name="pmanager">
                                <option selected value="cx">project manager</option>
                                <?php
                                    $cquery = "SELECT * FROM category ORDER BY id DESC";  
                                    $cresult = mysqli_query($connection, $cquery);  
                                    while($crow = mysqli_fetch_array($cresult)){      
                                    ?>
                                <option value="<?php echo $crow['id']; ?>"
                                    <?php if($row['pm'] == $crow['id']){ echo "selected"; } ?>>
                                    <?php echo $crow['name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr>

                    <form class="forms-sample mt-3" id="frmsetup" name="frmsetup" method="post" action="lc_insert.php">
                        <h4 class="form-title">Proposed Works</h4>

                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table" id="tab_logic">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="text-center" style="width:3%">
                                                #
                                            </th>
                                            <th class="text-center" id="thitem" style="width:20%">
                                                Task
                                            </th>

                                            <th class="text-center" id="thctn" style="width:20%">
                                                Description
                                            </th>
                                            <th class="text-center" id="thdate" style="width:10%">
                                                Assigned To
                                            </th>
                                            <th class="text-center" id="thdate" style="width:7%">
                                                Start Date
                                            </th>
                                            <th class="text-center" id="thdate" style="width:10%">
                                                End Date
                                            </th>
                                            <th class="text-center" id="thdate" style="width:10%">
                                                Status
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id='addr0'>
                                            <td>1</td>
                                            <td>
                                                <input type="text" name="task[]" id="task0" class="form-control rounded"
                                                    onblur="checkr(0);" value="" placeholder="Task Name">
                                            </td>
                                            <td>
                                                <input type="text" name="description[]" id="description0"
                                                    class="form-control rounded" onblur="checkr(0);" value=""
                                                    placeholder="Task Description">
                                            </td>
                                            <td>
                                                <select class="form-select" name="assign[]" id="assign0"
                                                    onchange="chkproblem(0)">
                                                    <option disabled selected value>Select Service</option>
                                                    <?php
                          $query = "SELECT * FROM manager ORDER BY id ASC";  
                          $select_result = mysqli_query($connection, $query);  
                          while($row = mysqli_fetch_array($select_result)){
                  ?>
                                                    <option value="<?php echo $row['id']; ?>">
                                                        <?php echo $row['name'];?></option>
                                                    <?php
                      }
                      ?>
                                                </select>
                                                <select class="form-select" name="assign[]" id="assign" hidden>
                                                    <option disabled selected value>Select Manager</option>
                                                    <?php
                                                        $query = "SELECT * FROM manager ORDER BY id ASC";  
                                                        $select_result = mysqli_query($connection, $query);  
                                                        while($row = mysqli_fetch_array($select_result)){
                                                    ?>
                                                    <option value="<?php echo $row['id']; ?>">
                                                        <?php echo $row['name'];?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="date" name="sdate[]" id="sdate0"
                                                    class="form-control rounded" onblur="checkr(0);" value=""
                                                    placeholder="Start Date">
                                            </td>
                                            <td>
                                                <input type="date" name="edate[]" id="edate0"
                                                    class="form-control rounded" onblur="checkr(0);" value=""
                                                    placeholder="End Date">
                                            </td>
                                            <td>
                                                <select class="form-select" name="status[]" id="status0">
                                                    <option value="0">Pending</option>
                                                    <option value="1">Done</option>
                                                </select>
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
                            <button type="submit" class="btn btn-primary me-2 b-right" onclick="saveRecord();">Save
                                changes</button>
                            <div id="status_update">

                            </div>

                            <a class="btn btn-success me-2 b-right" href="supplier.php">Back</a>
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

    $('#addr' + i).html('<td>' + (i + 1) + '</td><td><input onblur="checkr(' + i + ')"  name="task[]"    id="task' + i +
        '" type="text" class="form-control square" placeholder="Task Name"></td><td><input onblur="checkr(' + i +
        ')"  name="description[]" id="description' +
        i +
        '" type="text" class="form-control square" placeholder="Task Description"></td><td><select onblur="checkr(' +
        i +
        ')"  name="assign[]" id="assign' + i +
        '"  class="form-select square"></select></td><td><input onblur="checkr(' + i +
        ')"  name="sdate[]" id="sdate' + i +
        '" type="date" class="form-control square" placeholder="Start Date"></td><td><input onblur="checkr(' + i +
        ')"  name="edate[]" id="edate' + i +
        '" type="date" class="form-control square" placeholder="End Date"></td><td><select onblur="checkr(' + i +
        ')"  name="status[]" id="status' + i +
        '"  class="form-select square"><option value="0">Pending</option><option value="1">Done</option></select></td>'
    );

    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');


    /*1st select content copy */
    //take only first two options and clone it & by default 'select first item' text show in 1st select box
    // var $options = $('#task').clone().html();
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
            $('#assign' + (i - 1)).append(options);
        }

    })




    i++;

}



// function chkproblem(id) {
//     var serviceid = document.getElementById("service" + id).value;

//     //get specific_service_info from database
//     $.ajax({
//         url: "specific_service_info.php",
//         type: "POST",
//         data: {
//             serviceid: serviceid
//         },
//         success: function(data) {
//             var obj = JSON.parse(data);
//             //set value to uom & rate
//             document.getElementById("uom" + id).value = obj.uom;
//             document.getElementById("rate" + id).value = obj.rate;




//         }

//     })
// }

function saveRecord() {
    var task = document.getElementsByName("task[]");
    var description = document.getElementsByName("description[]");
    var assign = document.getElementsByName("assign[]");
    var sdate = document.getElementsByName("sdate[]");
    var edate = document.getElementsByName("edate[]");
    var status = document.getElementsByName("status[]");
    var taskid = [];
    var descriptionid = [];
    var assignid = [];
    var sdateid = [];
    var edateid = [];
    var statusid = [];

    for (var i = 0; i < task.length; i++) {

        taskid.push(task[i].value);
        descriptionid.push(description[i].value);
        assignid.push(assign[i].value);
        sdateid.push(sdate[i].value);
        edateid.push(edate[i].value);
        statusid.push(status[i].value);

    }




    var form = $('#frmsetup')[0];
    var data = new FormData(form);
    data.append('taskid', taskid);
    data.append('descriptionid', descriptionid);
    data.append('assignid', assignid);
    data.append('sdateid', sdateid);
    data.append('edateid', edateid);
    data.append('statusid', statusid);






    $.ajax({
        url: "task_insert.php",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            alert("Task Inserted Successfully");
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