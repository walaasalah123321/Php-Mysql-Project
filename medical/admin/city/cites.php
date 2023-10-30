<?php include_once("../../config.php");
include_once(BL."function/db.php");
include_once(BL."function/var.php");
include_once(BLA."include/navbar.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $cities=$_POST["cities"];
    if(checkEmpty($cities)){

        try{
            $Sql="INSERT INTO `city` (`city_name`) VALUES (?)";
            $stm=$conn->prepare($Sql);
            $stm->execute([$cities]);
            $success_message= "Add success";
            header("refresh:2;url=".URLA."city/cites.php");

           
        }catch(PDOException $e){
           $error_message="add before ";
        }
    }
    else {$error_message="Please Enter City";}

    include_once(BL."function/massage.php");
}
?>

<div class="col-sm-6 offset-sm-3 border p-3 mt-5">

        <h3 class="text-center p-3 bg-primary text-white">Add New Cities</h3>
        
        <form method="POST" action="">
            <div class="form-group mb-2">
                <label class="mb-2">Cities </label>
                <input type="text" name="cities" class="form-control" >
            </div>

            <button type="submit" name="submit" class="btn btn-success ">Save</button>
        </form>
       
</div>



<?php  include_once(BLA."include/footer.php");
?>