
<?php 
include_once("include/conn.php");
include_once("include/logged.php");
if(isset($_GET["id"])){
	$id=$_GET["id"];
	// the function in conn.php return  one record from category table that have id equle $id
	$result=getRow('category','id',$id);
	$category=$result["catagory"];
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		try{
			if(isset($_POST["updata"])){
				$category=$_POST["category"];
				$get=getRow('category','catagory',$category);
				// check before updata category is category already exists or not 
				if($get>0){
					$error_message="category already exists";
				}
				else{
					$Sql="UPDATE `category` SET `catagory`=? WHERE id=?";
					$stm=$conn->prepare($Sql);
					$stm->execute([$category, $id]);
					$success_message="updata seccessfuly";
				}
				
			}
			else{ $success_message="cancled updata seccessfuly";}
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
	}
	include_once("../function/massage.php");
}
include_once("include/Nav.php");?>

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Edit Category</h3>
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
									<h2>Edit Category</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="add-category">Edit Category <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="add-category" required="required" class="form-control " name="category" value="<?php echo isset($category)?$category:""?>">
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="submit" name="cancle">Cancel</button>
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
