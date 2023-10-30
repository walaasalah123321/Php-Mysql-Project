<?php include_once("../../config.php");
include_once(BL."function/db.php");
include_once(BL."function/var.php");
include_once(BLA."include/navbar.php");
if(isset($_GET["id"])){
    $success_message=delet_row('service','service_id',$_GET["id"]);
   


}

?>
<div class="col-sm-12">
<?php 
if(isset($success_message)){
    include_once(BL."function/massage.php");
    header("refresh:2;url=".URLA."service/view.php");
}
    
?>
        <h3 class="text-center p-3 bg-primary text-white">View All Service</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
       
                </tr>
            </thead>
            <tbody>
                
                <?php  foreach(getRows('admin') as $row){   ?>
                <tr class="text-center">
                    <td scope="row"><?php echo $row["admin_id"] ?></td>
                    <td class="text-center"> <?php echo $row['admin_name'] ?>  </td>
                    <td class="text-center"> <?php echo $row['admin_email'] ?>  </td>
                </tr>
                
                <?php } ?>
               
            </tbody>
        </table>
        
  
</div>
<?php  include_once(BLA."include/footer.php");
?>