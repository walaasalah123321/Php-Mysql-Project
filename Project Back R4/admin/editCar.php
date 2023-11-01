<?php 
include_once("include/conn.php");
include_once("include/logged.php");
if(isset($_GET["id"])){
	$id=$_GET["id"];
	   $result=getRow("car","id",$id);
		$title=$result["title"];
		$content=$result["content"];
		$luggage=$result["Luggage"];
		$doors=$result["Doors"];
		$passengers=$result["Passengers"];
		(($result["active"]))?$active=1:$active=0;
		$category=$result["cat_id"];
		$price=$result["Price"];
		$image=$result["image"];
		
			if($_SERVER["REQUEST_METHOD"]==="POST"){
					include_once("include/carPost.php");
					$oldImage=$_POST["oldImage"];
					include_once("include/updateImage.php");
						try{
							$Sql="UPDATE `car` SET `title`=?,`content`=?,`Luggage`=?,`Doors`=?,`Passengers`=?,`Price`=?,`active`=?,`image`=?,`cat_id`=? WHERE id=?";
							$stm=$conn->prepare($Sql);
							$stm->execute([$title,$content,$luggage,$doors,$passengers,$price,$active,$image_name,$category,$id]);
							$success_message="updata seccessfuly";
						}
						catch(PDOException $e){
							echo "Connection failed: " . $e->getMessage();
						}
				
				include_once("../function/massage.php");

			}		
}
			
			
		
	


include_once("include/Nav.php");?>

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Cars</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit Car</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="title" required="required" class="form-control " name="title" value="<?php echo isset($title)?$title:"" ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea id="content" name="content" required="required" class="form-control"><?php echo isset($content)?$content:" ";?></textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="luggage" class="col-form-label col-md-3 col-sm-3 label-align">Luggage <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="luggage" class="form-control" type="number" name="luggage" required="required" value="<?php echo isset($luggage)?$luggage:"" ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="doors" class="col-form-label col-md-3 col-sm-3 label-align">Doors <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="doors" class="form-control" type="number" name="doors" required="required" value="<?php echo isset($doors)?$doors:"" ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="passengers" class="col-form-label col-md-3 col-sm-3 label-align">Passengers <span class="required" >*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="passengers" class="form-control" type="number" name="passengers" required="required" value="<?php echo isset($passengers)?$passengers:"" ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="price" class="form-control" type="number" name="price" required="required" value="<?php echo isset($price)?$price:"" ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" <?php if((isset($active)&&$active)){echo "checked";}?> name="active" class="flat">
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="image" name="image"  class="form-control">
												<img src="../images/<?php echo isset($image)?$image:"car_1.jpg" ?>" alt="<?php echo $title?>" style="width: 300px;">
												<input type="hidden" value="<?php echo $image?>" name="oldImage">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Category <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="category" id="">
												<option value="">Select Category</option>
													<?php 
													$resultCata=getRows('category');

													foreach($resultCata as $row){
														$catagory=$row["catagory"];
														$id=$row["id"];

													?>
														<option value="<?php echo $id?>" <?php if($id==$category){echo "selected";} ?>> <?php echo $catagory?></option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
											<a href="cars.php" class="btn btn-primary" type="button" name="cancle">Cancel</a>
												<button type="submit" class="btn btn-success" name="updata">Update</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->

			<?php include_once("include/foot.php");?>
