<?php
error_reporting(E_ALL);
require_once 'Db.php';

class Lga extends Db{

    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function fetch_lga(){
        $sql= 'SELECT  * FROM lga';
        $statement = $this->dbconn->prepare($sql);
        $statement->execute();
        $lga_name =   $statement->fetchAll(PDO::FETCH_ASSOC);
        if($lga_name){
            return $lga_name;
        }else{
            return false;
        }

    }
}



?>