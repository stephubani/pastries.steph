<?php
session_start();
error_reporting(E_ALL);

// $_SESSION['cart'] = [];

if(isset($_SESSION['cart'])){
    if(isset($_POST['quantity']) && isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];
        if($product_id == $product_id){
            $_SESSION['cart'][$product_id] =  $_SESSION['cart'][$product_id] + 1;
            echo  $_SESSION['cart'][$product_id];
            
      
        }
  
    }
    if(isset($_POST['quantity2']) && isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];
        $_SESSION['cart'][$product_id] =  $_SESSION['cart'][$product_id] - 1;
        if ($_SESSION['cart'][$product_id] >= 1) {
          echo  $_SESSION['cart'][$product_id];
        } else {
            // If decremented quantity is less than 1, set it to 1
            $_SESSION['cart'][$product_id] = 1;
            echo 1;
        }
       
    } 
}

// echo $totalQuantity;
// echo $totalQuantity;
// print_r($_SESSION['cart']);
// die();


// if (isset($_SESSION['cart'])) {
   
// } else {
//     $totalQuantity = 0;
// }



?>



