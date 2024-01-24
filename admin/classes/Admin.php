<?php
error_reporting(E_ALL);
require_once "Db.php";

class Admin extends Db{
    public $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function get_adminbyid($id){
        $query = "SELECT * FROM staff WHERE staff_id =?";
        $stmt = $this->dbconn->prepare($query);
        $result = $stmt->execute([$id]);
        $admin_records = $stmt->fetch(PDO::FETCH_ASSOC);
        return $admin_records;
    }

    public function register_admin($fullname,$email,$password,$confirm_password){
        if($password == $confirm_password){
            try{
                $hashed_password = password_hash($password , PASSWORD_DEFAULT);
                $sql = "INSERT INTO staff(staff_fullname , staff_email , staff_password)VALUES(?,?,?)";
                $statement = $this->dbconn->prepare($sql);
                $response =  $statement->execute([$fullname,$email,$hashed_password,]);
                $staff_id = $this->dbconn->lastInsertId();
                return $staff_id;
            }catch(Exception  $e){
                echo $e->getMessage();
                $_SESSION["error_message"] = "An error occured :".  $e->getMessage();
                return 0;
            }
           

            if($response){
                $_SESSION['success_message'] = "Registered Successfully";
            }else{
                return false;
            }
        }
        
    }

    public function get_userbyid($id){
        $query = "SELECT * FROM customers WHERE customer_id =?";
        $stmt = $this->dbconn->prepare($query);
        $result = $stmt->execute([$id]);
        $user_records = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user_records;
    }



    public function login_admin($email,$password){
        try{
            $sql = "SELECT * FROM staff WHERE staff_email = ? LIMIT 1; ";
            $statement = $this->dbconn->prepare($sql);
            $statement->execute([$email]);
            $records = $statement->fetch(PDO::FETCH_ASSOC);
    
            if($records){
                $hashed_password = $records['staff_password'];
                $password = password_verify($password, $hashed_password);
                if($password){
                    return $records;
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }catch(Exception $e){
                echo $e->getMessage();
                $_SESSION["error_message"] = "An error occured :".  $e->getMessage();
                return 0;
        }
      
    }
    public function logout(){
        session_unset();
        session_destroy();
        
    }

    public function checkstatus(){
        $sql = 'SELECT * FROM customers WHERE customer_status = "logged_in" ';
        $statement = $this->dbconn->prepare($sql);
        $statement->execute();
        $records =   $statement->fetchAll(PDO::FETCH_ASSOC);

        if($records){
            return $records;
        }else{
            return false;
        }
    }


}

$admin = new Admin;
?>