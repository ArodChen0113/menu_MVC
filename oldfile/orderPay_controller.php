<?php
$name=$_GET['payname'];
$action=$_GET['action'];

class menu{

    public function _Construct(){

    }

    public function menu_inster($name,$action){
        require_once("../model/DB_config.php");
        require_once("../model/DB_Class.php");
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);

        if ($action != NULL && $action == 'update')        //判斷值是否由欄位輸入
        {
            $db->update("menu_order","`pay` = '1'","`name`='$name' AND `pay`!='9'");  //修改成已繳費
            header("Location:../order_list_index.php");
        }
    }
}

$menu = new menu;
$menu -> menu_inster($name,$action);
?>
