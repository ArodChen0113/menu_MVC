<?php
$select1=$_GET["select1"];
$rest1=$_GET["rest1"];

class order_kind_select{

    public function _Construct(){

    }

    public function order_k($select1,$rest1){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        $Rec_resrname=mysqli_query($db, "SELECT `rest_name` FROM `restaurant` WHERE `rest_kind`='$select1'");
        $k=0;
        while($row_restname=mysqli_fetch_assoc($Rec_resrname)){
            $rest_name[$k]=$row_restname;
            $k++;
        }
        session_start();
        $_SESSION['rest_name']=$rest_name;

        $Rec_resrname2=mysqli_query($db, "SELECT `rest_name` FROM `restaurant` WHERE `rest_kind`='$rest1'");
        $k=0;
        while($row_restname2=mysqli_fetch_assoc($Rec_resrname2)){
            $rest_name2[$k]=$row_restname2;
            $k++;
        }
        $_SESSION['rest_name2']=$rest_name2;
        header("Location:../restaurant_index.php?select1=$select1&rest1=$rest1");
    }
}
$order_m = new order_kind_select;
$order_m -> order_k($select1,$rest1);

?>