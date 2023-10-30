<?php 
include_once("../../config.php");
include_once(BL."function/db.php");
include_once(BL."function/var.php");
include_once(BLA."include/navbar.php");

    if($_GET["id"]){
        $success_message=delet_row('city','city_id',$_GET["id"]);
        include_once(BL."function/massage.php");
        header("refresh:2;url=".URLA."city/view.php");


    }
    

    include_once(BLA."include/footer.php");

?>