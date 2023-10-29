<?php
	include_once("include/logged.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){
	include_once("include/addimage.php");
	include_once("include/conn.php");
	$name=$_POST["tesName"];
	$position=$_POST["poditio"];
	$face=$_POST["FaceBook"];
	$twitter=$_POST["Twitter"];
	$linkedin=$_POST["Linkedin"];
	
	// Get reference to uploaded image

try{
	$sql="INSERT INTO `team`( `Name`, `position`, `image`, `facebook`, `twitter`, `linkedin`) VALUES (?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
    $stmt->execute([$name,$position,$image_name,$face,$twitter,$linkedin]);
    echo "succes";
	}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}	
}
?>
<!DOCTYPE html>

<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Insert Member</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<form class="m-auto" style="max-width:600px" enctype="multipart/form-data" method="POST" action="">
				<h3 class="my-4">Insert Member</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Name</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="tesName" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Position</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="poditio"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">FaceBook Link</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg"  name="FaceBook"></div>
				</div>
                <hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Twitter Link</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg"  name="Twitter"></div>
				</div>
                <hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Linkedin Link</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg"  name="Linkedin"></div>
				</div>
				<hr class="my-4" />
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*">
				</div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Insert</button></div>
				</div>
			</form>
		</div>
	</body>

</html>