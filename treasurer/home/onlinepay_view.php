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
                            *, DATE_FORMAT(payment.date, '%m-%d-%Y %h:%i:%s %p') as short_date_created
                            FROM
                            payment
                            INNER JOIN
                            `user`
                            ON 
                            payment.`user_id` = `user`.user_id
                            WHERE payment.payment_id = '$id'
                        ";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Pending Online Payment</li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Payment Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="text" name="user_id" value="<?=$user['user_id'];?>" class="form-control" hidden>
                                                <input type="text" name="id" value="<?=$id?>" class="form-control" hidden>
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
                                                    <input type="text" value="<?=$user['suffix'];?>" class="form-control" disabled>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Student ID</label>
                                                    <input type="text" value="<?=$user['student_id'];?>" class="form-control" disabled>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Year Level</label>
                                                    <input type="text" value="<?=$user['level'];?>" class="form-control" disabled>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Date and Time Paid</label>
                                                    <input type="text" value="<?=$user['short_date_created'];?>" class="form-control" disabled>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Platform</label>
                                                    <input type="text" value="<?=$user['platform'];?>" class="form-control" disabled>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="">Reference Number</label>
                                                    <input type="text" value="<?=$user['referencenumber'];?>" class="form-control" disabled>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="" class="required">Status</label>
                                                    <select name="status" required class="form-control" onchange="showTextarea()">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="Approved">Approved</option>
                                                        <option value="Partial">Partial</option>
                                                        <option value="Deny">Deny</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-4 mb-3" id="textarea-container" style="display:none">
                                                    <label for="" class="required">Amount</label>
                                                    <input type="number" value="" name="amount" class="form-control">
                                                </div>

                                                <div class="col-md-6 text-center">
                                                    <br>
                                                    <h5>Online receipt photo</h5>
                                                    <img class="mt-2" id="frame1" src ="
                                                    <?php
                                                        if(isset($user['picture'])){
                                                            if(!empty($user['picture'])) {
                                                                echo base_url . 'assets/files/images/onlinepayment/' . $user['picture'];
                                                        } else { echo base_url . 'assets/files/images/system/no-image.png'; } }
                                                    ?>" alt="Receipt Picture" width="240px" height="180px"/>
                                                    <br><br>
                                                    <?php
                                                        if(isset($user['picture'])){
                                                            if(!empty($user['picture'])) { ?>
                                                            <a class="btn btn-secondary btn-icon-split" href="<?php echo base_url ?>assets/files/images/onlinepayment/<?=$user['picture']?>" download><i class="fa fa-download"></i> Download</a>
                                                    <?php } else { } } ?>
                                                    <br>
                                                </div>

                                            </div>
                                            <br><br>
                                            <div class="float-end">
                                                <a href="onlinepay.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="payment_add_online" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
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
                                <li class="breadcrumb-item ">Pending Online Payment</li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Payment Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4>No Record Found!</h4>
                                            <div class="float-end">
                                                <a href="onlinepay.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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

<script>
    function showTextarea() {
        var status = document.getElementsByName('status')[0].value;
        var container = document.getElementById('textarea-container');
        var input = container.getElementsByTagName('input')[0];
        if (status === "Deny") {
            container.style.display = 'none';
            input.removeAttribute('required');
            input.value = '';
        } else {
            container.style.display = 'block';
            input.setAttribute('required', true);
        }
    }
</script>