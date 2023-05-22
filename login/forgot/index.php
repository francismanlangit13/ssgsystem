<?php include ('../../db_conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supreme Student Government of JBI | Forgot</title>
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
<body>
    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?php echo base_url ?>assets/files/images/system/ssg.png" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Forgot Password</h2>
                        <form action="forgotpasswordcode.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter Email Address" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="forgot_btn"  class="form-submit" value="Submit" style="width:100%;"/>
                            </div>
                            <div class="form-group">
                                <a href="<?php echo base_url ?>login" class="signup-image-link">Click here to login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="<?php echo base_url ?>assets/vendor/jquery/jquery.min.js"></script>
    <!-- SCRIPT FOR SWEET ALERT -->
    <script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>
    <?php include ('message.php'); ?>
</body>
</html>