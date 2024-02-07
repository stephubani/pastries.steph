<?php
session_start();
error_reporting(E_ALL);

// $_SESSION['cart'] = [];

if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array(); 
}

if(!empty($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $_SESSION['cart'][$product_id] = 1 ;

    if(array_key_exists($product_id, $_SESSION['cart'])){
       $_SESSION['error_message'] = 'You have added this product to cart';
    //    header('location:../index.php');
       
    }else{
         $_SESSION['cart'][$product_id] = 1 ;
    }
}

// print_r($_SESSION['cart']);
// die();


if (isset($_SESSION['cart'])) {
    $totalQuantity = count(array_keys($_SESSION['cart']));
} else {
    $totalQuantity = 0;
}

echo $totalQuantity;

?>



