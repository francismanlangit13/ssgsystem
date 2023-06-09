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
  if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $photo = $_FILES['image'];
    $customFileName = 'user_' . date('Ymd_His'); // replace with your desired file name
    $ext = pathinfo($photo['name'], PATHINFO_EXTENSION); // get the file extension
    $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
    $fileTmpname = $photo['tmp_name'];
    $fileSize = $photo['size'];
    $fileError = $photo['error'];
    $fileExt = explode('.',$fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');
    if(in_array($fileActExt, $allowed)){
      if($fileError === 0){
        if($fileSize < 10485760){
          $uploadDir = '../../assets/files/images/users/';
          $targetFile = $uploadDir . $fileName;
          if (move_uploaded_file($fileTmpname, $targetFile)) {
            // emplty code.
          }
        }
        else{
          $_SESSION['status']="Image1 file is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "farmer/home/report");
        }
      }
      else{
        $_SESSION['status']="Image1 file error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "farmer/home/report");
      }
    }
    else{
      $_SESSION['status']="Image1 invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "farmer/home/report");
    }
  }
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

  $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `photo`, `user_type_id`, `user_status_id`) VALUES ('$fname','$mname','$lname','$suffix','$gender','$email','$phone','$password','$fileName','$user_type','$user_status')";
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
    `user_type_id`='$user_type',
    `user_status_id`='$user_status'
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
    // Deleted by person
    $date = date('Y-m-d H:i:s');
    $person_id =  $_SESSION['auth_user']['user_id'];
    $sql = "SELECT * FROM user WHERE user_id='$person_id' ";
    $sql_run = mysqli_query($con, $sql);
    if(mysqli_num_rows($sql_run) > 0) {
      foreach($sql_run as $row){
        $person = $row['fname'] .' '. $row['lname'];
      }
    }

    $query = "UPDATE `user` SET `user_status_id`='$u_status', `deleted_by`='$person', `date_deleted`='$date' WHERE user_id='$user_id'";
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
  if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $photo = $_FILES['image'];
    $customFileName = 'user_' . date('Ymd_His'); // replace with your desired file name
    $ext = pathinfo($photo['name'], PATHINFO_EXTENSION); // get the file extension
    $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
    $fileTmpname = $photo['tmp_name'];
    $fileSize = $photo['size'];
    $fileError = $photo['error'];
    $fileExt = explode('.',$fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');
    if(in_array($fileActExt, $allowed)){
      if($fileError === 0){
        if($fileSize < 10485760){
          $uploadDir = '../../assets/files/images/users/';
          $targetFile = $uploadDir . $fileName;
          if (move_uploaded_file($fileTmpname, $targetFile)) {
            // emplty code.
          }
        }
        else{
          $_SESSION['status']="Image1 file is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "farmer/home/report");
        }
      }
      else{
        $_SESSION['status']="Image1 file error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "farmer/home/report");
      }
    }
    else{
      $_SESSION['status']="Image1 invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "farmer/home/report");
    }
  }
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

  $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `photo`, `user_type_id`, `user_status_id`) VALUES ('$fname','$mname','$lname','$suffix','$gender','$email','$phone','$password','$fileName','$user_type','$user_status')";
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
  `user_status_id`='$user_status'
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
  // Deleted by person
  $date = date('Y-m-d H:i:s');
  $person_id =  $_SESSION['auth_user']['user_id'];
  $sql = "SELECT * FROM user WHERE user_id='$person_id' ";
  $sql_run = mysqli_query($con, $sql);
  if(mysqli_num_rows($sql_run) > 0) {
    foreach($sql_run as $row){
      $person = $row['fname'] .' '. $row['lname'];
    }
  }

  $query = "UPDATE `user` SET `user_status_id`='$u_status', `deleted_by`='$person', `date_deleted`='$date' WHERE user_id='$user_id'";
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
  if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $photo = $_FILES['image'];
    $customFileName = 'user_' . date('Ymd_His'); // replace with your desired file name
    $ext = pathinfo($photo['name'], PATHINFO_EXTENSION); // get the file extension
    $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
    $fileTmpname = $photo['tmp_name'];
    $fileSize = $photo['size'];
    $fileError = $photo['error'];
    $fileExt = explode('.',$fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');
    if(in_array($fileActExt, $allowed)){
      if($fileError === 0){
        if($fileSize < 10485760){
          $uploadDir = '../../assets/files/images/users/';
          $targetFile = $uploadDir . $fileName;
          if (move_uploaded_file($fileTmpname, $targetFile)) {
            // emplty code.
          }
        }
        else{
          $_SESSION['status']="Image1 file is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "farmer/home/report");
        }
      }
      else{
        $_SESSION['status']="Image1 file error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "farmer/home/report");
      }
    }
    else{
      $_SESSION['status']="Image1 invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "farmer/home/report");
    }
  }
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

  $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `student_id`, `level`, `photo`, `user_type_id`, `user_status_id`) VALUES ('$fname','$mname','$lname','$suffix','$gender','$email','$phone','$password','$student_id','$level','$fileName','$user_type','$user_status')";
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
  `user_status_id`='$user_status'
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
  // Deleted by person
  $date = date('Y-m-d H:i:s');
  $person_id =  $_SESSION['auth_user']['user_id'];
  $sql = "SELECT * FROM user WHERE user_id='$person_id' ";
  $sql_run = mysqli_query($con, $sql);
  if(mysqli_num_rows($sql_run) > 0) {
    foreach($sql_run as $row){
      $person = $row['fname'] .' '. $row['lname'];
    }
  }

  $query = "UPDATE `user` SET `user_status_id`='$u_status', `deleted_by`='$person', `date_deleted`='$date' WHERE user_id='$user_id'";
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
          $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `photo`, `user_type_id`, `user_status_id`) VALUES ('$fname','$mname','$lname','$suffix','$gender','$email','$phone','$password','$fileName','$user_type','$user_status')";
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
  `user_status_id`='$user_status'
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

  $query = "UPDATE `user` SET `user_status_id`='$u_status' WHERE user_id='$user_id'";
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



if(isset($_POST['update_account'])){
  $user_id= $_POST['user_id'];
  $fname= $_POST['fname'];
  $mname= $_POST['mname'];
  $lname= $_POST['lname'];
  $suffix= $_POST['suffix'];
  $email= $_POST['email'];
  if(isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])){
    $new_password= $_POST['password'];
    $password = md5($new_password);
    $sql0 = "UPDATE `user` SET `password` = '$password' WHERE `user_id` = '$user_id'";
    $sql0_run = mysqli_query($con, $sql0);
  }
  if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $fileImage = $_FILES['image'];
    $OLDfileImage = $_POST['oldimage'];
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
          $uploadDir = '../../assets/files/images/users/';
          $targetFile = $uploadDir . $fileName;
          unlink($uploadDir . $OLDfileImage);

          if (move_uploaded_file($fileTmpname, $targetFile)) {
            $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`suffix`='$suffix',`email`='$email',`photo`='$fileName' WHERE `user_id`='$user_id'";
            $query_run = mysqli_query($con, $query);
  
            if($query_run){
              $_SESSION['status'] = "Account updated sucessfully";
              $_SESSION['status_code'] = "success";
              header('Location: index');
              header("Location: " . base_url . "admin/home/");
              exit(0);
            }
            else{
              $_SESSION['status'] = "Something went wrong!";
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "admin/home/");
              exit(0);
            }
          }
        }
        else{
          $_SESSION['status']="File is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "admin/home/settings");
        }
      }
      else{
        $_SESSION['status']="File Error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "admin/home/settings");
      }
    }
    else{
      $_SESSION['status']="Invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "admin/home/settings");
    }
  }
  else{
    $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`suffix`='$suffix',`email`='$email' WHERE `user_id`='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
      $_SESSION['status'] = "Account updated sucessfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/settings");
      exit(0);
    }
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

if (isset($_POST["import_students"])) {
  $filename = $_FILES["file"]["tmp_name"];
  $allowed_extensions = array('csv');
  $date = date('Y-m-d H:i:s');
  $level= $_POST['level'];

  // Get file extension of csv
  $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

  // Check if file extension is allowed
  if (!in_array($file_extension, $allowed_extensions)) {
      $_SESSION['status'] = "Invalid file extension";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/student_account.php");
      exit;
  }

  // Open CSV file for reading
  $file = fopen($filename, "r");
  if (!$file) {
      $_SESSION['status'] = "Error opening file";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/student_account.php");
      exit;
  }
  // Read CSV file row by row and insert into database
  $i = 0;
  while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
      if ($i > 0) {
          // Insert row into database
          $var0 = addslashes($emapData[0]);
          $var1 = addslashes($emapData[1]);
          $var2 = addslashes($emapData[2]);
          $var3 = addslashes($emapData[3]);
          $var4 = addslashes($emapData[4]);
          $var5 = addslashes($emapData[5]);
          $var6 = addslashes($emapData[6]);
          $new_password = addslashes($emapData[7]); // password
          $var7 = md5($new_password);
          $var8 = addslashes($emapData[7]);
          $var9 = $level;
          $var10 = $date;
          $var11 = '6';
          $var12 = '1';
          
          $sql = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `student_id`, `level`, `date_added`, `user_type_id`, `user_status_id`)
          VALUES (
              '$var0',
              '$var1',
              '$var2',
              '$var3',
              '$var4',
              '$var5',
              '$var6',
              '$var7',
              '$var8',
              '$var9',
              '$var10',
              '$var11',
              '$var12')";
          $result = mysqli_query($con, $sql);

          if (!$result) {
              $_SESSION['status'] = "Error inserting row " . ($i + 1);
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "admin/home/student_account.php");
              exit;
          }
      }
      $i++;
  }

  // Close CSV file
  fclose($file);

  // Set import status
  $_SESSION['status'] = "The CSV/File has been successfully imported.";
  $_SESSION['status_code'] = "success";
  header("Location: " . base_url . "admin/home/student_account.php");
  exit;

  // Close database connection
  mysqli_close($con);
}

if (isset($_POST["import_parents"])) {
  $filename = $_FILES["file"]["tmp_name"];
  $allowed_extensions = array('csv');
  $date = date('Y-m-d H:i:s');

  // Get file extension of csv
  $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

  // Check if file extension is allowed
  if (!in_array($file_extension, $allowed_extensions)) {
      $_SESSION['status'] = "Invalid file extension";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/parent_account.php");
      exit;
  }

  // Open CSV file for reading
  $file = fopen($filename, "r");
  if (!$file) {
      $_SESSION['status'] = "Error opening file";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/parent_account.php");
      exit;
  }
  // Read CSV file row by row and insert into database
  $i = 0;
  while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
      if ($i > 0) {
          // Insert row into database
          $var0 = addslashes($emapData[0]);
          $var1 = addslashes($emapData[1]);
          $var2 = addslashes($emapData[2]);
          $var3 = addslashes($emapData[3]);
          $var4 = addslashes($emapData[4]);
          $var5 = addslashes($emapData[5]);
          $var6 = addslashes($emapData[6]);
          $new_password = addslashes('12345678'); // password
          $var7 = md5($new_password);
          $var8 = $date;
          $var9 = '7';
          $var10 = '1';
          
          $sql = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `date_added`, `user_type_id`, `user_status_id`)
          VALUES (
              '$var0',
              '$var1',
              '$var2',
              '$var3',
              '$var4',
              '$var5',
              '$var6',
              '$var7',
              '$var8',
              '$var9',
              '$var10')";
          $result = mysqli_query($con, $sql);

          if (!$result) {
              $_SESSION['status'] = "Error inserting row " . ($i + 1);
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "admin/home/parent_account.php");
              exit;
          }
      }
      $i++;
  }

  // Close CSV file
  fclose($file);

  // Set import status
  $_SESSION['status'] = "The CSV/File has been successfully imported.";
  $_SESSION['status_code'] = "success";
  header("Location: " . base_url . "admin/home/parent_account.php");
  exit;

  // Close database connection
  mysqli_close($con);
}

// Database restore
function restoreMysqlDB($filePath, $con){
  $sql = '';
  $error = '';

  // Disable foreign key checks
  mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");

  // SQL query to drop all tables
  $qry = "SHOW TABLES";
  $result = mysqli_query($con, $qry);

  while($row = mysqli_fetch_row($result)) {
    $qry = "DROP TABLE IF EXISTS $row[0]";
    mysqli_query($con, $qry);
  }

  // Enable foreign key checks
  mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");

  if(file_exists($filePath)) {
    $lines = file($filePath);

    foreach ($lines as $line) {

      // Ignoring comments from the SQL script
      if (substr($line, 0, 2) == '--' || $line == '') {
        continue;
      }

      $sql .= $line;

      if (substr(trim($line), - 1, 1) == ';') {
        $result = mysqli_query($con, $sql);
        if (! $result) {
          $error .= mysqli_error($con) . "\n";
        }
        $sql = '';
      }
    } // end foreach

    if ($error) {
      $response = array(
        $_SESSION['status'] = "Database restore failed.",
        $_SESSION['status_code'] = "error"
      );
    }
    else{
      $response = array(
        $_SESSION['status'] = "Database restore completed successfully.",
        $_SESSION['status_code'] = "success"
      );
      header("Location: " . base_url . "admin/home/database");
      //echo '<script>setTimeout(function(){ location.reload(); }, 4500);</script>';
      exit(0);
    }
    exec('rm ' . $filePath);
  } // end if file exists

  return $response;
}

if(isset($_POST['restore'])){
  if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array("sql"))){
      $response = array(
        "type" => "error",
        "message" => "Invalid File Type"
      );
    }
    else{
      if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
        move_uploaded_file($_FILES["backup_file"]["tmp_name"],'../../assets/files/database/'.$_FILES["backup_file"]["name"]);
        $response = restoreMysqlDB('../../assets/files/database/'.$_FILES["backup_file"]["name"], $con);
      }
    }
  }
}

if(isset($_POST['export_student'])){
  // Fetch data from MySQL table
  $sql = "SELECT * FROM user INNER JOIN user_type ON user.user_type_id = user_type.user_type_id INNER JOIN user_status ON user.user_status_id = user_status.user_status_id WHERE user.user_type_id = 6 AND user.user_status_id = 1";
  $result = mysqli_query($con, $sql);

  // Set the filename and mime type
  $filename = "export_student_" . date('m-d-Y_H:i:s A') . ".csv";
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment;filename="' . $filename . '"');
  header('Cache-Control: max-age=0');

  // Open file for writing
  $file = fopen('php://output', 'w');

  // Set the column headers
  fputcsv($file, array('First Name', 'Middle Name', 'Last Name', 'Suffix', 'Gender', 'Email', 'Phone', 'Student ID', 'Grade'));

  // Add the data to the file
  while ($data = mysqli_fetch_assoc($result)) {
    fputcsv($file, array($data['fname'], $data['mname'], $data['lname'], $data['suffix'], $data['gender'], $data['email'], $data['phone'], $data['student_id'], $data['level']));
  }

  // Close file
  fclose($file);

  // Close MySQL connection
  mysqli_close($con);
}
if(isset($_POST['export_parent'])){
  // Fetch data from MySQL table
  $sql = "SELECT * FROM user INNER JOIN user_type ON user.user_type_id = user_type.user_type_id INNER JOIN user_status ON user.user_status_id = user_status.user_status_id WHERE user.user_type_id = 7 AND user.user_status_id = 1";
  $result = mysqli_query($con, $sql);

  // Set the filename and mime type
  $filename = "export_parent_" . date('m-d-Y_H:i:s A') . ".csv";
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment;filename="' . $filename . '"');
  header('Cache-Control: max-age=0');

  // Open file for writing
  $file = fopen('php://output', 'w');

  // Set the column headers
  fputcsv($file, array('First Name', 'Middle Name', 'Last Name', 'Suffix', 'Gender', 'Email', 'Phone'));

  // Add the data to the file
  while ($data = mysqli_fetch_assoc($result)) {
    fputcsv($file, array($data['fname'], $data['mname'], $data['lname'], $data['suffix'], $data['gender'], $data['email'], $data['phone']));
  }

  // Close file
  fclose($file);

  // Close MySQL connection
  mysqli_close($con);
}

// Add role
if(isset($_POST['add_role'])){
  $role = $_POST['role'];
  $status = '1';
  $query = "INSERT INTO `user_type`(`user_type`, `user_status_id`) VALUES ('$role', '$status')";
  $query_run = mysqli_query($con, $query);

  if($query_run){
    $_SESSION['status'] = "Role added successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "admin/home/roles");
    exit(0);
  }else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "admin/home/roles");
    exit(0);
  }
}

// Update role
if(isset($_POST['update_role'])){
  $id = $_POST['id'];
  $role = $_POST['role'];
  $query = "UPDATE `user_type` SET `user_type`='$role' WHERE user_type_id = '$id'";
  $query_run = mysqli_query($con, $query);

  if($query_run){
    $_SESSION['status'] = "Role updated successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "admin/home/roles");
    exit(0);
  }else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "admin/home/roles");
    exit(0);
  }
}

// Delete role
if(isset($_POST['role_delete'])){
  $id= $_POST['role_delete'];

  $query = "UPDATE `user_type` SET user_status_id = 3 WHERE user_type_id = '$id'";
  $query_run = mysqli_query($con, $query);
  
  if($query_run){
      $_SESSION['status'] = "Role deleted successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/roles");
      exit(0);
  }
  else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/roles");
      exit(0);
  }
}