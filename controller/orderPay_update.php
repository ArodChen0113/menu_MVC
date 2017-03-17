<?php
$name=$_GET['payname'];
$action=$_GET['action'];

class menu{

    public function _Construct(){

    }

    public function menu_inster($name,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        if ($action != NULL && $action == 'update')        //判斷值是否由欄位輸入
        {
                mysqli_query($db, "UPDATE menu_order SET `pay` = '1' WHERE `name`='$name' AND `pay`!='9'");  //新增至資料庫
                header("Location:../order_list_index.php");
        }
    }
}

$menu = new menu;
$menu -> menu_inster($name,$action);
?>
