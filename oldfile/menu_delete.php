<?php
$num=$_GET['num1'];
$action=$_GET['action1'];
$restname=$_GET['restname'];

class menu{

    public function _Construct(){

    }

    public function menu_inster($num,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        if ($action != NULL && $action == 'delete')        //判斷值是否由欄位輸入
        {
            mysqli_query($db, "Delete from menu WHERE `num`='$num'");  //修改菜單名稱
            header("Location:../menu_select_index.php");
        }
    }
}

$menu = new menu;
$menu -> menu_inster($num,$action);
?>