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
                        $users = "SELECT * FROM ssg_expenses INNER JOIN user ON user.user_id = ssg_expenses.user_id WHERE expense_id='$id'";
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
                                                <label for="">Name</label>
                                                <input disabled type="text" value="<?= $user['fname']; ?> <?= $user['lname']; ?> <?= $user['suffix']; ?>" class="form-control">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="">Purpose</label>
                                                <textarea disabled type="text" class="form-control"><?= $user['purpose']; ?></textarea>       
                                            </div>
                                            
                                            <div class="col-md-12 mb-3">
                                                <label for="">Ammount</label>
                                                <input disabled type="text" value="₱ <?= $user['amount']; ?>" class="form-control">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <?php
                                                    // Convert the formatted date to the desired format
                                                    $formatted_date_start = date('Y-m-d\TH:i', strtotime($user['date_start']));
                                                ?>
                                                <label for="">Date Started</label>
                                                <input disabled type="datetime-local" value="<?= $formatted_date_start; ?>" id="txtDate" class="form-control">
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