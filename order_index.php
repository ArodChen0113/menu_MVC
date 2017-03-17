<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("class/order_index_view.php");
include ("controller/order_controller.php");

$w = new order_select();
$w->order();
?>