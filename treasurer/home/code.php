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
    header("Location: " . base_url . "secretary/home/announcement");
    exit(0);
  }else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "secretary/home/announcement");
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
    header("Location: " . base_url . "secretary/home/announcement");
    exit(0);
  }else{
    $_SESSION['status'] = "Something went wrong!";
    $_SESSION['status_code'] = "error";
    header("Location: " . base_url . "secretary/home/announcement");
    exit(0);
  }

}

if(isset($_POST['announcement_delete'])){
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

if(isset($_POST['update_account']))
{

    $user_id= $_POST['user_id'];
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $position = $_POST['suffix'];
    $password= $_POST['password'];

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

  header("Location: " . base_url . "treasurer/home/studentpay");
  exit(0);
}

// Payment onlinepayment Add
if (isset($_POST['payment_add_online'])) {
  $user_id = $_POST['user_id'];
  $id = $_POST['id'];
  $amount = $_POST['amount'];
  $date = date('Y-m-d H:i:s');
  $status = $_POST['status'];

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
    $q2 = "UPDATE payment SET amount = ?, date = ?, status = ? WHERE user_id = ?";
    $stmt2 = $con->prepare($q2);
    $stmt2->bind_param('ssss', $amount, $date, $status, $user_id);

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