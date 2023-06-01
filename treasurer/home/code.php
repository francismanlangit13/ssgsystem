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
    header("Location: " . base_url . "treasurer/home/announcement");
    exit(0);
  }
  else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "treasurer/home/announcement");
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
    header("Location: " . base_url . "treasurer/home/announcement");
    exit(0);
  }
  else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "treasurer/home/announcement");
    exit(0);
  }

}

// Delete Announcement
if(isset($_POST['announcement_delete'])){
    $user_id= $_POST['announcement_delete'];
    $newstatus = "Archived";

    $query = "UPDATE `announcement` SET `status`='$newstatus' WHERE `announcement_id`= '$user_id'";
    $query_run = mysqli_query($con, $query);
    if($query_run){
      $_SESSION['status'] = "The announcement has been successfully archived.";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "treasurer/home/announcement");
      exit(0);
    }
    else{
      $_SESSION['status'] = "SOMETHING WENT WRONG!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "treasurer/home/announcement");
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
              header("Location: " . base_url . "treasurer/home/");
              exit(0);
            }
            else{
              $_SESSION['status'] = "Something went wrong!";
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "treasurer/home/");
              exit(0);
            }
          }
        }
        else{
          $_SESSION['status']="File is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "treasurer/home/settings");
        }
      }
      else{
        $_SESSION['status']="File Error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "treasurer/home/settings");
      }
    }
    else{
      $_SESSION['status']="Invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "treasurer/home/settings");
    }
  }
  else{
    $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`suffix`='$suffix',`email`='$email' WHERE `user_id`='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
      $_SESSION['status'] = "Account updated sucessfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "treasurer/home/");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "treasurer/home/settings");
      exit(0);
    }
  }
}

// Payment cash Add
if (isset($_POST['payment_add_cash'])) {
  $user_id = $_POST['payment_add_cash'];
  $amount = $_POST['amount'];
  $date = date('Y-m-d H:i:s');
  $platform = 'Cash';
  $status = 'Approved';

  // Check if the user exists
  $q1 = "SELECT * FROM user WHERE user_id = ?";
  $stmt1 = $con->prepare($q1);
  $stmt1->bind_param('s', $user_id);
  $stmt1->execute();
  $result = $stmt1->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $bal = $row['balance'];

    // Calculate new balance
    $newbal = $bal - $amount;

    // Insert payment into the payment table
    $q2 = "INSERT INTO payment (user_id, platform, amount, date, status) VALUES (?, ?, ?, ?, ?)";
    $stmt2 = $con->prepare($q2);
    $stmt2->bind_param('ssdss', $user_id, $platform, $amount, $date, $status); // Use 'ssds' as the binding parameter types
    $inserted = $stmt2->execute();

    if ($inserted) {
      // Update user's balance
      $q3 = "UPDATE user SET balance = ? WHERE user_id = ?";
      $stmt3 = $con->prepare($q3);
      $stmt3->bind_param('is', $newbal, $user_id);
      $updated = $stmt3->execute();

      if ($updated) {
        $_SESSION['status'] = "Payment added successfully";
        $_SESSION['status_code'] = "success";
      } else {
        $_SESSION['status'] = "Failed to update user's balance";
        $_SESSION['status_code'] = "error";
      }
    } else {
      $_SESSION['status'] = "Failed to insert payment";
      $_SESSION['status_code'] = "error";
    }
  } else {
    $_SESSION['status'] = "User not found";
    $_SESSION['status_code'] = "error";
  }

  $stmt1->close();
  $stmt2->close();
  $stmt3->close();

  header("Location: " . base_url . "treasurer/home/penalties");
  exit(0);
}

// Payment onlinepayment Add
if (isset($_POST['payment_add_online'])) {
  $user_id = $_POST['user_id'];
  $id = $_POST['id'];
  $amount = $_POST['amount'];
  $date = date('Y-m-d H:i:s');
  $status = $_POST['status'];

  if($status != 'Deny'){
    // Check if the user exists
    $q1 = "SELECT * FROM user WHERE user_id = ?";
    $stmt1 = $con->prepare($q1);
    $stmt1->bind_param('s', $user_id);
    $stmt1->execute();
    $result = $stmt1->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $bal = $row['balance'];

      // Calculate new balance
      $newbal = $bal - $amount;

      // Update payment in the payment table
      $q2 = "UPDATE payment SET amount = ?, date = ?, status = ? WHERE payment_id = ?";
      $stmt2 = $con->prepare($q2);
      $stmt2->bind_param('ssss', $amount, $date, $status, $id);

      if ($stmt2->execute()) {
        // Update user's balance
        $q3 = "UPDATE user SET balance = ? WHERE user_id = ?";
        $stmt3 = $con->prepare($q3);
        $stmt3->bind_param('is', $newbal, $user_id);

        if ($stmt3->execute()) {
          $_SESSION['status'] = "Payment updated successfully";
          $_SESSION['status_code'] = "success";
        } else {
          $_SESSION['status'] = "Failed to update user's balance";
          $_SESSION['status_code'] = "error";
        }

        $stmt3->close();
      } else {
        $_SESSION['status'] = "Failed to insert payment";
        $_SESSION['status_code'] = "error";
      }

      $stmt2->close();
    } else {
      $_SESSION['status'] = "User not found";
      $_SESSION['status_code'] = "error";
    }

    $stmt1->close();
  } else {
    $sql = "UPDATE `payment` SET `status` = '$status' WHERE `payment_id` = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if($sql_run){
      $_SESSION['status'] = "Payment updated successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "treasurer/home/onlinepay");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "treasurer/home/onlinepay");
      exit(0);
    }
  }

  header("Location: " . base_url . "treasurer/home/onlinepay");
  exit(0);
}

// Update Payment
if (isset($_POST['update_payment'])) {
  $id = $_POST['id'];
  $amount = $_POST['amount'];
  $status = $_POST['status'];
  $date = date('Y-m-d H:i:s');
  $platform = 'Cash';

  // Check if the user exists
  $q1 = "SELECT * FROM payment INNER JOIN user ON user.user_id = payment.user_id WHERE payment_id = ?";
  $stmt1 = $con->prepare($q1);
  $stmt1->bind_param('s', $id);
  $stmt1->execute();
  $result = $stmt1->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $prev_bal = $row['amount'];
    $bal = $row['balance'];

    // Calculate new balance
    $final_result = $prev_bal + $bal;
    $new_final_result = $final_result - $amount;

    $q3 = "UPDATE user SET balance = ? WHERE user_id = ?";
    $stmt3 = $con->prepare($q3);
    
    if (!$stmt3) {
      $_SESSION['status'] = "Failed to prepare statement: " . $con->error;
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "treasurer/home/payment");
      exit(0);
    }

    $stmt3->bind_param('ss', $new_final_result, $user_id);
    $updated_user = $stmt3->execute();

    if ($updated_user) {
      
      // Insert penalty into the payment table
      $q2 = "UPDATE payment SET platform = ?, amount = ?, date = ?, status = ? WHERE payment_id = ?";
      $stmt2 = $con->prepare($q2);
      
      if (!$stmt2) {
        $_SESSION['status'] = "Failed to prepare statement: " . $con->error;
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "treasurer/home/payment");
        exit(0);
      }

      $stmt2->bind_param('sssss', $platform, $amount, $date, $status, $id);
      $updated = $stmt2->execute();

      if ($updated) {
        $_SESSION['status'] = "Payment updated successfully";
        $_SESSION['status_code'] = "success";
      } else {
        $_SESSION['status'] = "Failed to update user's balance";
        $_SESSION['status_code'] = "error";
      }
    } else {
      $_SESSION['status'] = "Failed to update payment";
      $_SESSION['status_code'] = "error";
    }
  } else {
    $_SESSION['status'] = "User not found";
    $_SESSION['status_code'] = "error";
  }

  $stmt1->close();
  $stmt2->close();
  $stmt3->close();

  header("Location: " . base_url . "treasurer/home/payment");
  exit(0);
}

// Update Payment Online
if (isset($_POST['update_onlinepayment'])) {
  $id = $_POST['id'];
  $amount = $_POST['amount'];
  $status = $_POST['status'];
  $date = date('Y-m-d H:i:s');

  // Check if the user exists
  $q1 = "SELECT * FROM payment INNER JOIN user ON user.user_id = payment.user_id WHERE payment_id = ?";
  $stmt1 = $con->prepare($q1);
  $stmt1->bind_param('s', $id);
  $stmt1->execute();
  $result = $stmt1->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $prev_bal = $row['amount'];
    $bal = $row['balance'];

    // Calculate new balance
    $final_result = $prev_bal + $bal;
    $new_final_result = $final_result - $amount;

    $q3 = "UPDATE user SET balance = ? WHERE user_id = ?";
    $stmt3 = $con->prepare($q3);
    
    if (!$stmt3) {
      $_SESSION['status'] = "Failed to prepare statement: " . $con->error;
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "treasurer/home/onlinepayment");
      exit(0);
    }

    $stmt3->bind_param('ss', $new_final_result, $user_id);
    $updated_user = $stmt3->execute();

    if ($updated_user) {
      
      // Insert penalty into the payment table
      $q2 = "UPDATE payment SET amount = ?, date = ?, status = ? WHERE payment_id = ?";
      $stmt2 = $con->prepare($q2);
      
      if (!$stmt2) {
        $_SESSION['status'] = "Failed to prepare statement: " . $con->error;
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "treasurer/home/onlinepayment");
        exit(0);
      }

      $stmt2->bind_param('ssss', $amount, $date, $status, $id);
      $updated = $stmt2->execute();

      if ($updated) {
        $_SESSION['status'] = "Online Payment updated successfully";
        $_SESSION['status_code'] = "success";
      } else {
        $_SESSION['status'] = "Failed to update user's balance";
        $_SESSION['status_code'] = "error";
      }
    } else {
      $_SESSION['status'] = "Failed to update payment";
      $_SESSION['status_code'] = "error";
    }
  } else {
    $_SESSION['status'] = "User not found";
    $_SESSION['status_code'] = "error";
  }

  $stmt1->close();
  $stmt2->close();
  $stmt3->close();

  header("Location: " . base_url . "treasurer/home/onlinepayment");
  exit(0);
}

// Add Platform
if(isset($_POST['add_platform'])){
  $photo = $_FILES['photo'];
  $customFileName = 'image_' . date('Ymd_His'); // replace with your desired file name
  $ext = pathinfo($photo['name'], PATHINFO_EXTENSION); // get the file extension
  $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
  $fileTmpname = $photo['tmp_name'];
  $fileSize = $photo['size'];
  $fileError = $photo['error'];
  $fileExt = explode('.',$fileName);
  $fileActExt = strtolower(end($fileExt));
  $allowed = array('jpg','jpeg','png');

  $name = $_POST['name'];
  $status = "Active";
  $date = date('Y-m-d H:i:s');
  $person =  $_SESSION['auth_user']['user_id'];
  $account_number = $_POST['account_number'];
  $uploadDir = '../../assets/files/images/platform/';
  $targetFile = $uploadDir . $fileName;
  
  if (move_uploaded_file($fileTmpname, $targetFile)) {
    $query = "INSERT INTO `payment_platform`(`user_id`, `name`, `photo`, `account_number`, `date`, `status`) VALUES ('$person','$name','$fileName','$account_number','$date','$status')";
    $query_run = mysqli_query($con, $query);
    if($query_run){
      $_SESSION['status'] = "Payment platform added successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "treasurer/home/platform");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "treasurer/home/platform");
      exit(0);
    }
  }
  else{
    $_SESSION['status']="Error uploading image.";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "treasurer/home/platform");
  }
}

// Update Platform
if(isset($_POST['update_platform'])){
  $id = $_POST['id'];
  $uploadDir = '../../assets/files/images/platform/';
  if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $photo = $_FILES['photo'];
    $OLDfileImage = $_POST['oldimage'];
    $customFileName = 'image_' . date('Ymd_His'); // replace with your desired file name
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
          unlink($uploadDir . $OLDfileImage);
          $targetFile = $uploadDir . $fileName;

          if (move_uploaded_file($fileTmpname, $targetFile)) {
            $sql1 = "UPDATE `payment_platform` SET `photo` = '$fileName' WHERE `platform_id` = '$id'";
            $sql1_run = mysqli_query($con, $sql1);
          }
        }
        else{
          $_SESSION['status']="The image file is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "treasurer/home/platform");
        }
      }
      else{
        $_SESSION['status']="Image file error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "treasurer/home/platform");
      }
    }
    else{
      $_SESSION['status']="Invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "treasurer/home/platform");
    }
  }
  $name = $_POST['name'];
  $status = $_POST['status'];
  $date = date('Y-m-d H:i:s');
  $person =  $_SESSION['auth_user']['user_id'];
  $account_number = $_POST['account_number'];
  
  $query = "UPDATE `payment_platform` SET `name`='$name', `account_number`='$account_number', `date`='$date', `status`='$status' WHERE `user_id`='$id'";
  $query_run = mysqli_query($con, $query);
  if($query_run){
    $_SESSION['status'] = "Payment platform updated successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "treasurer/home/platform");
    exit(0);
  }
  else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "treasurer/home/platform");
    exit(0);
  }
}

// Delete Platform
if(isset($_POST['platform_delete'])){
  $user_id= $_POST['platform_delete'];
  $newstatus = "Archived";

  $query = "UPDATE `payment_platform` SET `status`='$newstatus' WHERE `platform_id`= '$user_id'";
  $query_run = mysqli_query($con, $query);
  if($query_run){
    $_SESSION['status'] = "The payment platform has been successfully archived.";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "treasurer/home/platform");
    exit(0);
  }
  else{
    $_SESSION['status'] = "SOMETHING WENT WRONG!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "treasurer/home/platform");
    exit(0);
  }
}

// Add Expense
if(isset($_POST['add_expense'])){
  $photo = $_FILES['photo'];
  $customFileName = 'expense_' . date('Ymd_His'); // replace with your desired file name
  $ext = pathinfo($photo['name'], PATHINFO_EXTENSION); // get the file extension
  $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
  $fileTmpname = $photo['tmp_name'];
  $fileSize = $photo['size'];
  $fileError = $photo['error'];
  $fileExt = explode('.',$fileName);
  $fileActExt = strtolower(end($fileExt));
  $allowed = array('jpg','jpeg','png');

  $activity_id = $_POST['activity_id'];
  $type = $_POST['type'];
  $purpose = $_POST['purpose'];
  $or_number = $_POST['or_number'];
  $amount = $_POST['amount'];
  $date = date('Y-m-d H:i:s');
  $status = 'Active';
  $person =  $_SESSION['auth_user']['user_id'];
  $uploadDir = '../../assets/files/images/expenses/';
  $targetFile = $uploadDir . $fileName;
  
  if (move_uploaded_file($fileTmpname, $targetFile)) {
    $query = "INSERT INTO `ssg_expenses`(`user_id`, `activity_id`, `type`, `purpose`, `amount`, `or_number`, `photo`, `date`, `status`) VALUES ('$person','$activity_id','$type','$purpose','$amount','$or_number','$fileName','$date','$status')";
    $query_run = mysqli_query($con, $query);
    if($query_run){
      $_SESSION['status'] = "Expense added successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "treasurer/home/expense");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "treasurer/home/expense");
      exit(0);
    }
  }
  else{
    $_SESSION['status']="Error uploading image.";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "treasurer/home/expense");
  }
}

// Update Platform
if(isset($_POST['update_expense'])){
  $id = $_POST['id'];
  $uploadDir = '../../assets/files/images/expenses/';
  if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $photo = $_FILES['photo'];
    $OLDfileImage = $_POST['oldimage'];
    $customFileName = 'expense_' . date('Ymd_His'); // replace with your desired file name
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
          unlink($uploadDir . $OLDfileImage);
          $targetFile = $uploadDir . $fileName;

          if (move_uploaded_file($fileTmpname, $targetFile)) {
            $sql1 = "UPDATE `ssg_expenses` SET `photo` = '$fileName' WHERE `expense_id` = '$id'";
            $sql1_run = mysqli_query($con, $sql1);
          }
        }
        else{
          $_SESSION['status']="The image file is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "treasurer/home/expense");
        }
      }
      else{
        $_SESSION['status']="Image file error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "treasurer/home/expense");
      }
    }
    else{
      $_SESSION['status']="Invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "treasurer/home/expense");
    }
  }
  $activity_id = $_POST['activity_id'];
  $type = $_POST['type'];
  $purpose = $_POST['purpose'];
  $or_number = $_POST['or_number'];
  $amount = $_POST['amount'];
  $person =  $_SESSION['auth_user']['user_id'];
  
  $query = "UPDATE `ssg_expenses` SET `user_id`='$person', `activity_id`='$activity_id', `type`='$type', `purpose`='$purpose', `amount`='$amount', `or_number`='$or_number' WHERE `expense_id`='$id'";
  $query_run = mysqli_query($con, $query);
  if($query_run){
    $_SESSION['status'] = "Payment platform updated successfully";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "treasurer/home/expense");
    exit(0);
  }
  else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "treasurer/home/expense");
    exit(0);
  }
}

// Delete Expense
if(isset($_POST['expense_delete'])){
  $user_id= $_POST['expense_delete'];
  $newstatus = "Archived";

  $query = "UPDATE `ssg_expenses` SET `status`='$newstatus' WHERE `expense_id`= '$user_id'";
  $query_run = mysqli_query($con, $query);
  if($query_run){
    $_SESSION['status'] = "The expense has been successfully archived.";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "treasurer/home/expense");
    exit(0);
  }
  else{
    $_SESSION['status'] = "SOMETHING WENT WRONG!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "treasurer/home/expense");
    exit(0);
  }
}