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
  }
  else{
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
  }
  else{
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
              header("Location: " . base_url . "secretary/home/");
              exit(0);
            }
            else{
              $_SESSION['status'] = "Something went wrong!";
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "secretary/home/");
              exit(0);
            }
          }
        }
        else{
          $_SESSION['status']="File is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "secretary/home/settings");
        }
      }
      else{
        $_SESSION['status']="File Error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "secretary/home/settings");
      }
    }
    else{
      $_SESSION['status']="Invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "secretary/home/settings");
    }
  }
  else{
    $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`suffix`='$suffix',`email`='$email' WHERE `user_id`='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
      $_SESSION['status'] = "Account updated sucessfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "secretary/home/");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "secretary/home/settings");
      exit(0);
    }
  }
}

//Penalty Add
if (isset($_POST['penalty_add'])){
  $user_id = $_POST['penalty_add'];
  $penalty_reason = $_POST['name'];
  $penalty = $_POST['amount'];
  $date = date('Y-m-d H:i:s');

  // Check if the user exists
  $q1 = "SELECT * FROM user WHERE user_id = ?";
  $stmt1 = $con->prepare($q1);
  $stmt1->bind_param('s', $user_id);
  $stmt1->execute();
  $result = $stmt1->get_result();

  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $bal = $row['balance'];

    // Calculate new balance
    $newbal = $penalty + $bal;

    // Insert penalty into the penalties table
    $q2 = "INSERT INTO penalties (user_id, penalty_fee, penalty_reason, penalty_date) VALUES (?, ?, ?, ?)";
    $stmt2 = $con->prepare($q2);
    $stmt2->bind_param('siss', $user_id, $penalty, $penalty_reason, $date);
    $inserted = $stmt2->execute();

    if ($inserted) {
      // Update user's balance
      $q3 = "UPDATE user SET balance = ? WHERE user_id = ?";
      $stmt3 = $con->prepare($q3);
      $stmt3->bind_param('is', $newbal, $user_id);
      $updated = $stmt3->execute();

      if ($updated) {
        $_SESSION['status'] = "Penalty added successfully";
        $_SESSION['status_code'] = "success";
      } else {
        $_SESSION['status'] = "Failed to update user's balance";
        $_SESSION['status_code'] = "error";
      }
    } else {
      $_SESSION['status'] = "Failed to insert penalty";
      $_SESSION['status_code'] = "error";
    }
  } else {
    $_SESSION['status'] = "User not found";
    $_SESSION['status_code'] = "error";
  }

  $stmt1->close();
  $stmt2->close();
  $stmt3->close();

  header("Location: " . base_url . "secretary/home/penalties");
  exit(0);
}