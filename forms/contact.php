<?php
  include ('../db_conn.php');
  //use PHPMailer\PHPMailer\PHPMailer;
  require("../assets/PHPMailer/PHPMailerAutoload.php");
  require ("../assets/PHPMailer/class.phpmailer.php");
  require ("../assets/PHPMailer/class.smtp.php");
  $errors = [];
  $errorMessage = '';

  if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name)) {
      $errors[] = 'Name is empty';
    }

    if (empty($email)) {
      $errors[] = 'Email is empty';
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
      $errors[] = 'Message is empty';
    }

    if (!empty($errors)) {
      $allErrors = join('<br/>', $errors);
      $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
    else {
      $mail = new PHPMailer();
      
      // specify SMTP credentials
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'ssg.jbi7204@gmail.com';
      $mail->Password = 'fkqlcsiecymvoypb';
      $mail->SMTPSecure = 'TLS/STARTTLS';
      $mail->Port = '587';
      $mail->setFrom($email, 'Contact Municipal Agriculture Office');
      $mail->addAddress('ssg.jbi7204@gmail.com', 'Me');
      $mail->Subject = 'New message from your website';

      // Enable HTML if needed
      $mail->isHTML(true);
      $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", nl2br($message)];
      $body = join('<br />', $bodyParagraphs);
      $mail->Body = $body;
      echo $body;

      if($mail->send()) {
        // Email sent successfully
        // echo 'OK';
      } else {
        // Error sending email
        // echo 'error';
      }
      // if($mail->send()){
      //   header('Location: thank-you.html'); // Redirect to 'thank you' page. Make sure you have it
      //   $_SESSION['status'] = "Thank You for emailing from us";
      //   $_SESSION['status_code'] = "success";
      //   header("Location: " . base_url);
      //   exit(0);
      // } 
      // else {
      //   $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
      // }
    }
  }
?>