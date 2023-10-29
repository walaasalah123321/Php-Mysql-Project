<?php 

include_once("include/logged.php");
include_once("include/conn.php");
try{
	$sql="SELECT * FROM `testimonial` ";
	$stmt = $conn->prepare($sql);
    $stmt->execute();
	}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}	
if(isset($_GET["id"])){
      $id=$_GET["id"];
      try{
        $sql="DELETE FROM `testimonial` WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        }
      catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
      }	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Testimonials</title>
    <link rel="stylesheet" href="cars.css">
</head>
<body>
    <body>
        <div id="wrapper">
         <h1>Testimonials List</h1>
         
         <table id="keywords" cellspacing="0" cellpadding="0">
           <thead>
             <tr>
               <th><span>Name</span></th>
               <th><span>Position</span></th>
               <th><span>Delete</span></th>
               <th><span>Update</span></th>
             </tr>
           </thead>
           <tbody>

           <?php 
           $result= $stmt->fetchAll();
           foreach($result as $row){
            $name=$row["name"];
            $position=$row["position"];
            $id=$row["id"];

            ?>
             <tr>
               <td class="lalign"><?php echo $name?></td>
               <td><?php echo $position?></td>
               <td><a href="testimonials.php?id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete?')" ><img src="../img/delete.jpg" alt=""></a></td>              
               <td><a href="UpdateTestimonials.php?id=<?php echo $id ?>"><img src="../img/update.jpg" alt=""></a></td>     
             </tr>
             <?php }?>
  
           </tbody>
         </table>
        </div> 
       </body>
</body>
</html>
