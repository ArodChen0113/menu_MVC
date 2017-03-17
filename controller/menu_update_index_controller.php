<?php


class menu_up_c{

    protected $_view;

    public function __construct()
    {
        $this->_view = new View_menu_up();
    }

    public function menu_up($num,$restName){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        $menu=mysqli_query($db, "SELECT * FROM `menu` WHERE `m_num`='$num'"); //菜單資料

        $this->_view->render('menu_update',$menu,$num,$restName);

    }
}

?>