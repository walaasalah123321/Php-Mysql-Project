<?php include_once("../../config.php");
include_once(BL."function/db.php");
include_once(BL."function/var.php");
include_once(BLA."include/navbar.php");

?>
<div class="col-sm-12">
        <h3 class="text-center p-3 bg-primary text-white">View All Cities</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
       
                </tr>
            </thead>
            <tbody>
                
                <?php  foreach(getRows('city') as $row){   ?>
                <tr class="text-center">
                    <td scope="row"><?php echo $row["city_id"]; ?></td>
                    <td class="text-center"> <?php echo $row['city_name'] ?>  </td>
                    
                    <td class="text-center">
                        <a href="<?php URLA?>edit.php?id=<?php echo $row["city_id"];?>" class="btn btn-info">Edit</a>
                        <a href="<?php URLA?>delet.php?id=<?php echo $row["city_id"];?>" class="btn btn-danger delete" data-field="city_id" >Delete</a>
                    </td>
                </tr>
                <?php } ?>
               
            </tbody>
        </table>
</div>
<?php  include_once(BLA."include/footer.php");
?>