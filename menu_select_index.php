<?php

include ("class/menu_sel_index_view.php");
include ("controller/menu_sel_index_controller.php");
if($_GET['restname']!=NULL){
    $restName=$_GET['restname'];
}else{
    $restName=$_POST['select_restName'];
}
$w = new menu_sel_c();
$w->menu_sel($restName);
?>