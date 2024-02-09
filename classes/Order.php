<?php
require_once 'Db.php';

class Order extends Db{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function insert_orders($total_price,$address,$customer_id ,$reference){
        $sql = 'INSERT INTO orders (orders_amt, orders_shipping_address,customer_id, orders_reference)VALUES(?,?,?,?)';
        $statement = $this->dbconn->prepare($sql);
        $response = $statement->execute([$total_price, $address, $customer_id ,$reference]);
        if($response){
            $_SESSION['order_id']  =  $this->dbconn->lastInsertId();
            $sql = 'UPDATE orders SET orders_status = "pending" ';
            $statement= $this->dbconn->prepare($sql);
            $result = $statement->execute();
             if($result){
                return true;
             }else{
                return false;
             }
           

        }else{
            return false;
        }
    }

    public function update_Order($order_id , $status){
        $sql = "UPDATE orders SET orders_status =? WHERE orders_id =?";
        $statement= $this->dbconn->prepare($sql);
        $result = $statement->execute([$status,$order_id]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

   
}


?>