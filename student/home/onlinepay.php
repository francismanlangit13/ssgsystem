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
                        </ol>
                        <div class="row">
                        <?php
                                $person = $_SESSION['auth_user']['user_id'];
                                $sql = "SELECT balance FROM `user` WHERE user_id = '$person'";
                                $sql_query_run = mysqli_query($con, $sql);
                                if ($row = mysqli_fetch_assoc($sql_query_run)) {
                                    $balance = $row['balance'];
                                }
                            ?>
                            <?php if ($balance > 0) { ?>
                                <div class="col-xl-12 col-md-12">
                                    <div class="card bg-danger text-white mb-4">
                                        <?php
                                            $person = $_SESSION['auth_user']['user_id'];
                                            $sql = "SELECT balance FROM `user` WHERE user_id = '$person'";
                                            $sql_query_run = mysqli_query($con, $sql);
                                        ?>
                                        <div class="card-body"><i class="fas fa-exclamation-circle"></i> You have an outstanding payment. Please pay in treasurer or online payment.
                                            <label class="float-end">
                                                <?php
                                                    if ($row = mysqli_fetch_assoc($sql_query_run)) {
                                                        echo '<h5>₱'.$row['balance'].'</h5>';
                                                    } else {
                                                        echo '<h5>₱0</h5>';
                                                    }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            <?php } else{ } ?>
                            <div class="col-xl-12 col-md-12">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><i class="fa fa-info-circle"></i> You can pay online to avoid hassle line up in treasurer office. <a type="button" data-toggle="modal" data-target="#exampleModalDelete" onclick="deleteModal(this)" style="color:#d0ff3f;text-decoration: none;">How to pay?</a></div>
                                </div>
                            </div>
                            <?php
                                $query = "SELECT * FROM payment_platform where status != 'Archived'";
                                $query_run = mysqli_query($con, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $row){
                            ?>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-dark text-white mb-4 text-center">
                                    <div class="card-body"><?=$row['name'];?></div>
                                    <div class="text-center">
                                        <img class="mt-2" id="frame1" src ="
                                        <?php
                                            if(isset($row['photo'])){
                                                if(!empty($row['photo'])) {
                                                    echo base_url . 'assets/files/images/platform/' . $row['photo'];
                                            } else { echo base_url . 'assets/files/images/system/no-image.png'; } }
                                        ?>" alt="Receipt Picture" width="300px" height="280px"/>
                                        <br><br><br>
                                    </div>
                                    <label>Account Number</label>
                                    <div class="card-body"><?=$row['account_number'];?></div>
                                    <div class="float-end">
                                        <a type="button" class="btn btn-primary" href="onlinepay_transact?id=<?=$row['platform_id'];?>" style="zoom:75%"><i class="fa fa-wallet"></i> Pay with <?=$row['name'];?></a>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </main>
                <?php include ('../includes/footer.php'); ?>
            </div>
        </div>
        <?php include ('../includes/bottom.php'); ?>
    </body>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">How to pay</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <label><b>First Step</b> Select your desired payment in the listed bellow.</label>
                    <label><b>Second Step</b> Scan if your payment uses QR code to scan if not using QR code you can bank transfer.</label>
                    <label><b>Thrid Step</b> Click the button <u style="color:orange;">pay with</u> you will redirecting to payment section.</label>
                    <label><b>Fourth Step</b> Select your payment and attach your proof of your payment.</label>
                    <label><b>Fifth Step</b> After you fill out all required forms click <u style="color:orange">PAY</u> to pay your outstanding balance.</label>
                    <label><b>Sixth Step</b> Your payment is pending wait for the treasurer to confirm your payment it will automatically paid wants the treasurer take action.</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>