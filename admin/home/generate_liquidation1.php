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
                            <li class="breadcrumb-item ">Liquidation</li>
                        </ol>
                        <div class="container">
                            <center class="noprint"><h3 class="mt-3 mb-3" style="margin-top: 30px;">Generate Liquidation</h3></center>
                            <div class="col-xl-12 col-md-12 noprint">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <fieldset>
                                            <legend>Filter</legend>
                                            <form action="" id="filter" method="POST">
                                                <div class="row align-items-end">
                                                    <div class="form-group col-md-2">
                                                        <?php
                                                            $sql = "SELECT * FROM `activity` WHERE status = 'Active'";
                                                            $all_activity = mysqli_query($con,$sql);
                                                        ?>
                                                        <label for="" class="required">Activity</label>
                                                        <select name="activity_id" required class="form-control">
                                                            <option value="" selected disabled>Select Activity</option>
                                                            <?php
                                                                // use a while loop to fetch data
                                                                // from the $all_activity variable
                                                                // and individually display as an option
                                                                while ($activity = mysqli_fetch_array(
                                                                        $all_activity,MYSQLI_ASSOC)):;
                                                            ?>
                                                                <option value="<?php echo $activity["activity_id"];?>">
                                                                    <?php echo $activity["activity_title"];?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button class="btn btn-primary btn-flat btn-sm" name="submit-btn" id="submit-btn"><i class="fa fa-filter"></i> Filter</button>
                                                        <button class="btn btn-sm btn-flat btn-success" type="button" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
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
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <img src="<?php echo base_url ?>assets/files/images/system/ssg.png" class="img-circle" id="sys_logo" alt="System Logo">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12" style="display:grid; justify-items:center;">
                                        <h5 class="text-start" style="font-size:14px;"><b>SUMMARY LIQUIDATION REPORT</b></h5>
                                        <table>
                                            <tr>
                                                <th style="border:0px; font-size:14px">MONTH: <b style="border-bottom: 2px solid;"><?php echo $row['short_date_deleted'] ?>AUGUST</b></th>
                                                <th style="border:0px"></th>
                                                <th style="border:0px"></th>
                                            </tr>
                                            <tr style="background-color: white;">
                                                <th style="border:0px"></th>
                                                <th style="border:0px"></th>
                                                <th style="border:0px"></th>
                                            </tr>
                                            <tr style="background-color: white;">
                                                <th style="border:0px"></th>
                                                <th style="border:0px"></th>
                                                <th style="border:0px"></th>
                                            </tr>
                                            <tr>
                                                <th>SSG Balance</th>
                                                <th >PHP</th>
                                                <th><?php echo $row['short_date_deleted'] ?></th>
                                            </tr>
                                            <tr>
                                                <td>Alfreds Futterkiste</td>
                                                <td>Maria Anders</td>
                                                <td>Germany</td>
                                            </tr>
                                            <tr>
                                                <td>Centro comercial Moctezuma</td>
                                                <td>Francisco Chang</td>
                                                <td>Mexico</td>
                                            </tr>
                                            <tr>
                                                <td>Ernst Handel</td>
                                                <td>Roland Mendel</td>
                                                <td>Austria</td>
                                            </tr>
                                            <tr>
                                                <td>Island Trading</td>
                                                <td>Helen Bennett</td>
                                                <td>UK</td>
                                            </tr>
                                            <tr>
                                                <td>Laughing Bacchus Winecellars</td>
                                                <td>Yoshi Tannamuri</td>
                                                <td>Canada</td>
                                            </tr>
                                            <tr>
                                                <td>Magazzini Alimentari Riuniti</td>
                                                <td>Giovanni Rovelli</td>
                                                <td>Italy</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <?php if(isset($_POST['accounts'])){ ?>
                                        <table class="table text-center table-hover table-striped">
                                            <colgroup>
                                                <col width="10%">
                                                <col width="30%">
                                                <col width="30%">
                                                <col width="30%">
                                            </colgroup>
                                            <thead>
                                                <tr class="bg-danger text-light">
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Date Deleted</th>
                                                    <th>Deleted By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $qry = $con->query("SELECT *, DATE_FORMAT(date_deleted, '%m-%d-%Y %h:%i:%s %p') as short_date_deleted
                                                    FROM user INNER JOIN user_type ON user.user_type_id = user_type.user_type_id WHERE user_type.user_type_id = 7 AND user_status_id = 3
                                                    AND date(date_deleted) between '{$from}' and '{$to}' order by unix_timestamp(date_deleted) asc");
                                                    while($row = $qry->fetch_assoc()):
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['user_id'] ?></td>
                                                    <td class=""><p class="m-0"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?> <?php echo $row['suffix'] ?></p></td>
                                                    <td class=""><?php echo $row['short_date_deleted'] ?></td>
                                                    <td class=""><?php echo $row['deleted_by'] ?></td>
                                                </tr>
                                                <?php endwhile; ?>
                                                <?php if($qry->num_rows <= 0): ?>
                                                    <tr>
                                                        <th class="py-1 text-center" colspan="12">No Data.</th>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
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
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 75%;
    }

    td, th {
        border: 1px solid #dddddd;
        /* text-align: left; */
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>