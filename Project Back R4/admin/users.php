<?php
include_once("include/conn.php");
include_once("include/logged.php");
// the function in conn.php return all records in user table
$result=getRows('user');
// search about user using email or username
if(isset($_POST["Go"])){
  $search=$_POST["search"];
  try{
    $sql="SELECT * from `user` WHERE `email` LIKE '%$search%' or `username` LIKE '%$search%'";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll();
    }
  catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
  }	
}
include_once("include/Nav.php");
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage <small>Users</small></h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <form  action="" method="POST">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for..." name="search" value="<?php echo (isset($search))?$search:"";?>">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="input" name="Go">Go!</button>
                      </span>
                  </div>
              </form>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Users</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Registration Date</th>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Active</th>
                          <th>Edit</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        foreach($result as $Row){
                          //to display user not admin
                          if($Row["admin"]==0){
                            $id=$Row["id"];
                          $RegisterTime=$Row["regData"];
                          $username=$Row["username"];
                          $full=$Row["full name"];
                          $email=$Row["email"];
                          $active=$Row["published"];
                          ($active)?$active="Yes":$active="NO";
                        
                        
                        ?>
                       
                        <tr>
                          <td><?php echo date("d M Y",strtotime($RegisterTime))?></td>
                          <td><?php echo $full?></td>
                          <td><?php echo $username?></td>
                          <td><?php echo $email?></td>
                          <td><?php echo $active?></td>
                          <td><a href="edituser.php?id=<?php echo $id ?>"><img src="./images/edit.png" alt="Edit"></a></td>
                        </tr>
                        <?php }}?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       
        <?php include_once("include/foot.php");?>
