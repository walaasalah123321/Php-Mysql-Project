<?php include_once("admin/include/conn.php");
try{
   $Sql="SELECT `catagory`, COUNT(car.id) AS num FROM `category` INNER JOIN `car` ON car.cat_id= category.id AND car.active = 1 
   GROUP BY category.catagory " ;
   $stm=$conn->prepare($Sql);
   $stm->execute(); 
   $result=$stm->fetchAll();
}
catch(PDOException $e){
   echo "Connection failed: " . $e->getMessage();
 }	
?>
<div class="sidebar-box">
              <div class="categories">
                <h3>Categories </h3>
                <?php foreach($result as $row){?>
                    <li><a href="#"><?php echo $row["catagory"]?> <span><?php echo $row["num"]?></span></a></li>
                 <?php }?>   
               
              </div>
</div>