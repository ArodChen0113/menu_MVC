<?php


class menu_sel_c{

    protected $_view;

    public function __construct()
    {
        $this->_view = new View_menu_sel();
    }

    public function menu_sel($restname){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        $Rec_menu=mysqli_query($db, "SELECT * FROM `menu` Where `rest_name` = '$restname'"); //菜單資料

//        $Rec_name=mysqli_query($db, "SELECT * FROM `menu` Where `rest_name` = '$restname'"); //菜單資料
//        $row_menu=mysqli_fetch_assoc($Rec_name);
//        $restname=$row_menu['rest_name'];

        $this->_view->render('menu_select',$restname ,$Rec_menu);

    }
}

?>