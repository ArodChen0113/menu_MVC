<?php
class openmeal_select
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_open_index();
    }

    public function openmeal()  //今日開餐顯示控制
    {
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");
        $Rec_open=mysqli_query($db, "SELECT `rest_name`,`rest_picture` FROM `restaurant` Where `rest_open` = '1'"); //搜尋今日開餐
        $row_open=mysqli_fetch_assoc($Rec_open);
        $op_name=$row_open['rest_name'];
        $op_pic=$row_open['rest_picture'];
        $this->_view->openmeal_view('openmeal_html' , $op_name , $op_pic);
    }
}