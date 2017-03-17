<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include ("class/openmeal_index_view.php");
include ("controller/openmeal_controller.php");

$w = new openmeal_select();
$w->openmeal();

?>