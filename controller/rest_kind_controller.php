<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("../class/restaurant_kind_index_view.php");

if($_POST['action']=='insert'){
    $rest_kind=$_POST['rest_kind_inster'];
    $action=$_POST['action'];
    $c= new rest_kind_system;
    $c-> rest_kind_insert($rest_kind,$action);
}else if($_POST['action']=='update'){
    $num=$_POST['num1'];
    $rest_kind=$_POST['rest_kind1'];
    $action=$_POST['action'];
    $c= new rest_kind_system;
    $c-> rest_kind_update($num,$action,$rest_kind);
}else if($_GET['action']=='delete') {
    $num = $_GET['num2'];
    $action = $_GET['action'];
    $c = new rest_kind_system;
    $c->rest_kind_delete($num, $action);
}
class rest_kind_system
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_restaurant_kind();
    }

    public function rest_kind_select() //搜尋餐廳分類
    {
        require_once("model/DB_config.php");
        require_once("model/DB_Class.php");
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->select("`rest_kind`,`num`","`restaurant_kind`");
        $k=0;
        while($result = $db->fetch_array())
        {
            $rest_kind[$k]=$result['rest_kind'];
            $rest_num[$k]=$result['num'];
            $k++;
        }
        $num=count($rest_kind);
        for($i=0;$i<=$num-1;$i++){
        $rest_kind_echo[$i]=array($rest_kind[$i]);
        $rest_num_echo[$i]=array($rest_num[$i]);
        }
        $this->_view->render('restaurant_kind' , $rest_kind_echo,$rest_num_echo);
    }

    public function rest_kind_insert($rest_kind,$action) //新增餐廳分類
    {

        if ($action != NULL && $action == 'insert')      //判斷值是否由欄位輸入
        {
            require_once("../model/DB_config.php");
            require_once("../model/DB_Class.php");
            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
            $db->insert("restaurant_kind","`rest_kind`","'$rest_kind'");
            header("Location:../rest_kind_index.php");

        }
    }

    public function rest_kind_update($num,$action,$rest_kind) //修改餐廳分類
    {

        if ($action != NULL && $action == 'update')           //判斷值是否由欄位輸入
        {
            require_once("../model/DB_config.php");
            require_once("../model/DB_Class.php");
            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
            $k=0;
            $count_kind=count($num);
            for($i=1;$i<=$count_kind;$i++){
                $db->update("restaurant_kind","`rest_kind` = '$rest_kind[$k]'","`num`='$num[$k]'");
                $k++;
            }
            header("Location:../rest_kind_index.php");
        }
    }

    public function rest_kind_delete($num,$action) //刪除餐廳分類
    {

        if ($action != NULL && $action == 'delete') //判斷值是否由欄位輸入
        {
            require_once("../model/DB_config.php");
            require_once("../model/DB_Class.php");
            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
            $db->delete("restaurant_kind","`num`='$num'");
            header("Location:../rest_kind_index.php");
        }
    }
}
