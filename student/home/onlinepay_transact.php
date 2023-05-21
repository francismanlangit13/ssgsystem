<!DOCTYPE html>
<html lang="en">
    <?php include('../includes/header.php'); ?>
    <body class="sb-nav-fixed">
        <?php include ('../includes/navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include ('../includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Online Pay</li>
                            <li class="breadcrumb-item ">Pay</li>
                        </ol>
                        <div class="row">
                            <?php
                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $query = "SELECT * FROM payment_platform where platform_id = '$id' AND status != 'Archived'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $row){
                            ?>
                            <div class="col-xl-12 col-md-12">
                                <div class="card bg-dark text-white mb-4 text-center">
                                    <div class="card-body"><?=$row['name'];?></div>
                                    <div class="text-center">
                                        <img class="mt-2" src ="
                                        <?php
                                            if(isset($row['photo'])){
                                                if(!empty($row['photo'])) {
                                                    echo base_url . 'assets/files/images/platform/' . $row['photo'];
                                            } else { echo base_url . 'assets/files/images/system/no-image.png'; } }
                                        ?>" alt="Receipt Picture" width="500px" height="480px"/>
                                        <br><br><br>
                                    </div>
                                    <label>Account Number</label>
                                    <div class="card-body"><?=$row['account_number'];?></div>
                                    <br>
                                </div>
                            </div>
                            <?php } } } ?>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Payment Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="text" name="id" value="<?=$id;?>" class="form-control" hidden>
                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="required">Reference Number</label>
                                                    <input required type="number" Placeholder="Enter Reference Number" name="reference_number" class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="dp" class="required">Proof of payment</label><br>
                                                    <input required type="file" name="photo" class="input-large btn btn-dark" id="image1" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                                                    <div class="text-center">
                                                        <br>
                                                        <h5>Proof of payment photo</h5>
                                                        <img class="mt-2" id="frame1" src ="<?php echo base_url ?>assets/files/images/system/no-image.png" alt="Receipt Picture" width="240px" height="180px"/>
                                                        <br><br><br>
                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="float-end">
                                                <a href="onlinepay" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="add_payment" class="btn btn-primary"><i class="fas fa-wallet"></i> PAY</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include ('../includes/footer.php'); ?>
            </div>
        </div>
        <?php include ('../includes/bottom.php'); ?>
    </body>
</html>