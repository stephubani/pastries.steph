<?php
error_reporting(E_ALL);
session_start();
require_once '../classes/Product.php';


if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $_SESSION['product_id'] = $product_id;
    
    
  
 
    
} else {
    // Handle the case where 'product_id' is not set in the URL
    echo "Product ID not provided";
}
echo 'Your Product Id is :'. $product_id;
?>



