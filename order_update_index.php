<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include ("class/order_update_index_view.php");
include ("controller/order_update_controller.php");

$selectname=$_GET['postname'];
$w = new order_update_select();
$w->order_update($selectname);

?>