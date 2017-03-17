<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("class/rest_kind_index_view.php");
include ("controller/restaurant_controller.php");
$restname=$_POST['select_restName'];
$w = new restaurant_system();
$w->rest_update_index($restname);
?>