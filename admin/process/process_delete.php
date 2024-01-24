<?php
error_reporting(E_ALL);
session_start();
require_once '../classes/Product.php';


if (isset($_POST['delete_btn'])) {
    $product_id = $_POST['product_id'];

    // echo $product_id;
    // die();
    $response =  $products->delete_product($product_id);

    if($response){
        header('location:../all_products.php');
        $_SESSION['success_message'] = 'Product Deleted';
        exit();

    }else{
        header('location:../all_products.php');
        $_SESSION['error_message'] = 'Unfortunately we couldnt delete this product';
    }
    
    
  
 
    
} else {
    // Handle the case where 'product_id' is not set in the URL
    echo "Product ID not provided";
}
echo 'Your Product Id is :'. $product_id;
?>



