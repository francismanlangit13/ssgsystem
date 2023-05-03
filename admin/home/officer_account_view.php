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
                        $users = "SELECT * FROM user INNER JOIN user_type ON user.user_type = user_type.user_type_id WHERE user_id='$id' ";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Account</li>
                            <li class="breadcrumb-item active">Officer</li>
                            <li class="breadcrumb-item active">View Account</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Personal Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="">First Name</label>
                                                <input type="text" value="<?=$user['fname'];?>" class="form-control" disabled>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Middle Name</label>
                                                <input type="text" value="<?=$user['mname'];?>" class="form-control" disabled>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Last Name</label>
                                                <input type="text" value="<?=$user['lname'];?>" class="form-control" disabled>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Suffix</label>
                                                <input type="text" value="<?=$user['suff'];?>" class="form-control" disabled>
                                            </div>
                
                                            <div class="col-md-6 mb-3">
                                                <label for="">Email</label>
                                                <input type="email" value="<?=$user['email'];?>" class="form-control" disabled>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Position</label>
                                                <input type="text" value="<?=$user['user_type'];?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="float-end">
                                            <a href="officer_account.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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
                    <h4>No Record Found!</h4>
                <?php } } ?>
                <?php include ('../includes/footer.php'); ?>
            </div>
        </div>
        <?php include ('../includes/bottom.php'); ?>
    </body>
</html>