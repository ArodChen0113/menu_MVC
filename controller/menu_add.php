<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

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

class menu{

    public function _Construct(){

    }

    public function menu_inster($rest_kind,$rest_name,$rest_tel,$restpic_tmpname,$restpic_name,$kind,$price,$menu_tmpname,$menu_name,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table"); //設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");
        if ($action != NULL && $action == 'insert')        //判斷值是否由欄位輸入
        {
            if (!move_uploaded_file($restpic_tmpname, "../photo/".$restpic_name)) {        //執行上傳
                echo "Upload false!";
            } else {
                mysqli_query($db, "INSERT INTO restaurant(`rest_name`,`rest_kind`,`rest_tel`,`rest_picture`)VALUES('$rest_name','$rest_kind','$rest_tel','$restpic_name')"); //新增餐廳資料
            }
            $k=0;
            $kind = array_filter($kind);
            $num=count($kind);
            echo $num;
            for ($i=1;$i<=$num;$i++) {
                if (!move_uploaded_file($menu_tmpname[$k], "../photo/".$menu_name[$k])) {        //執行上傳
                    echo "Upload false!";
                } else {
                mysqli_query($db, "INSERT INTO menu(`rest_name`,`kind`,`unit_price`,`menu_picture`,`date`)VALUES('$rest_name','$kind[$k]','$price[$k]','$menu_name[$k]',NOW())"); //新增菜單資料
                $k++;
            }
            }
            header("Location:../restaurant_index.php");
        }
    }
}
$menu = new menu;
$menu -> menu_inster($rest_kind,$rest_name,$rest_tel,$restpic_tmpname,$restpic_name,$kind,$price,$menu_tmpname,$menu_name,$action);
?>