<?php 
include_once("include/conn.php");
include_once("include/logged.php");
if(isset($_GET["id"])){
	$id=$_GET["id"];	
	// the function in conn.php return  one record from user table that have id equle $id
	$Row=getRow('user','id',$id);
	$user=$Row["username"];
	$full=$Row["full name"];
	$email=$Row["email"];
	$password=$Row["password"];
	$active=$Row["published"];
	($active)?$active=1:$active=0;
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		try{
			if(isset($_POST["updata"])){
				$user=$_POST["user-name"];
				$full=$_POST["full_name"];
				$email=$_POST["email"];
				
				$newpass=$_POST["password"];
				if(!password_verify($newpass,$password)){
					$password=password_hash($newpass,PASSWORD_DEFAULT);
				}
				isset($_POST["active"])?$active=1:$active=0;
				$Sql="UPDATE `user` SET `full name`=?,`username`=?,`email`=?,`password`=?,`published`=? WHERE id=?";
				$stm=$conn->prepare($Sql);
				$stm->execute([$full ,$user,$email,$password,$active,$id]);
				$success_message="updata seccessfuly";
			}
			else{ $success_message="cancled updata seccessfuly";}
			// to display massages 
		//include_once("../function/massage.php");

		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
	}
}

include_once("../function/massage.php");

include_once("include/Nav.php");

?>



			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Users</h3>
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
									<h2>Edit User</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="POST">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" class="form-control " name="full_name"  value="<?php echo isset($full)?$full:"" ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Username <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="user-name" name="user-name" required="required" class="form-control"  value="<?php echo isset($user)?$user:"" ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="email" class="form-control" type="email" name="email" required="required"   value="<?php  echo isset($email)?$email:"" ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="flat" name="active"  <?php if((isset($active)&&$active)){echo "checked";}?>>
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required" >*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" id="password" name="password" rname="password" equired="required" class="form-control" value="<?php echo isset($password)?$password:""?>">
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
