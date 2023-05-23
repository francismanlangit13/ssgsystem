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
                            <li class="breadcrumb-item ">My Account</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>My Account</h5>
                                    </div>
                                    <div class="card-body">
                                        <h2 hidden="true"><?php echo $_SESSION['auth_user']['user_id']; ?></h2>
                                        <?php
                                            $user_id = $_SESSION['auth_user']['user_id'];
                                            $users = "SELECT * FROM `user` WHERE user_id=$user_id";
                                            $users_run = mysqli_query($con, $users);
                                            if(mysqli_num_rows($users_run) > 0){
                                                foreach($users_run as $user){
                                        ?>
                                        <form action="code.php" method="POST" enctype="multipart/form-data">  
                                            <input type="hidden" name="user_id" value="<?=$user['user_id'];?>">
                                            <div class="row"> 
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">First Name</label>
                                                    <input required type="text" Placeholder="Enter First Name" name="fname" value="<?= $user['fname']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="">Middle Name</label>
                                                    <input type="text" Placeholder="Enter Middle Name" name="mname" value="<?= $user['mname']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="" class="required">Last Name</label>
                                                    <input required type="text" Placeholder="Enter Last Name" name="lname" value="<?= $user['lname']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <div class="form-group">
                                                        <label for="suffix">Suffix</label>
                                                        <select class="form-control" name="suffix">
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
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="" class="required">Email</label> 
                                                    <input placeholder="Enter Email Address" type="email" name="email" value="<?=$user['email'];?>" class="form-control" required id="email-input">
                                                    <div id="email-error"></div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="password">New Password</label>
                                                    <input type="password" name="password" class="form-control" minlength="8" placeholder="New Password" id="password">
                                                    <a href="javascript:void(0)"  style="position: relative; top: -2rem; left: 89%; cursor: pointer; color: lightgray;">
                                                        <img alt="show password icon" src="<?php echo base_url ?>assets/files/images/system/eye-close.png" width="25rem" height="21rem" id="togglePassword">
                                                    </a>
                                                    <i style="font-size:0.85rem; margin-left:-1.5rem;">Leave this blank if you dont want to change password...</i>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="password1">Confirm Password</label>
                                                    <input type="password" name="confirm_password" class="form-control" minlength="8" placeholder="Confirm Password" id="password1">
                                                    <a href="javascript:void(0)"  style="position: relative; top: -2rem; left: 89%; cursor: pointer; color: lightgray;">
                                                        <img alt="show password icon" src="<?php echo base_url ?>assets/files/images/system/eye-close.png" width="25rem" height="21rem" id="togglePassword1">
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="front">Profile Picture: </label>
                                                    <input type="file" name="image" id="image1" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                                                    <input type="text" name="oldimage" value="<?= $row['photo']; ?>" hidden>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <br>
                                                    <h5>Profile Picture</h5>
                                                    <img class="mt-2" id="frame1" src ="
                                                    <?php
                                                        if(isset($user['photo'])){
                                                            if(!empty($user['photo'])) {
                                                                echo base_url . 'assets/files/images/users/' . $user['photo'];
                                                        } else { echo base_url . 'assets/files/images/system/no-image.png'; } }
                                                    ?>" alt="Receipt Picture" width="240px" height="180px"/>
                                                    <br><br>
                                                </div>
                                            </div>   
                                            <div class="float-end mt-4">
                                                <a href="javascript:history.back()" class="btn btn-danger">Back</a>
                                                <button type="submit" name="update_account" id="submit-btn" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                        <?php } } else{ ?>
                                            <h4>No Record Found!</h4>
                                        <?php } ?>
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
<!-- Show pass -->
<script src="<?php echo base_url ?>assets/js/showpass.js"></script>
<script>
    var base_url = "<?php echo base_url ?>"; // Global base_url in javascript
</script>
<script>
  // Get references to the password fields and label
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('password1');
  const confirmLabel = document.querySelector('label[for="password1"]');

  // Function to check if passwords match and update required class
  function checkPasswords() {
    if (passwordInput.value) {
      confirmLabel.classList.add('required');
    } else {
      confirmLabel.classList.remove('required');
    }

    if (passwordInput.value !== confirmPasswordInput.value) {
      confirmPasswordInput.setCustomValidity("Passwords do not match");
    } else {
      confirmPasswordInput.setCustomValidity("");
    }
  }

  // Add event listeners to the password fields
  passwordInput.addEventListener('input', checkPasswords);
  confirmPasswordInput.addEventListener('input', checkPasswords);
</script>

<script>
    $(document).ready(function() {
    // disable submit button by default
    //$('#submit-btn').prop('disabled', true);

    // debounce functions for each input field
    var debouncedCheckEmail = _.debounce(checkEmail, 500);

    // attach event listeners for each input field
    $('#email-input').on('input', debouncedCheckEmail);

    function checkEmail() {
        var email = $('#email-input').val();
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

    function checkIfAllFieldsValid() {
        // check if all input fields are valid and enable submit button if so
        if ($('#email-error').is(':empty')) {
        $('#submit-btn').prop('disabled', false);
        }
    }
    });
</script>