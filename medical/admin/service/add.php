<?php 
 include_once("../../config.php");
include_once(BL."function/db.php");
include_once(BL."function/var.php");
include_once(BLA."include/navbar.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $service=$_POST["service"];
    if(checkEmpty($service)){
        try{
            $Sql="INSERT INTO `service` (`service_name`) VALUES (?)";
            $stm=$conn->prepare($Sql);
            $stm->execute([$service]);
            $success_message= "Add success";
            header("refresh:2;url=".URLA."service/add.php");

        }catch(PDOException $e){
            $error_message="add before ";
        }
    }
    else {$error_message="Please Enter City";}

    include_once(BL."function/massage.php");
}
?>
<div class="col-sm-6 offset-sm-3 border p-3">
<h3 class="text-center p-3 bg-primary text-white">Add New Service</h3>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group mb-3">
        <label class="mb-2">Name Of Service</label>
        <input type="text" name="service" class="form-control" >
    </div>
    
    <button type="submit" name="submit" class="btn btn-success">Save</button>
</form>

</div>
<?php 

include_once(BLA."include/footer.php");
?>