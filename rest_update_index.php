<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include ("class/rest_kind_index_view.php");
include ("controller/rest_update_controller.php");
$restname=$_POST['select_restName'];
$w = new rest_update_c();
$w->rest_update($restname);
?>