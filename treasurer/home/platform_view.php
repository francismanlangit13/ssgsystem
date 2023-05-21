<!DOCTYPE html>
<html lang="en">
    <?php include('../includes/header.php'); ?>
    <body class="sb-nav-fixed">
        <?php include ('../includes/navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include ('../includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $users = "SELECT
                            *, DATE_FORMAT(payment_platform.date, '%m-%d-%Y %h:%i:%s %p') as short_date_created, payment_platform.photo as picture
                            FROM
                            payment_platform
                            INNER JOIN
                            `user`
                            ON 
                            payment_platform.`user_id` = `user`.user_id
                            WHERE payment_platform.status != 'Archive' AND platform_id = '$id'
                        ";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Payment Platform</li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Payment Platform Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="">Name</label>
                                                <input type="text" value="<?=$user['name'];?>" class="form-control" disabled>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Account Number</label>
                                                <input type="text" value="<?=$user['account_number'];?>" class="form-control" disabled>
                                            </div>

                                            <div class="col-md-6 text-center">
                                                <br>
                                                <h5>Online platform photo</h5>
                                                <img class="mt-2" id="frame1" src ="
                                                <?php
                                                    if(isset($user['picture'])){
                                                        if(!empty($user['picture'])) {
                                                            echo base_url . 'assets/files/images/platform/' . $user['picture'];
                                                    } else { echo base_url . 'assets/files/images/system/no-image.png'; } }
                                                ?>" alt="Receipt Picture" width="240px" height="180px"/>
                                                <br><br>
                                                <?php
                                                    if(isset($user['picture'])){
                                                        if(!empty($user['picture'])) { ?>
                                                        <a class="btn btn-secondary btn-icon-split" href="<?php echo base_url ?>assets/files/images/platform/<?=$user['picture']?>" download><i class="fa fa-download"></i> Download</a>
                                                <?php } else { } } ?>
                                                <br>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Status</label>
                                                <input type="text" value="<?=$user['status'];?>" class="form-control" disabled>
                                            </div>

                                        </div>
                                        <div class="float-end">
                                            <a href="platform.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php
                        }
                    }
                    else{
                ?>
                    <main>
                        <div class="container-fluid px-4">
                            <ol class="breadcrumb mb-4 mt-3">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item ">Payment Platform</li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Payment Platform Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4>No Record Found!</h4>
                                            <div class="float-end">
                                                <a href="platform.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                <?php } } ?>
                <?php include ('../includes/footer.php'); ?>
            </div>
        </div>
        <?php include ('../includes/bottom.php'); ?>
    </body>
</html>