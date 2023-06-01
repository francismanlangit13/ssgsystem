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
                        $users = "SELECT * FROM user WHERE user_id='$id' AND user_type_id = 6 AND user_status_id IN (1,2)";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Account</li>
                            <li class="breadcrumb-item active">Student</li>
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
                                                <input type="hidden" name="user_id" value="<?=$user['user_id'];?>">
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">First Name</label>
                                                    <input type="text" name="fname" value="<?=$user['fname'];?>" class="form-control" required>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Middle Name</label>
                                                    <input type="text" name="mname" value="<?=$user['mname'];?>" class="form-control">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Last Name</label>
                                                    <input type="text" name="lname" value="<?=$user['lname'];?>" class="form-control" required>
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
                                                    <input type="email" name="email" value="<?=$user['email'];?>" class="form-control" required>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Phone Number</label>
                                                    <input required type="text" name="phone" value="<?=$user['phone'];?>" pattern="09[0-9]{9}" maxlength="11" class="form-control" id="phone-input">
                                                    <div id="phone-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Student ID</label>
                                                    <input required type="text" name="student_id" value="<?=$user['student_id'];?>" class="form-control">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Year Level</label>
                                                    <select name="level" required class="form-control">
                                                        <option value="" selected disabled>Select Year Level</option>
                                                        <option value="Grade 7" <?= $user['level'] == 'Grade 7' ? 'selected' :'' ?>>Grade 7</option>
                                                        <option value="Grade 8" <?= $user['level'] == 'Grade 8' ? 'selected' :'' ?>>Grade 8</option>
                                                        <option value="Grade 9" <?= $user['level'] == 'Grade 9' ? 'selected' :'' ?>>Grade 9</option>
                                                        <option value="Grade 10" <?= $user['level'] == 'Grade 10' ? 'selected' :'' ?>>Grade 10</option>
                                                        <option value="Grade 11" <?= $user['level'] == 'Grade 11' ? 'selected' :'' ?>>Grade 11</option>
                                                        <option value="Grade 12" <?= $user['level'] == 'Grade 12' ? 'selected' :'' ?>>Grade 12</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Status</label>
                                                    <select name="status" required class="form-control">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="1" <?= $user['user_status_id'] == '1' ? 'selected' :'' ?>>Active</option>
                                                        <option value="2" <?= $user['user_status_id'] == '2' ? 'selected' :'' ?>>In active</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="float-end">
                                                <a href="student_account" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="update_student" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
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
                    <main>
                        <div class="container-fluid px-4">
                            <ol class="breadcrumb mb-4 mt-3">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item ">Account</li>
                                <li class="breadcrumb-item active">Student</li>
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
                                                <a href="student_account" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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