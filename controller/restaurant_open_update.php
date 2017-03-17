<?php

$rest_name=$_POST['open_restName'];
$action=$_POST['action'];

class restaurant_open{

    public function _Construct(){

    }

    public function rest_open($rest_name,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        if ($action != NULL && $action == 'update')        //判斷值是否由欄位輸入
        {

            mysqli_query($db, "UPDATE restaurant SET `rest_open` = '0'");  //關閉餐廳
            mysqli_query($db, "UPDATE restaurant SET `rest_open` = '1' WHERE `rest_name`='$rest_name'");  //開啟今日餐廳
            mysqli_query($db, "UPDATE menu_order SET `pay` = '9' WHERE `pay`!='9'");  //之前訂餐改為歷史紀錄
            header("Location:../restaurant_index.php");
        }
    }
}

$menu = new restaurant_open;
$menu -> rest_open($rest_name,$action);
?>
