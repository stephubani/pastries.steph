<?php
error_reporting(E_ALL);
require_once "Db.php";

class Cart extends Db{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function insert_cartitems($product_name, $flavour_name, $product_price,$cart_quantity,$customer_id){
        $sql = 'INSERT INTO carts(product_name, flavour_name, product_price,cart_quantity,customer_id) 
        VALUES(?,?,?,?,?)';
        $statement = $this->dbconn->prepare($sql);
        $response =  $statement->execute([$product_name, $flavour_name, $product_price,$cart_quantity,$customer_id]);

        if($response){
            return true;
        }else{
            return false;
        }

    }

}


?>