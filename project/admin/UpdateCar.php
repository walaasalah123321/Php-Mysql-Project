<?php 
include_once("include/logged.php");
if(isset($_GET["id"])){
		include_once("include/conn.php");

		$id=$_GET["id"];


		if(isset($_POST["click"])){
			$title=$_POST["title"];
			$content=$_POST["content"];
			$price=$_POST["price"];
			$model=$_POST["model"];
			$properties=$_POST["properties"];
			$custom_select=$_POST["custom-select"];
			$oldImage=$_POST["oldImage"];
			include_once("include/updateImage.php");
			$publish=1;
			if(!isset($_POST["publish"])){
				$publish=0;
			}
			

			$newCat=$_POST["category"];
			try{
				$sql="UPDATE `cars` SET `title`=?, `describ`=?,`model`=?,`auto`=?,`proprites`=?,`price`=? ,`image`=?, `published`=?,`cat_id`=? WHERE `id`=?";
				$stmt = $conn->prepare($sql);
				$stmt->execute([$title,$content,$model,$custom_select,$properties,$price,$image_name,$publish,$newCat,$id]);
				echo "sucess updata";
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}	 
		}
		include_once("include/showDetails.php");
}

if(isset ($id)){
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Edit / Update Car</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<form method="POST" action="" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
				<h3 class="my-4">Edit / Update Car</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label" >Car Title</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="title" required value="<?php echo $title?>"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label" >Content</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" required ><?php echo $describ?></textarea></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label" >Price</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="price" value="<?php echo $price?>"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="model6" class="col-md-5 col-form-label" >Model</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="model6" name="model" value="<?php echo $model?>"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="select-option1" class="col-md-5 col-form-label">Auto / Manual</label>
					<div class="col-md-7"><select name="custom-select" class="form-select custom-select custom-select-lg" id="select-option1"  >
							 <option value="1" <?php if($auto){?>selected<?php }?>>Auto</option>
							 <option value="0" <?php if($auto=="0"){?>selected<?php }?>>Manual</option>
						</select></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="properties6" class="col-md-5 col-form-label" >Properties</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="properties6" name="properties" value="<?php echo $proprites?>"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row">
					<label for="select-option1" class="col-md-5 col-form-label">Category</label>
					<div class="col-md-7">
                        <select class="form-select custom-select custom-select-lg" name="category" id="select-option1">
							<?php
							$result= $stmtcat->fetchAll();
							foreach($result as $row){
								$catName=$row["catagory"];
								$idCat=$row["id"];
								if($idCat==$catId){
									$selected="selected";
								}
								else{
									$selected="";
								}
							?>
							<option value="<?php echo $idCat?>" <?php echo $selected; ?>><?php echo $catName ?></option>
							<?php }?>
						</select></div>
				</div>
				<hr class="my-4" />
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*" >
					<img src="../img/<?php echo $image ?>" alt="<?php echo $title ?>" style="width:300px;">
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="publish" class="col-md-5 col-form-label" >publish</label>
					<div class="col-md-7"><input type="checkbox"  id="publish" name="publish" <?php if($publish){ ?> checked <?php }?> ></div>
				</div>
				<input type="hidden" value="<?php echo $image?>" name="oldImage">
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit" name="click">Insert</button></div>
				</div>
			</form>
		</div>
	</body>

</html>
<?php } else{?>
 <h3>invalid data</h3>
<?php }?>