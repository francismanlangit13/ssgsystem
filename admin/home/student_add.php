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
                            <li class="breadcrumb-item ">Account</li>
                            <li class="breadcrumb-item active">Student</li>
                            <li class="breadcrumb-item active">Add Account</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Personal Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">First Name</label>
                                                    <input required type="text" Placeholder="Enter First Name" id="fname" name="fname" class="form-control">
                                                    <div id="fname-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="">Middle Name</label>
                                                    <input type="text" Placeholder="Enter Middle Name" id="mname" name="mname" class="form-control">
                                                    <div id="mname-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Last Name</label>
                                                    <input required type="text" Placeholder="Enter Last Name" id="lname" name="lname" class="form-control">
                                                    <div id="lname-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <div class="form-group">
                                                        <label for="suffix">Suffix</label>
                                                        <select class="form-control" id="suffix" name="suffix">
                                                            <option value="" selected disabled>Select Suffix</option>
                                                            <option value="Jr">Jr</option>
                                                            <option value="Sr">Sr</option>
                                                            <option value="I">I</option>
                                                            <option value="II">II</option>
                                                            <option value="III">III</option>
                                                            <option value="IV">IV</option>
                                                            <option value="V">V</option>
                                                            <option value="VI">VI</option>
                                                        </select>
                                                        <div id="suffix-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <div class="form-group">
                                                        <label for="gender" class="required">Gender</label>
                                                        <select class="form-control" id="gender" name="gender" required>
                                                            <option value="" selected disabled>Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        <div id="gender-error"></div>
                                                    </div>
                                                </div>
                    
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Email</label>
                                                    <input required type="email" Placeholder="Enter Email" id="email-input" name="email" class="form-control">
                                                    <div id="email-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Phone Number</label>
                                                    <input required type="text" id="phone-input" name="phone" maxlength="11" class="form-control" id="phone-input">
                                                    <div id="phone-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Student ID</label>
                                                    <input required type="text" id="student" name="student_id" class="form-control">
                                                    <div id="student-error"></div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Year Level</label>
                                                    <select id="level" name="level" required class="form-control">
                                                        <option value="" selected disabled>Select Year Level</option>
                                                        <option value="Grade 7">Grade 7</option>
                                                        <option value="Grade 8">Grade 8</option>
                                                        <option value="Grade 9">Grade 9</option>
                                                        <option value="Grade 10">Grade 10</option>
                                                        <option value="Grade 11">Grade 11</option>
                                                        <option value="Grade 12">Grade 12</option>
                                                    </select>
                                                    <div id="level-error"></div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="dp">Profile Picture</label>
                                                    <input type="file" name="image" class="input-large btn btn-dark" id="image1" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                                                </div>

                                                <div class="col-md-5 text-center">
                                                    <br>
                                                    <h5>Current Picture</h5>
                                                    <img class="mt-2" id="frame1" src ="<?php echo base_url ?>assets/files/images/system/no-image.png" alt="Profile Picture" width="240px" height="180px"/>
                                                </div>
                                            </div>   
                                            <div class="float-end">
                                                <a href="student_account" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" id="submit-btn" name="add_student" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
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
        var debouncedCheckStudent = _.debounce(checkStudent, 500);
        var debouncedCheckLevel = _.debounce(checkLevel, 500);

        // attach event listeners for each input field
        $('#fname').on('input', debouncedCheckFname);
        $('#mname').on('input', debouncedCheckMname);
        $('#lname').on('input', debouncedCheckLname);
        $('#suffix').on('change', debouncedCheckSuffix);
        $('#gender').on('input', debouncedCheckGender);
        $('#student').on('input', debouncedCheckStudent);
        $('#level').on('input', debouncedCheckLevel);

        $('#fname').on('blur', debouncedCheckFname);
        $('#mname').on('blur', debouncedCheckMname);
        $('#lname').on('blur', debouncedCheckLname);
        $('#suffix').on('blur', debouncedCheckSuffix);
        $('#gender').on('blur', debouncedCheckGender);
        $('#student').on('blur', debouncedCheckStudent);
        $('#level').on('blur', debouncedCheckLevel);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#fname-error').is(':empty') && $('#mname-error').is(':empty') && $('#lname-error').is(':empty') && $('#suffix-error').is(':empty') && $('#gender-error').is(':empty') && $('#student-error').is(':empty') && $('#level-error').is(':empty')) {
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

        function checkStudent() {
            var student = $('#student').val().trim();
            
            // show error if student is empty
            if (student === '') {
                $('#student-error').text('Please input student ID').css('color', 'red');
                $('#student').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for student if needed
            
            $('#student-error').empty();
            $('#student').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkLevel() {
            var levelSelect = document.getElementById('level');
            var level = levelSelect.value;
            
            // show error if the default option is selected
            if (level === '' && levelSelect.selectedIndex !== 1) {
                $('#level-error').text('Please select a year level').css('color', 'red');
                $('#level').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for level if needed
            
            $('#level-error').empty();
            $('#level').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

    });
</script>