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
                            <li class="breadcrumb-item ">Expenses</li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Expenses Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12 mb-3">
                                                    <?php
                                                        $sql = "SELECT * FROM `activity` WHERE status = 'Active'";
                                                        $all_activity = mysqli_query($con, $sql);
                                                    ?>
                                                    <label for="" class="required">Activity</label>
                                                    <select name="activity_id" required class="form-control">
                                                        <option value="" selected disabled>Select Activity</option>
                                                        <?php while ($activity = mysqli_fetch_array($all_activity, MYSQLI_ASSOC)) {
                                                            $selected = ($activity['activity_id'] == $user['activity_id']) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?php echo $activity['activity_id']; ?>" <?= $selected; ?>>
                                                                <?php echo $activity['activity_title']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="required">Type</label>
                                                    <input required type="text" name="type" value="<?= $user['type']; ?>" class="form-control">
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="required">Purpose</label>
                                                    <textarea required type="text" name="purpose" class="form-control"><?= $user['purpose']; ?></textarea>       
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="" class="required">OR Number</label>
                                                    <input required type="number" name="or_number" value="<?= $user['or_number']; ?>" class="form-control">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="" class="required">Amount</label>
                                                    <input required type="text" name="amount" value="<?= $user['amount']; ?>" class="form-control">
                                                </div>

                                                <!-- <div class="col-md-6 mb-3">
                                                    <label for="" class="required">Date and Time</label>
                                                    <input required name="date" type="datetime-local" id="txtDate" class="form-control">
                                                </div> -->

                                                <div class="col-md-6 mb-3">
                                                    <label for="dp" class="required">Receipt</label><br>
                                                    <input required type="file" name="photo" class="input-large btn btn-dark" id="image1" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                                                    <div class="text-center">
                                                        <br>
                                                        <h5>Bill receipt photo</h5>
                                                        <img class="mt-2" id="frame1" src ="<?php echo base_url ?>assets/files/images/system/no-image.png" alt="Receipt Picture" width="240px" height="180px"/>
                                                        <br><br><br>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="float-end">
                                                <a href="expense" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="add_expense" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
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