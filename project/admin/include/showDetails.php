<?php 
try{
    $sql="SELECT * FROM `cars` WHERE id =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
	$result=$stmt->fetch();
	$title=$result["title"];
	$price=$result["price"];
    $model=$result["model"];
	$proprites=$result["proprites"];
	$describ=$result["describ"];
	$auto=$result["auto"];
	$image=$result["image"];
	$publish=$result["published"];
	$catId=$result["cat_id"];

}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}	
try{
	$sqlcat="SELECT * FROM `catagories`";
	$stmtcat= $conn->prepare($sqlcat);
	$stmtcat->execute();
}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}	
?>