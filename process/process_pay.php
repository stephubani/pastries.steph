<?php
error_reporting(E_ALL);
session_start();
require_once '../classes/Product.php';


if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $product=>$quantity){
       $all_prod = $products->view_products($product);
       echo '<pre>';
       $cart_product = $product;
        $cart_quantity = $quantity;
        echo "Your cart items are $cart_product : Your cart quantity is $cart_quantity";
    }
}








?>
