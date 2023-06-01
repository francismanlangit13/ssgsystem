<?php include ('../../db_conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supreme Student Government of JBI | Reset password</title>
    <!-- Favicons -->
    <link href="<?php echo base_url ?>assets/files/images/system/ssg.png" rel="icon">
    <link href="<?php echo base_url ?>assets/files/images/system/ssg.png" rel="apple-touch-icon">
    <!-- Remove Banner -->
    <script src="<?php echo base_url ?>assets/js/fwhabannerfix.js"></script>
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url ?>assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/style-login.css">
</head>
<body style="background-image: url('../../assets/files/images/system/background.jpg');">
    <div class="main" style="background:transparent !important">

        <?php
            if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
                $key = $_GET["key"];
                $email = $_GET["email"];
                $curDate = date("Y-m-d H:i:s");
                $query = mysqli_query($con,"SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
                $row = mysqli_num_rows($query);
                if ($row==""){
                    $_SESSION['status'] = "The link is invalid or expired.";
                    $_SESSION['status_code'] = "error";
                    header("Location: " . base_url . "login/forgot");
                    exit(0);
                }
                else{
                    $row = mysqli_fetch_assoc($query);
                    $expDate = $row['expDate'];
                    if ($expDate >= $curDate){
        ?>
            <!-- Sing in  Form -->
            <section class="sign-in">
                <div class="container">
                    <div class="signin-content">
                        <div class="signin-image">
                            <figure><img src="<?php echo base_url ?>assets/files/images/system/ssg.png" alt="sing up image"></figure>
                        </div>

                        <div class="signin-form">
                            <h2 class="form-title">Reset your password</h2>
                            <form action="forgotpasswordcode.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="email" value = "<?php echo $email; ?>"/>
                                <div class="form-group" style="overflow:visible !important;">
                                    <label for="password"><i class="zmdi zmdi-lock" style="margin-bottom:2.5rem;"></i></label>
                                    <input type="password" name="password" minlength="8" id="password" pattern=".{8,}" placeholder="Password" required/>
                                    <a href="javascript:void(0)"  style="position: relative; top: -2.5rem; left: 87%; cursor: pointer; color: lightgray;">
                                        <img alt="show password icon" src="<?php echo base_url ?>assets/files/images/system/eye-close.png" width="25rem" height="1%" id="togglePassword">
                                    </a>
                                </div>
                                <div class="form-group" style="overflow:visible !important;">
                                    <label for="password1"><i class="zmdi zmdi-lock" style="margin-bottom:2.5rem;"></i></label>
                                    <input type="password" name="password" minlength="8" id="password1" pattern=".{8,}" placeholder="Password" required/>
                                    <a href="javascript:void(0)"  style="position: relative; top: -2.5rem; left: 87%; cursor: pointer; color: lightgray;">
                                        <img alt="show password icon" src="<?php echo base_url ?>assets/files/images/system/eye-close.png" width="25rem" height="1%" id="togglePassword1">
                                    </a>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="changepass_btn"  class="form-submit" value="Update Password" style="width:100%;"/>
                                </div>
                                <div class="form-group">
                                    <a href="<?php echo base_url ?>login" class="signup-image-link">Click here to login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        <?php } } } ?>
    </div>

    <!-- JS -->
    <script src="<?php echo base_url ?>assets/vendor/jquery/jquery.min.js"></script>
    <!-- SCRIPT FOR SWEET ALERT -->
    <script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>
    <!-- Show pass -->
    <script src="<?php echo base_url ?>assets/js/showpass.js"></script>
    <script>
        var base_url = "<?php echo base_url ?>"; // Global base_url in javascript
    </script> 
    <?php include ('message.php'); ?>
</body>
</html>