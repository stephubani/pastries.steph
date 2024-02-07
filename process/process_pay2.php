<?php
error_reporting(E_ALL);
session_start();
require_once '../classes/Product.php';
require_once '../classes/Cart.php';
require_once '../classes/Order.php';
require_once "../classes/Payement.php";
require_once "../classes/utilities.php";
if(isset($_SESSION['customer_active'])){
        $customer_id =  $_SESSION['customer_active'];
}

if(isset($_POST['payment'])){
    $fname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    // $lga = $_POST['lga[]'];
    $address = $_POST['address'];
    $total_price = $_POST['tot_price'];

    if(!empty($fname)||!empty($contact)||!empty($lga)||!empty($address)||!empty($total_price)){
       $reference = Utilities::generate_random();
       $_SESSION['reference_no'] = $reference;
        $orders= new Order();
       $response = $orders->insert_orders($total_price,$address,$customer_id ,$reference);



        if(isset($_SESSION['order_id'])){
            $_SESSION['order_id'];
            $pay = new Payement();
            $payement = $pay->paystack_initialize($total_price*100 ,$email , $_SESSION['reference_no']);

            if($payement &&  $payement->status == 1){
                $payementpage = $payement->data->authorization_url;
                header("location:$payementpage");
                
           }
        }


    }else{
        echo $_SESSION['error_message'] = 'All fields are required';
        header('location:../payement.php');
    }
   
  }






?>
