<?php
try{
    $sql="SELECT * FROM `testimonial` WHERE id =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result=$stmt->fetch();
    $name=$result["name"];
    $position=$result["position"];
    $content=$result["content"];
    $image=$result["image"];	
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}	
?>