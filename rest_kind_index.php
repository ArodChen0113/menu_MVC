<?php
include ("class/restaurant_kind_index_view.php");
include ("controller/rest_kind_controller.php");

$w = new rest_kind_system();
$w->rest_kind_select();

?>