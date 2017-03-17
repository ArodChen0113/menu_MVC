<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$rest_kind=$_POST['rest_kind_inster'];
$action=$_POST['action'];

class restaurant_kind{

    public function _Construct(){

    }

    public function restaurant_kind_inster($rest_kind,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table"); //設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");
        if ($action != NULL && $action == 'insert')        //判斷值是否由欄位輸入
        {
            mysqli_query($db, "INSERT INTO restaurant_kind (`rest_kind`)VALUES('$rest_kind')"); //新增菜單資料
            header("Location:../rest_kind_index.php");
        }
        }
}
$restaurant = new restaurant_kind;
$restaurant -> restaurant_kind_inster($rest_kind,$action);

?>