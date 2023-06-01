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
                            <li class="breadcrumb-item ">Activity</li>
                            <li class="breadcrumb-item active">Add Activity</li>
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
                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="required">Title</label>
                                                    <input required type="text" Placeholder="Enter Activity Name" id="title" name="title" class="form-control">
                                                    <div id="title-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Status</label>
                                                    <select id="status" name="status" required class="form-control">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="Active">Active</option>
                                                        <option value="In active">In active</option>
                                                    </select>
                                                    <div id="status-error"></div>
                                                </div>
                                            </div>   
                                            <div class="float-end">
                                                <a href="activity" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="add_activity" id="submit-btn" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
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

<script>
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

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