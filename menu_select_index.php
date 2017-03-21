<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("class/view.php");
include ("controller/menu_controller.php");
if($_GET['restname']!=NULL){
    $restName=$_GET['restname'];
}else{
    $restName=$_POST['select_restName'];
}
$w = new menu_system();
$w->menu_sel_show($restName);
?>