<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/utilities.php";
require_once "../classes/Customer.php";
if($_POST){
    if(isset($_POST['signup'])){
            $fullname = sanitizer($_POST['fullname']);
            $email = sanitizer($_POST['email']);
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
           
            

            if($fullname=="" || $email == ""){
                header("location:../registerpage.php");
                $_SESSION['error_message'] = " All fields are required";
                exit();
            }else if($password != $confirmpassword){
                header("location:../registerpage.php"); 
                $_SESSION['error_message'] = "Please password must match";
                exit();
            }  

            $user_id = $customer->register($fullname,$email,$password,$confirmpassword);
           
            

            if($user_id){
                    $_SESSION['customer_active']= $user_id;
                    header("location:../index.php");
                    exit();
            }else{
                header("location:../registerpage.php");
                $_SESSION['error_message'] = "We couldnt register you at the moment";
            }

    }else{
        echo "Please use the button";
        header("location:../registerpage.php");
        exit();
    }



}

?>