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
                        $users = "SELECT * FROM announcement WHERE announcement.status IN ('Active','In active') AND announcement_id='$id'";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Announcement</li>
                            <li class="breadcrumb-item active">Update Announcement</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Announcement Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="<?=$user['announcement_id'];?>">
                                                <div class="col-md-5 mb-3">
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
                                                    <label for="" class="required">Title</label>
                                                    <input required type="text" Placeholder="Enter Announcement Name" id="announcement_title" name="title" value="<?= $user['announcement_title']; ?>" class="form-control">
                                                    <div id="announcement_title-error"></div>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="required">Description</label>
                                                    <textarea required type="text" Placeholder="Enter Description" placeholder="Enter Description" id="announcement_message" name="body" class="form-control"><?= $user['announcement_body']; ?></textarea>
                                                    <div id="announcement_message-error"></div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <?php
                                                        // Convert the formatted date to the desired format
                                                        $formatted_date_start = date('Y-m-d\TH:i', strtotime($user['date_start']));
                                                    ?>
                                                    <label for="" class="required">Date Started</label>
                                                    <input  required type="datetime-local" id="datestart" name="date_start" value="<?= $formatted_date_start; ?>" id="txtDate" class="form-control">
                                                    <div id="datestart-error"></div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <?php
                                                        // Convert the formatted date to the desired format
                                                        $formatted_date_end = date('Y-m-d\TH:i', strtotime($user['date_end']));
                                                    ?>
                                                    <label for="" class="required">Date Ended</label>
                                                    <input required type="datetime-local" id="dateend" name="date_end" value="<?= $formatted_date_end; ?>" id="txtDate" class="form-control">
                                                    <div id="dateend-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Status</label>
                                                    <select name="status" required class="form-control">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="Active" <?= $user['status'] == 'Active' ? 'selected' :'' ?>>Active</option>
                                                        <option value="In active" <?= $user['status'] == 'In active' ? 'selected' :'' ?>>In active</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="float-end">
                                                <a href="announcement" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="update_announcement" id="submit-btn" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
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
                                <li class="breadcrumb-item ">Announcement</li>
                                <li class="breadcrumb-item active">Update Announcement</li>
                            </ol>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Announcement Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4>No Record Found!</h4>
                                            <div class="float-end">
                                                <a href="announcement" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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
    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    var tomorrowISOString = tomorrow.toISOString().slice(0, 16);
    document.getElementsByName("date_start")[0].setAttribute("min", tomorrowISOString);
    document.getElementsByName("date_end")[0].setAttribute("min", tomorrowISOString);
</script>

<script>
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckActivity = _.debounce(checkActivity, 500);
        var debouncedCheckTitle = _.debounce(checkTitle, 500);
        var debouncedCheckBody = _.debounce(checkBody, 500);
        var debouncedCheckDatestart = _.debounce(checkDatestart, 500);
        var debouncedCheckDateend = _.debounce(checkDateend, 500);

        // attach event listeners for each input field
        $('#activity').on('input', debouncedCheckActivity);
        $('#announcement_title').on('input', debouncedCheckTitle);
        $('#announcement_message').on('input', debouncedCheckBody);
        $('#datestart').on('input', debouncedCheckDatestart);
        $('#dateend').on('input', debouncedCheckDateend);

        $('#activity').on('blur', debouncedCheckActivity);
        $('#announcement_title').on('blur', debouncedCheckTitle);
        $('#announcement_message').on('blur', debouncedCheckBody);
        $('#datestart').on('blur', debouncedCheckDatestart);
        $('#dateend').on('blur', debouncedCheckDateend);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#activity-error').is(':empty') && $('#announcement_title-error').is(':empty') && $('#announcement_message-error').is(':empty') && $('#datestart-error').is(':empty') && $('#dateend-error').is(':empty')) {
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
        
        function checkTitle() {
            var announcement_title = $('#announcement_title').val().trim();
            
            // show error if announcement_title is empty
            if (announcement_title === '') {
                $('#announcement_title-error').text('Please input title').css('color', 'red');
                $('#announcement_title').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for announcement_title if needed
            
            $('#announcement_title-error').empty();
            $('#announcement_title').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkBody() {
            var announcement_message = $('#announcement_message').val().trim();
            
            // show error if announcement_message is empty
            if (announcement_message === '') {
                $('#announcement_message-error').text('Please input description').css('color', 'red');
                $('#announcement_message').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for middle name if needed
            
            $('#announcement_message-error').empty();
            $('#announcement_message').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkDatestart() {
            var datestart = $('#datestart').val().trim();
            
            // show error if datestart is empty
            if (datestart === '') {
                $('#datestart-error').text('Please input date start').css('color', 'red');
                $('#datestart').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for datestart if needed
            
            $('#datestart-error').empty();
            $('#datestart').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkDateend() {
            var dateend = $('#dateend').val().trim();
            
            // show error if dateend is empty
            if (dateend === '') {
                $('#dateend-error').text('Please input date end').css('color', 'red');
                $('#dateend').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for dateend if needed
            
            $('#dateend-error').empty();
            $('#dateend').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
    });
</script>