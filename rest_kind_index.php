<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("class/view.php");
include ("controller/rest_kind_controller.php");

$w = new rest_kind_system();
$w->rest_kind_select();

?>