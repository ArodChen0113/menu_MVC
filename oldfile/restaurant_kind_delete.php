<?php
$num=$_GET['num2'];
$action=$_GET['action1'];

class restaurant_kind_delete{

    public function _Construct(){

    }

    public function rest_deldete($num,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        if ($action != NULL && $action == 'delete')        //判斷值是否由欄位輸入
        {
            mysqli_query($db, "Delete from restaurant_kind WHERE `num`='$num'");  //刪除餐廳分類
            header("Location:../rest_kind_index.php");
        }
    }
}

$menu = new restaurant_kind_delete;
$menu -> rest_deldete($num,$action);
?>