<?php

include ("class/restaurant_kind_index_view.php");
include ("controller/rest_kind.php");

$w = new rest_system_select();
$w->restaurant_kind_all();

?>