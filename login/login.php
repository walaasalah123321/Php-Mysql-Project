<?php 
session_start();
include_once("DB_connection.php");
if(isset($_POST["submit"])){
	$name=$_POST["name"];
	$pass=$_POST["password"];
	$role=$_POST["role"];
	if(empty($name)){
		$error="name is required";
	}
	elseif(empty($pass)){
		$error="password is required";
	}
	if($role=="1"){
		$role="Admin";
	}
	elseif($role=="2"){

		$role="Student";
	}else {
		$role="Teacher";
	}
	$sql="SELECT * from `$role` where `username`= ? ";
	$stmt=$conn->prepare($sql);
	$stmt->execute([$name]);
	if($stmt->rowCount()==1){
		$result=$stmt->fetch();

		$username=$result["username"];
		$password=$result["password"];
		if(!password_verify($pass,$password)){
			$error ="incorrect password";

		}else{
			$_SESSION["name"]=$username;
			$_SESSION["role"]=$role;
			header("location:home.php");
		}


	}else {
		$error ="incorrect username";
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
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="logo.png">
</head>
<body class="body-login">
    <div class="black-fill"><br /> <br />
    	<div class="d-flex justify-content-center align-items-center flex-column">
    	<form class="login"  method="POST" action="">

    		<div class="text-center">
    			<img src="logo.png"
    			     width="100">
    		</div>
    		<h3>LOGIN</h3>
		
    		
		  <div class="mb-3">
		    <label class="form-label">Username</label>
		    <input type="text" class="form-control" name="name">
		  </div>
		  
		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password"    class="form-control" name="password">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Login As</label>
		    <select class="form-control"  name="role">
		    	<option value="1">Admin</option>
		    	<option value="2">Student</option>
		    	<option value="3">Teacher</option>
		    </select>
		  </div>

		  <button type="submit" class="btn btn-primary" name="submit">Login</button>
		  <a href="index.php" class="text-decoration-none">Home</a>
		</form>
        
        <br /><br />
        <div class="text-center text-light">
        	Copyright &copy; 2022 Y School. All rights reserved.
        </div>

    	</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>