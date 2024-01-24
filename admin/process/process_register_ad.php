<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/Admin.php";

if($_POST && isset($_POST['register'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($fullname == "" || $email == ""){

        header("location:../adminregister_page.php");
        $_SESSION['error_message'] = "All fields are required";
        exit();

    }elseif($password != $confirm_password){

        header("location:../adminregister_page.php");
        $_SESSION['error_message'] = "Password must match";
        exit();
    }

   $admin_in = $admin->register_admin($fullname,$email,$password,$confirm_password);
   

   if($admin_in){
        $_SESSION['admin'] = $admin_in;
        header('location:../admin_dashboard.php');
        exit();
   }else{
        header('location:../adminregister.php');
        $_SESSION['error_message'] = "Im sorry we couldnt register you in atm";
        
   }




}else{
    echo "Please use the button";
    header("location:../adminregister_page.php");
}

?>