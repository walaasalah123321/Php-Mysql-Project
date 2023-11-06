<?php
class Database{
    private $dns="mysql:host=localhost;dbname=oop_crud";
    private $user="root";
    private $password="";
    private  $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    public $conn;
    public function __construct(){
       try{
            $this->conn=new PDO($this->dns,$this->user , $this->password, $this->options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
       catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
    // changeDb used for delet, updata ,insert
    public function changeDb($sql,$array){
      try{
            $stm=$this->conn->prepare($sql);
            $stm->execute($array);
            return true;
        }
      catch(PDOException $e){
             return false;
        }
    }
    public function readAll($table){
      try{
            $sql="SELECT * From `$table` ORDER BY id DESC ";
            $stm=$this->conn->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
      catch(PDOException $e){
             echo "Connection failed: " . $e->getMessage();
        }
    }
    public function readRow($sql ,$array){
       try{
            $stm=$this->conn->prepare($sql);
            $stm->execute($array);
            return $stm->fetch(PDO::FETCH_ASSOC);
        }
       catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
 
    }
   
}
?>