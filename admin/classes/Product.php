<?php
error_reporting(E_ALL);
require_once "Db.php";

class Product extends Db{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }
    public function add_products($product_img ,$product_name,$flavour_name ,$product_desc , $product_price)
    {
        $product_img_id = $this->upload_img($product_img);
        $flavour_id = $this->add_flavour($flavour_name);
        $sql = "INSERT INTO product (product_img_id,product_name,flavour_id,products_description,product_price)VALUES(?,?,?,?,?)";
        $statement= $this->dbconn->prepare($sql);
       $response = $statement->execute([$product_img_id ,$product_name,$flavour_id ,$product_desc , $product_price]);

       if($response){
            return true;
       }else{
        return false;
       }

    }

    public function upload_img($product_img){
        $filename = $product_img['name'];
        $filetype = $product_img['type'];
        $filesize =$product_img['size'];
        $file_tmpname = $product_img['tmp_name'];

        $required_filesize = 2*1024*1024*1024;

        if($filesize > $required_filesize ){
            $_SESSION['error_message'] = "File size too big";
            return false;
        }

        $required_filetype = ['image/png' , 'image/jpeg' , 'image/jfif','image/jpg'];

        if(!in_array($filetype , $required_filetype)){
            $_SESSION['error_message'] = "File type not allowed";
        
        }

        $unique_file_name = "pastriesbysteph"."__".$filename."__".time(). "__". uniqid();
        $file_destination = "../uploads/".$unique_file_name;
        if(move_uploaded_file($file_tmpname , $file_destination)){

            $sql = "INSERT INTO product_img (product_img_name) VALUES(?)";
            $statement = $this->dbconn->prepare($sql);
            $response = $statement->execute([$unique_file_name]);

            if($response){
                $product_img_id = $this->dbconn->lastInsertId();
                return $product_img_id;
            }else{
                return false ;
            }
            
        }
        
    }

    public function add_flavour($flavour_name){
        $sql = "SELECT * FROM flavours WHERE flavour_name = ?";
        $statement = $this->dbconn->prepare($sql);
        $statement->execute([$flavour_name]);
        
        $flavour = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($flavour) {
            return $flavour['flavour_id'];
        } else {
            
            $sql = "INSERT INTO flavours(flavour_name) VALUES(?)";
            $statement = $this->dbconn->prepare($sql);
            $response = $statement->execute([$flavour_name]);
    
            if($response){
                return $this->dbconn->lastInsertId();
            }
        }
        
        return false;
        
    }
    //method to view products

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
  //trying to fetch from database to pass to the view products  to display all fetched flavour
    public function fetch_flavourname(){
        $sql = "SELECT * FROM flavours";
        $statement = $this->dbconn->prepare($sql);
        $statement->execute();
        
        $flavour = $statement->fetch(PDO::FETCH_ASSOC);
        return $flavour['flavour_name'];
    }

    //fetching product_by_id to update

    public function fetch_product_byid($id){
        $sql = "SELECT product.product_id , product.product_price , product.products_description, product.product_name, 
        flavours.flavour_name ,flavours.flavour_id,product.product_img_id
        FROM product 
        JOIN flavours ON product.flavour_id = flavours.flavour_id
        WHERE product_id=?";
        $statement = $this->dbconn->prepare($sql);
        $statement->execute([$id]);
        $products = $statement->fetch(PDO::FETCH_ASSOC);

        if($products){
            return $products;
        }else{
            return false;
        }
    }

    public function update_products($product_name,$product_desc,$product_price,$product_id)
     {
    //    $product_img_id = $this->update_image($product_img);
        // Update product in the "products" table
        $sql = 'UPDATE product SET 
            product_name = ?,
            products_description = ?,
            product_price = ?
            WHERE product_id = ?';

        $statement= $this->dbconn->prepare($sql);
        $response =  $statement->execute([$product_name,$product_desc,$product_price,$product_id]);
        if($response){
            return true;
        }else{
            return false;
        }
    

    }

    public function update_image($product_img_id,$product_img){
        try{

            $filename = $product_img['name'];
            $filetype = $product_img['type'];
            $filesize =$product_img['size'];
            $file_tmpname = $product_img['tmp_name'];
    
            $required_filesize = 2*1024*1024*1024;
    
            if($filesize > $required_filesize ){
                $_SESSION['error_message'] = "File size too big";
                return false;
            }
    
            $required_filetype = ['image/png' , 'image/jpeg' , 'image/jfif','image/jpg'];
    
            if(!in_array($filetype , $required_filetype)){
                $_SESSION['error_message'] = "File type not allowed";
            
            }
    
            $unique_file_name = "pastriesbysteph"."__".time(). "__". uniqid().$filename;
            $file_destination = "../uploads/".$unique_file_name;
            if(move_uploaded_file($file_tmpname , $file_destination)){
                $sql = 'UPDATE product_img SET product_img_name =? WHERE product_img_id =?';
                $statement=$this->dbconn->prepare($sql);
                $response =  $statement->execute([$unique_file_name,$product_img_id]);

                if($response){
                    $product_img_id = $this->dbconn->lastInsertId();
                    return $product_img_id;
                }else{
                    return false;
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
      
        
    }

    public function fetch_image_byid($id){
        $sql = 'SELECT product_img_name FROM product_img WHERE product_img_id=?';
        $statement = $this->dbconn->prepare($sql);
        $statement->execute([$id]);
        $product_img_name =   $statement->fetch(PDO::FETCH_ASSOC);

        if($product_img_name){
            return $product_img_name;
        }else{
            return 'Unable to fetch image at this point';
        }
    }

    public function delete_product($id){
        $sql = 'DELETE  FROM product WHERE product_id =?';
        $statement= $this->dbconn->prepare($sql);
        $response =   $statement->execute([$id]);

        if($response){
            $_SESSION['success_message'] = 'You have successfully deleted this product';
            return true;
        }else{
            $_SESSION['error_message'] = 'Im sorry we cant delete this product at the moment';
            return false;
        }

    }
}


    

    
    

$products = new Product;

?>