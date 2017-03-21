<?php
$rest_name=$_POST['open_restName'];
$action=$_POST['action'];

class restaurant_open{

    public function _Construct(){

    }

    public function rest_open($rest_name,$action){
        require_once("../model/DB_config.php");
        require_once("../model/DB_Class.php");
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);

        if ($action != NULL && $action == 'update')        //判斷值是否由欄位輸入
        {
            $db->update("restaurant","`rest_open` = '0'","");  //關閉餐廳
            $db->update("restaurant","`rest_open` = '1'","`rest_name`='$rest_name'");  //開啟今日餐廳
            $db->update("menu_order","`pay` = '9'","`pay`!='9'"); //之前訂餐改為歷史紀錄
            header("Location:../restaurant_index.php");
        }
    }
}
$menu = new restaurant_open;
$menu -> rest_open($rest_name,$action);
?>
