<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("class/view.php");
include ("controller/restaurant_controller.php");
require_once("model/DB_Class.php");

$w = new restaurant_system();
$w->restaurant_choose_show();

?>