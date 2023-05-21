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
                            <li class="breadcrumb-item ">Your Penalty</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Your Penalty
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Penalty Reason</th>
                                            <th>Penalty</th>
                                            <th>Date Penalty</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Penalty Reason</th>
                                            <th>Penalty</th>
                                            <th>Date Penalty</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $person =  $_SESSION['auth_user']['user_id'];
                                            $query = "SELECT
                                            *, DATE_FORMAT(penalties.penalty_date, '%m-%d-%Y') as short_date_created
                                            FROM
                                            user
                                            INNER JOIN
                                            penalties
                                            ON
                                            penalties.user_id = user.user_id
                                            WHERE penalties.user_id = '$person'";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row['penalty_id']; ?></td>
                                            <td><?= $row['penalty_reason']; ?></td>
                                            <td><?= $row['penalty_fee']; ?></td>
                                            <td><?= $row['short_date_created']; ?></td>
                                        </tr>
                                        <?php } }
                                            else{
                                        ?>
                                            <tr>
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