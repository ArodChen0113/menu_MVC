<?php
$num=$_GET['num'];
$action=$_GET['action1'];

class order_del{

    public function _Construct(){

    }

    public function order_delete($num1,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        if ($action != NULL && $action == 'delete')        //判斷值是否由欄位輸入
        {
            $sumPrice=mysqli_query($db, "SELECT `price`,`kind`,`name` FROM `menu_order` WHERE `num`='$num1'");    //查詢訂購總額
            $row_sumPrice=mysqli_fetch_assoc($sumPrice);
            $name=$row_sumPrice['name'];
            $kind=$row_sumPrice['kind'];
            $Rec_unitprice=mysqli_query($db, "SELECT `unit_price` FROM `menu` WHERE `kind`='$kind'");    //查詢訂購總額
            $row_uniprice=mysqli_fetch_assoc($Rec_unitprice);
            $updateptice=$row_sumPrice['price']-$row_uniprice['unit_price'];
            mysqli_query($db, "UPDATE menu_order SET `price` = '$updateptice' WHERE `name`='$name'");

            mysqli_query($db, "Delete from menu_order WHERE `num`='$num1'");  //刪除菜單
            header("Location:../order_update_index.php?postname=$name");
        }
    }
}
$order_m = new order_del;
$order_m -> order_delete($num,$action);
?>