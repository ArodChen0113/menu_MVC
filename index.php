<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include ("class/view.php");
include ("controller/menu_inster_controller.php");

$w = new rest_system_select();
$w->restaurant_kind();
?>