<?php 
include_once("admin/include/conn.php");
try{
	$sql="SELECT * FROM `team` where `published`= 1";
	$stmt = $conn->prepare($sql);
    $stmt->execute();
	}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}	
?>
<!-- Team Start -->

<div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-4 text-uppercase text-center mb-5">Meet Our Team</h1>
            <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                <?php 
                    $result= $stmt->fetchAll();
                    foreach($result as $row){
                        $name=$row["Name"];
                        $position=$row["position"];
                        $image=$row["image"];
                        $faceBook=$row["facebook"];
                        $twitter=$row["twitter"];
                        $linkedin=$row["linkedin"];

                        ?>
                        <div class="team-item">
                            <img class="img-fluid w-100" src="img/<?php echo $image?>" alt="">
                            <div class="position-relative py-4">
                                <h4 class="text-uppercase"><?php echo $name ?></h4>
                                <p class="m-0"><?php echo $position ?></p>
                                <div class="team-social position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                    <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="<?php echo $twitter ?>"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="<?php echo $faceBook ?>" ><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="<?php echo $linkedin ?>"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- Team End -->
