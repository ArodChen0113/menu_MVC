<?php

class restaurant_kind_name_c
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_restaurant_index();
    }
    public function restaurant_kind()
    {
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");
        $Rec_RestKind=mysqli_query($db, "SELECT `rest_kind` FROM `restaurant_kind`"); //分類選單1
        $k=0;
        while($row_restkind=mysqli_fetch_assoc($Rec_RestKind)){
            $sel_restkind[$k]=$row_restkind;
            $k++;
        }
        $Rec_todeyopen=mysqli_query($db, "SELECT `rest_name` FROM `restaurant` WHERE `rest_open` = '1'"); //今日開餐
        $row_todayopen=mysqli_fetch_assoc($Rec_todeyopen);
        $todayopen=$row_todayopen['rest_name'];

        $this->_view->render('restaurant_index' , $sel_restkind , $todayopen);
    }
}