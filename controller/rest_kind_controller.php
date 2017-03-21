<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("../class/view.php");

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
}else if($_GET['action']=='control1') {
    $select1=$_GET["select1"];
    $rest1=$_GET["rest1"];
    $c = new rest_kind_system;
    $c->rest_kind_control1($select1,$rest1);
}else if($_GET['action']=='control2') {
    $select1=$_GET["select1"];
    $select2=$_GET["select2"];
    $rest1=$_GET["rest1"];
    $rest2=$_GET["rest2"];
    $c = new rest_kind_system;
    $c->rest_kind_control2($select1,$select2,$rest1,$rest2);
}
class rest_kind_system
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_screen_show();
    }

    public function rest_kind_select() //餐廳分類顯示控制
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
        $this->_view->rest_kind_select_view('restaurant_kind' , $rest_kind_echo,$rest_num_echo);
    }

    public function rest_kind_control1($select1,$rest1) //餐廳分類下拉選單控制1
    {
        require_once("../model/DB_config.php");
        require_once("../model/DB_Class.php");
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->select("`rest_name`","`restaurant`","`rest_kind`='$select1'");
        $k=0;
        while($result = $db->fetch_array())
        {
            $rest_name[$k]=$result['rest_name'];;
            $k++;
        }
        $num=count($rest_name);
        for($i=0;$i<=$num-1;$i++){
            $sel_restname[$i]=array($rest_name[$i]);
        }
        session_start();
        $_SESSION['rest_name']=$sel_restname;
        $db->select("`rest_name`","`restaurant`","`rest_kind`='$rest1'");
        $k=0;
        while($result2 = $db->fetch_array())
        {
            $rest_name2[$k]=$result2['rest_name'];;
            $k++;
        }
        $num=count($rest_name2);
        for($i=0;$i<=$num-1;$i++){
            $sel_restname2[$i]=array($rest_name2[$i]);
        }
        $_SESSION['rest_name2']=$sel_restname2;
        header("Location:../restaurant_index.php?select1=$select1&rest1=$rest1");
    }

    public function rest_kind_control2($select1,$select2,$rest1,$rest2){
        require_once("../model/DB_config.php");
        require_once("../model/DB_Class.php");

        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->select("`rest_name`,`rest_picture`","`restaurant`","`rest_name`='$select2'");
        while($result = $db->fetch_array())
        {
            $sel_name=$result['rest_name'];
            $sel_pic=$result['rest_picture'];
        }
        header("Location:../restaurant_index.php?select1=$select1&select2=$select2&selname=$sel_name&selpic=$sel_pic&rest1=$rest1&rest2=$rest2");
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
