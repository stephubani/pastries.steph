<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/Customer.php";

if($_POST && isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

   $customer =  $customer->login($email,$password);
    if($customer){ 
        $_SESSION['customer_active']= $customer['customer_id'];
        header("location:../index.php");
        exit();
    }else{
        header('location:../loginpage.php');
        $_SESSION["error_message"] = "Oops we cant log you in at the moment";
    }

}else{
    header("location:../login.php");
}

?>