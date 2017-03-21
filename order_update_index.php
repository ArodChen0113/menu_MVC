<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("class/view.php");
include ("controller/order_controller.php");

$selectname=$_GET['postname'];
$w = new order_system();
$w->order_update_show($selectname);

?>