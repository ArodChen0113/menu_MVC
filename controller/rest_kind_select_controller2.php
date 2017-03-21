<?php
$select1=$_GET["select1"];
$select2=$_GET["select2"];
$rest1=$_GET["rest1"];
$rest2=$_GET["rest2"];
class order_kind_select2{

    public function _Construct(){

    }

    public function order_k2($select1,$select2,$rest1,$rest2){
        require_once("../model/DB_config.php");
        require_once("../model/DB_Class.php");

        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->select("`rest_name`,`rest_picture`","`restaurant`","`rest_name`='$select2'");
        while($result = $db->fetch_array())
        {
            $sel_name=$result['rest_name'];
            $sel_pic=$result['rest_picture'];
        }
        header("Location:../restaurant_index.php?select1=$select1&select2=$select2&selname=$sel_name&selpic=$sel_pic&rest1=$rest1&rest2=$rest2");
    }
}
$order_m = new order_kind_select2;
$order_m -> order_k2($select1,$select2,$rest1,$rest2);

?>