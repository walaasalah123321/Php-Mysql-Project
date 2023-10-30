<?php
$servername = "localhost";
$username = "root";
$password = "";

try{
    $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conn = new PDO("mysql:host=$servername;dbname=medical", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
function getRows($table)  {
    try{
        global $conn;
        $Sql="SELECT * from `$table`";
        $stm=$conn->prepare($Sql);
        $stm->execute();
        $result=$stm->fetchAll();
        return $result ;
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
}
function getRow($table,$field,$value)  {
    try{
        global $conn;
        $Sql="SELECT * from `$table` where `$field`= ?";
        $stm=$conn->prepare($Sql);
        $stm->execute([$value]);
        $result=$stm->fetch();
        return $result ;
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
}
function delet_row($table,$field,$value)  {
    try{
        global $conn;
        $Sql="DELETE from `$table` where `$field`= ?";
        $stm=$conn->prepare($Sql);
        $stm->execute([$value]);
        $massage="delet sucess";
        return $massage;
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
}
?>