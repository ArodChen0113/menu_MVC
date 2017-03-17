<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("class/view.php");
include ("controller/menu_controller.php");

$w = new menu_system();
$w->rest_menu_insert_index();
?>