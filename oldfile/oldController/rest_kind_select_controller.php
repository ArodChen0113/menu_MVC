<?php
$select1=$_GET["select1"];
$rest1=$_GET["rest1"];

class order_kind_select{

    public function _Construct(){

    }

    public function order_k($select1,$rest1){
        require_once("../model/DB_config.php");
        require_once("../model/DB_Class.php");
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->select("`rest_name`","`restaurant`","`rest_kind`='$select1'");
        $k=0;
        while($result = $db->fetch_array())
        {
            $rest_name[$k]=$result['rest_name'];;
            $k++;
        }
        $num=count($rest_name);
        for($i=0;$i<=$num-1;$i++){
            $sel_restname[$i]=array($rest_name[$i]);
        }
        session_start();
        $_SESSION['rest_name']=$sel_restname;
        $db->select("`rest_name`","`restaurant`","`rest_kind`='$rest1'");
        $k=0;
        while($result2 = $db->fetch_array())
        {
            $rest_name2[$k]=$result2['rest_name'];;
            $k++;
        }
        $num=count($rest_name2);
        for($i=0;$i<=$num-1;$i++){
            $sel_restname2[$i]=array($rest_name2[$i]);
        }
        $_SESSION['rest_name2']=$sel_restname2;
        header("Location:../restaurant_index.php?select1=$select1&rest1=$rest1");
    }
}
$order_m = new order_kind_select;
$order_m -> order_k($select1,$rest1);

?>