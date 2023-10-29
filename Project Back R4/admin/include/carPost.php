<?php 
$title=$_POST["title"];
$content=$_POST["content"];
$luggage=$_POST["luggage"];
$doors=$_POST["doors"];
$passengers=$_POST["passengers"];
isset(($_POST["active"]))?$active=1:$active=0;
$category=$_POST["category"];
$price=$_POST["price"];
$category=$_POST["category"];
$row=getRow('car','title',$title);

?>