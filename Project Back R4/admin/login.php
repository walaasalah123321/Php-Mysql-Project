<?php
session_start();
include_once("include/conn.php");
if(isset($_POST["submit"])){
    try{
      
        $email=$_POST["email"];
        $pass=$_POST["password"];
        $username=$_POST["username"];
        $fullname=$_POST["fulname"];
       // the function in conn.php return all records in user table to check is username is already exists before or not 
        if(getRow("user","username",$username)>0){
          $error_message="The username  already exists";
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $error_message="please enter valid email";
        }
        // the function in conn.php return all records in user table to check is email is already exists before or not 

        else if(getRow("user","email",$email)>0){
          $error_message="The email already exists";
        }
        else{
          $sql="INSERT INTO `user`( `full name`, `username`, `email`, `password`) VALUES (?,?,?,?)";
          $stmt = $conn->prepare($sql);
          $pass=password_hash($pass,PASSWORD_DEFAULT);
          $stmt->execute([$fullname,$username,$email,$pass]); 
          $success_message="register complete sucessfully";
        
      }
      }
      catch(PDOException $e){
          echo "Connection failed: " . $e->getMessage();
      }
}

if(isset($_POST["login"])){
  try{
   
      $pass=$_POST["password"];
      $username=$_POST["username"];
     	// the function in conn.php return  one record from user table that have username equle $username
     $result=getRow("user","username",$username);
     // check is username is already  exists or not 
     if($result>0){
        $username=$result["username"];
        $password=$result["password"];
        $admin=$result["admin"];
        $active=$result["published"];

        if(password_verify($pass,$password)){
          if($active){
              $_SESSION["login"]=$username; 
               // check is admin or user

              if($admin){
                $_SESSION["admin"]=1;
                header("location:users.php");
              }
              else{
                $_SESSION["admin"]=0;
                header("location:../index.php");
              }
          }
          else $error_message="call the administrator to active this acount ";
        }
        else{
           $error_message="password not correct";  
        }
    }
    else $error_message ="username not correct or no valid";
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}
include_once("../function/massage.php");


?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
  <script type="text/javascript">
 
 function timedMsg()
 {
 var t=setTimeout("document.getElementById('massage').style.display='none';",2000);
 }
 </script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rent Car Admin | Login/Register</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="login">
    
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
              </div>
              <div>
              <button type="submit" class="btn btn-light" name="login">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register" > Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-car"></i></i> Rent Car Admin</h1>
                  <p>©2016 All Rights Reserved. Rent Car Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
            </form>
          </section>
        </div>
        <div id="register" class="animate form registration_form">
          <section class="login_content">
         
            <form action=""  method="POST"  >
            
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Fullname" required=""  name="fulname"/>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username"/>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="email"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
              </div>
             
              <div>
               
              <button type="submit" class="btn btn-light" name="submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register" > Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-car"></i></i> Rent Car Admin</h1>
                  <p>©2016 All Rights Reserved. Rent Car Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
             
            </form>
          </section>
        </div>
      </div>
    
    </div>
  </body>
  <script language="JavaScript" type="text/javascript">timedMsg()</script>

</html>
