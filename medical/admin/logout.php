<?php 
include_once("../config.php");

if($_SESSION["admin"]){
session_destroy();
    header("location:".URLA."login.php");
}
?>