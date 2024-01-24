<?php
error_reporting(E_ALL);
require_once "Db.php";

class Product extends Db {

    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }
    
    public function view_products(){

        $sql = "SELECT * FROM product JOIN product_img ON 
        product.product_img_id =product_img.product_img_id  
        JOIN flavours ON product.flavour_id =  flavours.flavour_id";
        
        $statement = $this->dbconn->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        if($products){
            return $products;
        }else{
            return false;
        }
    }

    
    public function fetch_product_byid($id){
        try{
             $sql = "SELECT product.product_id , product.product_price , product.products_description, product.product_name, 
                flavours.flavour_name ,flavours.flavour_id
                FROM product 
                JOIN flavours ON product.flavour_id = flavours.flavour_id
                WHERE product_id=?";
     
        $statement = $this->dbconn->prepare($sql);
        $statement->execute([$id]);
        $product = $statement->fetchAll(PDO::FETCH_ASSOC);

        if($product){
            return $product;
        }else{
            return false;
        }
        }catch(PDOException $e){
            $e->getMessage();
        }

       
    }

    //sorting poducts


    public function get_products($sort_by , $product , $flavour){
        $sql = "SELECT * FROM product 
                JOIN product_img ON product.product_img_id = product_img.product_img_id  
                JOIN flavours ON product.flavour_id =  flavours.flavour_id
                ";

        if($product && $flavour){
            $sql .= " WHERE product_name = '$product' AND flavour_name = '$flavour'";
        }elseif($product){
            $sql .= " WHERE product_name = '$product'";
        }elseif($flavour){
            $sql .= " WHERE flavour_name = '$flavour'";
        }
        
        if($sort_by == 'high'){
            $sql .= "ORDER BY product_price DESC";
        }elseif($sort_by == 'low'){
            $sql .= "ORDER BY product_price ASC";
        }
        $statement = $this->dbconn->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        if($products){
            return $products;
        }

        return [];
    }

    


}
$products = new Product();
// echo '<pre>';
// print_r($products->sort_by_highbudget());
// echo '<pre>';
?>