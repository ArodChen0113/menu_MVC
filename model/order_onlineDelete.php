<?php
$num=$_GET['num1'];
$name=$_GET['name1'];
$kind=$_GET['kind1'];
$price=$_GET['price1'];
$action=$_GET['action1'];

class menu{

    public function _Construct(){

    }

    public function menu_inster($num,$name,$kind,$price,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        if ($action != NULL && $action == 'delete')        //判斷值是否由欄位輸入
        {
            mysqli_query($db, "Delete from menu_order WHERE `num`='$num'");  //刪除菜單

            $sumPrice=mysqli_query($db, "SELECT `price` FROM `menu_order` WHERE `name`='$name'");    //查詢訂購總額
            $row_sumPrice=mysqli_fetch_assoc($sumPrice);
            $updateptice=$row_sumPrice['price']-$price;
            mysqli_query($db, "UPDATE menu_order SET `price` = '$updateptice' WHERE `name`='$name'");
            header("Location:order_onlineUpdate.php?postname=$name");
        }
    }
}

$menu = new menu;
$menu -> menu_inster($num,$name,$kind,$price,$action);
?>