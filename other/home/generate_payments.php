<!DOCTYPE html>
<html lang="en">
    <?php include('../includes/header.php'); ?>
    <?php
        $from = isset($_POST['from']) ? $_POST['from'] : date("Y-m-d",strtotime(date("Y-m-d"))); 
        $to = isset($_POST['to']) ? $_POST['to'] : date("Y-m-d",strtotime(date("Y-m-d"))); 
        function duration($dur = 0){
            if($dur == 0){
                return "00:00";
            }
            $hours = floor($dur / (60 * 60));
            $min = floor($dur / (60)) - ($hours*60);
            $dur = sprintf("%'.02d",$hours).":".sprintf("%'.02d",$min);
            return $dur;
        }
    ?>
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
                            <li class="breadcrumb-item ">Payments</li>
                        </ol>
                        <div class="container">
                            <center class="noprint"><h3 class="mt-3 mb-3" style="margin-top: 30px;">Generate Payments</h3></center>
                            <div class="col-xl-12 col-md-12 noprint">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <fieldset>
                                            <legend>Filter</legend>
                                            <form action="" id="filter" method="POST">
                                                <div class="row align-items-end">
                                                    <div class="form-group col-md-3">
                                                        <label for="payment_method" class="control-label">Payment method</label>
                                                        <select class="form-control" name="payment_method" id="payment_method" required>
                                                            <option value="" selected="true" disabled="disabled">Select Payment method</option>
                                                            <option value="Online">Online</option>    
                                                            <option value="Cash">Cash</option> 
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="from" class="control-label">Date From</label>
                                                        <input type="date" name="from" id="from" value="<?= $from ?>" class="form-control form-control-sm rounded-0">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="to" class="control-label">Date To</label>
                                                        <input type="date" name="to" id="to" value="<?= $to ?>" class="form-control form-control-sm rounded-0">
                                                    </div>
                                                    <div class="form-group col-md-4 mt-3">
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
                                        <h5 class="text-center" style="font-size:12px;">Student Payment <?php if(isset($_POST['payment_method'])){ if($_POST['payment_method'] == 'Online') { echo"(Online)"; } else{ echo"(Cash)"; } } ?></h5>
                                        <h5 class="text-center" style="font-size:12px;"><?php echo date("F d, Y", strtotime($from)). " - ".date("F d, Y", strtotime($to)); ?></h5>
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <img src="<?php echo base_url ?>assets/files/images/system/ssg.png" class="img-circle" id="sys_logo" alt="System Logo">
                                    </div>
                                </div>
                                <?php if(isset($_POST['payment_method'])){ ?>
                                    <?php if($_POST['payment_method'] == 'Online') { ?>
                                        <table class="table text-center table-hover table-striped">
                                            <!-- <colgroup>
                                                <col width="5%">
                                                <col width="20%">
                                                <col width="30%">
                                                <col width="20%">
                                                <col width="25%">
                                            </colgroup> -->
                                            <thead>
                                                <tr class="bg-danger text-light">
                                                    <th>No.</th>
                                                    <th>Student ID</th>
                                                    <th>Name</th>
                                                    <th>Platform</th>
                                                    <th>Reference Number</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $qry = $con->query("SELECT *, DATE_FORMAT(payment.date, '%m-%d-%Y %h:%i:%s %p') as short_date_created
                                                    FROM payment INNER JOIN user
                                                    ON 
                                                    payment.user_id = user.user_id
                                                    WHERE payment.platform != 'Cash'
                                                    AND date(date) between '{$from}' and '{$to}' order by unix_timestamp(date) desc");
                                                    while($row = $qry->fetch_assoc()):
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['payment_id'] ?></td>
                                                    <td class="text-center"><?php echo $row['student_id'] ?></td>
                                                    <td class=""><p class="m-0"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?> <?php echo $row['suffix'] ?></p></td>
                                                    <td class=""><p class="m-0"><?php echo $row['platform'] ?></p></td>
                                                    <td class="text-center"><?php echo $row['referencenumber'] ?></td>
                                                    <td class=""><?php echo $row['short_date_created'] ?></td>
                                                    <td class=""><p class="m-0"><?php echo $row['status'] ?></p></td>
                                                </tr>
                                                <?php endwhile; ?>
                                                <?php if($qry->num_rows <= 0): ?>
                                                    <tr>
                                                        <th class="py-1 text-center" colspan="12">No Data.</th>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    <?php } else{ ?>
                                        <table class="table text-center table-hover table-striped">
                                            <colgroup>
                                                <col width="5%">
                                                <col width="20%">
                                                <col width="30%">
                                                <col width="20%">
                                                <col width="25%">
                                            </colgroup>
                                            <thead>
                                                <tr class="bg-danger text-light">
                                                    <th>No.</th>
                                                    <th>Student ID</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $qry = $con->query("SELECT *, DATE_FORMAT(payment.date, '%m-%d-%Y %h:%i:%s %p') as short_date_created
                                                    FROM payment INNER JOIN user
                                                    ON 
                                                    payment.user_id = user.user_id
                                                    WHERE payment.platform = 'Cash'
                                                    AND date(payment.date) between '{$from}' and '{$to}' order by unix_timestamp(payment.date) desc");
                                                    while($row = $qry->fetch_assoc()):
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['payment_id'] ?></td>
                                                    <td class="text-center"><?php echo $row['student_id'] ?></td>
                                                    <td class=""><p class="m-0"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?> <?php echo $row['suffix'] ?></p></td>
                                                    <td class=""><p class="m-0">&#8369; <?php echo $row['amount'] ?></p></td>
                                                    <td class=""><?php echo $row['short_date_created'] ?></td>
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
                                <?php } ?>
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