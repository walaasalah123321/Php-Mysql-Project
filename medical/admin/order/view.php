
<?php  include_once("../../config.php");
include_once(BL."function/db.php");
include_once(BL."function/var.php");
include_once(BLA."include/navbar.php"); 

if(isset($_GET["id"])){
    $success_message=delet_row('orders','order_id',$_GET["id"]);
   


}?>


    <div class="col-sm-12">
    <?php 
if(isset($success_message)){
    include_once(BL."function/massage.php");
    header("refresh:2;url=".URLA."order/view.php");
}
    
?>
        <h3 class="text-center p-3 bg-primary text-white">View All Orders</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Service</th>
                    <th scope="col">City</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Action</th>
       
                </tr>
            </thead>
            <tbody>
                <?php $data = getRows('orders');  ?>
                <?php foreach($data as $row){   ?>
                <tr class="text-center">
                    <td scope="row"><?php echo $row["order_id"]; ?></td>
                    <td class="text-center"><?php echo $row['order_name']; ?></td>
                    <td class="text-center"><?php echo $row['order_email']; ?></td>
                    <td class="text-center"><?php echo $row['order_mobile']; ?></td>
                    <?php

                        $rowCity = getRow('city',"city_id","$row[order_city_id]");
                        $rowService = getRow("service",'service_id',$row['order_serv_id']);
                    ?>
                    <td class="text-center"><?php echo  $rowService['service_name']; ?></td>
                    <td class="text-center"><?php echo $rowCity['city_name']; ?></td>
                    <td class="text-center"><?php echo $row['order_nodes']; ?></td>
                    
                    <td class="text-center">
                    <a href="<?php URLA?>view.php?id=<?php echo $row["order_id"];?>" class="btn btn-danger delete"  >Delete</a>
                    </td>
                </tr>
                <?php  } ?>
               
            </tbody>
        </table>
    </div>



    <?php  include_once(BLA."include/footer.php");
?>



   

