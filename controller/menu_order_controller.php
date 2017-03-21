<?php
$select1=$_GET["select1"];
$select2=$_GET["select2"];
$select3=$_GET["select3"];
$select4=$_GET["select4"];
$select5=$_GET["select5"];

class order_menu{

    public function _Construct(){

    }

    public function order_m($select1,$select2,$select3,$select4,$select5){
        require_once("../model/DB_config.php");
        require_once("../model/DB_Class.php");
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);

        $db -> select("`unit_price`,`menu_picture`","`menu`","`kind`='$select1'"); //訂購選單1
        while($result1 = $db->fetch_array())
        {
            $price1=$result1['unit_price'];
            $pic1=$result1['menu_picture'];
        }
        $db -> select("`unit_price`,`menu_picture`","`menu`","`kind`='$select2'"); //訂購選單2
        while($result2 = $db->fetch_array())
        {
            $price2=$result2['unit_price'];
            $pic2=$result2['menu_picture'];
        }
        $db -> select("`unit_price`,`menu_picture`","`menu`","`kind`='$select3'"); //訂購選單3
        while($result3 = $db->fetch_array())
        {
            $price3=$result3['unit_price'];
            $pic3=$result3['menu_picture'];
        }
        $db -> select("`unit_price`,`menu_picture`","`menu`","`kind`='$select4'"); //訂購選單4
        while($result4 = $db->fetch_array())
        {
            $price4=$result4['unit_price'];
            $pic4=$result4['menu_picture'];
        }
        $db -> select("`unit_price`,`menu_picture`","`menu`","`kind`='$select5'"); //訂購選單5
        while($result5 = $db->fetch_array())
        {
            $price5=$result5['unit_price'];
            $pic5=$result5['menu_picture'];
        }
        $sum=$price1+$price2+$price3+$price4+$price5;
            header("Location:../order_index.php?select1=$select1&price1=$price1&pic1=$pic1&select2=$select2&price2=$price2&pic2=$pic2&select3=$select3&price3=$price3&pic3=$pic3&select4=$select4&price4=$price4&pic4=$pic4&select5=$select5&price5=$price5&pic5=$pic5&sum=$sum");
    }
}
$order_m = new order_menu;
$order_m -> order_m($select1,$select2,$select3,$select4,$select5);
