<?php if(isset($error_message) && $error_message !=''){   ?>
        <h3 class="text-center  text-danger"  id="massage"> <?php echo $error_message; ?>  </h3>
   
<?php }?>

<?php if(isset($success_message) && $success_message !=''){    ?>
        <h3 class="text-success text-center " id="massage"> <?php echo $success_message; ?>  </h3>
<?php }?>
