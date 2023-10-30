<?php 
if(!isset($_SESSION["admin"])){

  header("location:".URLA."login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple registration form</title>

    <link rel="stylesheet" href="<?php echo asset?>/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="City" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cites
          </a>
          <ul class="dropdown-menu" aria-labelledby="City">
            <li><a class="dropdown-item" href="<?php echo URLA?>city/cites.php">Add</a></li>
            <li><a class="dropdown-item" href="<?php echo URLA?>city/view.php">View All</a></li>
           
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="Servic" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Service
          </a>
          <ul class="dropdown-menu" aria-labelledby="Servic">
            <li><a class="dropdown-item" href="<?php echo URLA?>service/add.php">Add</a></li>
            <li><a class="dropdown-item" href="<?php echo URLA?>service/view.php">View All</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="Order" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Order
          </a>
          <ul class="dropdown-menu" aria-labelledby="Order">
            
            <li><a class="dropdown-item" href="<?php echo URLA?>order/view.php">View All</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="Admin" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admins
          </a>
          <ul class="dropdown-menu" aria-labelledby="Admin">
            <li><a class="dropdown-item" href="<?php echo URLA?>admins/Add.php">Add</a></li>
            <li><a class="dropdown-item"  href="<?php echo URLA?>admins/view.php"> View All</a></li>
           
          </ul>
        </li>
     
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLA?>logout.php">Logout</a>
        </li>
     
     
     
      </ul>
      
    </div>
  </div>
</nav>