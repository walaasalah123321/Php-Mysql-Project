<?php if(isset($error_message) && $error_message !=''){  ?>
    <div class="col-sm-6 offset-sm-3 border p-3 mt-3">
        <h3 class="alert alert-danger text-center"> <?php echo $error_message; ?>  </h3>
    </div>
<?php }?>

<?php if(isset($success_message) && $success_message !=''){  ?>
    <div class="col-sm-6 offset-sm-3 border p-3 mt-3">
        <h3 class="alert alert-success text-center"> <?php echo $success_message; ?>  </h3>
    </div>
<?php }?>