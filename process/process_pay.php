<?php
error_reporting(E_ALL);
session_start();
require_once '../classes/Product.php';
require_once '../classes/Cart.php';


if(isset($_SESSION['customer_active'])){
   $customer_id = $_SESSION['customer_active'];

    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $product=>$quantity){
            $all_prod = $products->fetch_product_byid($product);
        
        $cart_product = $product;
            $cart_quantity = $quantity;
            $product_name = $all_prod[0]['product_name'];
            $flavour_name = $all_prod[0]['flavour_name'];
            $product_price = $all_prod[0]['product_price'];

            $cart = new Cart();
            $response =  $cart->insert_cartitems($product_name,$flavour_name,$product_price,$cart_quantity,$customer_id);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    

            if($response){
                // $_SESSION['cart'] = [];
                header('location:../payement.php');
                
            }else{
                $_SESSION['error_message'] = 'Please wait a moment ....';
            }
        
        }

    }else{
        echo "You are not allowed here yet";
    }


  }






?>
