<?php
error_reporting(E_ALL);
require_once "Db.php";

class Customer extends Db{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function get_userbyid($id){
        $query = "SELECT * FROM customers WHERE customer_id =?";
        $stmt = $this->dbconn->prepare($query);
        $result = $stmt->execute([$id]);
        $user_records = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user_records;
    }

    public function register($fullname,$email,$password,$confirmpassword){
        if($password == $confirmpassword){
            try{
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO customers(customer_fullname,customer_email,customer_password) VALUES(?,?,?)";
                $statement = $this->dbconn->prepare($sql);
                $statement->execute([$fullname,$email,$hashed_password]);
                $userid = $this->dbconn->lastInsertId();
                return $userid;
            }catch(Exception $e){
                echo $e->getMessage();
                $_SESSION["error_message"] = "An error occured :".  $e->getMessage();
                return 0;
            }
                      
        }else{
            $_SESSION["error_message"] = "pass must match";
            print_r($_SESSION['error_message']);
            exit();
            return 0;
        }
       
    
    }

    public function login($email, $password){
        $sql = "SELECT * FROM customers WHERE customer_email =? LIMIT 1";
        $statement = $this->dbconn->prepare($sql);
        $statement->execute([$email]);
        $record = $statement->fetch(PDO::FETCH_ASSOC);

        if($record){
            $hashed_password = $record['customer_password'];
            $checkif = password_verify($password , $hashed_password);
            if($checkif){

                $this->updateCustomerStatus($record['customer_id'], 'logged_in');
                return $record;
            }else{
                
                return false;
            }
        }else{
            return false;
        }

    }

    public function updateCustomerStatus($customerId, $status) {
        $sql = "UPDATE customers SET customer_status = ? WHERE customer_id = ?";
        $statement = $this->dbconn->prepare($sql);
        $statement->execute([$status, $customerId]);
    }
    public function logout(){
       
        session_unset();
        session_destroy();
        session_start();

    }

  
    


}

$customer = new Customer;

?>



