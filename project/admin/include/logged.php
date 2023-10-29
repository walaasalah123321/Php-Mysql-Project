<?php
session_start();
if(!isset($_SESSION["login"]) or !$_SESSION["login"]){
  header("Location: login.php");
  die();
}
?>