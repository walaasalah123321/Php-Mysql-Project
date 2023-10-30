<?php include_once("../../config.php");
include_once(BL."function/db.php");
include_once(BLA."include/navbar.php");
include_once(BL."function/var.php");


if($_GET["id"] && is_numeric($_GET["id"])){
    $result=getRow("service","service_id",$_GET["id"]);
     $service=$result["service_name"];

    // try{
    //     $Sql="SELECT * FROM `city` WHERE `city_id`=?";
    //     $stm=$conn->prepare($Sql);
    //     $stm->execute([$_GET["id"]]);
    //     $result=$stm->fetch();
    //     $city=$result["city_name"];
       
    // }catch(PDOException $e){
    //     echo "Connection failed: " . $e->getMessage();
    // }
}else{ header("location:".URLA);}
    if(isset($_POST["submit"])){
        $service=$_POST["city"];
        if(checkEmpty($service)){
            try{
        
                $Sql="UPDATE `service` SET `service_name`=? where `service_id`=?";
                $stm=$conn->prepare($Sql);
                $stm->execute([$service ,$_GET["id"]]);
                $service_name=$service;
                $success_message="updata seccess ";
            header("refresh:2;url=".URLA."service/view.php");
            
            }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
        }
       
    }else {$error_message="Please Enter Service";}
    }
include_once(BL."function/massage.php");


?>
<div class="col-sm-6 offset-sm-3 border p-3 mt-5">

        <h3 class="text-center p-3 bg-primary text-white">Add New Service</h3>
        
        <form method="POST" action="">
            <div class="form-group mb-2">
                <label class="mb-2">Services </label>
                <input type="text" name="city" class="form-control" value="<?php echo $service?>">
            </div>

            <button type="submit" name="submit" class="btn btn-success ">Save</button>
        </form>
       
</div>



<?php  include_once(BLA."include/footer.php");
?>