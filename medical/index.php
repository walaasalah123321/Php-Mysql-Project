<?php 
include_once("config.php");
include_once(BL."function/db.php");
include_once(BL."function/var.php");
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $selected="selected";
    $mobile=$_POST["mobile"];
    $city=$_POST["city"];
    $service=$_POST["service"];
    if(isset($_POST["yourmassage"])){
        $massege=$_POST["yourmassage"];
    }
    else{ $massege=" ";}
          
      try{
          $Sql="SELECT * FROM `orders` WHERE `order_email`=? AND `order_serv_id`=? AND `order_city_id` =?";
          $stm=$conn->prepare($Sql);
          $stm->execute([$email,$service,$city]);
          if($stm->rowCount()>0){
            $error_message="you make order before ";
          }
      
      }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
      }

    if(!empty($city)){
        if(!empty($service)){ 
            if(empty($error_message)){
                try{
                    $Sql="INSERT INTO `orders`( `order_name`, `order_mobile`, `order_email`, `order_nodes`, `order_serv_id`, `order_city_id`) VALUES (?,?,?,?,?,?)";
                    $stm=$conn->prepare($Sql);
                    $stm->execute([$name,$mobile,$email,$massege,$service,$city]);
                    $success_message= "send sucessfull";
                    $name="";
                    $email="";
                    $selected="";
                    $mobile="";
                    $city="";
                    $service="";
                    $massege=" ";
                
                }catch(PDOException $e){
                    echo "Connection failed: " . $e->getMessage();
                }
            }
          }
        else{
            $error_message="please choose Service ";
        }
    }else{
        $error_message="please choose city ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Y School</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
	
</head>
<body class="body-login">
    <div class="black-fill"><br /> <br />
    <?php     include_once(BL."function/massage.php");
?>
    	<div class="d-flex justify-content-center align-items-center flex-column mt-5">
           
        <form action="" method="POST">
              <div class="form-group row mb-4">
                <div class="col-md-4 mb-4 mb-lg-0">
                  <input type="text" class="form-control" placeholder="Enter Your Name" required name="name" value="<?php echo (isset($name))?$name:""?>">
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Enter Your Mobile" required name="mobile" value="<?php echo (isset($mobile))?$mobile:""?>">
                </div> 
                <div class="col-md-4">
                  <input type="email" class="form-control" placeholder="Enter Your Email" required name="email" value="<?php echo (isset($email))?$email:""?>">
                </div>
              </div>

              <div class="form-group row mb-4">
                <div class="col-md-6 mb-4 mb-lg-0">
                        <select class="form-select custom-select custom-select-lg" name="city" id="select-option1">
                                <option value="">Select City</option>
                                <?php  foreach(getRows('city') as $row){   ?>
                                    <option value="<?php echo $row["city_id"]?>" <?php echo (isset($city)&&$city==$row["city_id"])?$selected:""?>><?php echo $row["city_name"]?></option>
                               <?php } ?> 
                        </select>               
                    
                </div>
                <div class="col-md-6 ">
                        <select class="form-select custom-select custom-select-lg" name="service" id="select-option1">
                                <option value="">Select Service</option>
                                <?php  foreach(getRows('service') as $row){   ?>
                                    <option value="<?php echo $row["service_id"]?>" <?php echo (isset($service)&&$service==$row["service_id"])?$selected:""?>><?php echo $row["service_name"]?></option>
                               <?php } ?> 
                                    
                        </select>                 
                </div>
              </div>


              <div class="form-group row mb-5">
                <div class="col-md-12">
                  <textarea name="yourmassage" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group row d-flex justify-content-center align-items-center">
                <div class="col-md-6 mr-auto ">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5 mx-5" value="Send Order" name="submit">
                </div>
              </div>
            </form>
        
        <br /><br />
        <div class="text-center text-light">
        	Copyright &copy; walaa salah. All rights reserved.
        </div>

    	</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>