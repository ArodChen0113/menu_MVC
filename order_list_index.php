<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include ("class/order_list_index_view.php");
include ("controller/order_list_controller.php");

$w = new order_list_select();
$w->order_list();

?>