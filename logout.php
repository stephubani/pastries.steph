<?php
error_reporting(E_ALL);
session_start();
require_once "classes/Customer.php";

$status = 'logged_out';
$customer->updateCustomerStatus($_SESSION['customer_active'] , $status);
$customer->logout();
header('location:index.php');
exit();


?>