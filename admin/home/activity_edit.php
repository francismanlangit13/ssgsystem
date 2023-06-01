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
                        $users = "SELECT * FROM activity WHERE activity_id='$id' ";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Activity</li>
                            <li class="breadcrumb-item active">Update Activity</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Activity Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="<?=$user['activity_id'];?>">
                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="required">Title</label>
                                                    <input required type="text" Placeholder="Enter Activity Name" id="title" name="title" value="<?= $user['activity_title']; ?>" class="form-control">
                                                    <div id="title-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Status</label>
                                                    <select id="status" name="status" required class="form-control">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="Active" <?= $user['status'] == 'Active' ? 'selected' :'' ?>>Active</option>
                                                        <option value="In active" <?= $user['status'] == 'In active' ? 'selected' :'' ?>>In Active</option>
                                                    </select>
                                                    <div id="status-error"></div>
                                                </div>
                                            </div>   
                                            <div class="float-end">
                                                <a href="activity" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="update_activity" id="submit-btn" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
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
                                <li class="breadcrumb-item ">Activity</li>
                                <li class="breadcrumb-item active">Update Activity</li>
                            </ol>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Activity Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4>No Record Found!</h4>
                                            <div class="float-end">
                                                <a href="activity" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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
        //$('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckTitle = _.debounce(checkTitle, 500);
        var debouncedCheckStatus = _.debounce(checkStatus, 500);

        // attach event listeners for each input field
        $('#title').on('input', debouncedCheckTitle);
        $('#status').on('input', debouncedCheckStatus);

        $('#title').on('blur', debouncedCheckTitle);
        $('#status').on('blur', debouncedCheckStatus);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#title-error').is(':empty') && $('#status-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }
        
        function checkTitle() {
            var title = $('#title').val().trim();
            
            // show error if title is empty
            if (title === '') {
                $('#title-error').text('Please input title').css('color', 'red');
                $('#title').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for title if needed
            
            $('#title-error').empty();
            $('#title').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkStatus() {
            var statusSelect = document.getElementById('status');
            var status = statusSelect.value;
            
            // show error if the default option is selected
            if (status === '' && statusSelect.selectedIndex !== 1) {
                $('#status-error').text('Please select a status').css('color', 'red');
                $('#status').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for status if needed
            
            $('#status-error').empty();
            $('#activity').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
    });
</script>