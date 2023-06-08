<!DOCTYPE html>
<html lang="en">
    <?php include('../includes/header.php'); ?>
    <body class="sb-nav-fixed">
        <?php include ('../includes/navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include ('../includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3 noprint">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Generate</li>
                            <li class="breadcrumb-item ">Archive Accounts</li>
                        </ol>
                        <div class="container">
                            <center class="noprint"><h3 class="mt-3 mb-3" style="margin-top: 30px;">Generate Accounts</h3></center>
                            <div class="col-xl-12 col-md-12 noprint">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <fieldset>
                                            <legend>Filter</legend>
                                            <form action="" id="filter" method="POST">
                                                <div class="row align-items-end">
                                                    <div class="form-group col-md-2">
                                                        <label for="accounts" class="required">Accounts</label>
                                                        <select class="form-control" name="accounts" onchange="showTextarea()" id="accounts" required>
                                                            <option value="" selected="true" disabled="disabled">Select Accounts</option>
                                                            <option value="Official">Official</option>    
                                                            <option value="Parent">Parent</option> 
                                                            <option value="Student">Student</option> 
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2 mt-2" id="textarea-container" style="display:none">
                                                        <label for="level" class="required">Year Level</label>
                                                        <select class="form-control" name="level" id="level">
                                                            <option value="" selected="true" disabled="disabled">Select Year Level</option>
                                                            <option value="Grade 7">Grade 7</option>    
                                                            <option value="Grade 8">Grade 8</option> 
                                                            <option value="Grade 9">Grade 9</option> 
                                                            <option value="Grade 10">Grade 10</option> 
                                                            <option value="Grade 11">Grade 11</option> 
                                                            <option value="Grade 12">Grade 12</option> 
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="status" class="required">Type</label>
                                                        <select class="form-control" name="status" id="status" required>
                                                            <option value="" selected="true" disabled="disabled">Select Type</option>
                                                            <option value="1">Active</option>    
                                                            <option value="2">In active</option> 
                                                            <option value="3">Archive</option> 
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 mt-4">
                                                        <button class="btn btn-primary btn-flat btn-sm" name="submit-btn" id="submit-btn"><i class="fa fa-filter"></i> Filter</button>
                                                        <button class="btn btn-sm btn-flat btn-success" type="button" onclick="window.print()" <?php if(isset($_POST['submit-btn'])) { } else { echo "disabled";} ?>><i class="fa fa-print"></i> Print</button>
                                                        <button class="btn btn-sm btn-flat btn-success" type="button" id="export-btn" <?php if(isset($_POST['submit-btn'])) { } else { echo "disabled";} ?>><i class="fas fa-file-csv"></i> Export</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                                #sys_logo{
                                    object-fit:cover;
                                    object-position:center center;
                                    width: 4.5em;
                                    height: 4.5em;
                                    margin-top: -4rem;
                                }
                            </style>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <img src="<?php echo base_url ?>assets/files/images/system/jbi.jpg" class="img-circle" id="sys_logo" alt="System Logo">
                                    </div>
                                    <div class="col-8">
                                        <h4 class="text-center" style="font-size:14px;"><b>JIMENEZ BETHEL INSTITUTE</b></h4>
                                        <h3 class="text-center" style="font-size:14px;"><b>SUPREME STUDENT GOVERNMENT</b></h3>
                                        <h5 class="text-center" style="font-size:12px;">BONIFACIO/BURGOS ST. NAGA, JIMENEZ, MISAMIS OCCIDENTAL - 7204</h5>
                                        <hr style="border-top: 1.5px solid black !important; opacity: 100 !important;">
                                        <h5 class="text-center" style="font-size:12px;"><?php if(isset($_POST['accounts'])){ if($_POST['accounts'] == 'Official') { echo"Officials"; } elseif ($_POST['accounts'] == 'Parent') { echo"Parent"; } else{ echo"Students"; } }?> <?php if(isset($_POST['status'])){ if($_POST['status'] == '1') { echo"(Active Accounts)"; } elseif($_POST['status'] == '2') { echo"(In active Accounts)"; } else{ echo"(Archive Accounts)"; } } else { } ?></h5>
                                        <!-- <h5 class="text-center" style="font-size:12px;"><?php echo date("F d, Y", strtotime($from)). " - ".date("F d, Y", strtotime($to)); ?></h5> -->
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <img src="<?php echo base_url ?>assets/files/images/system/ssg.png" class="img-circle" id="sys_logo" alt="System Logo">
                                    </div>
                                </div>
                                <?php if(isset($_POST['accounts'])){ ?>
                                    <?php if($_POST['accounts'] == 'Student') { ?>
                                        <table class="table text-center table-hover table-striped">
                                            <!-- <colgroup>
                                                <col width="5%">
                                                <col width="20%">
                                                <col width="20%">
                                                <col width="15%">
                                                <col width="20%">
                                                <col width="20%">
                                            </colgroup> -->
                                            <thead>
                                                <tr class="bg-danger text-light">
                                                    <th>No.</th>
                                                    <th>Student ID</th>
                                                    <th>Name</th>
                                                    <th>Year Level</th>
                                                    <?php if($_POST['status'] == '3'){ ?>
                                                        <th>Date Deleted</th>
                                                        <th>Deleted By</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $user_status_id = $_POST['status'];
                                                    $level = $_POST['level'];
                                                    // Escape the variables and enclose them in quotes for the SQL query
                                                    $user_status_id = $con->real_escape_string($user_status_id);
                                                    $level = $con->real_escape_string($level);
                                                    
                                                    $qry = $con->query("SELECT *, DATE_FORMAT(date_deleted, '%m-%d-%Y %h:%i:%s %p') as short_date_deleted
                                                    FROM user 
                                                    WHERE level = '$level' 
                                                    AND user_type_id = 6 
                                                    AND user_status_id = '$user_status_id'
                                                    ORDER BY UNIX_TIMESTAMP(date_deleted) ASC");
                                                    while($row = $qry->fetch_assoc()):
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['user_id'] ?></td>
                                                    <td class="text-center"><?php echo $row['student_id'] ?></td>
                                                    <td class=""><p class="m-0"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?> <?php echo $row['suffix'] ?></p></td>
                                                    <td class=""><p class="m-0"><?php echo $row['level'] ?></p></td>
                                                    <?php if($_POST['status'] == '3'){ ?>
                                                        <td class=""><?php echo $row['short_date_deleted'] ?></td>
                                                        <td class=""><?php echo $row['deleted_by'] ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <?php endwhile; ?>
                                                <?php if($qry->num_rows <= 0): ?>
                                                    <tr>
                                                        <th class="py-1 text-center" colspan="12">No Data.</th>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    <?php } elseif($_POST['accounts'] == 'Official') { ?>
                                        <table class="table text-center table-hover table-striped">
                                            <!-- <colgroup>
                                                <col width="5%">
                                                <col width="20%">
                                                <col width="25%">
                                                <col width="25%">
                                                <col width="25%">
                                            </colgroup> -->
                                            <thead>
                                                <tr class="bg-danger text-light">
                                                    <th>No.</th>
                                                    <th>Position</th>
                                                    <th>Name</th>
                                                    <?php if($_POST['status'] == '3'){ ?>
                                                        <th>Date Deleted</th>
                                                        <th>Deleted By</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $user_status_id= $_POST['status'];
                                                    $user_status_id= $_POST['status'];
                                                    $qry = $con->query("SELECT *, DATE_FORMAT(date_deleted, '%m-%d-%Y %h:%i:%s %p') as short_date_deleted
                                                    FROM user INNER JOIN user_type ON user.user_type_id = user_type.user_type_id WHERE user_type.user_type_id NOT IN (6, 7) AND user_status_id = $user_status_id order by unix_timestamp(date_deleted) asc");
                                                    while($row = $qry->fetch_assoc()):
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['user_id'] ?></td>
                                                    <td class="text-center"><?php echo $row['user_type'] ?></td>
                                                    <td class=""><p class="m-0"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?> <?php echo $row['suffix'] ?></p></td>
                                                    <?php if($_POST['status'] == '3'){ ?>
                                                        <td class=""><?php echo $row['short_date_deleted'] ?></td>
                                                        <td class=""><?php echo $row['deleted_by'] ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <?php endwhile; ?>
                                                <?php if($qry->num_rows <= 0): ?>
                                                    <tr>
                                                        <th class="py-1 text-center" colspan="12">No Data.</th>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    <?php } elseif($_POST['accounts'] == 'Parent') { ?>
                                        <table class="table text-center table-hover table-striped">
                                            <!-- <colgroup>
                                                <col width="10%">
                                                <col width="30%">
                                                <col width="30%">
                                                <col width="30%">
                                            </colgroup> -->
                                            <thead>
                                                <tr class="bg-danger text-light">
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <?php if($_POST['status'] == '3'){ ?>
                                                        <th>Date Deleted</th>
                                                        <th>Deleted By</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $user_status_id= $_POST['status'];
                                                    $qry = $con->query("SELECT *, DATE_FORMAT(date_deleted, '%m-%d-%Y %h:%i:%s %p') as short_date_deleted
                                                    FROM user INNER JOIN user_type ON user.user_type_id = user_type.user_type_id WHERE user_type.user_type_id = 7 AND user_status_id = $user_status_id order by unix_timestamp(date_deleted) asc");
                                                    while($row = $qry->fetch_assoc()):
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['user_id'] ?></td>
                                                    <td class=""><p class="m-0"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?> <?php echo $row['suffix'] ?></p></td>
                                                    <?php if($_POST['status'] == '3'){ ?>
                                                        <td class=""><?php echo $row['short_date_deleted'] ?></td>
                                                        <td class=""><?php echo $row['deleted_by'] ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <?php endwhile; ?>
                                                <?php if($qry->num_rows <= 0): ?>
                                                    <tr>
                                                        <th class="py-1 text-center" colspan="12">No Data.</th>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                <?php } else { } ?>
                            </div>
                    </div>
                </main>
                <?php include ('../includes/footer.php'); ?>
            </div>
        </div>
        <?php include ('../includes/bottom.php'); ?>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function(){
        $('.select2').select2({
            width:'100%'
        })
        $('#filter').submit(function(e){
            e.preventDefault();
            //location.href= './?page=reports/date_wise_transaction&'+$(this).serialize();
        })
	})
</script>
<script>
	function printDiv() {
		var divToPrint = document.getElementById('outprint');
		var newWin = window.open('', 'Print-Window');
		newWin.document.open();
		newWin.document.write('<html><head><title>Print Content</title></head><body>' + divToPrint.innerHTML + '</body></html>');
		newWin.document.close();
		newWin.focus();
		setTimeout(function(){newWin.print();},1000);
	}
</script>

<script>
	const fromInput = document.querySelector('#from');
	const toInput = document.querySelector('#to');

	// Attach an event listener to the "from" input field
	fromInput.addEventListener('change', () => {
		// Get the selected date in the "from" input field
		const selectedDate = new Date(fromInput.value);

		// Set the minimum value of the "to" input field to be the selected date in the "from" input field
		toInput.min = selectedDate.toISOString().split('T')[0];

		// Disable the "to" input field and the "Filter" button if the selected date is greater than or equal to today's date
		const today = new Date();
		if (selectedDate >= today) {
		toInput.disabled = true;
		$('#submit-btn').prop('disabled', true);
		} else {
		toInput.disabled = false;
		$('#submit-btn').prop('disabled', false);
		}
	});
</script>

<!-- <script>
    function exportTableToCSV(filename) {
        var csv = [];
        var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++) {
                row.push(cols[j].innerText);
            }

            csv.push(row.join(","));
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
    }

    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        csvFile = new Blob([csv], {type: "text/csv"});
        downloadLink = document.createElement("a");
        downloadLink.download = filename;
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = "none";
        document.body.appendChild(downloadLink);
        downloadLink.click();
    }

    // Export table when clicking on a button
    document.querySelector("#export-btn").addEventListener("click", function () {
        var filename = "table.csv";
        exportTableToCSV(filename);
    });
</script> -->

<script>
    function exportTableToCSV(filename) {
        var csv = [];
        var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++) {
                row.push(cols[j].innerText);
            }

            csv.push(row.join(","));
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
    }

    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // Add BOM to support UTF-8 encoding in Excel
        var csvData = new Blob(["\ufeff" + csv], {type: 'text/csv;charset=utf-8;'});

        if (navigator.msSaveBlob) { // IE 10+
            navigator.msSaveBlob(csvData, filename);
        } else {
            // Download CSV file
            downloadLink = document.createElement("a");
            downloadLink.download = filename;
            downloadLink.href = window.URL.createObjectURL(csvData);
            downloadLink.style.display = "none";
            document.body.appendChild(downloadLink);
            downloadLink.click();
        }
    }

    // Export table when clicking on a button
    document.querySelector("#export-btn").addEventListener("click", function () {
        var filename = "table.csv";
        exportTableToCSV(filename);
    });
</script>

<script>
    function showTextarea() {
        var status = document.getElementById('accounts').value;
        var container = document.getElementById('textarea-container');
        var textarea = container.getElementsByTagName('select')[0];
        if (status == 'Student') {
            container.style.display = 'block';
            textarea.setAttribute('required', true);
        } else {
            container.style.display = 'none';
            textarea.removeAttribute('required');
            textarea.value = '';
        }
    }
</script>