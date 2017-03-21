<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("class/view.php");
include ("controller/restaurant_controller.php");
include ("model/DB_Class.php");
//include ("model/DB_config.php");
$restname=$_POST['select_restName'];
$w = new restaurant_system();
$w->rest_update_index_show($restname);
?>