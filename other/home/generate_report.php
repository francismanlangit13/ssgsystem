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
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Payment History</li>
                            <li class="breadcrumb-item ">Online Payment</li>
                        </ol>
                        <div class="container">
                            <center><h2>Generate Report List</h2></center>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-3 mb-3">
                                    <a href="report.php" class="btn btn-primary" role="button">Generate Student Details</a>
                                </div>
                                <div class="col-md-3 mb-3 mr-3">
                                    <a href="generate_studentpayment.php" class="btn btn-info">Generate Student Payment Report</a>
                                </div>
                                <div class="col-md-3 mb-3 ml-3">
                                    <button type="button" class="btn btn-danger">Generate Archive Student Info</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include ('../includes/footer.php'); ?>
            </div>
        </div>
        <?php include ('../includes/bottom.php'); ?>
    </body>
</html>