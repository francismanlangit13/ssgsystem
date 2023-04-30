<?php
session_start();
include('../admin/config/dbcon.php');


if(isset($_POST['registerstudent_btn']))
{   
  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $phone = $_POST['phone'];
$user_type = 4;
$user_status = 3;
$pos_name = 5;
$fines = 0;
$balance = 0;
$code = 0;
$front = addslashes(file_get_contents($_FILES["front"]['tmp_name']));
$back = addslashes(file_get_contents($_FILES["back"]['tmp_name']));

    if($password == $confirm_password){
        //check email
        $checkemail = "SELECT email FROM student WHERE email='$email'";
        $checkemail_run = mysqli_query($con,$checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
          $_SESSION['status'] = "Email already exist!";
          $_SESSION['status_code'] = "error";
          header("Location: farmer_add.php");
            exit(0);
        }
        else{
          $query = "INSERT INTO `student`(`fname`, `mname`, `lname`, `email`, `password`, `mobilenumber`, `id`, `front`, `back`, `user_type`, `user_status`, `pos_name`, `fines`, `balance`, `code`) VALUES ('$fname','$mname','$lname','$email','$password','$phone','$id','$front','$back','$user_type','$user_status','$pos_name','$fines','$balance','$code')";
            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
              $_SESSION['status'] = "Registered Succesfully";
              $_SESSION['status_code'] = "success";
              header('Location: index.php');
                exit(0);
            }
            else
            {
              $_SESSION['status'] = "Someting went wrong!";
              $_SESSION['status_code'] = "error";
              header('Location: studentregister.php');
                exit(0);
            }
        }

    }
    else
    {
      $_SESSION['status'] = "Password does not match!";
      $_SESSION['status_code'] = "error";
      header('Location: studentregister.php');
        exit(0);
    }
}


?>

   