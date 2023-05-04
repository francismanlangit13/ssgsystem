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
                        $users = "SELECT * FROM announcement WHERE announcement.status IN ('Active','In active') AND announcement_id='$id'";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Announcement</li>
                            <li class="breadcrumb-item active">Update Announcement</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Announcement Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="<?=$user['announcement_id'];?>">
                                                <div class="col-md-8 mb-3">
                                                    <label for="" class="required">Title</label>
                                                    <input required type="text" Placeholder="Enter Announcement Name" name="title" value="<?= $user['announcement_title']; ?>" class="form-control">
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <?php
                                                        $sql = "SELECT * FROM `activity` WHERE status = 'Active'";
                                                        $all_activity = mysqli_query($con, $sql);
                                                    ?>
                                                    <label for="" class="required">Activity</label>
                                                    <select name="activity_id" required class="form-control">
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
                                                    <label for="" class="required">Description</label>
                                                    <textarea required type="text" Placeholder="Enter Description" placeholder="Enter Description" name="body" class="form-control"><?= $user['announcement_body']; ?></textarea>       
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <?php
                                                        // Convert the formatted date to the desired format
                                                        $formatted_date_start = date('Y-m-d\TH:i', strtotime($user['date_start']));
                                                    ?>
                                                    <label for="" class="required">Date Started</label>
                                                    <input  required type="datetime-local" name="date_start" value="<?= $formatted_date_start; ?>" id="txtDate" class="form-control">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <?php
                                                        // Convert the formatted date to the desired format
                                                        $formatted_date_end = date('Y-m-d\TH:i', strtotime($user['date_end']));
                                                    ?>
                                                    <label for="" class="required">Date Ended</label>
                                                    <input required type="datetime-local" name="date_end" value="<?= $formatted_date_end; ?>" id="txtDate" class="form-control">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Status</label>
                                                    <select name="status" required class="form-control">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="Active" <?= $user['status'] == 'Active' ? 'selected' :'' ?>>Active</option>
                                                        <option value="In active" <?= $user['status'] == 'In active' ? 'selected' :'' ?>>In active</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="float-end">
                                                <a href="announcement" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="update_announcement" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                                            </div>
                                        </form>
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
                                <li class="breadcrumb-item ">Announcement</li>
                                <li class="breadcrumb-item active">Update Announcement</li>
                            </ol>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Announcement Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4>No Record Found!</h4>
                                            <div class="float-end">
                                                <a href="announcement" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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