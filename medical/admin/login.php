<?php 
include_once("../config.php");
include_once (BL."function/var.php");
include_once(BL."function/db.php");
if(isset($_SESSION["admin"])){
    header("location:".URLA."index.php");
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $email=$_POST["email"];
    $pass=$_POST["password"];
    if(checkEmpty($pass) && checkEmpty($email)){
        if(Email($email)){
            $sql="SELECT  * FROM `admin` WHERE `admin_email` = ?";
            $stm=$conn->prepare($sql);
            $stm->execute([$email]);    
            $result=$stm->fetchAll();
            if(sizeof($result)>0){
                foreach ($result as $row){
                    $checkpass=password_verify($pass,$row["admin_pass"]);
                    if($checkpass){
                        $_SESSION["admin"]=$row["admin_name"];
                        header("location:".URLA);
                        die();
                    }
                }
                
           } $error_message="invalid email or password ";

        }else{
        $error_message="Invalid email";

        }
    }
    else{
        $error_message="please fill all field";
    }



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo asset?>/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo asset?>/css/style.css" >

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  </head>
  <body>
  
        <div class="cont-login d-flex align-items-center justify-content-around">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="border p-5" >
                <div class="row">
                <?php include_once (BL."function/massage.php");
?>
                     <div class="col-sm-12  ">
                        <h3 class="text-center p-3 text-white">Login</h3>
                    </div>
                    <div class="col-sm-6 offset-sm-3 ">
                        <div class="form-group ">
                            <label class="mb-2">Email </label>
                            <input type="text" name="email" class="form-control" >
                        </div>

                        <div class="form-group mt-2">
                            <label class="mb-2">Password </label>
                            <input type="password" name="password" class="form-control" >
                        </div>

                        <div class="form-group mt-3">
                           
                            <input type="submit" name="submit" class="form-control btn btn-success"   >
                        </div>
                    </div>
                </div>
                
            </form>
        </div>

        <script src="<?php echo asset?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo asset?>/js/bootstrap.min.js"></script>




  </body>
</html>