<?php
session_start();
include('config/dbcon.php');

if(!isset($_SESSION['auth']))
{
    $_SESSION['status'] = "Login to Access Dashboard";
    $_SESSION['status_code'] = "info";
    header("Location: ../login/index.php");
    exit(0);
}
else
{
    if ($_SESSION['auth_role'] != "4")
    {
        $_SESSION['status'] = "You are not authorized as student";
    $_SESSION['status_code'] = "error";
    header("Location: ../login/index.php");
        exit(0);
    }
}

?>

