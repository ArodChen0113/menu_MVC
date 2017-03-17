<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("../class/view.php");
if($_POST['action']=='insert'){
    $rest_kind=$_POST['restkind'];
    $kind=$_POST['kind'];
    $price=$_POST['price'];
    $action=$_POST['action'];

    $menu_tmpname=$_FILES['menu_picture']['tmp_name'];
    $menu_name=$_FILES['menu_picture']['name'];

    $restpic_tmpname=$_FILES['rest_picture']['tmp_name'];
    $restpic_name=$_FILES['rest_picture']['name'];

    $rest_tel=$_POST['rest_tel'];
    $rest_name=$_POST['restaurant_name'];
    $c= new menu_system;
    $c-> rest_menu_insert($rest_kind,$rest_name,$rest_tel,$restpic_tmpname,$restpic_name,$kind,$price,$menu_tmpname,$menu_name,$action);
}else if($_POST['action']=='update'){
    $restName=$_POST['restName'];
    $num=$_POST['num'];
    $kind=$_POST['kind'];
    $price=$_POST['price'];
    $action=$_POST['action'];
    $menu_tmpname=$_FILES['menu_picture']['tmp_name'];
    $menu_name=$_FILES['menu_picture']['name'];
    $c= new menu_system;
    $c-> menu_update($restName,$num, $kind, $price, $action, $menu_tmpname, $menu_name);
}else if($_GET['action']=='delete') {
    $num=$_GET['num1'];
    $action=$_GET['action'];
    $restname=$_GET['restname'];
    $c= new menu_system;
    $c-> menu_delete($num,$action,$restname);
}
class menu_system
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_menu_index();
    }
    public function rest_menu_insert_index()

    {
        require_once("DB_config.php");
        require_once("DB_Class.php");

        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->query("SELECT `rest_kind` FROM `restaurant_kind`");
        $k=0;
        while($result = $db->fetch_array())
        {
            $rest_kind[$k]=$result['rest_kind'];
            $k++;
        }
        $num=count($rest_kind);
        for($i=0;$i<=$num-1;$i++){
            $rest_kind_echo[$i]=array($rest_kind[$i]);
        }
        $this->_view->render('menu_index' , $rest_kind_echo);
    }

    public function rest_menu_insert($rest_kind,$rest_name,$rest_tel,$restpic_tmpname,$restpic_name,$kind,$price,$menu_tmpname,$menu_name,$action) //新增餐廳＆菜單
    {

        if ($action != NULL && $action == 'insert')      //判斷值是否由欄位輸入
        {
            require_once("DB_config.php");
            require_once("DB_Class.php");

            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);

            if (!move_uploaded_file($restpic_tmpname, "../photo/".$restpic_name)) {        //執行菜單圖片上傳
                echo "Upload false!";
            } else {
                $db->query("INSERT INTO restaurant(`rest_name`,`rest_kind`,`rest_tel`,`rest_picture`)VALUES('$rest_name','$rest_kind','$rest_tel','$restpic_name')"); //新增餐廳資料
            }
            $k=0;
            $kind = array_filter($kind);
            $num=count($kind);
            echo $num;
            for ($i=1;$i<=$num;$i++) {
                if (!move_uploaded_file($menu_tmpname[$k], "../photo/".$menu_name[$k])) {  //執行菜單圖片上傳
                    echo "Upload false!";
                } else {
                    $db->query("INSERT INTO menu(`rest_name`,`kind`,`unit_price`,`menu_picture`,`date`)VALUES('$rest_name','$kind[$k]','$price[$k]','$menu_name[$k]',NOW())"); //新增菜單資料
                    $k++;
                }
            }
            header("Location:../restaurant_index.php");
        }
    }

    public function menu_update($restName,$num, $kind, $price, $action, $menu_tmpname, $menu_name) //修改菜單
    {

        if ($action != NULL && $action == 'update')           //判斷值是否由欄位輸入
        {
            require_once("DB_config.php");
            require_once("DB_Class.php");

            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
            $db->query("UPDATE menu SET `kind` = '$kind' WHERE `m_num`='$num'");  //修改菜單名稱
            $db->query("UPDATE menu SET `unit_price` = '$price' WHERE `m_num`='$num'");  //修改菜單單價

            if (!move_uploaded_file($menu_tmpname, "photo/" . $menu_name)) {        //執行上傳菜單圖片
                header("Location:../menu_select_index.php?restname=$restName");
            } else {
                $db->query("UPDATE menu SET `menu_picture` = '$menu_name' WHERE `num`='$num'"); //修改菜單圖片
                header("Location:../menu_select_index.php?restname=$restName");
            }
        }
    }

    public function menu_delete($num,$action,$restname) //刪除菜單
    {

        if ($action != NULL && $action == 'delete') //判斷值是否由欄位輸入
        {
            require_once("DB_config.php");
            require_once("DB_Class.php");

            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
            $db->query("Delete from menu WHERE `m_num`='$num'");  //修改菜單名稱
            header("Location:../menu_select_index.php?restname=$restname");
        }
    }
}
