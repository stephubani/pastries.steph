<?php
error_reporting(E_ALL);
require_once "classes/Admin.php";

$admin->logout();
header('location:adminlogin_page.php');
exit();


?>