<?php
include('authentication.php');
?>

<?php
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
    $back = addslashes(file_get_contents($_FILES["back"]['tmp_name']));

    $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`email`='$email',`password`='$password',`front`='$front',`back`='$back' WHERE `user_id`='$user_id'";
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
        $_SESSION['status'] = "Image Existed!";
        $_SESSION['status_code'] = "error";
        header('Location: settings.php');
        exit(0);
    }
}
?>

<?php
if(isset($_POST['announcement_delete']))
{
    $user_id= $_POST['announcement_delete'];

    $query = "DELETE FROM announcement WHERE announcement_id ='$user_id' ";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
      $_SESSION['status'] = "The announcement has been successfully deleted.";
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
?>



<?php
if(isset($_POST['add_qr']))
{
    $name= $_POST['name'];
    $date= $_POST['date'];
    $qr = addslashes(file_get_contents($_FILES["qr"]['tmp_name']));
    $status = "Active";

    $query = "INSERT INTO `qrcode`(`name`, `fee_qr`, `date`,`status`) VALUES ('$name','$qr','$date','$status')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
      $_SESSION['status'] = "QR Added!";
      $_SESSION['status_code'] = "success";
      header('Location: qr.php');
      exit(0);
    }
    else
    {
      $_SESSION['status'] = "SOMETHING WENT WRONG!";
      $_SESSION['status_code'] = "error";
      header('Location: qr.php');
      exit(0);
    }
}
?>


<?php
if(isset($_POST['update_qr']))
{
  $id= $_POST['id'];
    $name= $_POST['name'];
    $date= $_POST['date'];
    $qr = addslashes(file_get_contents($_FILES["update_qr"]['tmp_name']));


    $query = "UPDATE `qrcode` SET `name`='$name',`fee_qr`='$qr',`date`='$date' WHERE  `id`='$id'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
      $_SESSION['status'] = "QR Update!";
      $_SESSION['status_code'] = "success";
      header('Location: qr.php');
      exit(0);
    }
    else
    {
      $_SESSION['status'] = "SOMETHING WENT WRONG!";
      $_SESSION['status_code'] = "error";
      header('Location: qr.php');
      exit(0);
    }
}
?>


<?php
if(isset($_POST['qr_delete']))
{
    $id= $_POST['qr_delete'];
    $status = "Archived";

    $query = "UPDATE `qrcode` SET`status`='$status' WHERE id ='$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
      $_SESSION['status'] = "Qr code archived";
      $_SESSION['status_code'] = "success";
      header('Location: qr.php');
      exit(0);
    }
    else
    {
      $_SESSION['status'] = "SOMETHING WENT WRONG!";
      $_SESSION['status_code'] = "error";
      header('Location: qr.php');
      exit(0);
    }
}
?>


<?php

if(isset($_POST['update_announcement']))
{

    $id = $_POST['announcement_id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $publish = $_POST['publish'];
    $date = $_POST['date'];

    $query = "UPDATE `announcement` SET `announcement_title`='$title]',`announcement_body`='$body',`announcement_publish`='$publish',`announcement_date`='$date' WHERE announcement_id = '$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Announcement Updated!";
        $_SESSION['status_code'] = "success";
        header('Location: announcement.php');
        exit(0);
      }else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header('Location: announcement.php');
        exit(0);
      }

}

?>



<?php
if(isset($_POST['logout_btn']))
{
    // session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['auth_role']);
    unset( $_SESSION['auth_user']);

    $_SESSION['status'] = "Logout Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: ../login/index.php");
    exit(0);
}
?>

<?php
if(isset($_POST['add_ann']))
{




    $title = $_POST['title'];
    $body = $_POST['body'];
    $publish = $_POST['publish'];
    $date = $_POST['date'];

    $query = "INSERT INTO `announcement`(`announcement_title`, `announcement_body`, `announcement_publish`, `announcement_date`) VALUES ('$title','$body','$publish','$date')";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Announcement Added!";
        $_SESSION['status_code'] = "success";
        header('Location: announcement.php');
        exit(0);
      }else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header('Location: announcement.php');
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
?>
