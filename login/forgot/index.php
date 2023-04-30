<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supreme Student Government of JBI | Forgot</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <?php session_start(); ?>
    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/ssg.jpg" alt="sing up image"></figure>
                        <a href="studentregister.php" class="signup-image-link">Create Student Account</a>
                        <a href="parentregister.php" class="signup-image-link">Create Parent Account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Forgot Password</h2>
                        <form action="forgotpasswordcode.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email"  placeholder="Enter Email Address"/>
                            </div>

                            <div class="form-group">
                            <a href="index.php" class="signup-image-link">Click here to login</a>
                            </div>
                          
                            <div class="form-group form-button">
                                <input type="submit" name="forgot_btn"  class="form-submit" value="Submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

     <!-- SCRIPT FOR SWEET ALERT -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  


<?php
        if(isset($_SESSION['status']) && $_SESSION['status_code'] !='' )
        {
            ?>
                <script>
                swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                timer: 5000,
                button: "Close",
                }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                    if (dismiss === 'timer') {
                    //console.log('I was closed by the timer')
                    }
                }
                )
                </script>
                <?php
                unset($_SESSION['status']);
                unset($_SESSION['status_code']);
        }
                ?>
                
</body>
</html>