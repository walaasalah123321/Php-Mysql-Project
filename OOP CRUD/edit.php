<?php 
include_once("db.php");
$ob=new Database();
if(isset($_GET["id"])){
    $id=base64_decode($_GET["id"]);
    $row=$ob->readRow("Select * from `user` where id=?",[$id]);
    $name=$row["name"];
    $email=$row["email"];
    $Address=$row["address"];
    $phone=$row["phone"];
    $image=$row["photo"];
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {

      $name=$_POST["name"];
      $email=$_POST["email"];
      $phone=$_POST["phone"];
      $Address=$_POST["Address"];
      $image=$_POST["old"];

      include_once("updateImage.php");
      if(!isset($image_name)) 
      {
          $massage=$error[0];
          $color=$error[1];
          $hr=$error[2];
         
      }
      elseif($ob->readRow("Select * from `user` where email=? AND NOT id=?",[$email,$id])){
        $massage="email is already exits";
        $color="danger";
        $hr="#exclamation-triangle-fill";
      }
      else{
        $sql="UPDATE `user` SET `name`=?,`email`=?,`phone`=?,`address`=?,`photo`=? WHERE id=?  ";
        $result=$ob->changeDb($sql,[$name,$email,$phone,$Address, $image_name,$id]);
        // to delet old image
        unlink("./img/".$image);
        $image=$image_name;
        if($result){
          $massage="Updata Successfully";
          $color="success";
          $hr="#check-circle-fill";
        }else{
            $massage="Updata failed";
            $color="danger";
            $hr="#exclamation-triangle-fill";
        }
      }
       
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registrtion Form!</title>
  </head>
  <body>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
    <div class="container ">
   
        
        <div class="row d-flex justify-content-center ">
            <div class="col-md-6">
            <?php if(isset($massage)&&!empty($massage)){?>

                <div class="alert alert-<?php echo $color?>  d-flex align-items-center lert-dismissible fade show mt-2" role="alert" >
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="<?php echo $color;?>:"><use xlink:href="<?php echo $hr;?>"/></svg>
                    <div ><?php echo $massage?></div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }?>
                <div class="card shadow mt-4">
                    <div class="card-header">
                    <div class="row">
                            <div class="col-md-6">
                                <h3>Updata Student</h3>
                            </div>
                            <div class="col-md-6">
                               <a href="student.php" class="btn btn-info  float-end" >Show Student Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="">Name</label>
                            <input type="text" name="name" placeholder="Enter Your Name" class="form-control mb-1" required value="<?php echo $name?>">
                            <label for="">Email</label>
                            <input type="text" name="email" placeholder="Enter Your Email" class="form-control mb-1" required value="<?php echo $email?>">
                            <label for="">Phone</label>
                            <input type="text" name="phone" placeholder="Enter Your Phone" class="form-control mb-1" required value="<?php echo $phone?>">
                            <label for="">Address</label>
                            <textarea name="Address" class="form-control mb-1"><?php echo $Address?></textarea> 
                            <label for="">Photo</label>
                            <input type="file" name="photo"  class="form-control mb-1">
                            <img src="img/<?php echo $image ?>" style="width:200px" alt="" class="img-thumbnail">
                            <input type="submit" name="submit" value="UpData" class="btn btn-success mt-3 d-grid mx-auto">
                            <input type="hidden" value="<?php echo $image?>" name="old">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>