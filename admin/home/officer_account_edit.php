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
                        $users = "SELECT * FROM user WHERE user_id='$id' ";
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
                            <li class="breadcrumb-item active">Update Account</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Personal Information</h4>
                                    </div>
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="">First Name</label>
                                                    <input type="text" value="<?=$user['fname'];?>" class="form-control" required>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Middle Name</label>
                                                    <input type="text" value="<?=$user['mname'];?>" class="form-control">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Last Name</label>
                                                    <input type="text" value="<?=$user['lname'];?>" class="form-control" required>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Suffix</label>
                                                    <input type="text" value="<?=$user['suff'];?>" class="form-control">
                                                </div>
                    
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Email</label>
                                                    <input type="email" value="<?=$user['email'];?>" class="form-control" required>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Role</label>
                                                    <input type="text" value="<?=$user['user_type'];?>" class="form-control" required>
                                                </div>
                                                
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Role</label>
                                                    <select name="role_as" required class="form-control">
                                                        <option value="">--Select Role--</option>
                                                        <option value="1" <?= $user['pos_name'] == '1' ? 'selected' :'' ?>>Admin</option>
                                                        <option value="7" <?= $user['user_type'] == '7' ? 'selected' :'' ?>>Vice President</option>
                                                        <option value="2" <?= $user['user_type'] == '2' ? 'selected' :'' ?>>Secretary</option>
                                                        <option value="3" <?= $user['user_type'] == '3' ? 'selected' :'' ?>>Treasurer</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="float-end">
                                                <a href="officer_account.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="update_officer" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                                            </div>
                                            <br><br>
                                        </div>
                                    </form>
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