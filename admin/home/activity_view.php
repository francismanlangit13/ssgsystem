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
                        $users = "SELECT * FROM activity WHERE activity_id='$id' ";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Activity</li>
                            <li class="breadcrumb-item active">View Activity</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Activity Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="user_id" value="<?=$user['activity_id'];?>">
                                            <div class="col-md-12 mb-3">
                                                <label for="">Title</label>
                                                <input disabled type="text" Placeholder="Enter Activity Name" name="title" value="<?= $user['activity_title']; ?>" class="form-control">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Status</label>
                                                <select name="status" disabled class="form-control">
                                                    <option value="" selected disabled>Select Status</option>
                                                    <option value="Active" <?= $user['status'] == 'Active' ? 'selected' :'' ?>>Active</option>
                                                    <option value="In active" <?= $user['status'] == 'In active' ? 'selected' :'' ?>>In Active</option>
                                                </select>
                                            </div>
                                        </div>   
                                        <div class="float-end">
                                            <a href="activity" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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
                                <li class="breadcrumb-item ">Activity</li>
                                <li class="breadcrumb-item active">View Activity</li>
                            </ol>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Activity Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4>No Record Found!</h4>
                                            <div class="float-end">
                                                <a href="activity" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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