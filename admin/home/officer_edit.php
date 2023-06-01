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
                        $users = "SELECT * FROM user WHERE user_id='$id' AND user_type_id IN (1,2,3,4,5) AND user_status_id IN (1,2)";
                        $users_run = mysqli_query($con, $users);
                        if(mysqli_num_rows($users_run) > 0){
                            foreach($users_run as $user){
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Account</li>
                            <li class="breadcrumb-item active">Offical</li>
                            <li class="breadcrumb-item active">Update Account</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Personal Information</h4>
                                    </div>
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="<?=$user['user_id'];?>">
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">First Name</label>
                                                    <input type="text" id="fname" name="fname" value="<?=$user['fname'];?>" class="form-control" required>
                                                    <div id="fname-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Middle Name</label>
                                                    <input type="text" id="mname" name="mname" value="<?=$user['mname'];?>" class="form-control">
                                                    <div id="mname-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Last Name</label>
                                                    <input type="text" id="lname" name="lname" value="<?=$user['lname'];?>" class="form-control" required>
                                                    <div id="lname-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <div class="form-group">
                                                        <label for="suffix">Suffix</label>
                                                        <select class="form-control" id="suffix" name="suffix">
                                                            <option value="" selected disabled>Select Suffix</option>
                                                            <option value="" <?= $user['suffix'] == '' ? 'selected' :'' ?>>None</option>
                                                            <option value="Jr" <?= $user['suffix'] == 'Jr' ? 'selected' :'' ?>>Jr</option>
                                                            <option value="Sr" <?= $user['suffix'] == 'Sr' ? 'selected' :'' ?>>Sr</option>
                                                            <option value="I" <?= $user['suffix'] == 'I' ? 'selected' :'' ?>>I</option>
                                                            <option value="II" <?= $user['suffix'] == 'II' ? 'selected' :'' ?>>II</option>
                                                            <option value="III" <?= $user['suffix'] == 'III' ? 'selected' :'' ?>>III</option>
                                                            <option value="IV" <?= $user['suffix'] == 'IV' ? 'selected' :'' ?>>IV</option>
                                                            <option value="V" <?= $user['suffix'] == 'V' ? 'selected' :'' ?>>V</option>
                                                            <option value="VI" <?= $user['suffix'] == 'VI' ? 'selected' :'' ?>>VI</option>
                                                        </select>
                                                        <div id="suffix-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <div class="form-group">
                                                        <label for="suffix" class="required">Gender</label>
                                                        <select class="form-control" id="gender" name="gender">
                                                            <option value="" selected disabled>Select Gender</option>
                                                            <option value="Male" <?= $user['gender'] == 'Male' ? 'selected' :'' ?>>Male</option>
                                                            <option value="Female" <?= $user['gender'] == 'Female' ? 'selected' :'' ?>>Female</option>
                                                        </select>
                                                        <div id="gender-error"></div>
                                                    </div>
                                                </div>
                    
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Email</label>
                                                    <input type="email" id="email-input" name="email" value="<?=$user['email'];?>" class="form-control" required>
                                                    <div id="email-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Phone Number</label>
                                                    <input required type="text" id="phone-input" name="phone" value="<?=$user['phone'];?>" pattern="09[0-9]{9}" maxlength="11" class="form-control" id="phone-input">
                                                    <div id="phone-error"></div>
                                                </div>
                                                
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Role</label>
                                                    <select id="role" name="role" required class="form-control">
                                                        <option value="" selected disabled>Select Role</option>
                                                        <option value="1" <?= $user['user_type_id'] == '1' ? 'selected' :'' ?>>Admin</option>
                                                        <option value="2" <?= $user['user_type_id'] == '2' ? 'selected' :'' ?>>President</option>
                                                        <option value="3" <?= $user['user_type_id'] == '3' ? 'selected' :'' ?>>Vice President</option>
                                                        <option value="4" <?= $user['user_type_id'] == '4' ? 'selected' :'' ?>>Secretary</option>
                                                        <option value="5" <?= $user['user_type_id'] == '5' ? 'selected' :'' ?>>Treasurer</option>
                                                    </select>
                                                    <div id="role-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Status</label>
                                                    <select id="status" name="status" required class="form-control">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="1" <?= $user['user_type_id'] == '1' ? 'selected' :'' ?>>Active</option>
                                                        <option value="2" <?= $user['user_type_id'] == '2' ? 'selected' :'' ?>>In active</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="float-end">
                                                <a href="officer_account" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="update_officer" id="submit-btn" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                                            </div>
                                            <br><br>
                                        </div>
                                    </form>
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
                                <li class="breadcrumb-item ">Account</li>
                                <li class="breadcrumb-item active">Offical</li>
                                <li class="breadcrumb-item active">Update Account</li>
                            </ol>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Personal Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4>No Record Found!</h4>
                                            <div class="float-end">
                                                <a href="officer_account" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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
        var debouncedCheckEmail = _.debounce(checkEmail, 500);
        var debouncedCheckPhone = _.debounce(checkPhone, 500);

        // attach event listeners for each input field
        $('#email-input').on('blur', debouncedCheckEmail);
        $('#phone-input').on('blur', debouncedCheckPhone);
        $('#email-input').on('input', debouncedCheckEmail); // Trigger on input change
        $('#phone-input').on('input', debouncedCheckEmail); // Trigger on input change

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#email-error').is(':empty') && $('#phone-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }

        function checkEmail() {
            var email = $('#email-input').val().trim();
            
            // show error if email is empty
            if (email === '') {
                $('#email-error').text('Please input email').css('color', 'red');
                $('#email-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // check if email format is valid
            var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
            if (!emailPattern.test(email)) {
                $('#email-error').text('Invalid email format').css('color', 'red');
                $('#email-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // make AJAX call to check if email exists
            $.ajax({
                url: 'ajax.php', // replace with the actual URL to check email
                method: 'POST', // use the appropriate HTTP method
                data: { email: email },
                success: function(response) {
                    if (response.exists) {
                        // disable submit button if email is taken
                        $('#submit-btn').prop('disabled', true);
                        $('#email-error').text('Email already taken').css('color', 'red');
                        $('#email-input').addClass('is-invalid');
                    } else {
                        $('#email-error').empty();
                        $('#email-input').removeClass('is-invalid');
                        // enable submit button if email is valid
                        checkIfAllFieldsValid();
                    }
                },
                error: function() {
                    $('#email-error').text('Error checking email');
                }
            });
        }

        function checkPhone() {
            var phone = $('#phone-input').val().trim();

            // show error if phone number is empty
            if (phone === '') {
                $('#phone-error').text('Please input phone number').css('color', 'red');
                $('#phone-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // check if phone number format is valid
            var phoneNumberPattern = /^09[0-9]{9}$/;
            if (!phoneNumberPattern.test(phone)) {
                $('#phone-error').text('Invalid phone number format').css('color', 'red');
                $('#phone-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // make AJAX call to check if phone number exists
            $.ajax({
                url: 'ajax.php', // replace with the actual URL to check phone
                method: 'POST', // use the appropriate HTTP method
                data: { phone: phone },
                success: function(response) {
                    if (response.exists) {
                        $('#phone-error').text('Phone number already taken').css('color', 'red');
                        $('#phone-input').addClass('is-invalid');
                        // disable submit button if phone number is taken
                        $('#submit-btn').prop('disabled', true);
                    } else {
                        $('#phone-error').empty();
                        $('#phone-input').removeClass('is-invalid');
                        // enable submit button if phone number is valid
                        checkIfAllFieldsValid();
                    }
                },
                error: function() {
                    $('#phone-error').text('Error checking phone number');
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckFname = _.debounce(checkFname, 500);
        var debouncedCheckMname = _.debounce(checkMname, 500);
        var debouncedCheckLname = _.debounce(checkLname, 500);
        var debouncedCheckSuffix = _.debounce(checkSuffix, 500);
        var debouncedCheckGender = _.debounce(checkGender, 500);
        var debouncedCheckRole = _.debounce(checkRole, 500);

        // attach event listeners for each input field
        $('#fname').on('input', debouncedCheckFname);
        $('#mname').on('input', debouncedCheckMname);
        $('#lname').on('input', debouncedCheckLname);
        $('#suffix').on('change', debouncedCheckSuffix);
        $('#gender').on('input', debouncedCheckGender);
        $('#role').on('change', debouncedCheckRole);

        $('#fname').on('blur', debouncedCheckFname);
        $('#mname').on('blur', debouncedCheckMname);
        $('#lname').on('blur', debouncedCheckLname);
        $('#suffix').on('blur', debouncedCheckSuffix);
        $('#gender').on('blur', debouncedCheckGender);
        $('#role').on('blur', debouncedCheckRole);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#fname-error').is(':empty') && $('#mname-error').is(':empty') && $('#lname-error').is(':empty') && $('#suffix-error').is(':empty') && $('#gender-error').is(':empty') && $('#role-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }
        
        function checkFname() {
            var fname = $('#fname').val().trim();
            
            // show error if first name is empty
            if (fname === '') {
                $('#fname-error').text('Please input first name').css('color', 'red');
                $('#fname').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for first name if needed
            
            $('#fname-error').empty();
            $('#fname').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkMname() {
            var mname = $('#mname').val().trim();
            
            // show error if middle name is empty
            if (mname === '') {
                $('#mname-error').text('Please input middle name').css('color', 'red');
                $('#mname').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for middle name if needed
            
            $('#mname-error').empty();
            $('#mname').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
        function checkLname() {
            var lname = $('#lname').val().trim();
            
            // show error if last name is empty
            if (lname === '') {
                $('#lname-error').text('Please input last name').css('color', 'red');
                $('#lname').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for last name if needed
            
            $('#lname-error').empty();
            $('#lname').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkSuffix() {
            var suffixSelect = document.getElementById('suffix');
            var suffix = suffixSelect.value;
            
            // show error if the default option is selected
            if (suffix === '' && suffixSelect.selectedIndex !== 1) {
                $('#suffix-error').text('Please select a suffix').css('color', 'red');
                $('#suffix').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for suffix if needed
            
            $('#suffix-error').empty();
            $('#suffix').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkGender() {
            var genderSelect = document.getElementById('gender');
            var gender = genderSelect.value;
            
            // show error if the default option is selected
            if (gender === '' && genderSelect.selectedIndex !== 1) {
                $('#gender-error').text('Please select a gender').css('color', 'red');
                $('#gender').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for gender if needed
            
            $('#gender-error').empty();
            $('#gender').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkRole() {
            var role = $('#role').val()
            
            // show error if role is empty
            if (!role || role.trim() === '') {
                $('#role-error').text('Please select role').css('color', 'red');
                $('#role').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for role if needed
            
            $('#role-error').empty();
            $('#role').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

    });
</script>