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
                                    <h5 class="text-center" style="font-size:16px;"><b>LIQUIDATION REPORT</b></h5>
                                    <h5 class="text-center" style="font-size:16px;">
                                        <b>S.Y </b><b style="border-bottom: 2px solid;"><?php $two_months_ago = date('Y', strtotime('-12 months')); echo $two_months_ago; ?>-
                                            <?php
                                                if(isset($_POST['id'])){
                                                    $id = $_POST['id'];
                                                    $total_balance = "SELECT DATE_FORMAT(date, '%Y') as short_year FROM ssg_expenses WHERE activity_id='$id'";
                                                    $total_balance_query_run = mysqli_query($con, $total_balance);
                                                    if(mysqli_num_rows($total_balance_query_run) > 0){
                                                        $balance_result = mysqli_fetch_assoc($total_balance_query_run);
                                                        $total = $balance_result["short_year"];
                                                        echo $total;
                                                    }
                                                }
                                            ?>
                                        </b>
                                    </h5>
                                </div>
                                <div class="col-2 d-flex justify-content-center align-items-center">
                                    <img src="<?php echo base_url ?>assets/files/images/system/ssg.png" class="img-circle" id="sys_logo" alt="System Logo">
                                </div>
                            </div>
                            <table id="ready" class="table-bordered" style="text-align:center; width:100%">
                                <thead>
                                    <tr style="height:20px; border:0px;">
                                        <th style="border:0px;">
                                            <h5 class="text-start" style="font-size:16px; margin-left:1rem;">
                                                <b>MONTH: </b><b style="border-bottom: 2px solid;">
                                                    <?php
                                                        if(isset($_POST['id'])){
                                                            $id = $_POST['id'];
                                                            $total_balance = "SELECT DATE_FORMAT(date, '%M %Y') as short_month FROM ssg_expenses WHERE activity_id='$id'";
                                                            $total_balance_query_run = mysqli_query($con, $total_balance);
                                                            if(mysqli_num_rows($total_balance_query_run) > 0){
                                                                $balance_result = mysqli_fetch_assoc($total_balance_query_run);
                                                                $total = $balance_result["short_month"];
                                                                echo $total;
                                                            }
                                                        }
                                                    ?>
                                                </b>
                                            </h5>
                                        </th>
                                        <th style="border:0px;"></th>
                                        <th style="border:0px;"></th>
                                    </tr>
                                    <tr style="height:20px; border:0px;">
                                        <th style="border:0px;"></th>
                                        <th style="border:0px;"></th>
                                        <th style="border:0px;"></th>
                                    </tr>
                                    <tr>
                                        <th style="width:1950px; text-align:left;">SSG BALANCE</th>
                                        <th style="width: 80px;">PHP</th>
                                        <th style="width: 80px; text-align: right;">
                                            <?php
                                                if (isset($_POST['id'])) {
                                                    $id = $_POST['id'];
                                                    $total_balance = "SELECT SUM(payment.amount) AS total 
                                                    FROM payment 
                                                    WHERE payment.status IN ('Approved', 'Partial') AND payment.date BETWEEN 
                                                    (SELECT DATE_SUB(DATE_ADD(LAST_DAY(DATE_SUB(MAX(date), INTERVAL 2 MONTH)), INTERVAL 1 DAY), INTERVAL 1 MONTH) 
                                                    FROM ssg_expenses 
                                                    WHERE activity_id = ? 
                                                    ORDER BY date DESC 
                                                    LIMIT 1) 
                                                    AND 
                                                    (SELECT DATE_ADD(LAST_DAY(DATE_SUB(MAX(date), INTERVAL 1 MONTH)), INTERVAL 1 DAY) 
                                                    FROM ssg_expenses 
                                                    WHERE activity_id = ? 
                                                    ORDER BY date DESC 
                                                    LIMIT 1)";
                                                    $stmt = $con->prepare($total_balance);
                                                    $stmt->bind_param('ss', $id, $id);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    if ($result->num_rows > 0) {
                                                        $balance_result = $result->fetch_assoc();
                                                        $total = $balance_result["total"];
                                                        if ($total !== null && $total !== "") {
                                                            echo $total;
                                                        } else {
                                                            echo "0";
                                                        }
                                                    }
                                                    else {
                                                        echo "No balance found.";
                                                    }
                                                    $stmt->close();
                                                }
                                            ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="width: 1950px; text-align: left;">Earnings Month of 
                                            (<?php
                                                if(isset($_POST['id'])){
                                                    $id = $_POST['id'];
                                                    $total_balance = "SELECT DATE_FORMAT(date, '%M') as short_month FROM ssg_expenses WHERE activity_id='$id'";
                                                    $total_balance_query_run = mysqli_query($con, $total_balance);
                                                    if(mysqli_num_rows($total_balance_query_run) > 0){
                                                        $balance_result = mysqli_fetch_assoc($total_balance_query_run);
                                                        $month_name = $balance_result["short_month"];
                                                        $last_month_name = date('F', strtotime("-1 month", strtotime($month_name)));
                                                        echo $last_month_name;
                                                    }
                                                }
                                            ?>)
                                        </th>
                                        <th style="width: 80px;"></th>
                                        <th style="width: 80px; text-align: right;">
                                            <?php
                                                if (isset($_POST['id'])) {
                                                    $id = $_POST['id'];
                                                    $total_balance = "SELECT SUM(payment.amount) AS total 
                                                    FROM payment 
                                                    WHERE payment.status IN ('Approved', 'Partial') AND payment.date BETWEEN 
                                                    (SELECT DATE_SUB(MAX(date), INTERVAL 1 MONTH) 
                                                    FROM ssg_expenses 
                                                    WHERE activity_id = ?) 
                                                    AND 
                                                    (SELECT MAX(date) 
                                                    FROM ssg_expenses 
                                                    WHERE activity_id = ?)";
                                                    $stmt = $con->prepare($total_balance);
                                                    $stmt->bind_param('ss', $id, $id);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    if ($result->num_rows > 0) {
                                                        $balance_result = $result->fetch_assoc();
                                                        $total = $balance_result["total"];
                                                        if (!empty($total)) {
                                                            echo $total;
                                                        }
                                                        else {
                                                            echo "0";
                                                        }
                                                    }
                                                    else {
                                                        echo "No balance found.";
                                                    }
                                                    $stmt->close();
                                                }
                                            ?>
                                        </th>
                                    </tr>
                                    <tbody style="text-align:left;">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="1" style="text-align:right; width:1950px">Total REVENUE</th>
                                            <th></th>
                                            <th style="text-align: right;">
                                                <?php
                                                    if (isset($_POST['id'])) {
                                                        $id = $_POST['id'];
                                                        $total_balance = "SELECT SUM(payment.amount) AS total
                                                        FROM payment
                                                        WHERE payment.date >= 
                                                        (SELECT DATE_SUB(MAX(date), INTERVAL 2 MONTH)
                                                        FROM ssg_expenses 
                                                        WHERE activity_id = ?)
                                                        AND payment.date <= 
                                                        (SELECT DATE_ADD(MAX(date), INTERVAL 0 DAY)
                                                        FROM ssg_expenses 
                                                        WHERE activity_id = ?)";
                                                        $stmt = $con->prepare($total_balance);
                                                        $stmt->bind_param('ss', $id, $id);
                                                        $stmt->execute();
                                                        $result = $stmt->get_result();
                                                        if ($result->num_rows > 0) {
                                                            $balance_result = $result->fetch_assoc();
                                                            $total = $balance_result["total"];
                                                        
                                                            if ($total !== null && $total !== "") {
                                                                echo $total;
                                                            }
                                                            else {
                                                                echo "0";
                                                            }
                                                        }
                                                        else {
                                                            echo "No balance found.";
                                                        }
                                                        $stmt->close();
                                                    }
                                                ?>
                                            </th>
                                        </tr>
                                        <tr style="height:20px; border:0px;">
                                            <th style="width: 80px; border:0px;"></th>
                                        </tr>
                                        <tr>
                                            <th style="width:500px; text-align:left;">Total Expense (As of this month)</th>
                                            <th style="width: 80px;"></th>
                                            <th style="width: 500px; text-align:right;">
                                                <?php
                                                    $total_balance = "SELECT SUM(`amount`) AS total FROM ssg_expenses WHERE ssg_expenses.activity_id='$id'";
                                                    $total_balance_query_run = mysqli_query($con, $total_balance);
                                                    if(mysqli_num_rows($total_balance_query_run) > 0){
                                                        $balance_result = mysqli_fetch_assoc($total_balance_query_run);
                                                        $total = $balance_result["total"];
                                                        echo $total;
                                                    }
                                                ?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="width: 500px; text-align: left;">Balance Budget</th>
                                            <th style="width: 80px;"></th>
                                            <th style="width: 500px; text-align:right;">
                                                <?php
                                                    // get the total revenue
                                                    if(isset($_POST['id'])){
                                                        $id = $_POST['id'];
                                                        $total_balance = "SELECT SUM(payment.amount) AS total
                                                        FROM payment
                                                        WHERE payment.date >= 
                                                        (SELECT DATE_SUB(MAX(date), INTERVAL 2 MONTH)
                                                        FROM ssg_expenses 
                                                        WHERE activity_id = '$id')
                                                        AND payment.date <= 
                                                        (SELECT DATE_ADD(MAX(date), INTERVAL 0 DAY)
                                                        FROM ssg_expenses 
                                                        WHERE activity_id = '$id')";
                                                        $total_balance_query_run = mysqli_query($con, $total_balance);
                                                        if(mysqli_num_rows($total_balance_query_run) > 0){
                                                            $balance_result = mysqli_fetch_assoc($total_balance_query_run);
                                                            $total = $balance_result["total"];
                                                        }
                                                        // get the total expenses for the specific activity
                                                        $total_expenses_balance = "SELECT SUM(`amount`) AS total FROM ssg_expenses WHERE ssg_expenses.activity_id='$id'";
                                                        $total_expenses_balance_query_run = mysqli_query($con, $total_expenses_balance);
                                                        if(mysqli_num_rows($total_expenses_balance_query_run) > 0){
                                                            $expenses_balance_result = mysqli_fetch_assoc($total_expenses_balance_query_run);
                                                            $total_expenses = $expenses_balance_result["total"];
                                                        }

                                                        // subtract expenses from fines and display the remaining balance
                                                        $remaining_balance = $total - $total_expenses;
                                                        echo $remaining_balance;
                                                    }
                                                ?>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <br>
                            <h5 class="text-center" style="font-size:16px;"><b>EXPENSES REPORT</b></h5>
                            <table id="ready" class="table-bordered" style="text-align:center; width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 300px;">Date</th>
                                        <th style="width: 500px;">Type</th>
                                        <th style="width: 500px;">Purpose</th>
                                        <th style="width: 500px;">OR number</th>
                                        <th style="width: 80px;">PHP</th>
                                        <th style="width: 500px;">Amount</th>
                                    </tr>
                                    <tbody>
                                        <?php
                                            if(isset($_POST['id'])){
                                                $id = $_POST['id'];
                                                $users = "SELECT *, DATE_FORMAT(ssg_expenses.date, '%m-%d-%Y') as short_date_created, DATE_FORMAT(ssg_expenses.date, '%Y') as short_year
                                                FROM ssg_expenses INNER JOIN user
                                                ON 
                                                ssg_expenses.user_id = user.user_id
                                                INNER JOIN activity
                                                ON
                                                activity.activity_id = ssg_expenses.activity_id WHERE ssg_expenses.activity_id='$id'";
                                                $users_run = mysqli_query($con, $users);
                                                if(mysqli_num_rows($users_run) > 0){
                                                    foreach($users_run as $row){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row['short_date_created'] ?></td>
                                            <td class="text-center"><?php echo $row['type'] ?></td>
                                            <td class="text-center"><?php echo $row['purpose'] ?></td>
                                            <td class=""><p class="m-0"><?php echo $row['or_number'] ?></p></td>
                                            <td></td>
                                            <td class=""><?php echo $row['amount'] ?></td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                            else{
                                        ?>
                                            <h2 class="text-center">No Data.</h2>
                                        <?php } } ?>
                                    </tbody>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="text-center">***NOTHING FOLLOWS***</td>
                                    </tr>
                                    <tr>
                                        <th colspan="5" style="text-align:right;">TOTAL</th>
                                        <th>
                                            <?php
                                                $total_balance = "SELECT SUM(`amount`) AS total FROM ssg_expenses WHERE ssg_expenses.activity_id='$id'";
                                                $total_balance_query_run = mysqli_query($con, $total_balance);
                                                if(mysqli_num_rows($total_balance_query_run) > 0){
                                                    $balance_result = mysqli_fetch_assoc($total_balance_query_run);
                                                    $total = $balance_result["total"];
                                                    echo $total;
                                                }
                                            ?>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table><br>
                            <table class="" style="text-align:left; width: 1243px; height: 500px;">        
                                <tbody>
                                    <tr>
                                        <td>Prapared by:<br><br>
                                        <?php $query = "SELECT * FROM user WHERE user_type_id = 5 AND user_status_id = 1 ORDER BY date_added DESC LIMIT 1";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){ ?>
                                                    <h5> <b style="border-bottom: 2px solid;"><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></b><br>
                                        <?php } } else{ echo 'error!'; } ?>
                                            SSG Treasurer</h3>
                                        </td>
                                        <td>Corrected by:<br><br>
                                        <?php $query = "SELECT * FROM user WHERE user_type_id = 4 AND user_status_id = 1 ORDER BY date_added DESC LIMIT 1";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){ ?>
                                                    <h5> <b style="border-bottom: 2px solid;"><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></b><br>
                                        <?php } } else{ echo 'error!'; } ?>
                                            SSG Secretary</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Attested by:<br><br>
                                        <?php $query = "SELECT * FROM user WHERE user_type_id = 2 AND user_status_id = 1 ORDER BY date_added DESC LIMIT 1";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){ ?>
                                                    <h5> <b style="border-bottom: 2px solid;"><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></b><br>
                                        <?php } } else{ echo 'error!'; } ?>
                                            SSG President</h3>
                                        </td>
                                        <td>Noted by:<br><br>
                                        <?php $query = "SELECT * FROM user WHERE user_type_id = 1 AND user_status_id = 1 ORDER BY date_added DESC LIMIT 1";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){ ?>
                                            <h5> <b style="border-bottom: 2px solid;"><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></b><br>
                                        <?php } } else{ echo 'error!'; } ?>
                                            SSG Adviser</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Approved:<br><br>
                                            <h5><b style="border-bottom: 2px solid;">MRS. ZENAIDA L. PRESTOSA</b><br>School Principal</h3>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

<script>
    function printReport() {
        // Open the generate_tresurer_report.php page in a new window
        var reportWindow = window.open('generate_tresurer_report.php?id=<?php echo $row['activity_id']?>', '_blank');

        // Wait for the new window to load, then trigger the print function
        reportWindow.onload = function() {
            reportWindow.print();
        }
    }
</script>

<script>
    window.onload = function() {
        window.print();
    }

    window.onafterprint = function() {
        window.close();
    }
</script>