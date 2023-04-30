<?php
session_start();
include('../admin/config/dbcon.php');

if(isset($_POST['signup']))
{   
  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $studentid = $_POST['studentid'];
$user_type = 5;
$position = 4;
$user_status = 3;

$front = addslashes(file_get_contents($_FILES["front"]['tmp_name']));
$back = addslashes(file_get_contents($_FILES["back"]['tmp_name']));

    if($password == $confirm_password){
        //check email
        $checkemail = "SELECT email FROM user WHERE email='$email'";
        $checkemail_run = mysqli_query($con,$checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
          $_SESSION['status'] = "Email already exist!";
          $_SESSION['status_code'] = "error";
          header("Location: studentregister.php");
            exit(0);
        }
        else{
          $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `email`, `password`, `front`, `back`, `user_type`, `pos_name`, `user_status`, `student_id`) VALUES ('$fname','$mname','$lname','$email','$password','$front','$back','$user_type','$position','$user_status','$studentid')";
            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
              $_SESSION['status'] = "Parent Registered Succesfully, The admin will verify your account!";
              $_SESSION['status_code'] = "success";
              header('Location: index.php');
                exit(0);
            }
            else
            {
              $_SESSION['status'] = "Someting went wrong!";
              $_SESSION['status_code'] = "error";
              header('Location: parentregister.php');
                exit(0);
            }
        }

    }
    else
    {
      $_SESSION['status'] = "Password does not match!";
      $_SESSION['status_code'] = "error";
      header('Location: parentregister.php');
        exit(0);
    }
}


?>

   