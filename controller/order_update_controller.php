<?php
class order_update_select
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_order_update();
    }
    public function order_update($selectname)

    {
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");
        $orderUpdate=mysqli_query($db, "SELECT * FROM `menu_order`JOIN `menu` ON menu_order.kind = menu.kind WHERE`name`='$selectname' AND `pay`!='9'");

        $sumPrice=mysqli_query($db, "SELECT `price` FROM `menu_order` WHERE `name`='$selectname' AND `pay`!='9'");
        $row_sumPrice=mysqli_fetch_assoc($sumPrice);
        $sum=$row_sumPrice['price'];
        $this->_view->render('order_onlineUpdate' , $orderUpdate , $selectname , $sum);
    }

}