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
                        $users = "SELECT * FROM user WHERE user_id='$id' AND user_type = 7 AND user_status IN (1,2) ";
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
                            <li class="breadcrumb-item active">Update Account</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Personal Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="<?=$user['user_id'];?>">
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">First Name</label>
                                                    <input required type="text" Placeholder="Enter First Name" name="fname" value="<?=$user['fname'];?>" class="form-control">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Middle Name</label>
                                                    <input type="text" Placeholder="Enter Middle Name" name="mname" value="<?=$user['mname'];?>" class="form-control">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Last Name</label>
                                                    <input required type="text" Placeholder="Enter Last Name" name="lname" value="<?=$user['lname'];?>" class="form-control">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <div class="form-group">
                                                        <label for="suffix">Suffix</label>
                                                        <select class="form-control" name="suffix">
                                                            <option value="" selected disabled>Select Suffix</option>
                                                            <option value="Jr" <?= $user['suffix'] == 'Jr' ? 'selected' :'' ?>>Jr</option>
                                                            <option value="Sr" <?= $user['suffix'] == 'Sr' ? 'selected' :'' ?>>Sr</option>
                                                            <option value="I" <?= $user['suffix'] == 'I' ? 'selected' :'' ?>>I</option>
                                                            <option value="II" <?= $user['suffix'] == 'II' ? 'selected' :'' ?>>II</option>
                                                            <option value="III" <?= $user['suffix'] == 'III' ? 'selected' :'' ?>>III</option>
                                                            <option value="IV" <?= $user['suffix'] == 'IV' ? 'selected' :'' ?>>IV</option>
                                                            <option value="V" <?= $user['suffix'] == 'V' ? 'selected' :'' ?>>V</option>
                                                            <option value="VI" <?= $user['suffix'] == 'VI' ? 'selected' :'' ?>>VI</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <div class="form-group">
                                                        <label for="suffix" class="required">Gender</label>
                                                        <select class="form-control" name="gender">
                                                            <option value="" selected disabled>Select Gender</option>
                                                            <option value="Male" <?= $user['gender'] == 'Male' ? 'selected' :'' ?>>Male</option>
                                                            <option value="Female" <?= $user['gender'] == 'Female' ? 'selected' :'' ?>>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                    
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Email</label>
                                                    <input required type="email" Placeholder="Enter Email" name="email" value="<?=$user['email'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Phone Number</label>
                                                    <input required type="text" name="phone" pattern="09[0-9]{9}" value="<?=$user['phone'];?>" maxlength="11" class="form-control" id="phone-input">
                                                    <div id="phone-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Status</label>
                                                    <select name="status" required class="form-control">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="1" <?= $user['user_status'] == '1' ? 'selected' :'' ?>>Active</option>
                                                        <option value="2" <?= $user['user_status'] == '2' ? 'selected' :'' ?>>In active</option>
                                                    </select>
                                                </div>
                                            </div>   
                                            <div class="float-end">
                                                <a href="parent_account.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="update_parent" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
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
                                <li class="breadcrumb-item ">Account</li>
                                <li class="breadcrumb-item active">Parent</li>
                                <li class="breadcrumb-item active">Update Account</li>
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
                                                <a href="parent_account.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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