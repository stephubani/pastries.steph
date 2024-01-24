<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/Admin.php";

if(isset($_POST['login']) && $_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $admin_in  =  $admin->login_admin($email,$password);


    if($admin_in){
       
        $_SESSION['admin'] = $admin_in['staff_id'];
        header('location:../admin_dashboard.php');
        exit();
    }else{
        $_SESSION['error_message'] = "We couldnt log you in atm";
        header("location:../adminlogin_page.php");
        exit();
    }



}else{
    echo "Please use the button";
}

?>