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
                            <li class="breadcrumb-item ">Announcement</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Announcements
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date Start</th>
                                            <th>Date End</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date Start</th>
                                            <th>Date End</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = "SELECT
                                            *
                                            FROM
                                            `announcement`
                                            WHERE status IN ('Active','In active')";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row['announcement_id']; ?></td>
                                            <td><?= $row['announcement_title']; ?></td>
                                            <td><?= $row['announcement_body']; ?></td>
                                            <td><?= $row['date_start']; ?></td>
                                            <td><?= $row['date_end']; ?></td>
                                            <td><?= $row['status']; ?></td>
                                            <td>
                                                <div class="col-md-12">
                                                    <a href="announcement_view?id=<?=$row['announcement_id'];?>" class="btn btn-info btn-icon-split"> 
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