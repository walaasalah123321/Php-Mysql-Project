<?php
include_once("include/logged.php");
if(isset($_GET["id"])){
    include_once("include/conn.php");

    $id=$_GET["id"];
try{
    $sql="DELETE FROM `cars` WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    echo "delete successfull";
    }
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}	

}
else{
    echo "NO can access";
}
?>