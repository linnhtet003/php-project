<?php
include("connection.php");
$q = "delete from sliderlist where id='{$_GET['id']}'";
$con->query($q);
unlink("img/".$_GET['img']);
header('location:slider.php');
?>