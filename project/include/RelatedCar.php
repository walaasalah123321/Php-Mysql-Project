<?php 
if(isset($_GET["cat_id"])){
    $cat_id=$_GET["cat_id"];
    $id=$_GET["id"];
include_once("admin/include/conn.php");
try{
	$sql="SELECT * FROM `cars` where `cat_id`= ? AND NOT `id` = ?";
	$stmt = $conn->prepare($sql);
    $stmt->execute([$cat_id,$id]);
}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}	

}
?>
<!-- Related Car Start -->
<div class="container-fluid pb-5">
        <div class="container pb-5">
            <h2 class="mb-4">Related Cars</h2>
            <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
            <?php  
            $result= $stmt->fetchAll();
            foreach ($result as $row){
            $title=$row["title"];
            $auto=$row["auto"];
            $model=$row["model"];
            $price=$row["price"];
            $content=$row["describ"];
            if($auto) {$selected="AUTO";}
            else{
                $selected="Manual";
            }
            $image=$row["image"];
            $proprites=$row["proprites"];
            $id=$row["id"];
            $cat_id=$row["cat_id"];
            ?>
                <div class="rent-item">
                    <img class="img-fluid mb-4" src="img/<?php echo $image?>" alt="<?php echo $title?>">
                    <h4 class="text-uppercase mb-4"><?php echo $title?></h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span><?php echo $model?></span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span><?php echo $selected?></span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span><?php echo $proprites?></span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="detail.php?id=<?php echo $id?>&&cat_id=<?php echo  $cat_id?>"><?php echo $price?>/Day</a>
                </div>
            <?php }?>
            </div>
        </div>
    </div>
    <!-- Related Car End -->
