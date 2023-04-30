<?php
    include('../../db_conn.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../../assets/PHPMailer/src/Exception.php';
    require '../../assets/PHPMailer/src/PHPMailer.php';
    require '../../assets/PHPMailer/src/SMTP.php';

    if(isset($_POST['forgot_btn'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_mail = "SELECT email, user_type FROM user WHERE email = '$email' AND user_status = 1 UNION SELECT email, user_type FROM student WHERE email = '$email' AND user_status = 1 AND user_type = 4";
        $check_mail_run = mysqli_query($con, $check_mail);

        if(mysqli_num_rows($check_mail_run) > 0){
            $row = mysqli_fetch_array($check_mail_run);
            $user_type = $row['user_type'];
            if($user_type == 4){
                $get_email = $row['email'];
                $new_password = substr(md5(microtime()),rand(0,26),8);
                $hashed_password = md5($new_password);
                $sql = "UPDATE student SET password='$hashed_password' WHERE email='$email'";
            }
            else{
                $get_email = $row['email'];
                $new_password = substr(md5(microtime()),rand(0,26),8);
                $hashed_password = md5($new_password);
                $sql = "UPDATE user SET password='$hashed_password' WHERE email='$email'";
            }
        }
        if (mysqli_query($con, $sql)) {

            $email = htmlentities($get_email);
            $subject = htmlentities('Forgot Password');
            $message =  nl2br("Good day! \r\n This is Supreme Student Government Password recovery. \r\n This is your NEW PASSWORD \r\nPassword: $new_password \r\n Please change your password immediately!");
        
            require("../../assets/PHPMailer/PHPMailerAutoload.php");
            require ("../../assets/PHPMailer/class.phpmailer.php");
            require ("../../assets/PHPMailer/class.smtp.php");
            $mail = new PHPMailer();
            $mail->IsSMTP();
            //$mail->SMTPDebug = 2; // Debug if the gmail doesn't send email when forgetting password.
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'TLS/STARTTLS';
            $mail->Host = 'smtp.gmail.com'; // Enter your host here
            $mail->Port = '587';
            $mail->IsHTML();
            $mail->Username = 'ssg.jbi7204@gmail.com'; // Enter your email here
            $mail->Password = 'fkqlcsiecymvoypb'; //Enter your passwrod here
            $mail->setFrom($email);
            $mail->addAddress($_POST['email']);
            $mail->Subject = ("$email ($subject)");
            $mail->Body = $message;
            $mail->send();

            $_SESSION['status'] = "Your new password is now sent in e-mail.";
            $_SESSION['status_code'] = "success";
            header("Location: " . base_url . "login/forgot");
            exit(0);
        }
        else{
            $_SESSION['status'] = "Something went wrong!";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "login/forgot");
            exit(0);
        }
    }
    else{
        $_SESSION['status'] = "No Email Found";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "login/forgot");
        exit(0);
    }
?>