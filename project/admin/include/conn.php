<?php
$servername = "localhost";
$username = "root";
$password = "";

try{
    $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conn = new PDO("mysql:host=$servername;dbname=cars", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>