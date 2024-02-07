<?php
session_start();
// require_once("user_guard.php");

require_once("classes/Payement.php");
require_once ('classes/Order.php');

$userid = $_SESSION["customer_active"];

if(isset( $_SESSION['reference_no'])){
    

    $payement = new Payement();
    $response = $payement->paystack_verify($_SESSION['reference_no']);

        

    if(isset($response) && $response->status==1){
        //retrieve the data coming from paystack and update your database to 'Paid'
        // to see all the things coming from paystack about this transaction, uncomment the print_r lines below:
      

        // die();
        $actual_amount_deducted_inkobo = $response->data->amount;
        $actual_response_frm_paystack = $response->data->gateway_response;
        $timepaid = $response->data->paid_at;
        $status = 'successful'; //depending on your enum values
        $_SESSION['order_id'];
        $order = new Order();
         $order->update_Order($_SESSION['order_id'],$status);
       
        
    }else{
        //update your transaction in the database to 'Failed'
        $status = 'failed'; //depending on your enum values
        $order = new Order();
        $order->update_Order($_SESSION['order_id'],$status);
        // $pay->update_transaction($actual_amount_deducted_inkobo,$actual_response_frm_paystack,$timepaid,$status);
    }
    //when you are done, you can redirect the user to the dashboard
    $_SESSION['success_message'] = "Your order is being processed please be patient";
    header('location:dashboard.php');
    exit();
  
}else{
    header("location:index.php");
}


?>