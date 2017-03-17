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
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        $order_price1=mysqli_query($db, "SELECT `unit_price`,`menu_picture` FROM `menu` WHERE `kind`='$select1'"); //訂購選單1
        $row_orderPrice1=mysqli_fetch_assoc($order_price1);
        $price1=$row_orderPrice1["unit_price"];
        $pic1=$row_orderPrice1["menu_picture"];

        $order_price2=mysqli_query($db, "SELECT `unit_price`,`menu_picture` FROM `menu` WHERE `kind`='$select2'"); //訂購選單2
        $row_orderPrice2=mysqli_fetch_assoc($order_price2);
        $price2=$row_orderPrice2["unit_price"];
        $pic2=$row_orderPrice2["menu_picture"];

        $order_price3=mysqli_query($db, "SELECT `unit_price`,`menu_picture` FROM `menu` WHERE `kind`='$select3'"); //訂購選單3
        $row_orderPrice3=mysqli_fetch_assoc($order_price3);
        $price3=$row_orderPrice3["unit_price"];
        $pic3=$row_orderPrice3["menu_picture"];

        $order_price4=mysqli_query($db, "SELECT `unit_price`,`menu_picture` FROM `menu` WHERE `kind`='$select4'"); //訂購選單4
        $row_orderPrice4=mysqli_fetch_assoc($order_price4);
        $price4=$row_orderPrice4["unit_price"];
        $pic4=$row_orderPrice4["menu_picture"];

        $order_price5=mysqli_query($db, "SELECT `unit_price`,`menu_picture` FROM `menu` WHERE `kind`='$select5'"); //訂購選單5
        $row_orderPrice5=mysqli_fetch_assoc($order_price5);
        $price5=$row_orderPrice5["unit_price"];
        $pic5=$row_orderPrice5["menu_picture"];

        $sum=$price1+$price2+$price3+$price4+$price5;


            header("Location:../order_index.php?select1=$select1&price1=$price1&pic1=$pic1&select2=$select2&price2=$price2&pic2=$pic2&select3=$select3&price3=$price3&pic3=$pic3&select4=$select4&price4=$price4&pic4=$pic4&select5=$select5&price5=$price5&pic5=$pic5&sum=$sum");

    }
}
$order_m = new order_menu;
$order_m -> order_m($select1,$select2,$select3,$select4,$select5);

?>