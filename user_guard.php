<?php
if(!isset($_SESSION['customer_active'])){
    $_SESSION["error_message"] =  "You must be logged in to access this page";
    header("location:loginpage.php");
    exit();
}

?>