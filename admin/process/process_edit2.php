<?php
error_reporting(E_ALL);
session_start();
require_once '../classes/Product.php';

if(isset($_POST['edit_products'])){
       $product_id = $_POST['product_id'];
    //   print_r($product_id);
    //    die();
        $product_name = $_POST['product'];
        $product_price = $_POST['price'];
        $product_desc = $_POST['description'];

    
        $response =   $products->update_products($product_name,$product_desc,$product_price,$product_id,);
            

        if($response){
            header('location:../edit_product.php');
            $_SESSION['success_message'] = 'Product Updated Succesfully';
        }else{
            $_SESSION['error_message'] = 'Im Sorry ! We couldnt update product at the moment';
        }
    }

    if(isset($_POST['edit_image']) && $_FILES['new_image']['error']== 0){

        // print_r($_FILES['new_image']);
        // die();

        $product_img_id = $_POST['product_img_id'];
        // print_r($product_img_id);
        //         die();
        $new_image = $_FILES['new_image'];

       

       
        
        
        $product_img_name =   $products->fetch_image_byid($product_img_id);

        
        
        $product_image = $products->update_image($product_img_id , $new_image);
       
        if($product_img_name){
            $_SESSION['product_img_name'] = $product_img_name;
        }

    }

?>