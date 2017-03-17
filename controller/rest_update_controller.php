<?php


class rest_update_c{

    protected $_view;

    public function __construct()
    {
        $this->_view = new View_restaurant_kind();
    }

    public function rest_update($restname){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");


        $Rec_rest=mysqli_query($db, "SELECT * FROM `restaurant` Where `rest_name` = '$restname'"); //搜尋今日開餐
        $row_rest=mysqli_fetch_assoc($Rec_rest);
        $restname=$row_rest['rest_name'];
        $restkind=$row_rest['rest_kind'];
        $resttel=$row_rest['rest_tel'];
        $restpic=$row_rest['rest_picture'];
        $restnum=$row_rest['num'];

        $this->_view->render('restaurant_update' , $restname,$restkind,$resttel,$restpic,$restnum);

    }
}

?>