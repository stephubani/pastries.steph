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



    public function insert_payementdetails($user_id , $fullname , $amount , $email, $ref){
        $query = "INSERT INTO donation SET don_amt=?, don_userid=? , don_fullname=?,don_email=?,don_reference=?";
        $statement = $this->dbconn->prepare($query);
        $result = $statement->execute([$amount , $user_id,$fullname,$email,$ref]);
        return $result;
    }

    public function get_donation($ref){
        try{
            $query = "SELECT * FROM donation WHERE don_reference=?";
            $statement = $this->dbconn->prepare($query);
            $statement->execute([$ref]);
            $result =   $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(Exception $e){
            $e->getMessage();die();
            return false;
        }
       
    }
}
