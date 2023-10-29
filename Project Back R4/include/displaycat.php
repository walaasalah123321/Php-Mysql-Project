<?php include_once("admin/include/conn.php");
$result=getRows('category');
?>
<div class="sidebar-box">
              <div class="categories">
                <h3>Categories</h3>
                <li><a href="#">Creatives <span>(12)</span></a></li>
                <?php foreach($result as $row){?>
                    <li><a href="#"><?php echo $row["catagory"]?> <span>(22)</span></a></li>
                 <?php }?>   
               
              </div>
</div>