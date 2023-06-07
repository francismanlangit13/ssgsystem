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
                        $users = "SELECT * FROM user INNER JOIN user_status ON user.user_status_id = user_status.user_status_id WHERE user_id='$id' AND user_type_id = 7 AND user_status.user_status_id IN (1,2) ";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Account</li>
                            <li class="breadcrumb-item active">Parent</li>
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
                                                <input disabled type="text" value="<?=$user['fname'];?>" class="form-control">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Middle Name</label>
                                                <input disabled type="text" value="<?=$user['mname'];?>" class="form-control">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Last Name</label>
                                                <input disabled type="text" value="<?=$user['lname'];?>" class="form-control">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Suffix</label>
                                                <input disabled type="text" value="<?=$user['suffix'];?>" class="form-control">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Gender</label>
                                                <input disabled type="text" value="<?=$user['gender'];?>" class="form-control">
                                            </div>
                
                                            <div class="col-md-3 mb-3">
                                                <label for="">Email</label>
                                                <input disabled type="email" value="<?=$user['email'];?>" class="form-control">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Phone Number</label>
                                                <input disabled type="text" value="<?=$user['phone'];?>" class="form-control">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="">Status</label>
                                                <input disabled type="text" value="<?=$user['user_status'];?>" class="form-control">
                                            </div>
                                        </div>   
                                        <div class="float-end">
                                            <a href="parent_account" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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
                                <li class="breadcrumb-item ">Account</li>
                                <li class="breadcrumb-item active">Parent</li>
                                <li class="breadcrumb-item active">View Account</li>
                            </ol>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Personal Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4>No Record Found!</h4>
                                            <div class="float-end">
                                                <a href="parent_account" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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