
<?php 
include_once("include/conn.php");
include_once("include/logged.php");
	// the function in conn.php return all tables in category  
  $result=getRows('category');
// search about category name using category field
if(isset($_POST["Go"])){
    $search=$_POST["search"];
    try{
        $sql=" SELECT * from `category`  WHERE `catagory` LIKE '%$search%' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll();
      }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
      }	
}
// delet select catagery 
if(isset($_GET["id"])){

  $id_car=$_GET["id"];
  // get all record from car table having category field 
  $nocategory=getRow('car','cat_id',$id_car);
  //cant delet before if not category has used in car table 
  if(empty($nocategory)){
       // delet_row is function in conn.php delet one record
       $success_message=delet_row('category','id',$id_car);
        //return all records in category table to display after delet this record
       $result=getRows('category');
  
  }
  else	{$error_message="I Not Can Delet This Category";   }
  include_once("../function/massage.php");
}

include_once("include/Nav.php");
?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Categories</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                 <form action="" method="POST">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for..." name="search" value="<?php echo isset($search)?$search:""?>">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit" name="Go">Go!</button>
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
                    <h2>List of Categories</h2>
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
                          <th>Category Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>


                      <tbody>
                       <?php 

                        foreach($result as $row){
                          $id=$row["id"];
                          $category=$row["catagory"];
                        
                       ?>

                        <tr>
                          <td><?php echo $category ?></td>
                          <td><a href="editCategory.php?id=<?php echo $id ?>"><img src="./images/edit.png" alt="Edit"></a></td>
                          <td><a href="?id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete?')" ><img src="./images/delete.png" alt="Delete"></a></td>
                        </tr>
                        <?php }?>
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
