<?php
$restName=$_GET['restname'];
$action=$_GET['action1'];

class restaurant_delete{

    public function _Construct(){

    }

    public function rest_delete($restName,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        if ($action != NULL && $action == 'delete')        //判斷值是否由欄位輸入
        {
            mysqli_query($db, "DELETE FROM menu_order WHERE `rest_name`='$restName'");  //刪除訂購餐點
            mysqli_query($db, "DELETE FROM menu WHERE `rest_name`='$restName'");  //刪除餐廳菜單
            mysqli_query($db, "DELETE FROM restaurant WHERE `rest_name`='$restName'");  //刪除餐廳資料
            header("Location:restaurant_index.php");
        }
    }
}

$menu = new restaurant_delete;
$menu -> rest_delete($restName,$action);
?>