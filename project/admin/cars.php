
<?php 

include_once("include/logged.php");
include_once("include/conn.php");
try{
	$sql="SELECT * FROM `cars` ";
	$stmt = $conn->prepare($sql);
    $stmt->execute();
	}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table V01</title>
    <link rel="stylesheet" href="cars.css">
</head>
<body>
    <body>
        <div id="wrapper">
         <h1>Cars List</h1>
         
         <table id="keywords" cellspacing="0" cellpadding="0">
           <thead>
             <tr>
               <th><span>Car Title</span></th>
               <th><span>Price</span></th>
               <th><span>Model</span></th>
               <th><span>Delete</span></th>
               <th><span>Update</span></th>
             </tr>
           </thead>
           <tbody>
            <?php 
           $result= $stmt->fetchAll();
           foreach($result as $row){
            $title=$row["title"];
            $price=$row["price"];
            $model=$row["model"];
            $id=$row["id"];

            ?>
             <tr>
               <td class="lalign"><?php echo $title ?></td>
               <td><?php echo $price ?></td>
               <td><?php echo $model ?></td>
               <td><a href="delet.php?id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete?')" ><img src="../img/delete.jpg" alt=""></a></td>              
               <td><a href="UpdateCar.php?id=<?php echo $id ?>"><img src="../img/update.jpg" alt=""></a></td>             </tr>
             <?php }?>
           </tbody>
         </table>
        </div> 
       </body>
</body>
</html>
