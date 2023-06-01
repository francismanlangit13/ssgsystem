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
                        $users = "SELECT * FROM ssg_expenses WHERE expense_id='$id'";
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
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="text" name="id" value="<?=$id;?>" class="form-control" hidden>
                                                <div class="col-md-12 mb-3">
                                                    <?php
                                                        $sql = "SELECT * FROM `activity` WHERE status = 'Active'";
                                                        $all_activity = mysqli_query($con, $sql);
                                                    ?>
                                                    <label for="" class="required">Activity</label>
                                                    <select id="activity" name="activity_id" required class="form-control">
                                                        <option value="" selected disabled>Select Activity</option>
                                                        <?php while ($activity = mysqli_fetch_array($all_activity, MYSQLI_ASSOC)) {
                                                            $selected = ($activity['activity_id'] == $user['activity_id']) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?php echo $activity['activity_id']; ?>" <?= $selected; ?>>
                                                                <?php echo $activity['activity_title']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                    <div id="activity-error"></div>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="required">Type</label>
                                                    <input required type="text" id="type" name="type" value="<?= $user['type']; ?>" class="form-control">
                                                    <div id="type-error"></div>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="required">Purpose</label>
                                                    <textarea required type="text" id="purpose" name="purpose" class="form-control"><?= $user['purpose']; ?></textarea>
                                                    <div id="purpose-error"></div>       
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="" class="required">OR Number</label>
                                                    <input required type="number" id="ornumber" name="or_number" value="<?= $user['or_number']; ?>" class="form-control">
                                                    <div id="ornumber-error"></div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="" class="required">Amount</label>
                                                    <input required type="text" id="amount" name="amount" value="<?= $user['amount']; ?>" class="form-control">
                                                    <div id="amount-error"></div>
                                                </div>

                                                <!-- <div class="col-md-6 mb-3">
                                                    <?php
                                                        // Convert the formatted date to the desired format
                                                        $formatted_date_start = date('Y-m-d\TH:i', strtotime($user['date']));
                                                    ?>
                                                    <label for="" class="required">Date and Time</label>
                                                    <input required name="date" type="datetime-local" value="<?= $formatted_date_start; ?>" id="txtDate" class="form-control">
                                                </div> -->

                                                <div class="col-md-6 mb-3">
                                                    <label for="dp" class="required">Receipt</label><br>
                                                    <input type="file" name="photo" class="input-large btn btn-dark" id="image1" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                                                    <input type="text" name="oldimage" value="<?= $user['photo']; ?>" hidden>
                                                    <div class="text-center">
                                                        <br>
                                                        <h5>Bill receipt photo</h5>
                                                        <img class="mt-2" id="frame1" src ="
                                                        <?php
                                                            if(isset($user['photo'])){
                                                                if(!empty($user['photo'])) {
                                                                    echo base_url . 'assets/files/images/expenses/' . $user['photo'];
                                                            } else { echo base_url . 'assets/files/images/system/no-image.png'; } }
                                                        ?>" alt="Receipt Picture" width="240px" height="180px"/>
                                                        <br><br><br>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="float-end">
                                                <a href="expense" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" id="submit-btn" name="update_expense" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
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

<script>
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckActivity = _.debounce(checkActivity, 500);
        var debouncedCheckType = _.debounce(checkType, 500);
        var debouncedCheckPurpose = _.debounce(checkPurpose, 500);
        var debouncedCheckOrnumber = _.debounce(checkOrnumber, 500);
        var debouncedCheckAmount = _.debounce(checkAmount, 500);

        // attach event listeners for each input field
        $('#activity').on('input', debouncedCheckActivity);
        $('#type').on('input', debouncedCheckType);
        $('#purpose').on('input', debouncedCheckPurpose);
        $('#ornumber').on('input', debouncedCheckOrnumber);
        $('#amount').on('input', debouncedCheckAmount);

        $('#activity').on('blur', debouncedCheckActivity);
        $('#type').on('blur', debouncedCheckType);
        $('#purpose').on('blur', debouncedCheckPurpose);
        $('#ornumber').on('blur', debouncedCheckOrnumber);
        $('#amount').on('blur', debouncedCheckAmount);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#activity-error').is(':empty') && $('#type-error').is(':empty') && $('#purpose-error').is(':empty') && $('#ornumber-error').is(':empty') && $('#amount-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }

        function checkActivity() {
            var activitySelect = document.getElementById('activity');
            var activity = activitySelect.value;
            
            // show error if the default option is selected
            if (activity === '' && activitySelect.selectedIndex !== 1) {
                $('#activity-error').text('Please select a activity').css('color', 'red');
                $('#activity').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for activity if needed
            
            $('#activity-error').empty();
            $('#activity').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
        function checkType() {
            var type = $('#type').val().trim();
            
            // show error if type is empty
            if (type === '') {
                $('#type-error').text('Please input type').css('color', 'red');
                $('#type').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for type if needed
            
            $('#type-error').empty();
            $('#type').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkPurpose() {
            var purpose = $('#purpose').val().trim();
            
            // show error if purpose is empty
            if (purpose === '') {
                $('#purpose-error').text('Please input purpose').css('color', 'red');
                $('#purpose').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for purpose if needed
            
            $('#purpose-error').empty();
            $('#purpose').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkOrnumber() {
            var ornumber = $('#ornumber').val().trim();
            
            // show error if ornumber is empty
            if (ornumber === '') {
                $('#ornumber-error').text('Please input or number').css('color', 'red');
                $('#ornumber').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for ornumber if needed
            
            $('#ornumber-error').empty();
            $('#ornumber').removeClass('is-invalid');
            checkIfAllFieldsValid();
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