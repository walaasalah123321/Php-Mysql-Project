<?php 
include_once("include/conn.php");
include_once("include/logged.php");
if(isset($_POST["add"])){
	$category=$_POST["category"];
	// the function in conn.php return all tables in category  
	$result=getRow("category","catagory",$category);
	// check before add category is category name already exists or not 
	if($result>0){
		$error_message="The category  already exists";
	}
	else{
		try{
			$Sql="INSERT INTO `category` (`catagory`) VALUES (?)";
			$stm=$conn->prepare($Sql);
			$stm->execute([$category]);
			$success_message="add Category seccessfuly";
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
	}
}
if(isset($_POST["cancle"])){
	$success_message="cancle Category seccessfuly";
}
include_once("../function/massage.php");

include_once("include/Nav.php");?>


			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Categories</h3>
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
									<h2>Add Category</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left " method="POST" action="">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="add-category">Add Category <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="add-category" required="required" class="form-control " name="category">
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="submit" name="cancle">Cancel</button>
												<button type="submit" class="btn btn-success" name="add">Add</button>
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