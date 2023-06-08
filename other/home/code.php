<?php
include('../../db_conn.php');

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
              header("Location: " . base_url . "other/home/");
              exit(0);
            }
            else{
              $_SESSION['status'] = "Something went wrong!";
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "other/home/");
              exit(0);
            }
          }
        }
        else{
          $_SESSION['status']="File is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "other/home/settings");
        }
      }
      else{
        $_SESSION['status']="File Error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "other/home/settings");
      }
    }
    else{
      $_SESSION['status']="Invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "other/home/settings");
    }
  }
  else{
    $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`suffix`='$suffix',`email`='$email' WHERE `user_id`='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
      $_SESSION['status'] = "Account updated sucessfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "other/home/");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "other/home/settings");
      exit(0);
    }
  }
}