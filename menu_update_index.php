<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include ("class/menu_update_index_view.php");
include ("controller/menu_update_index_controller.php");
$num=$_GET['num1'];
$restName=$_GET['restname1'];

$w = new menu_up_c();
$w->menu_up($num,$restName);
?>