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
                            WHERE payment.platform = 'Cash' AND payment_id = '$id'
                        ";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Payment</li>
                            <li class="breadcrumb-item ">Via Cash</li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Payment Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="text" name="id" value="<?=$id;?>" class="form-control" hidden>
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
                                                    <input required type="text" value="<?=$user['student_id'];?>" class="form-control" disabled>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Year Level</label>
                                                    <input required type="text" value="<?=$user['level'];?>" class="form-control" disabled>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Amount Paid</label>
                                                    <input type="text" value="<?=$user['amount'];?>" id="amount" name="amount" class="form-control" required>
                                                    <div id="amount-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Date and Time Paid</label>
                                                    <input type="text" value="<?=$user['short_date_created'];?>" class="form-control" disabled>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Status</label>
                                                    <select name="status" required class="form-control">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="Approved" <?= $user['status'] == 'Approved' ? 'selected' :'' ?>>Approved</option>
                                                        <option value="Partial" <?= $user['status'] == 'Partial' ? 'selected' :'' ?>>Partial</option>
                                                        <option value="Deny" <?= $user['status'] == 'Deny' ? 'selected' :'' ?>>Deny</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="float-end">
                                                <a href="payment.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" id="submit-btn" name="update_payment" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
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
                                <li class="breadcrumb-item ">Payment</li>
                                <li class="breadcrumb-item ">Via Cash</li>
                                <li class="breadcrumb-item active">Update</li>
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
                                                <a href="payment.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckAmount = _.debounce(checkAmount, 500);

        // attach event listeners for each input field
        $('#amount').on('input', debouncedCheckAmount);
        $('#amount').on('blur', debouncedCheckAmount);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#amount-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }

        function checkAmount() {
            var amount = $('#amount').val().trim();
            
            // show error if amount is empty
            if (amount === '') {
                $('#amount-error').text('Please input amount').css('color', 'red');
                $('#amount').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for amount if needed
            
            $('#amount-error').empty();
            $('#amount').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
    });
</script>