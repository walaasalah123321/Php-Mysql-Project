<?php 
include_once("db.php");
$ob=new Database();
if(isset($_GET["id"]))
    {
        $id=base64_decode($_GET["id"]);
        $result=$ob->readRow("SELECT `photo`  FROM `user` WHERE id= ?" ,[$id]);
        $delet=$ob->changeDb("DELETE FROM `user` WHERE id=?",[$id] );
        if($delet){

         if($result){unlink("./img/".$result["photo"]);}

        $massage="Delete Successfully";
        $color="success";
        $hr="#check-circle-fill";
      }else{
          $massage="Delete failed";
          $color="danger";
          $hr="#exclamation-triangle-fill";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
</svg><br>
    <div class="container ">
   
        
        <div class="row d-flex justify-content-center ">
            <div class="col-md-11">
            <?php if(isset($massage)&&!empty($massage)){?>

                <div class="alert alert-<?php echo $color?>  d-flex align-items-center lert-dismissible fade show" role="alert" >
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="<?php echo $color;?>:"><use xlink:href="<?php echo $hr;?>"/></svg>
                    <div ><?php echo $massage?></div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }?>
                <div class="card shadow mt-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>All Student info</h3>
                            </div>
                            <div class="col-md-6">
                               <a href="index.php" class="btn btn-info  float-end" >Add Student</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                       <table class="table table-bordered table-striped">
                            <thead> 
                                <tr>
                                    <td>Name</td>
                                    <td>E-mail</td>
                                    <td>Address</td>
                                    <td>Image</td>
                                    <td>Phone</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($ob->readAll("user") as $row){
                                    $id=$row["id"];
                                    $name=$row["name"];
                                    $email=$row["email"];
                                    $Address=$row["address"];
                                    $phone=$row["phone"];
                                    $image=$row["photo"];


                                ?>
                                    <tr>
                                        <td><?php echo $name?></td>
                                        <td><?php echo $email?></td>
                                        <td><?php echo $Address?></td>
                                        <td><img src="img/<?php echo $image?>" class="img-fluid" style="width:100px"></td>
                                        <td><?php echo $phone?></td>
                                        <td >
                                            <a  href="edit.php?id=<?php echo base64_encode($id);?>" class="text-primary mx-1 "><i class="far fa-edit fa-lg "></i></a>
                                            <a href="?id=<?php echo base64_encode($id);?>" class="text-danger" onclick="return confirm('are you sure delete it')"><i class="fas fa-trash-alt fa-lg"></i></a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                       </table>
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