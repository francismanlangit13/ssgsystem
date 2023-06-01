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
                            <li class="breadcrumb-item ">Payment Platform</li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Payment Platform Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-6 mb-3">
                                                    <label for="" class="required">Name</label>
                                                    <input required type="text" Placeholder="Enter Name" id="name" name="name" class="form-control">
                                                    <div id="name-error"></div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="dp" class="required">QR code</label><br>
                                                    <input required type="file" name="photo" class="input-large btn btn-dark" id="image1" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="" class="required">Account Number</label>
                                                    <input required type="number" Placeholder="Enter Account Number" id="accountnumber" name="account_number" class="form-control">
                                                    <div id="accountnumber-error"></div>
                                                </div>
                                                
                                            </div>   
                                            <div class="float-end">
                                                <a href="platform" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" id="submit-btn" name="add_platform" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
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
        var debouncedCheckName = _.debounce(checkName, 500);
        var debouncedCheckAccountnumber = _.debounce(checkAccountnumber, 500);

        // attach event listeners for each input field
        $('#name').on('input', debouncedCheckName);
        $('#accountnumber').on('input', debouncedCheckAccountnumber);

        $('#name').on('blur', debouncedCheckName);
        $('#accountnumber').on('blur', debouncedCheckAccountnumber);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#name-error').is(':empty') && $('#accountnumber-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }

        function checkName() {
            var name = $('#name').val().trim();
            
            // show error if name is empty
            if (name === '') {
                $('#name-error').text('Please input name').css('color', 'red');
                $('#name').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for name if needed
            
            $('#name-error').empty();
            $('#name').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkAccountnumber() {
            var accountnumber = $('#accountnumber').val().trim();
            
            // show error if accountnumber is empty
            if (accountnumber === '') {
                $('#accountnumber-error').text('Please input account number').css('color', 'red');
                $('#accountnumber').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for accountnumber if needed
            
            $('#accountnumber-error').empty();
            $('#accountnumber').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
    });
</script>