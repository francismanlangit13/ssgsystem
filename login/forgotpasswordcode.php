<?php
session_start();
include('config/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['forgot_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $code = uniqid();

    $check_mail = "SELECT email FROM student WHERE email = '$email'";
    $check_mail_run = mysqli_query($con, $check_mail);

    if(mysqli_num_rows($check_mail_run) > 0)
    {
        $row = mysqli_fetch_array($check_mail_run);
        $get_email = $row['email'];
        $get_lname = $row['lname'];

        $new_password = substr(md5(microtime()),rand(0,26),8);

        $sql = "UPDATE student SET password='$new_password' WHERE email='$email'";
        if (mysqli_query($con, $sql)) 
        {

            $name = htmlentities($get_lname);
            $email = htmlentities($get_email);
            $subject = htmlentities('Forgot Password');
            $message =  nl2br("Good day! \r\n This is your NEW PASSWORD \r\nPassword: $new_password \r\n Please change your password immediately!");
        
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ssg.jbi7204@gmail.com';
            $mail->Password = 'fkqlcsiecymvoypb';
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->isHTML(true);
            $mail->setFrom($email, $name);
            $mail->addAddress($_POST['email']);
            $mail->Subject = ("$email ($subject)");
            $mail->Body = $message;
            $mail->send();


          $_SESSION['status'] = "Your new password is now sent in e-mail.";
          $_SESSION['status_code'] = "success";
          header('Location: ../login/index.php');
          exit(0);

        }
        else
        {
            $_SESSION['status'] = "Something went wrong!";
            $_SESSION['status_code'] = "error";
            header("Location: ../login/forgotpassword.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "No Email Found";
        $_SESSION['status_code'] = "error";
        header("Location: ../login/forgotpassword.php");
        exit(0);
    }
}