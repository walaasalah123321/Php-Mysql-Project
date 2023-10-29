<?php 
include_once("include/logged.php");
if(isset($_GET["id"])){
	include_once("include/conn.php");
	$id=$_GET["id"];
	include_once("include/testDetails.php");
	if(isset($_POST["click"])){
		$name=$_POST["tesName"];
		$content=$_POST["content"];
		$poditio=$_POST["poditio"];
		$oldImage=$_POST["oldImage"];
		include_once("include/updateImage.php");
		
		try{
			$sql="UPDATE `testimonial` SET `name`=?,`position`=?,`content`=?,`image`=?  WHERE `id`=?";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$name,$poditio,$content,$image_name,$id]);
			echo "sucess updata";
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}	 
	}
}

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Edit / Update Testimonials</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<form action="" method="POST" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
				<h3 class="my-4">Edit / Update Testimonials</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Name</label>
					<div class="col-md-7"><input value="<?php echo $name?>" type="text" class="form-control form-control-lg" id="title2" name="tesName" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Position</label>
					<div class="col-md-7"><input  value="<?php echo $position?>" type="text" class="form-control form-control-lg" id="price6" name="poditio"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" required><?php echo $content?></textarea></div>
				</div>
				<hr class="my-4" />
				<img src="../img/<?php echo $image ?>" style="width:100px; height:100px;">
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*">
				</div>
				<input type="hidden" value="<?php echo $image?>" name="oldImage">
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button name="click" class="btn btn-primary btn-lg" type="submit">Update</button></div>
				</div>
			</form>
		</div>
	</body>

</html>