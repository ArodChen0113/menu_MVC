<?php
$select1=$_GET["select1"];
$select2=$_GET["select2"];
$rest1=$_GET["rest1"];
$rest2=$_GET["rest2"];
class order_kind_select2{

    public function _Construct(){

    }

    public function order_k2($select1,$select2,$rest1,$rest2){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        $Rec_resrname=mysqli_query($db, "SELECT `rest_name`,`rest_picture` FROM `restaurant` WHERE `rest_name`='$select2'");
        $row_restname=mysqli_fetch_assoc($Rec_resrname);
        $sel_name=$row_restname['rest_name'];
        $sel_pic=$row_restname['rest_picture'];
        header("Location:../restaurant_index.php?select1=$select1&select2=$select2&selname=$sel_name&selpic=$sel_pic&rest1=$rest1&rest2=$rest2");
    }
}
$order_m = new order_kind_select2;
$order_m -> order_k2($select1,$select2,$rest1,$rest2);

?>