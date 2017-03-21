<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include ("../class/rest_kind_index_view.php");
if($_POST['action']=='update'){
    $num=$_POST['num'];
    $restName=$_POST['rest_name'];
    $restKind=$_POST['rest_kind'];
    $restTel=$_POST['rest_tel'];
    $restPic_tmpname=$_FILES['rest_picture']['tmp_name'];
    $restPic_name=$_FILES['rest_picture']['name'];
    $action=$_POST['action'];
    $c = new restaurant_system;
    $c-> restaurant_update($num,$restName,$restKind,$restTel,$restPic_tmpname,$restPic_name,$action);
}else if($_GET['action']=='delete') {
    $restName=$_GET['restname'];
    $action=$_GET['action'];
    $c = new restaurant_system;
    $c-> restaurant_delete($restName,$action);
}
class restaurant_system{

    protected $_view;

    public function __construct()
    {
        $this->_view = new View_restaurant_kind();
    }

    public function rest_update_index($restname){
        require_once("model/DB_config.php");
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db -> select_all('restaurant',"`rest_name` = '$restname'");

        while($result = $db->fetch_array())
        {
            $restname=$result['rest_name'];
            $restkind=$result['rest_kind'];
            $resttel=$result['rest_tel'];
            $restpic=$result['rest_picture'];
            $restnum=$result['num'];
        }
        $this->_view->render('restaurant_update' , $restname,$restkind,$resttel,$restpic,$restnum);
    }

    public function restaurant_update($num,$restName,$restKind,$restTel,$restPic_tmpname,$restPic_name,$action) //修改餐廳資料
    {

        if ($action != NULL && $action == 'update') //判斷值是否由欄位輸入
        {
            require_once("../model/DB_config.php");
            require_once("../model/DB_Class.php");
            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
            $db -> update('restaurant',"`rest_name` = '$restName'","`num` = '$num'");
            $db -> update('restaurant',"`rest_kind` = '$restKind'","`num` = '$num'");
            $db -> update('restaurant',"`rest_tel` = '$restTel'","`num` = '$num'");

            if (!move_uploaded_file($restPic_tmpname, "photo/".$restPic_name)) {                 //執行圖片上傳
                header("Location:../restaurant_index.php");
            } else {
                $db -> update('restaurant',"`rest_picture` = '$restPic_name'","`num` = '$num'"); //修改餐廳圖片
                header("Location:../restaurant_index.php");
            }
        }
    }

    public function restaurant_delete($restName,$action) //刪除餐廳分類
    {

        if ($action != NULL && $action == 'delete') //判斷值是否由欄位輸入
        {
            require_once("../model/DB_config.php");
            require_once("../model/DB_Class.php");
            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
            $db->delete('menu_order',"`rest_name`='$restName'");
            $db->delete('menu',"`rest_name`='$restName'");
            $db->delete('restaurant',"`rest_name`='$restName'");
            header("Location:../restaurant_index.php");
        }
    }
}

?>