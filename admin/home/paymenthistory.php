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
                            <li class="breadcrumb-item ">Via Cash</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Payment History of Students
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Year Level</th>
                                            <th>Amount Paid</th>
                                            <th>Date Paid</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Year Level</th>
                                            <th>Amount Paid</th>
                                            <th>Date Paid</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = "SELECT
                                                *, DATE_FORMAT(payment.date, '%m-%d-%Y') as short_date_created
                                                FROM
                                                payment
                                                INNER JOIN
                                                `user`
                                                ON 
                                                payment.`user_id` = `user`.user_id
                                                WHERE payment.platform = 'Cash'
                                            ";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row['payment_id']; ?></td>
                                            <td><?= $row['student_id']; ?></td>
                                            <td><?= $row['fname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                                            <td><?= $row['level']; ?></td>
                                            <td>₱ <?= $row['amount']; ?></td>
                                            <td><?= $row['short_date_created']; ?></td>
                                            <td>
                                                <div class="col-md-3 text-center">
                                                    <a href="paymenthistory_view?id=<?=$row['payment_id'];?>" class="btn btn-info btn-icon-split"> 
                                                        <span class="icon text-white-50"></span>
                                                        <span class="text ml-2 mr-2">View</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } }
                                            else{
                                        ?>
                                            <tr>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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