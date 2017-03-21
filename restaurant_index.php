<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("class/restaurant_index_view.php");
include ("controller/rest_index_controller.php");
require_once("model/DB_Class.php");

$w = new restaurant_kind_name_c();
$w->restaurant_kind();

?>