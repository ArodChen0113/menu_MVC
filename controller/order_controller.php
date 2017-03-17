<?php
class order_select
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_order();
    }
    public function order()

    {
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        $Rec_RestOpen=mysqli_query($db, "SELECT `rest_name` FROM `restaurant` WHERE `rest_open`='1'");  //今日開餐
        $row_RestOpen=mysqli_fetch_assoc($Rec_RestOpen);
        $rest_openName=$row_RestOpen['rest_name'];

        $Rec_order_kind=mysqli_query($db, "SELECT `kind` FROM `menu` WHERE `rest_name`='$rest_openName' "); //今日菜單
        $k=0;
        while($row_orderkind=mysqli_fetch_assoc($Rec_order_kind)){
            $today_menu[$k]=$row_orderkind;
            $k++;
        }


        $this->_view->render('order_online',$today_menu,$rest_openName);
    }

}