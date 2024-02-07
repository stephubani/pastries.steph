<?php
require_once "Db.php";
class Payement extends Db {
    private $dbconn ;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function paystack_verify($ref){
        $headers=["Content-Type:application/json", "Authorization:Bearer sk_test_dd53aa9e2406d014018138e369089c8d959367be"];
        //step 2 initialize curl
        $ch = curl_init("https://api.paystack.co/transaction/verify/$ref");
        curl_setopt($ch , CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch , CURLOPT_HTTPHEADER, $headers);
        //set option below to prevent the end point from forsing ssl on you(https)
        curl_setopt($ch , CURLOPT_SSL_VERIFYPEER, false);
        //step 3 execute curl session
        $apiResponse = curl_exec($ch);

        if($apiResponse){
            curl_close($ch);
            return json_decode($apiResponse);
        }else{
            $r = curl_error($ch);
            return false;
            
        }

    }

    public function paystack_initialize($amount ,$email,$ref){
        //will give us a redirect url for the pay page
        //step 1 collect what you want to post
        $postRequest = array('amount'=>$amount , "email" => $email, 'reference'=> $ref);
        $headers=["Content-Type:application/json", "Authorization:Bearer sk_test_dd53aa9e2406d014018138e369089c8d959367be"];
        //step 2 initialize curl
        $ch = curl_init("https://api.paystack.co/transaction/initialize");

        curl_setopt($ch , CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch , CURLOPT_POSTFIELDS, json_encode($postRequest));
        curl_setopt($ch , CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch , CURLOPT_HTTPHEADER, $headers);
        //set option below to prevent the end point from forsing ssl on you(https)
        curl_setopt($ch , CURLOPT_SSL_VERIFYPEER, false);
        //step 3 execute curl session

        $apiResponse = curl_exec($ch);
       

        if($apiResponse){
            curl_close($ch);
            return json_decode($apiResponse);
        }else{
            $r = curl_error($ch);
            return false;
            
        }
        
    }



    public function insert_payementdetails($payement_amt , $order_id , $payement_ref ){
        $query = "INSERT INTO payement SET payement_amt=?, customer_order_id=? ,payement_reference=? customer_id=?";
        $statement = $this->dbconn->prepare($query);
        $result = $statement->execute([$payement_amt , $order_id,$payement_ref]);
        return $result;
    }

 
}
