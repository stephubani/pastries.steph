<?php
error_reporting(E_ALL);
require_once "../classes/Product.php";
if($_POST && isset($_POST['add_products']) && $_FILES['upload']['error'] == 0){
    $product_name = $_POST['product'];
    $flavour_name = $_POST['flavour'];
    $product_price = $_POST['price'];
    $product_desc = $_POST['description'];
    $product_img = $_FILES['upload'];

    $response =  $products->add_products($product_img ,$product_name,$flavour_name ,$product_desc , $product_price);

    if($response){
        header('location:../add_products.php');
        $_SESSION['success_message'] = "Product Successfully added";
    }else{
        header('location:../add_products.php');
        $_SESSION['error_message'] = "sorry couldnt add product";
    }
    
    
}else{
    header('location:../add_products.php');
    exit();
}

?>