<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("class/view.php");
include ("controller/menu_controller.php");
$num=$_GET['num1'];
$restName=$_GET['restname1'];

$w = new menu_system();
$w->menu_up_show($num,$restName);
?>