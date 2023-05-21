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
                        $users = "SELECT * FROM ssg_expenses WHERE expense_id='$id'";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Expenses</li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Expenses Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-12 mb-3">
                                                <?php
                                                    $sql = "SELECT * FROM `activity` WHERE status = 'Active'";
                                                    $all_activity = mysqli_query($con, $sql);
                                                ?>
                                                <label for="">Activity</label>
                                                <select name="activity_id" disabled class="form-control">
                                                    <option value="" selected disabled>Select Activity</option>
                                                    <?php while ($activity = mysqli_fetch_array($all_activity, MYSQLI_ASSOC)) {
                                                        $selected = ($activity['activity_id'] == $user['activity_id']) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?php echo $activity['activity_id']; ?>" <?= $selected; ?>>
                                                            <?php echo $activity['activity_title']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="">Type</label>
                                                <input disabled type="text" value="<?= $user['type']; ?>" class="form-control">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="">Purpose</label>
                                                <textarea disabled type="text" class="form-control"><?= $user['purpose']; ?></textarea>       
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">OR Number</label>
                                                <input disabled type="text" value="<?= $user['or_number']; ?>" class="form-control">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Amount</label>
                                                <input disabled type="text" value="₱ <?= $user['amount']; ?>" class="form-control">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <?php
                                                    // Convert the formatted date to the desired format
                                                    $formatted_date_start = date('Y-m-d\TH:i', strtotime($user['date']));
                                                ?>
                                                <label for="">Date and Time</label>
                                                <input disabled type="datetime-local" value="<?= $formatted_date_start; ?>" id="txtDate" class="form-control">
                                            </div>

                                            <div class="col-md-6 text-center">
                                                <br>
                                                <h5>Bill receipt photo</h5>
                                                <img class="mt-2" id="frame1" src ="
                                                <?php
                                                    if(isset($user['photo'])){
                                                        if(!empty($user['photo'])) {
                                                            echo base_url . 'assets/files/images/expenses/' . $user['photo'];
                                                    } else { echo base_url . 'assets/files/images/system/no-image.png'; } }
                                                ?>" alt="Receipt Picture" width="240px" height="180px"/>
                                                <br><br>
                                                <?php
                                                    if(isset($user['photo'])){
                                                        if(!empty($user['photo'])) { ?>
                                                        <a class="btn btn-secondary btn-icon-split" href="<?php echo base_url ?>assets/files/images/expenses/<?=$user['photo']?>" download><i class="fa fa-download"></i> Download</a>
                                                <?php } else { } } ?>
                                                <br>
                                            </div>

                                        </div>
                                        <div class="float-end">
                                            <a href="expense" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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
                                <li class="breadcrumb-item ">Expenses</li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Expenses Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4>No Record Found!</h4>
                                            <div class="float-end">
                                                <a href="expense" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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