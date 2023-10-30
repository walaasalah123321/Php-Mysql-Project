<?php include_once("../../config.php");
include_once(BL."function/db.php");
include_once(BL."function/var.php");
include_once(BLA."include/navbar.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    if(checkEmpty($name) && checkEmpty($password) && checkEmpty($email)){
        if(Email($email)){
            $password=password_hash($password,PASSWORD_DEFAULT);
            $Sql="INSERT INTO `admin`( `admin_name`, `admin_email`, `admin_pass`) VALUES (?,?,?)";
            $stm=$conn->prepare($Sql);
            $stm->execute([$name,$email,$password]);
            $success_message= "Add success";
        }
        else $error_message="invalid email";
    }
    else {$error_message="Please Enter All Dataa";}
 }
 include_once(BL."function/massage.php");


?>

<div class="col-sm-6 offset-sm-3 border p-3 mt-5">
        <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
        <form method="POST" action="">
            <div class="form-group mb-2">
                <label >Name </label>
                <input type="text" name="name" class="form-control" >
            </div>

            <div class="form-group mb-2">
                <label >Email </label>
                <input type="email" name="email" class="form-control" >
            </div>

            <div class="form-group mb-4">
                <label >Password </label>
                <input type="password" name="password" class="form-control" >
            </div>

            
            <button type="submit" name="submit" class="btn btn-success ">Save</button>
        </form>
       
</div>

 

<?php  include_once(BLA."include/footer.php");
?>