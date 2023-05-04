<?php
include('../../db_conn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../assets/PHPMailer/src/Exception.php';
require '../../assets/PHPMailer/src/PHPMailer.php';
require '../../assets/PHPMailer/src/SMTP.php';

// Logout
if(isset($_POST['logout_btn'])){
    // session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['auth_role']);
    unset( $_SESSION['auth_user']);

    $_SESSION['status'] = "Logout Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "login");
    exit(0);
}

// Add officer account
if(isset($_POST["add_officer"])){
    $fileImage = $_FILES['image'];
    $customFileName = 'user_' . date('Ymd_His'); // replace with your desired file name
    $ext = pathinfo($fileImage['name'], PATHINFO_EXTENSION); // get the file extension
    $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
    $fileTmpname = $fileImage['tmp_name'];
    $fileSize = $fileImage['size'];
    $fileError = $fileImage['error'];
    $fileExt = explode('.',$fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');
    
    if(in_array($fileActExt, $allowed)){
      if($fileError === 0){
        if($fileSize < 10485760){
          $fname = $_POST['fname'];
          $mname = $_POST['mname'];
          $lname = $_POST['lname'];
          $suffix = $_POST['suffix'];
          $gender = $_POST['gender'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $role_as = $_POST['role'];
          $new_password = substr(md5(microtime()),rand(0,26),8);
          $password = md5($new_password);
          $user_type = $role_as;
          $user_status = '1';
          $uploadDir = '../../assets/files/images/users/';
          $targetFile = $uploadDir . $fileName;

          if (move_uploaded_file($fileTmpname, $targetFile)) {
            $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `photo`, `user_type`, `user_status`) VALUES ('$fname','$mname','$lname','$suffix','$gender','$email','$phone','$password','$fileName','$user_type','$user_status')";
            $query_run = mysqli_query($con, $query);

            if($query_run){
              $name = htmlentities($_POST['lname']);
              $email = htmlentities($_POST['email']);
              $subject = htmlentities('Username and Password Credentials');
              $message = nl2br("Welcome to Supreme Student Government System! \r\n \r\n Email: $email \r\n Password: $new_password \r\n \r\n Please change your password immediately.");
              // PHP Mailer
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
              $mail->setFrom($email, $name);
              $mail->addAddress($_POST['email']);
              $mail->Subject = ("$email ($subject)");
              $mail->Body = $message;
              $mail->send();
        
              $_SESSION['status'] = "Officer added successfully, Credentials was sent to their email!";
              $_SESSION['status_code'] = "success";
              header("Location: " . base_url . "admin/home/officer_account");
              exit(0);
            }
            else{
              $_SESSION['status'] = "Officer was not added";
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "admin/home/officer_account");
              exit(0);
            }
          }
          else{
            $_SESSION['status']="Error uploading image.";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/officer_account");
          }

        }
        else{
          $_SESSION['status']="File is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "admin/home/officer_account");
        }
      }
      else{
        $_SESSION['status']="File Error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "admin/home/officer_account");
      }
    }
    else{
      $_SESSION['status']="Invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "admin/home/officer_account");
    }
}

// Update officer account
if(isset($_POST["update_officer"])){
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_type = $_POST['role'];
    $user_status = $_POST['status'];

    $query = "UPDATE `user` SET 
    `fname`='$fname',
    `mname`='$mname',
    `lname`='$lname',
    `suffix`='$suffix',
    `gender`='$gender',
    `email`='$email',
    `phone`='$phone',
    `user_type`='$user_type',
    `user_status`='$user_status'
    WHERE `user_id`='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
      $_SESSION['status'] = "Officer updated successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/officer_account");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Officer was not updated";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/officer_account");
      exit(0);
    }
}

// Delete officer account
if(isset($_POST['officer_delete'])){
    $user_id= $_POST['officer_delete'];
    $u_status = 3;

    $query = "UPDATE `user` SET `user_status`='$u_status' WHERE user_id='$user_id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run){
        $_SESSION['status'] = "Officer deleted successfully";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "admin/home/officer_account");
        exit(0);
    }
    else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "admin/home/officer_account");
        exit(0);
    }
}

// Add parent account
if(isset($_POST["add_parent"])){
  $fileImage = $_FILES['image'];
  $customFileName = 'user_' . date('Ymd_His'); // replace with your desired file name
  $ext = pathinfo($fileImage['name'], PATHINFO_EXTENSION); // get the file extension
  $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
  $fileTmpname = $fileImage['tmp_name'];
  $fileSize = $fileImage['size'];
  $fileError = $fileImage['error'];
  $fileExt = explode('.',$fileName);
  $fileActExt = strtolower(end($fileExt));
  $allowed = array('jpg','jpeg','png');
  
  if(in_array($fileActExt, $allowed)){
    if($fileError === 0){
      if($fileSize < 10485760){
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $suffix = $_POST['suffix'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $new_password = substr(md5(microtime()),rand(0,26),8);
        $password = md5($new_password);
        $user_type = '7';
        $user_status = '1';
        $uploadDir = '../../assets/files/images/users/';
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpname, $targetFile)) {
          $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `photo`, `user_type`, `user_status`) VALUES ('$fname','$mname','$lname','$suffix','$gender','$email','$phone','$password','$fileName','$user_type','$user_status')";
          $query_run = mysqli_query($con, $query);

          if($query_run){
            $name = htmlentities($_POST['lname']);
            $email = htmlentities($_POST['email']);
            $subject = htmlentities('Username and Password Credentials');
            $message = nl2br("Welcome to Supreme Student Government System! \r\n \r\n Email: $email \r\n Password: $new_password \r\n \r\n Please change your password immediately.");
            // PHP Mailer
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
            $mail->setFrom($email, $name);
            $mail->addAddress($_POST['email']);
            $mail->Subject = ("$email ($subject)");
            $mail->Body = $message;
            $mail->send();
      
            $_SESSION['status'] = "Parent added successfully, Credentials was sent to their email!";
            $_SESSION['status_code'] = "success";
            header("Location: " . base_url . "admin/home/parent_account");
            exit(0);
          }
          else{
            $_SESSION['status'] = "Parent was not added";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/parent_account");
            exit(0);
          }
        }
        else{
          $_SESSION['status']="Error uploading image.";
          $_SESSION['status_code'] = "error";
          header("Location: " . base_url . "admin/home/parent_account");
        }

      }
      else{
        $_SESSION['status']="File is too large file must be 10mb";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "admin/home/parent_account");
      }
    }
    else{
      $_SESSION['status']="File Error";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "admin/home/parent_account");
    }
  }
  else{
    $_SESSION['status']="Invalid file type";
    $_SESSION['status_code'] = "error"; 
    header("Location: " . base_url . "admin/home/parent_account");
  }
}

// Update parent account
if(isset($_POST["update_parent"])){
  $user_id = $_POST['user_id'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $suffix = $_POST['suffix'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $user_status = $_POST['status'];

  $query = "UPDATE `user` SET 
  `fname`='$fname',
  `mname`='$mname',
  `lname`='$lname',
  `suffix`='$suffix',
  `gender`='$gender',
  `email`='$email',
  `phone`='$phone',
  `user_status`='$user_status'
  WHERE `user_id`='$user_id'";
  $query_run = mysqli_query($con, $query);

  if($query_run){
    $_SESSION['status'] = "Parent updated successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "admin/home/parent_account");
    exit(0);
  }
  else{
    $_SESSION['status'] = "Parent was not updated";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "admin/home/parent_account");
    exit(0);
  }
}

// Delete parent account
if(isset($_POST['parent_delete'])){
  $user_id= $_POST['parent_delete'];
  $u_status = 3;

  $query = "UPDATE `user` SET `user_status`='$u_status' WHERE user_id='$user_id'";
  $query_run = mysqli_query($con, $query);
  
  if($query_run){
      $_SESSION['status'] = "Parent deleted successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/parent_account");
      exit(0);
  }
  else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/parent_account");
      exit(0);
  }
}

// Add student account
if(isset($_POST["add_student"])){
  $fileImage = $_FILES['image'];
  $customFileName = 'user_' . date('Ymd_His'); // replace with your desired file name
  $ext = pathinfo($fileImage['name'], PATHINFO_EXTENSION); // get the file extension
  $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
  $fileTmpname = $fileImage['tmp_name'];
  $fileSize = $fileImage['size'];
  $fileError = $fileImage['error'];
  $fileExt = explode('.',$fileName);
  $fileActExt = strtolower(end($fileExt));
  $allowed = array('jpg','jpeg','png');
  
  if(in_array($fileActExt, $allowed)){
    if($fileError === 0){
      if($fileSize < 10485760){
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $suffix = $_POST['suffix'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $student_id = $_POST['student_id'];
        $level = $_POST['level'];
        $new_password = substr(md5(microtime()),rand(0,26),8);
        $password = md5($new_password);
        $user_type = '6';
        $user_status = '1';
        $uploadDir = '../../assets/files/images/users/';
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpname, $targetFile)) {
          $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `student_id`, `level`, `photo`, `user_type`, `user_status`) VALUES ('$fname','$mname','$lname','$suffix','$gender','$email','$phone','$password','$student_id','$level','$fileName','$user_type','$user_status')";
          $query_run = mysqli_query($con, $query);

          if($query_run){
            $name = htmlentities($_POST['lname']);
            $email = htmlentities($_POST['email']);
            $subject = htmlentities('Username and Password Credentials');
            $message = nl2br("Welcome to Supreme Student Government System! \r\n \r\n Email: $email \r\n Password: $new_password \r\n \r\n Please change your password immediately.");
            // PHP Mailer
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
            $mail->setFrom($email, $name);
            $mail->addAddress($_POST['email']);
            $mail->Subject = ("$email ($subject)");
            $mail->Body = $message;
            $mail->send();
      
            $_SESSION['status'] = "Student added successfully, Credentials was sent to their email!";
            $_SESSION['status_code'] = "success";
            header("Location: " . base_url . "admin/home/student_account");
            exit(0);
          }
          else{
            $_SESSION['status'] = "Student was not added";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/student_account");
            exit(0);
          }
        }
        else{
          $_SESSION['status']="Error uploading image.";
          $_SESSION['status_code'] = "error";
          header("Location: " . base_url . "admin/home/student_account");
        }

      }
      else{
        $_SESSION['status']="File is too large file must be 10mb";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "admin/home/student_account");
      }
    }
    else{
      $_SESSION['status']="File Error";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "admin/home/student_account");
    }
  }
  else{
    $_SESSION['status']="Invalid file type";
    $_SESSION['status_code'] = "error"; 
    header("Location: " . base_url . "admin/home/student_account");
  }
}

// Update student account
if(isset($_POST["update_student"])){
  $user_id = $_POST['user_id'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $suffix = $_POST['suffix'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $student_id = $_POST['student_id'];
  $level = $_POST['level'];
  $user_status = $_POST['status'];

  $query = "UPDATE `user` SET 
  `fname`='$fname',
  `mname`='$mname',
  `lname`='$lname',
  `suffix`='$suffix',
  `gender`='$gender',
  `email`='$email',
  `phone`='$phone',
  `student_id`='$student_id',
  `level`='$level',
  `user_status`='$user_status'
  WHERE `user_id`='$user_id'";
  $query_run = mysqli_query($con, $query);

  if($query_run){
    $_SESSION['status'] = "Student updated successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "admin/home/student_account");
    exit(0);
  }
  else{
    $_SESSION['status'] = "Student was not updated";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "admin/home/student_account");
    exit(0);
  }
}

// Delete student account
if(isset($_POST['student_delete'])){
  $user_id= $_POST['student_delete'];
  $u_status = 3;

  $query = "UPDATE `user` SET `user_status`='$u_status' WHERE user_id='$user_id'";
  $query_run = mysqli_query($con, $query);
  
  if($query_run){
      $_SESSION['status'] = "Student deleted successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/student_account");
      exit(0);
  }
  else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/student_account");
      exit(0);
  }
}

// Add user account
if(isset($_POST["add_user"])){
  $fileImage = $_FILES['image'];
  $customFileName = 'user_' . date('Ymd_His'); // replace with your desired file name
  $ext = pathinfo($fileImage['name'], PATHINFO_EXTENSION); // get the file extension
  $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
  $fileTmpname = $fileImage['tmp_name'];
  $fileSize = $fileImage['size'];
  $fileError = $fileImage['error'];
  $fileExt = explode('.',$fileName);
  $fileActExt = strtolower(end($fileExt));
  $allowed = array('jpg','jpeg','png');
  
  if(in_array($fileActExt, $allowed)){
    if($fileError === 0){
      if($fileSize < 10485760){
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $suffix = $_POST['suffix'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $new_password = substr(md5(microtime()),rand(0,26),8);
        $password = md5($new_password);
        $user_type = '1';
        $user_status = '1';
        $uploadDir = '../../assets/files/images/users/';
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpname, $targetFile)) {
          $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `photo`, `user_type`, `user_status`) VALUES ('$fname','$mname','$lname','$suffix','$gender','$email','$phone','$password','$fileName','$user_type','$user_status')";
          $query_run = mysqli_query($con, $query);

          if($query_run){
            $name = htmlentities($_POST['lname']);
            $email = htmlentities($_POST['email']);
            $subject = htmlentities('Username and Password Credentials');
            $message = nl2br("Welcome to Supreme Student Government System! \r\n \r\n Email: $email \r\n Password: $new_password \r\n \r\n Please change your password immediately.");
            // PHP Mailer
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
            $mail->setFrom($email, $name);
            $mail->addAddress($_POST['email']);
            $mail->Subject = ("$email ($subject)");
            $mail->Body = $message;
            $mail->send();
      
            $_SESSION['status'] = "User added successfully, Credentials was sent to their email!";
            $_SESSION['status_code'] = "success";
            header("Location: " . base_url . "admin/home/user_account");
            exit(0);
          }
          else{
            $_SESSION['status'] = "User was not added";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/user_account");
            exit(0);
          }
        }
        else{
          $_SESSION['status']="Error uploading image.";
          $_SESSION['status_code'] = "error";
          header("Location: " . base_url . "admin/home/user_account");
        }

      }
      else{
        $_SESSION['status']="File is too large file must be 10mb";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "admin/home/user_account");
      }
    }
    else{
      $_SESSION['status']="File Error";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "admin/home/user_account");
    }
  }
  else{
    $_SESSION['status']="Invalid file type";
    $_SESSION['status_code'] = "error"; 
    header("Location: " . base_url . "admin/home/user_account");
  }
}

// Update user account
if(isset($_POST["update_user"])){
  $user_id = $_POST['user_id'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $suffix = $_POST['suffix'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $user_status = $_POST['status'];

  $query = "UPDATE `user` SET 
  `fname`='$fname',
  `mname`='$mname',
  `lname`='$lname',
  `suffix`='$suffix',
  `gender`='$gender',
  `email`='$email',
  `phone`='$phone',
  `user_status`='$user_status'
  WHERE `user_id`='$user_id'";
  $query_run = mysqli_query($con, $query);

  if($query_run){
    $_SESSION['status'] = "User updated successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "admin/home/user_account");
    exit(0);
  }
  else{
    $_SESSION['status'] = "User was not updated";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "admin/home/user_account");
    exit(0);
  }
}

// Delete user account
if(isset($_POST['user_delete'])){
  $user_id= $_POST['user_delete'];
  $u_status = 3;

  $query = "UPDATE `user` SET `user_status`='$u_status' WHERE user_id='$user_id'";
  $query_run = mysqli_query($con, $query);
  
  if($query_run){
      $_SESSION['status'] = "User deleted successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/user_account");
      exit(0);
  }
  else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/user_account");
      exit(0);
  }
}

// Add activity
if(isset($_POST['add_activity'])){
  $title = $_POST['title'];
  $status = "Active";
  $person =  $_SESSION['auth_user']['user_id'];
  $query = "INSERT INTO `activity`(`user_id`, `activity_title`,`status`) VALUES ('$person','$title','$status')";
  $query_run = mysqli_query($con, $query);

  if($query_run){
    $_SESSION['status'] = "Actvity added successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "admin/home/activity");
    exit(0);
  }else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "admin/home/activity");
    exit(0);
  }
}

// Update activity
if(isset($_POST['update_activity'])){
  $user_id = $_POST['user_id'];
  $title = $_POST['title'];
  $status = $_POST['status'];
  $person =  $_SESSION['auth_user']['user_id'];
  $query = "UPDATE `activity` SET `user_id`='$person',`activity_title`='$title',`status`='$status' WHERE activity_id = '$user_id'";
  $query_run = mysqli_query($con, $query);

  if($query_run){
    $_SESSION['status'] = "Actvity updated successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "admin/home/activity");
    exit(0);
  }else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "admin/home/activity");
    exit(0);
  }
}

// Delete activity
if(isset($_POST['activity_delete'])){
  $user_id= $_POST['activity_delete'];
  $u_status = 'Archive';

  $query = "UPDATE `activity` SET `status`='$u_status' WHERE user_id='$user_id'";
  $query_run = mysqli_query($con, $query);
  
  if($query_run){
      $_SESSION['status'] = "Actvity deleted successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/activity");
      exit(0);
  }
  else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/activity");
      exit(0);
  }
}

// Add Announcement
if(isset($_POST['add_announcement'])){
  $announcement_title = $_POST['title'];
  $activity_id = $_POST['activity_id'];
  $status = "Active";
  $person =  $_SESSION['auth_user']['user_id'];
  $announcement_body = $_POST['body'];
  $date_start = $_POST['date_start'];
  $date_end = $_POST['date_end'];
  
  $query = "INSERT INTO `announcement`(`activity_id`, `user_id`, `announcement_title`, `announcement_body`, `date_start`, `date_end`, `status`) VALUES ('$activity_id','$person','$announcement_title','$announcement_body','$date_start','$date_end','$status')";
  $query_run = mysqli_query($con, $query);
  if($query_run){
    $_SESSION['status'] = "Announcement added successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "admin/home/announcement");
    exit(0);
  }else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "admin/home/announcement");
    exit(0);
  }
}

// Update Announcement
if(isset($_POST['update_announcement'])){
  $user_id= $_POST['user_id'];
  $announcement_title = $_POST['title'];
  $activity_id = $_POST['activity_id'];
  $status = $_POST['status'];
  $person =  $_SESSION['auth_user']['user_id'];
  $announcement_body = $_POST['body'];
  $date_start = $_POST['date_start'];
  $date_end = $_POST['date_end'];

  $query = "UPDATE `announcement` SET `activity_id`='$activity_id',`user_id`='$person',`announcement_title`='$announcement_title',`announcement_body`='$announcement_body',`date_start`='$date_start',`date_end`='$date_end',`status`='$status' WHERE announcement_id='$user_id'";
  $query_run = mysqli_query($con, $query);
  if($query_run){
    $_SESSION['status'] = "Announcement updated successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "admin/home/announcement");
    exit(0);
  }else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "admin/home/announcement");
    exit(0);
  }

}

if(isset($_POST['add_expense']))
{

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('UTC'));
    $date_added = $date->format('Y-m-d H:i:s');


    $user_id = $_POST['user_id'];
    $purpose = $_POST['purpose'];
    $amount = $_POST['amount'];

    $query = "INSERT INTO `ssg_expenses`( `user`, `purpose`, `amount`, `date`) VALUES ('$user_id','$purpose','$amount','$date_added')";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Expenses Added";
        $_SESSION['status_code'] = "success";
        header('Location: liquidation.php');
        exit(0);
      }else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header('Location: liquidation.php');
        exit(0);
      }

}


if(isset($_POST['announcement_delete']))
{
    $user_id= $_POST['announcement_delete'];
    $newstatus = "Archived";

    $query = "UPDATE `announcement` SET `status`='$newstatus' WHERE `announcement_id`= '$user_id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
      $_SESSION['status'] = "The announcement has been successfully archived.";
      $_SESSION['status_code'] = "success";
      header('Location: announcement.php');
      exit(0);
    }
    else
    {
      $_SESSION['status'] = "SOMETHING WENT WRONG!";
      $_SESSION['status_code'] = "error";
      header('Location: announcement.php');
      exit(0);
    }
}

if(isset($_POST['add_expense']))
{

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('UTC'));
    $date_added = $date->format('Y-m-d H:i:s');


    $user_id = $_POST['user_id'];
    $purpose = $_POST['purpose'];
    $amount = $_POST['amount'];

    $query = "INSERT INTO `ssg_expenses`( `user`, `purpose`, `amount`, `date`) VALUES ('$user_id','$purpose','$amount','$date_added')";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Expenses Added";
        $_SESSION['status_code'] = "success";
        header('Location: liquidation.php');
        exit(0);
      }else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header('Location: liquidation.php');
        exit(0);
      }

}


if(isset($_POST['addfinesbtn']))
{
    $user_id= $_POST['user_id'];
    $fines = $_POST['addfines'];
   
    $q1= "SELECT fines, balance FROM student WHERE user_id = '$user_id' ";
    $q1_run = $con->query($q1);
    $data = $q1_run->fetch_assoc();
    $fee = $data['fines'];
    $bal = $data['balance'];

    $newfee = $fines + $fee;
    $newbal = $fines + $bal;

    $query = "UPDATE `student` SET `fines`='$newfee',`balance`='$newbal' WHERE `user_id` = '$user_id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
        $_SESSION['status'] = "Fee Added";
        $_SESSION['status_code'] = "success";
        header('Location: fines.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something is wrong!";
        $_SESSION['status_code'] = "error";
        header('Location: fines.php');
        exit(0);
    }
}



if(isset($_POST['update_account']))
{

    $user_id= $_POST['user_id'];
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $position = $_POST['position'];
    $status = $_POST['status'];

    $front = addslashes(file_get_contents($_FILES["front"]['tmp_name']));

    $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`email`='$email',`password`='$password',`front`='$front' WHERE `user_id`='$user_id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
        $_SESSION['status'] = "Account Update Succesfully";
        $_SESSION['status_code'] = "success";
        header('Location: index.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something is wrong!";
        $_SESSION['status_code'] = "error";
        header('Location: settings.php');
        exit(0);
    }
}

if(isset($_POST['payfines_btn']))
{
    $id = $_POST['user_id'];
    $payment = $_POST['pay'];
    $date = date('Y-m-d', strtotime($_POST['date']));


    $query= "SELECT fines, balance FROM student WHERE user_id = '$id' ";
    $query_run = $con->query($query);
    $data = $query_run->fetch_assoc();
    $fee = $data['fines'];
      

    if($data['balance'] > 0)
    {
        $query2 = "INSERT INTO `fines_transaction`(`fines_id`, `fines_fee`, `fines_date`) VALUES ('$id','$payment','$date')";
        $con->query($query2);
        
        $sq1 = "SELECT sum(fines_fee) as totalpaid FROM fines_transaction WHERE `fines_id` = '$id'";
        $sq1_run = $con->query($sq1);
        $row = $sq1_run->fetch_assoc();
        $totalpaid = $row['totalpaid'];
        $newbal = $fee - $totalpaid;

        $sq3 = "UPDATE `student` SET `balance`='$newbal' WHERE user_id = '$id'";
        $con->query($sq3);

        if($con)
        {
            {
                $_SESSION['status']="Successfully paid fines";
                $_SESSION['status_code'] = "success"; 
                header('Location: penaltyfee_view.php');
                exit(0);
            }
        }
        else
        {
            $_SESSION['status']="Something went wrong!";
            $_SESSION['status_code'] = "error"; 
            header('Location: penaltyfee_view.php');
            exit(0);
        }
    
    }
}







